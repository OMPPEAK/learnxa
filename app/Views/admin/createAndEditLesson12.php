<!DOCTYPE html>
<html lang="en">

<head>
    <?php include(APPPATH . 'Views/admin/include/head.php'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <style>
        #loading {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }

        .spinner {
            border: 4px solid rgba(9, 116, 237, 0.1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border-top-color: #007bff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* .module-btn {
            width: 100%;
            margin-bottom: 10px;
        } */

        .module-btn {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        .active-module {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <?php include(APPPATH . 'Views/admin/include/sidebar.php'); ?>
    <main id="main" class="main p-0">
        <?php include(APPPATH . 'Views/admin/include/nav2.php'); ?>
        <div id="loading">
            <div class="spinner"></div>
        </div>
        <div id="loadingAnimation" class="d-none">
    <!-- You can use any loading spinner you prefer -->
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

        <div class="container mt-2" id="mainContent">
            <div class="mb-3 font-weight-bold">Create/Edit Lesson</div>
            <section class="create-edit-course">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- <form action=" //base_url('lesson/save') " method="post" enctype="multipart/form-data" onsubmit="return submitForm();"> -->
                        <form id="lessonForm">    
                            <input type="hidden" id="module_id" name="module_id">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php if (session()->has('message')) : ?>
                                        <?= view('include/message') ?>
                                    <?php endif ?>

                                    <div class="form-group">
                                        <label for="courseSelect">Select Course</label>
                                        <select class="form-control fw-400" id="courseSelect" name="course_id">
                                            <option value="">Select Course</option>
                                            <?php foreach ($courses as $course) : ?>
                                                <option value="<?= $course['course_id'] ?>"><?= $course['course_title'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div id="lessonFormContainer" class="d-none">
                                        <div class="form-group">
                                            <label for="lessonTitle">Lesson Title</label>
                                            <input type="text" class="form-control" id="lessonTitle" name="lesson_title" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="lessonContent">Lesson Content</label>
                                            <textarea id="lessonContent" name="lesson_content" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="hasVideo">Has Video</label>
                                            <select class="form-control" id="hasVideo" name="has_video">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div class="form-group d-none" id="videoField">
                                            <label for="videoSelection">Select Video</label>
                                            <select class="form-control" id="videoSelection" name="video_id">
                                                <!-- Populate with video options -->
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="hasQuiz">Has Quiz</label>
                                            <select class="form-control" id="hasQuiz" name="has_quiz">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div class="form-group d-none" id="quizField">
                                            <label for="quizSelection">Select Quiz</label>
                                            <select class="form-control" id="quizSelection" name="quiz_id">
                                                <!-- Populate with quiz options -->
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="hasAssignment">Has Assignment</label>
                                            <select class="form-control" id="hasAssignment" name="has_assignment">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div class="form-group d-none" id="assignmentField">
                                            <label for="assignmentSelection">Select Assignment</label>
                                            <select class="form-control" id="assignmentSelection" name="assignment_id">
                                                <!-- Populate with assignment options -->
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="hasResource">Has Resource</label>
                                            <select class="form-control" id="hasResource" name="has_resource">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div class="form-group d-none" id="resourceField">
                                            <label for="resourceSelection">Select Resource</label>
                                            <select class="form-control" id="resourceSelection" name="resource_id">
                                                <!-- Populate with resource options -->
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="duration">Duration (minutes)</label>
                                            <input type="number" class="form-control" id="duration" name="duration">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Lesson</button>
                                    </div>

                                </div>

                                <div class="col-md-4 border">
                                    <div class="form-group">
                                        <label for="moduleList">Select Module</label>
                                        <div id="moduleList"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button id="editLessonBtn" class="btn btn-secondary d-none">Edit Lesson</button>                    </div>
                </div>
            </section>
        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php include(APPPATH . 'Views/admin/include/js.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('/assets/js/main-scripts.js'); ?>"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
    <script>
    function showLoadingSpinner() {
        document.getElementById('loading').style.display = 'flex';
    }

    ClassicEditor
        .create(document.querySelector('#lessonContent'))
        .catch(error => {
            console.error(error);
        });

    function submitForm() {
        console.log("Submitting form with module_id:", $('#module_id').val());
        return true;
    }

    

    $(document).ready(function () {
        $('#hasVideo').change(function () {
            if ($(this).val() == '1') {
                $('#videoField').removeClass('d-none');
            } else {
                $('#videoField').addClass('d-none');
            }
        });

        $('#hasQuiz').change(function () {
            if ($(this).val() == '1') {
                $('#quizField').removeClass('d-none');
            } else {
                $('#quizField').addClass('d-none');
            }
        });

        $('#hasAssignment').change(function () {
            if ($(this).val() == '1') {
                $('#assignmentField').removeClass('d-none');
            } else {
                $('#assignmentField').addClass('d-none');
            }
        });

        $('#hasResource').change(function () {
            if ($(this).val() == '1') {
                $('#resourceField').removeClass('d-none');
            } else {
                $('#resourceField').addClass('d-none');
            }
        });

        $('#courseSelect').change(function () {
            var courseId = $(this).val();
            if (courseId) {
                $.ajax({
                    url: '<?= base_url('lesson/getModules') ?>',
                    type: 'GET',
                    data: { course_id: courseId },
                    success: function (response) {
                        var modules = response.modules;
                        var moduleList = $('#moduleList');
                        moduleList.empty();
                        if (modules.length > 0) {
                            modules.forEach(function (module) {
                                moduleList.append('<button type="button" class="btn btn-outline-primary text-left module-btn" data-module-id="' + module.module_id + '">' + module.module_name + '</button>');
                            });
                        } else {
                            moduleList.append('<p>No modules found for the selected course.</p>');
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching modules:', error);
                    }
                });
            } else {
                $('#moduleList').empty();
            }
        });


        

        $(document).on('click', '.module-btn', function () {
            var moduleId = $(this).data('module-id');
            $('#module_id').val(moduleId);
            $('.module-btn').removeClass('active-module');
            $(this).addClass('active-module');

            // Show the lesson form container
            $('#lessonFormContainer').removeClass('d-none');
            $('#editLessonBtn').addClass('d-none');

            $.ajax({
                url: '<?= base_url('lesson/getModuleDetails') ?>',
                type: 'GET',
                data: { module_id: moduleId },
                success: function (response) {
                    if (response.lesson_title) {
                        $('#lessonTitle').val(response.lesson_title);
                        $('#lessonContent').val(response.lesson_content);
                        $('#hasVideo').val(response.has_video);
                        if (response.has_video == '1') {
                            $('#videoField').removeClass('d-none');
                            $('#videoSelection').val(response.video_id);
                        } else {
                            $('#videoField').addClass('d-none');
                        }
                        $('#hasQuiz').val(response.has_quiz);
                        if (response.has_quiz == '1') {
                            $('#quizField').removeClass('d-none');
                            $('#quizSelection').val(response.quiz_id);
                        } else {
                            $('#quizField').addClass('d-none');
                        }
                        $('#hasAssignment').val(response.has_assignment);
                        if (response.has_assignment == '1') {
                            $('#assignmentField').removeClass('d-none');
                            $('#assignmentSelection').val(response.assignment_id);
                        } else {
                            $('#assignmentField').addClass('d-none');
                        }
                        $('#hasResource').val(response.has_resource);
                        if (response.has_resource == '1') {
                            $('#resourceField').removeClass('d-none');
                            $('#resourceSelection').val(response.resource_id);
                        } else {
                            $('#resourceField').addClass('d-none');
                        }
                        $('#duration').val(response.duration);

                        // Hide the form and show the edit button
                        $('#lessonFormContainer').addClass('d-none');
                        $('#editLessonBtn').removeClass('d-none');
                    } else {
                        // Clear the form fields if no data is returned
                        $('#lessonTitle').val('');
                        $('#lessonContent').val('');
                        $('#hasVideo').val('0');
                        $('#videoField').addClass('d-none');
                        $('#hasQuiz').val('0');
                        $('#quizField').addClass('d-none');
                        $('#hasAssignment').val('0');
                        $('#assignmentField').addClass('d-none');
                        $('#hasResource').val('0');
                        $('#resourceField').addClass('d-none');
                        $('#duration').val('');

                        // Show the form and hide the edit button
                        $('#lessonFormContainer').removeClass('d-none');
                        $('#editLessonBtn').addClass('d-none');
                    }
                },
                error: function (error) {
                    console.error('Error fetching module details:', error);
                }
            });
        });

        $('#editLessonBtn').click(function () {
            $('#lessonFormContainer').removeClass('d-none');
            $('#editLessonBtn').addClass('d-none');
        });

        $('#lessonForm').on('submit', function (event) {
            event.preventDefault();

            // Show loading animation
            $('#loadingAnimation').removeClass('d-none');

            var formData = $(this).serialize();

            $.ajax({
                url: '<?= base_url('lesson/save') ?>',
                type: 'POST',
                data: formData,
                success: function (response) {
                    // Handle success response
                    alert('Lesson saved successfully');

                    // Hide the form and show the edit button
                    $('#lessonFormContainer').addClass('d-none');
                    $('#editLessonBtn').removeClass('d-none');
                },
                error: function (error) {
                    // Handle error response
                    alert('Failed to save the lesson');
                },
                complete: function () {
                    // Hide loading animation
                    $('#loadingAnimation').addClass('d-none');
                }
            });
        });
    });
</script>

</body>

</html>
