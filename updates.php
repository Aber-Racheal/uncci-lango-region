<?php
require_once 'php/db_con.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and collect the form data
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $category = htmlspecialchars($_POST['category']);
    $content = htmlspecialchars($_POST['content']);

    // Check if the title already exists in the database
    $check_sql = "SELECT id FROM updates WHERE title = ?";
    if ($stmt_check = $conn->prepare($check_sql)) {
        $stmt_check->bind_param("s", $title);
        $stmt_check->execute();
        $stmt_check->store_result();
        if ($stmt_check->num_rows > 0) {
            $error_message = "This update already exists.";
            $stmt_check->close();
        } else {
            // Handle the image upload
            $image_url = '';  // Default to empty in case no image is uploaded.
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                // Set the target directory for uploads
                $upload_dir = 'uploads/';  // Ensure this directory exists and is writable

                // Get file information
                $image_name = $_FILES['image']['name'];
                $image_tmp_name = $_FILES['image']['tmp_name'];
                $image_size = $_FILES['image']['size'];
                $image_type = $_FILES['image']['type'];

                // Validate file extension
                $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
                $valid_image_ext = ['jpg', 'jpeg', 'png', 'gif'];

                // Generate a unique file name to avoid conflicts
                $image_new_name = uniqid('update_', true) . '.' . $image_ext;
                $image_path = $upload_dir . $image_new_name;

                // Check if the uploaded file is an image based on extension and MIME type
                if (in_array(strtolower($image_ext), $valid_image_ext) && in_array($image_type, ['image/jpeg', 'image/png', 'image/gif'])) {
                    // Move the uploaded image to the target directory
                    if (move_uploaded_file($image_tmp_name, $image_path)) {
                        $image_url = $image_path; // Store the file path in the database
                    } else {
                        $error_message = "Error uploading image.";
                    }
                } else {
                    $error_message = "Invalid image type or extension. Only JPEG, PNG, and GIF are allowed.";
                }
            }

            // Prepare the SQL query to insert the new update
            $sql = "INSERT INTO updates (title, author, category, content, image, created_at) VALUES (?, ?, ?, ?, ?, NOW())";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sssss", $title, $author, $category, $content, $image_url);

                if ($stmt->execute()) {
                    $success_message = "Update added successfully!";
                } else {
                    $error_message = "Error adding update: " . $stmt->error;
                }
                $stmt->close();
            } else {
                $error_message = "Error preparing statement: " . $conn->error;
            }
        }
    }
}


// Count the number of unread messages
$sql_unread = "SELECT COUNT(*) AS unread_count FROM contact_form WHERE read_status = 0";
$result_unread = $conn->query($sql_unread);
$row_unread = $result_unread->fetch_assoc();
$unread_count = $row_unread['unread_count'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Messages</title>

    <link href="assets/css/main.css" rel="stylesheet">
    <!-- Bootstrap & Icons -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="main.css">

</head>

<body class="starter-page-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <img src="assets/img/UNCCI-logo.png" alt="Lango Region Logo" style="max-height: 50px;">
                <h1 class="sitename">Lango Region<span style="color: var(--primary-color);">.</span></h1>
            </a>

            <div class="d-flex align-items-center ms-auto">
                <div class="dropdown me-3">
                    <a class="dropdown-toggle text-dark text-decoration-none" href="#" role="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell position-relative">
                            <?php if ($unread_count > 0): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.5rem;">
                                    <?php echo $unread_count; ?>
                                </span>
                            <?php endif; ?>
                        </i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                        <li>
                            <h6 class="dropdown-header">Notifications</h6>
                        </li>
                        <li><a class="dropdown-item" href="messages.php">You have <?php echo $unread_count; ?> unread messages</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="notifications.php">View all notifications</a></li>
                    </ul>
                </div>

                <div class="dropdown me-3">
                    <a class="dropdown-toggle d-flex align-items-center text-dark text-decoration-none" href="#" role="button" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="me-2 d-none d-sm-block">
                            <small class="text-muted d-block">Welcome</small>
                            <span class="fw-semibold">Admin</span>
                        </div>
                        <img src="assets/img/profile-placeholder.jpg" alt="Admin" class="rounded-circle" width="32" height="32">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person me-2"></i>My Profile</a></li>
                        <li><a class="dropdown-item" href="settings.php"><i class="bi bi-gear me-2"></i>Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="admin-profile">
                <img src="assets/img/profile-placeholder.jpg" alt="Admin Profile">
            </div>
            <h6 class="text-white mb-0">Admin User</h6>
            <small class="text-white-50">Administrator</small>
        </div>

        <a href="admin.php" class="active"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a>
        <a href="messages.php"><i class="bi bi-envelope"></i> <span>Messages</span> <?php if ($unread_count > 0): ?><span class="badge bg-danger ms-auto"><?php echo $unread_count; ?></span><?php endif; ?></a>
        <a href="updates.php"><i class="bi bi-megaphone"></i> <span>Updates</span></a>
        <a href="events.php"><i class="bi bi-calendar-event"></i> <span>Events</span></a>
        <a href="users.php"><i class="bi bi-people"></i> <span>Users</span></a>
        <a href="reports.php"><i class="bi bi-bar-chart"></i> <span>Reports</span></a>
        <a href="settings.php"><i class="bi bi-gear"></i> <span>Settings</span></a>
        <a href="logout.php" class="mt-auto"><i class="bi bi-box-arrow-left"></i> <span>Logout</span></a>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <div class="container mt-5">
            <h2 class="text-center">Manage Updates</h2>

            <!-- Form to add new update -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Add New Update</h4>
                </div>
                <div class="card-body">
                    <?php if (isset($success_message)) : ?>
                        <div class="alert alert-success"><?php echo $success_message; ?></div>
                    <?php endif; ?>
                    <?php if (isset($error_message)) : ?>
                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>

                    <form method="POST" action="updates.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Category <i id="dropdownIcon" class="bi bi-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                                    <li><a class="dropdown-item" href="#" data-category="Education">Education</a></li>
                                    <li><a class="dropdown-item" href="#" data-category="Politics">Politics</a></li>
                                    <li><a class="dropdown-item" href="#" data-category="Tourism">Tourism</a></li>
                                    <li><a class="dropdown-item" href="#" data-category="Industrialization">Industrialization</a></li>
                                    <li><a class="dropdown-item" href="#" data-category="Technology">Technology</a></li>
                                    <li><a class="dropdown-item" href="#" data-category="Agriculture">Agriculture</a></li>
                                    <li><a class="dropdown-item" href="#" data-category="Comedy">Comedy</a></li>
                                    <li><a class="dropdown-item" href="#" data-category="Chamber Updates">Chamber Updates</a></li>
                                    <li><a class="dropdown-item" href="#" data-category="Economic">Economic</a></li>
                                    <li><a class="dropdown-item" href="#" data-category="Transport">Transport</a></li>
                                    <li><a class="dropdown-item" href="#" data-category="Climate">Climate</a></li>
                                    <li><a class="dropdown-item" href="#" data-category="International News">International News</a></li>
                                </ul>
                            </div>
                            <input type="hidden" id="category" name="category">
                        </div>



                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/jpeg, image/png, image/gif">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Update</button>
                    </form>
                </div>
            </div>

            <!-- Display existing updates -->
            <h3>Existing Updates</h3>
            <?php
            // Get the existing updates from the database
            $update_query = "SELECT * FROM updates ORDER BY created_at DESC";
            $update_result = $conn->query($update_query);

            if ($update_result->num_rows > 0) : ?>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $update_result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['title']); ?></td>
                                <td><?php echo htmlspecialchars($row['author']); ?></td>
                                <td><?php echo htmlspecialchars($row['category']); ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <a href="edit_update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="delete_update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No updates available.</p>
            <?php endif; ?>
        </div>
    </div>
    </div>

    <script>
        // Function to hide the success or error message after 3 seconds
        function hideMessage(id) {
            setTimeout(function() {
                var message = document.getElementById(id);
                if (message) {
                    message.style.display = 'none';
                }
            }, 3000); // 3000ms = 3 seconds
        }

        // Hide success message if it exists
        <?php if (isset($success_message)) : ?>
            hideMessage('successMessage');
        <?php endif; ?>

        // Hide error message if it exists
        <?php if (isset($error_message)) : ?>
            hideMessage('errorMessage');
        <?php endif; ?>
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryDropdown = document.getElementById('categoryDropdown');
            const dropdownIcon = document.getElementById('dropdownIcon');
            const dropdownItems = document.querySelectorAll('.dropdown-item');
            const categoryInput = document.getElementById('category');

            // Toggle icon based on dropdown state
            categoryDropdown.addEventListener('click', function() {
                if (dropdownIcon.classList.contains('bi-chevron-down')) {
                    dropdownIcon.classList.remove('bi-chevron-down');
                    dropdownIcon.classList.add('bi-chevron-up');
                } else {
                    dropdownIcon.classList.remove('bi-chevron-up');
                    dropdownIcon.classList.add('bi-chevron-down');
                }
            });

            // Set category value when an item is selected
            dropdownItems.forEach(item => {
                item.addEventListener('click', function() {
                    categoryInput.value = this.getAttribute('data-category');
                    categoryDropdown.innerHTML = `Select Category <i id="dropdownIcon" class="bi bi-chevron-down"></i> ${this.textContent}`;
                    // Reset icon after selection
                    dropdownIcon.classList.remove('bi-chevron-up');
                    dropdownIcon.classList.add('bi-chevron-down');
                });
            });
        });
    </script>



</body>

</html>