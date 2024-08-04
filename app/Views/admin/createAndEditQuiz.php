<!DOCTYPE html>
<html lang="en">

<head>
    <?php include(APPPATH . 'Views/admin/include/head.php'); ?>
    <style>
        .upload-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn {
            margin-top: 10px;
        }
        .question-container {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .remove-btn {
            color: red;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>

<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include(APPPATH . 'Views/admin/include/head.php'); ?>
    <style>
        /* Add styles here */
    </style>
</head>

<body>
    <?php include(APPPATH . 'Views/admin/include/sidebar.php'); ?>
    <main id="main" class="main p-0">
        <?php include(APPPATH . 'Views/admin/include/nav2.php'); ?>

        <div class="container mt-2 upload-container">
            <h2>Create Quiz for Course</h2>
            <form id="quizUploadForm">
                <div class="form-group">
                    <label for="courseSelect">Select Course</label>
                    <select class="form-control" id="courseSelect" name="course_id" required>
                        <option value="">Select Course</option>
                        <?php foreach ($courses as $course) : ?>
                            <option value="<?= $course['course_id'] ?>"><?= $course['course_title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="quizTitle">Quiz Title</label>
                    <input type="text" class="form-control" id="quizTitle" name="quiz_title" required>
                </div>

                <div class="form-group">
                    <label for="quizFile">Upload Quiz (CSV)</label>
                    <input type="file" class="form-control" id="quizFile" name="quiz_file" accept=".csv">
                </div>

                <div class="form-group">
                    <label for="questionLimit">Max Questions</label>
                    <input type="number" class="form-control" id="questionLimit" name="question_limit" min="1" required>
                </div>

                <div class="form-group">
                    <label for="quizDuration">Quiz Duration (minutes)</label>
                    <input type="number" class="form-control" id="quizDuration" name="quiz_duration" min="1" required>
                </div>

                <div id="questionsContainer">
                    <!-- Dynamic question fields will be added here -->
                </div>

                <button type="button" id="addQuestionBtn" class="btn btn-secondary">Add Question</button>
                <button type="submit" class="btn btn-primary">Save Quiz</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php include(APPPATH . 'Views/admin/include/js.php'); ?>
    <script src="<?= base_url('/assets/js/main-scripts.js'); ?>"></script>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        let questionIndex = 0;

        function addQuestion() {
            questionIndex++;
            const questionContainer = document.createElement('div');
            questionContainer.classList.add('question-container');
            questionContainer.innerHTML = `
                <div class="form-group">
                    <label for="question_${questionIndex}">Question ${questionIndex}</label>
                    <input type="text" class="form-control" id="question_${questionIndex}" name="questions[${questionIndex}][question]" required>
                </div>
                <div class="form-group">
                    <label for="answer_${questionIndex}_1">Answer 1</label>
                    <input type="text" class="form-control" id="answer_${questionIndex}_1" name="questions[${questionIndex}][answers][1]" required>
                </div>
                <div class="form-group">
                    <label for="answer_${questionIndex}_2">Answer 2</label>
                    <input type="text" class="form-control" id="answer_${questionIndex}_2" name="questions[${questionIndex}][answers][2]" required>
                </div>
                <div class="form-group">
                    <label for="answer_${questionIndex}_3">Answer 3</label>
                    <input type="text" class="form-control" id="answer_${questionIndex}_3" name="questions[${questionIndex}][answers][3]" required>
                </div>
                <div class="form-group">
                    <label for="answer_${questionIndex}_4">Answer 4</label>
                    <input type="text" class="form-control" id="answer_${questionIndex}_4" name="questions[${questionIndex}][answers][4]" required>
                </div>
                <div class="form-group">
                    <label for="correctAnswer_${questionIndex}">Correct Answer</label>
                    <select class="form-control" id="correctAnswer_${questionIndex}" name="questions[${questionIndex}][correct_answer]" required>
                        <option value="1">Answer 1</option>
                        <option value="2">Answer 2</option>
                        <option value="3">Answer 3</option>
                        <option value="4">Answer 4</option>
                    </select>
                </div>
                <button type="button" class="remove-btn" onclick="removeQuestion(${questionIndex})">Remove Question</button>
            `;

            document.getElementById('questionsContainer').appendChild(questionContainer);
        }

        function removeQuestion(index) {
            const questionElement = document.querySelector(`#question_${index}`).closest('.question-container');
            questionElement.remove();
        }

        document.getElementById('addQuestionBtn').addEventListener('click', addQuestion);

        document.getElementById('quizUploadForm').addEventListener('submit', function (event) {
            event.preventDefault();
            // Handle form submission logic here (e.g., AJAX request)
            console.log('Quiz form submitted');
        });
    });
</script>

</body>

</html>
