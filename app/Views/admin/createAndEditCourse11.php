<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(APPPATH .'Views/admin/include/head.php'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <style>
        #progressContainer {
            display: none;
            margin-top: 10px;
        }

        #imagePreview {
            display: none;
            margin-top: 10px;
            max-width: 100%;
        }

        #cancelIcon {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            cursor: pointer;
            display: none;
        }

        #zoomedImageContainer {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        #zoomedImage {
            max-width: 90%;
            max-height: 90%;
        }
    </style>
</head>
<body>
    <?php include(APPPATH . 'Views/admin/include/sidebar.php'); ?>
    <main id="main" class="main p-0">
        <?php include(APPPATH . 'Views/admin/include/nav2.php'); ?>
        <div class="container mt-2" id="mainContent">
            <div class="mb-3 font-weight-bold">Create/Edit Course</div>
            <section class="create-edit-course">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Loading Spinner -->
                        <div id="loading">
                            <div class="spinner"></div>
                        </div>
                        <form action="<?= base_url('course/save') ?>" method="post" enctype="multipart/form-data" onsubmit="showLoadingSpinner()">
                            <!-- Display validation errors if any -->
                            <?php if (session()->has('message')) : ?>
                                <?= view('include/message') ?>
                            <?php endif ?>

                            <div class="row">
                                <div class="col-md-9">
                                    <!-- :::::::::::::::::Course Title::::::::::::::: -->
                                    <div class="form-group">
                                        <label for="courseTitle" class="font-weight-bold">Course Title</label>
                                        <input type="text" class="form-control" id="courseTitle" name="course_title" placeholder="Enter course title" required>
                                    </div>

                                    <!-- :::::::::::::::::Course Tagline::::::::::::::: -->
                                    <div class="form-group">
                                        <label for="courseTagline" class="font-weight-bold">Course Tagline</label>
                                        <textarea class="form-control" id="courseTagline" name="course_tagline" rows="3" placeholder="Enter Course Tagline" required></textarea>
                                    </div>

                                    <!-- :::::::::::::::::Course Overview::::::::::::::: -->
                                    <div class="form-group">
                                        <label for="courseOverview" class="font-weight-bold">Course Overview</label>
                                        <textarea class="form-control" id="courseOverview" name="course_overview" rows="3" placeholder="Enter Course Overview" required></textarea>
                                    </div>

                                    <!-- :::::::::::::::::Skills you'll aquired::::::::::::::: -->
                                    <div class="form-group">
                                        <label for="skillsAcquired" class="font-weight-bold">Skills Acquired</label>
                                        <textarea class="form-control" id="skillsAcquired" name="skills_acquired" rows="3" placeholder="Enter skills acquired" required></textarea>
                                    </div>

                                    <!-- :::::::::::::::::Requirements::::::::::::::: -->
                                    <div class="form-group">
                                        <label for="requirements" class="font-weight-bold">Requirements</label>
                                        <textarea class="form-control" id="requirements" name="requirements" rows="3" placeholder="Enter course requirements" required></textarea>
                                    </div>

                                    <!-- :::::::::::::::::Course Compact::::::::::::::: -->
                                    <div class="font-weight-bold">Course Compact</div>
                                    <div class="accordion" id="accordionExample">
                                        <!-- Dynamic Accordion Sections will be added here -->
                                    </div>
                                    <button type="button" id="addSection" class="btn btn-secondary mt-3">Add Section</button>
                                    
                                    <!-- Total Course Module -->
                                    <div class="form-group mt-3">
                                        <label for="courseModuleCount">Total Course Module</label>
                                        <input type="number" step="0" class="form-control" id="courseModuleCount" name="course_module_count" placeholder="Course Module" value="0" required>
                                    </div>

                                    <!-- :::::::::::::::::Description::::::::::::::: -->
                                    <div class="form-group">
                                        <label for="courseDescription" class="font-weight-bold">Course Description</label>
                                        <textarea id="courseDescription" name="course_discription" class="form-control" required></textarea>
                                    </div>

                                    <!-- :::::::::::::::::Course Image::::::::::::::: -->
                                    <div class="form-group">
                                        <label for="courseImage" class="font-weight-bold">Course Image</label>
                                        <input type="file" class="form-control-file" id="courseImage" name="course_image" required>
                                        <div id="progressContainer">
                                            <progress id="progressBar" value="0" max="100" class="w-100"></progress>
                                        </div>
                                        <div id="imagePreviewContainer" style="position: relative;">
                                            <img id="imagePreview" src="#" alt="Image Preview" width="200">
                                            <div id="cancelIcon" onclick="removeImage()">&times;</div>
                                        </div>
                                    </div>

                                    <div id="zoomedImageContainer" onclick="closeZoomedImage()">
                                        <img id="zoomedImage" src="#" alt="Zoomed Image">
                                    </div>
                                </div>

                                <div class="col-md-3 pt-2 border">
                                    <!-- Select Topic -->
                                    <div class="form-group">
                                        <label for="courseTopic">Topic</label>
                                        <select class="form-control" id="courseTopic" name="topic_id">
                                            <option type="check" value="">Select Topic</option>
                                            <!-- Populate this with topic data from the database -->
                                        </select>
                                    </div>

                                    <!-- Assign Instructor -->
                                    <div class="form-group">
                                        <label for="courseInstructor">Instructor</label>
                                        <select class="form-control" id="courseInstructor" name="instructor_id">
                                            <option value="">Select Instructor</option>
                                            <!-- Populate this with instructor data from the database -->
                                        </select>
                                    </div>

                                    <!-- Course Price -->
                                    <div class="form-group">
                                        <label for="coursePrice">Price</label>
                                        <input type="number" step="0.01" class="form-control" id="coursePrice" name="price" placeholder="Enter course price" value="0.00">
                                    </div>

                                    <!-- Rating -->
                                    <div class="form-group">
                                        <label for="courseRating">Rating</label>
                                        <input type="number" step="0.01" class="form-control" id="courseRating" name="rating" placeholder="Enter course rating" value="0.00">
                                    </div>

                                    <!-- Rating Count -->
                                    <div class="form-group">
                                        <label for="ratingCount">Rating Count</label>
                                        <input type="number" class="form-control" id="ratingCount" name="rating_count" placeholder="Enter rating count" value="0">
                                    </div>

                                    <!-- Course Duration -->
                                    <div class="form-group">
                                        <label for="courseDuration">Duration</label>
                                        <input type="text" class="form-control" id="courseDuration" name="duration" placeholder="Enter course duration">
                                    </div>

                                    <!-- Course Languages -->
                                    <div class="form-group">
                                        <label for="courseLanguage">Language</label>
                                        <input type="text" class="form-control" id="courseLanguage" name="language" placeholder="Enter course language">
                                    </div>

                                    <!-- Enrollment Count -->
                                    <div class="form-group">
                                        <label for="enrollmentCount">Enrollment Count</label>
                                        <input type="number" class="form-control" id="enrollmentCount" name="enrollment_count" placeholder="Enter enrollment count" value="0">
                                    </div>

                                    <!-- Uploaded Date -->
                                    <div class="form-group">
                                        <label for="uploadedDate">Uploaded Date</label>
                                        <input type="date" class="form-control" id="uploadedDate" name="uploaded_date">
                                    </div>

                                    <!-- Course Modules Number -->
                                    <div class="form-group">
                                        <label for="courseModuleNumber">Modules Number</label>
                                        <input type="number" class="form-control" id="courseModuleNumber" name="modules_number" value="0">
                                    </div>

                                    <!-- Is Featured -->
                                    <div class="form-group">
                                        <label for="isFeatured">Is Featured</label>
                                        <select class="form-control" id="isFeatured" name="is_featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Upload Course</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php include(APPPATH . 'Views/admin/include/footer.php'); ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let sectionCount = 0;

            document.getElementById('addSection').addEventListener('click', function () {
                addSection();
            });

            function addSection() {
                const sectionId = `section${sectionCount}`;
                const editorId = `editor${sectionCount}`;

                const sectionTemplate = `
                    <div class="card" id="${sectionId}">
                        <div class="card-header" id="heading${sectionCount}">
                            <h2 class="mb-0">
                                <input type="text" class="form-control" name="section_titles[]" placeholder="Section Title" required>
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse${sectionCount}" aria-expanded="false" aria-controls="collapse${sectionCount}">
                                    Edit Section Content
                                </button>
                                <button type="button" class="btn btn-danger btn-sm float-right removeSection" data-section-id="${sectionId}">Remove</button>
                            </h2>
                        </div>
                        <div id="collapse${sectionCount}" class="collapse" aria-labelledby="heading${sectionCount}" data-parent="#accordionExample">
                            <div class="card-body">
                                <textarea id="${editorId}" name="sections[]" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>`;

                document.getElementById('accordionExample').insertAdjacentHTML('beforeend', sectionTemplate);

                ClassicEditor
                    .create(document.querySelector(`#${editorId}`))
                    .catch(error => {
                        console.error(error);
                    });

                sectionCount++;
                updateModuleCount();
            }

            function updateModuleCount() {
                const totalModules = document.getElementById('accordionExample').childElementCount;
                document.getElementById('courseModuleCount').value = totalModules;
            }

            function removeSection(sectionId) {
                const sectionElement = document.getElementById(sectionId);
                if (sectionElement) {
                    sectionElement.remove();
                    updateModuleCount();
                }
            }

            document.getElementById('accordionExample').addEventListener('click', function (event) {
                if (event.target.classList.contains('removeSection')) {
                    const sectionId = event.target.getAttribute('data-section-id');
                    if (confirm('Are you sure you want to remove this section?')) {
                        removeSection(sectionId);
                    }
                }
            });

            ClassicEditor
                .create(document.querySelector('#courseDescription'))
                .catch(error => {
                    console.error(error);
                });

            document.getElementById('courseImage').addEventListener('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();

                    const progressBar = document.getElementById('progressBar');
                    const progressContainer = document.getElementById('progressContainer');
                    const imagePreview = document.getElementById('imagePreview');
                    const cancelIcon = document.getElementById('cancelIcon');

                    progressContainer.style.display = 'block';

                    reader.onprogress = function (e) {
                        if (e.lengthComputable) {
                            const percentLoaded = Math.round((e.loaded / e.total) * 100);
                            progressBar.value = percentLoaded;
                        }
                    };

                    reader.onload = function (e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                        progressContainer.style.display = 'none';
                        cancelIcon.style.display = 'block';
                    };

                    reader.readAsDataURL(file);
                }
            });

            function removeImage() {
                document.getElementById('courseImage').value = '';
                document.getElementById('imagePreview').style.display = 'none';
                document.getElementById('cancelIcon').style.display = 'none';
                document.getElementById('imagePreview').src = '#';
            }

            document.getElementById('imagePreview').addEventListener('click', function () {
                const zoomedImageContainer = document.getElementById('zoomedImageContainer');
                const zoomedImage = document.getElementById('zoomedImage');
                zoomedImage.src = this.src;
                zoomedImageContainer.style.display = 'flex';
            });

            function closeZoomedImage() {
                document.getElementById('zoomedImageContainer').style.display = 'none';
            }
        });
    </script>
</body>
</html>
