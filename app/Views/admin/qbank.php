<?php include('./include/head.php'); ?>
<title>Question Bank Management</title>
<style>
    /* .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 50px 20px;
    } */

    .btn-upload {
        margin-top: 20px;
    }

    .file-input {
        display: none;
    }

    .custom-file-label {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>

<body>
<?php include(APPPATH . 'Views/admin/include/sidebar.php'); ?>
    <main id="main" class="main p-0">
        <?php include(APPPATH . 'Views/admin/include/nav2.php'); ?>

        <main class="container mt-2">
            <div class="mb-3 font-weight-bold">QUESTION BANK</div>
            <!-- Create/Edit/Delete Question Form -->
            <div class="card mb-4">
                <div class="card-header">
                    Create/Edit/Delete Question
                </div>
                <div class="card-body">
                    <!-- Form for creating, editing, and deleting questions -->
                    <form id="questionForm">
                        <div class="form-group">
                            <label for="question">Question:</label>
                            <textarea class="form-control" id="question" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" class="form-control" id="category" required>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags:</label>
                            <input type="text" class="form-control" id="tags">
                        </div>
                        <div class="form-group">
                            <label for="options">Options:</label>
                            <input type="text" class="form-control" id="options"
                                placeholder="Enter options separated by commas">
                        </div>
                        <div class="form-group">
                            <label for="correctOption">Correct Option:</label>
                            <input type="text" class="form-control" id="correctOption"
                                placeholder="Enter the correct option">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>

            <!-- Question List -->
            <div class="card">
                <div class="card-header">
                    Question List
                </div>
                <div class="card-body">
                    <!-- Table to display the list of questions -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="questionList">
                            <!-- Dynamically populated question list will be inserted here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>












        </head>

        <body>
            <div class="container">
                <h2 class="mb-4">Import Questions</h2>
                <div class="form-group">
                    <label for="fileInput">Select a file:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="fileInput">
                        <label class="custom-file-label" for="fileInput">Choose file</label>
                    </div>
                    <small class="form-text text-muted">Supported file types: CSV, JSON</small>
                </div>
                <button class="btn btn-primary btn-upload">Upload</button>
            </div>

















    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <?php include('./include/js.php'); ?>

    <!-- Bootstrap JS (optional, if you need any Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript code to handle test editing functionality
        document.getElementById('editTestForm').addEventListener('submit', function (event) {
            event.preventDefault();
            // Fetch form data and send it to server for processing
            let formData = new FormData(this);
            // Use AJAX to send form data to server and handle response
        });
        document.getElementById('addQuestion').addEventListener('click', function () {
            // Dynamically add new question fields to the form
            let questionsContainer = document.getElementById('questionsContainer');
            let newQuestionField = document.createElement('div');
            newQuestionField.classList.add('questionField');
            newQuestionField.innerHTML = `
        <input type="text" class="question" name="question[]" placeholder="Question" required>
        <input type="text" class="option" name="option1[]" placeholder="Option 1" required>
        <input type="text" class="option" name="option2[]" placeholder="Option 2" required>
        <!-- Add more options as needed -->
    `;
            questionsContainer.appendChild(newQuestionField);
        });


        // JavaScript code to handle test deactivation
        document.getElementById('deactivateTest').addEventListener('click', function () {
            // Send request to server to deactivate the test
            // Handle response from server, e.g., display success message
        });



        $(document).ready(function () {
            // Update the label text when a file is selected
            $('.custom-file-input').change(function () {
                var fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').html(fileName);
            });

            // Handle upload button click
            $('.btn-upload').click(function () {
                var fileInput = $('#fileInput')[0].files[0];
                if (!fileInput) {
                    alert('Please select a file.');
                    return;
                }

                // Perform upload logic here
                uploadFile(fileInput);
            });

            function uploadFile(file) {
                // Implement file upload functionality
                console.log('Uploading file:', file);
                // You can use AJAX to send the file to the server for processing
            }
        });
    </script>

</body>

</html>