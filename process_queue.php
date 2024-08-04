<?php

require 'vendor/autoload.php';

use App\Libraries\Queue;
use Config\Services;

$queue = new Queue();

while (true) {
    $userData = $queue->dequeue('email_queue');

    if ($userData) {
        $email = Services::email();

        $email->setFrom('elearnxa@gmail.com', 'LearnXa'); // Replace with your email and name
        $email->setTo($userData['email']);

        $email->setSubject('Registration Confirmation');
        $email->setMessage("Dear {$userData['first_name']} {$userData['last_name']},\n\nThank you for your registration. Your registration number is {$userData['registration_number']}.\n\nBest regards,\nYour Company Name");

        if ($email->send()) {
            echo "Email successfully sent to {$userData['email']}\n";
        } else {
            echo "Email sending failed to {$userData['email']}\n";
        }
    } else {
        // No more items in the queue, sleep for a while
        sleep(5);
    }
}
