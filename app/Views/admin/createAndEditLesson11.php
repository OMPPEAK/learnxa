<!DOCTYPE html>
<html lang="en">

<head>
    <?php include(APPPATH . 'Views/admin/include/head.php'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <style>
        #loading {
            display: none;
            /* Hidden by default */
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }

        .spinner {
            /* border: 4px solid rgba(0, 0, 0, 0.1); */
            border: 4px solid rgba(9, 116, 237, 0.1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            /* border-top-color: #333; */
            border-top-color: #007bff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <?php include(APPPATH . 'Views/admin/include/sidebar.php'); ?>
    <main id="main" class="main p-0">
        <?php include(APPPATH . 'Views/admin/include/nav2.php'); ?>
        <!-- Loading Spinner -->
        <div id="loading">
            <div class="spinner"></div>
        </div>
        <div class="container mt-2" id="mainContent">
            <div class="mb-3 font-weight-bold">Create/Edit Lesson</div>
            <section class="create-edit-course">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="<?= base_url('lesson/save') ?>" method="post" enctype="multipart/form-data"
                            onsubmit="showLoadingSpinner()">
                            <div class="row">
                                <div class="col-md-8">
                                    <!-- Display validation errors if any -->
                                    <?php if (session()->has('message')) : ?>
                                    <?= view('include/message') ?>
                                    <?php endif ?>

                                    <!-- Course Selection -->
                                    <div class="form-group">
                                        <label for="courseSelect">Select Course</label>
                                        <select class="form-control" id="courseSelect" name="course_id">
                                            <option value="">Select Course</option>
                                            <?php foreach ($courses as $course) : ?>
                                            <option value="<?= $course['course_id'] ?>"><?= $course['course_title'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Dynamic Module List -->
                                    <!-- <div class="mb-3 font-weight-bold">Modules:</div>
                                    <div id="moduleList"></div> -->

                                    <!-- Conditional Dropdowns -->
                                    <div id="conditionalFields">
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
                                    </div>

                                    <div class="form-group">
                                        <label for="moduleLesson" class="font-weight-bold">Module Lesson Content</label>
                                        <textarea id="moduleLesson" name="module_lesson"
                                            class="form-control"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Lesson</button>
                                </div>

                                <div class="col-md-4 border">
                                    <div class="form-group">
                                        <label for="categoryID">Select Module</label>
                                        <!-- Dynamic Module List -->
                                    <div id="moduleList"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <?php include(APPPATH . 'Views/admin/include/js.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('/assets/js/main-scripts.js'); ?>"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
    <script>
        function showLoadingSpinner() {
            document.getElementById('loading').style.display = 'flex';
        }

        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#moduleLesson'))
            .catch(error => {
                console.error(error);
            });

        // JavaScript to dynamically show/hide conditional fields
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

            // Fetch modules based on selected course
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
                                modules.forEach(function (module, index) {
                                    moduleList.append('<div class="form-check"><input class="form-check-input" type="checkbox" name="modules[]" value="' + module.module_id + '" id="module' + module.module_id + '"><label class="form-check-label" for="module' + module.module_id + '">' + module.module_name + '</label></div>');
                                });
                            } else {
                                moduleList.append('<p>No Modules found for this course.</p>');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Error fetching modules:', error);
                        }
                    });
                } else {
                    $('#moduleList').empty().append('<p>Please select a course to see the modules.</p>');
                }
            });
        });
    </script>
</body>

</html>
