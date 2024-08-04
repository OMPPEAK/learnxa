<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Role;
use CodeIgniter\Controller;

class PaymentController extends Controller
{
    public function verifyPayment()
    {
        $reference = $this->request->getGet('reference');

        if (!$reference) {
            return redirect()->to('generate-invoice')->with('error', 'No payment reference found.');
        }

        $paystackSecretKey = 'pk_test_18bd358872baeae63db2133cc291cd2e92df0015'; // Replace with your Paystack secret key

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$reference}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer {$paystackSecretKey}",
                "Content-Type: application/json",
                "cache-control: no-cache"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return redirect()->to('generate-invoice')->with('error', 'Error verifying payment.');
        }

        $result = json_decode($response);
        // Get the role_id for "Student"
        $roleModel = new Role();
        $studentRole = $roleModel->where('role_name', 'Student')->first();

        if (!$studentRole) {
            return redirect()->back()->withInput()->with('error', 'Default "Student" role not found.');
        }

        // Log the response from Paystack
        log_message('debug', 'Paystack Response: ' . json_encode($result));

        if ($result->status && $result->data->status === 'success') {
            // Prepare data to be inserted into the database
            $userData = [
                'first_name' => $result->data->metadata->firstname ?? '',
                'last_name' => $result->data->metadata->lastname ?? '',
                'username' => $this->generateUsername($result->data->metadata->firstname ?? '', $result->data->metadata->lastname ?? ''),
                'email' => $result->data->customer->email ?? '',
                'phone_number' => $result->data->metadata->phone ?? '',
                'password_hash' => password_hash($result->data->metadata->lastname, PASSWORD_BCRYPT),
                // 'role_id' => 'student', // Assuming the user role after registration is 'student'
                'role_id' => $studentRole['role_id'], // Assuming the user role after registration is 'student'
                'payment_status' => 'success',
                'amount_paid' => $result->data->amount / 100, // Amount in kobo, convert to naira or dollars as appropriate
                'payment_confirmation_code' => $result->data->reference ?? '',
                'state' => $result->data->metadata->state ?? '',
                'country' => $result->data->metadata->country ?? '',
                'address' => $result->data->metadata->address ?? '',
            ];

            // Log the data to be inserted
            log_message('debug', 'User Data: ' . json_encode($userData));

            

            // Insert data into the database
            $usersModel = new Users();
            $inserted = $usersModel->insert($userData);

            if (!$inserted) {
                return redirect()->to('generate-invoice')->with('error', 'Failed to insert user data.');
            }


            // Send confirmation and password emails
            $this->sendConfirmationEmail($userData);
            $this->sendDefaultPasswordEmail($userData['email'], $result->data->customer->last_name);

            // Pass data to the payment_success view
            return view('payment_success', $userData);
        } else {
            return redirect()->to('generate-invoice')->with('error', 'Payment verification failed.');
        }
    }


    private function generateUsername($firstName, $lastName)
    {
        $username = strtolower($firstName . '.' . $lastName);

        // Instantiate the Users model to check for existing usernames
        $usersModel = new Users();
        $existingUser = $usersModel->where('username', $username)->first();

        if ($existingUser) {
            // Append a unique identifier if username already exists
            $username .= '.' . uniqid();
        }

        return $username;
    }

    private function sendConfirmationEmail($userData)
    {
        $email = \Config\Services::email();

        $email->setFrom('elearnxa@gmail.com', 'LearnXa');
        $email->setTo($userData['email']);
        $email->setSubject('LearnXa Registration Confirmation');

        // Load HTML email template
        $message = view('email_templates/registration_confirmation', $userData);

        $email->setMessage($message);

        if ($email->send()) {
            // Log success or perform additional actions upon successful email delivery
            log_message('info', 'Registration confirmation email sent to ' . $userData['email']);
        } else {
            // Log failure or handle errors
            log_message('error', 'Failed to send registration confirmation email to ' . $userData['email'] . '. Error: ' . $email->printDebugger(['headers']));
        }
    }

    private function sendDefaultPasswordEmail($email, $defaultPassword)
    {
        $emailService = \Config\Services::email();

        $emailService->setFrom('elearnxa@gmail.com', 'LearnXa');
        $emailService->setTo($email);
        $emailService->setSubject('LearnXa Registration - Your Password');

        $message = "Dear user,\n\nYour default password is: {$defaultPassword}\n\nPlease change your password after logging in.";

        $emailService->setMessage($message);

        if ($emailService->send()) {
            log_message('info', 'Default password email sent to ' . $email);
        } else {
            log_message('error', 'Failed to send default password email to ' . $email . '. Error: ' . $emailService->printDebugger(['headers']));
        }
    }
}
