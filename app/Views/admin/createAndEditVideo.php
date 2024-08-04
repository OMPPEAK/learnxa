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
    </style>
</head>

<body>
    <?php include(APPPATH . 'Views/admin/include/sidebar.php'); ?>
    <main id="main" class="main p-0">
        <?php include(APPPATH . 'Views/admin/include/nav2.php'); ?>

        <div class="container mt-2 upload-container">
            <h2>Upload Video for Course</h2>
            <form id="videoUploadForm">
                <div class="form-group">
                    <label for="courseSelect">Select Course</label>
                    <select class="form-control" id="courseSelect" name="course_id">
                        <option value="">Select Course</option>
                        <?php foreach ($courses as $course) : ?>
                            <option value="<?= $course['course_id'] ?>"><?= $course['course_title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="videoTitle">Video Title</label>
                    <input type="text" class="form-control" id="videoTitle" name="video_title" required>
                </div>

                <div class="form-group">
                    <label for="videoFile">Upload Video</label>
                    <input type="file" class="form-control" id="videoFile" name="video_file" accept="video/*" required>
                </div>

                <button type="submit" class="btn btn-primary">Upload Video</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php include(APPPATH . 'Views/admin/include/js.php'); ?>
    <script src="<?= base_url('/assets/js/main-scripts.js'); ?>"></script>
</body>

</html>
