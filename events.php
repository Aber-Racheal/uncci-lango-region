<?php
require_once 'php/db_con.php';

// Initialize variables
$event_title = $event_description = $event_date = $event_time = $event_location = $event_image = "";
$event_capacity = 0;
$success_message = $error_message = "";

// Handle form submission for adding new event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_event'])) {
    // Get form data
    $event_title = trim($_POST['event_title']);
    $event_description = trim($_POST['event_description']);
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $event_location = trim($_POST['event_location']);
    $event_capacity = (int)$_POST['event_capacity'];
    $event_type = $_POST['event_type'];

    // Validate form data
    if (empty($event_title) || empty($event_description) || empty($event_date) || empty($event_location)) {
        $error_message = "Please fill all required fields!";
    } else {
        // Handle image upload
        $target_dir = "uploads/events/";
        $event_image = "default_event.jpg"; // Default image

        if (isset($_FILES["event_image"]) && $_FILES["event_image"]["error"] == 0) {
            $allowed_types = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
            $file_name = $_FILES["event_image"]["name"];
            $file_type = $_FILES["event_image"]["type"];
            $file_size = $_FILES["event_image"]["size"];

            // Verify file extension
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed_types)) {
                $error_message = "Error: Please select a valid file format (JPG, JPEG, PNG).";
            } else {
                // Verify file size - 5MB maximum
                $maxsize = 5 * 1024 * 1024;
                if ($file_size > $maxsize) {
                    $error_message = "Error: File size is larger than the allowed limit (5MB).";
                } else {
                    // Create unique filename
                    $new_filename = uniqid() . "." . $ext;
                    if (move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_dir . $new_filename)) {
                        $event_image = $new_filename;
                    } else {
                        $error_message = "Error uploading file. Please try again.";
                    }
                }
            }
        }

        // If no errors, insert into database
        if (empty($error_message)) {
            $sql = "INSERT INTO events (title, description, event_date, event_time, location, capacity, event_type, image, created_at) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssisss", $event_title, $event_description, $event_date, $event_time, $event_location, $event_capacity, $event_type, $event_image);

            if ($stmt->execute()) {
                $success_message = "Event added successfully! 🎉";
                // Reset form fields
                $event_title = $event_description = $event_date = $event_time = $event_location = $event_image = "";
                $event_capacity = 0;
            } else {
                $error_message = "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}

// Fetch existing events
$sql = "SELECT * FROM events ORDER BY event_date DESC";
$result = $conn->query($sql);

// Count total events
$sql_total = "SELECT COUNT(*) AS total_events FROM events";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_events = $row_total['total_events'];

// Count upcoming events
$sql_upcoming = "SELECT COUNT(*) AS upcoming_events FROM events WHERE event_date >= CURDATE()";
$result_upcoming = $conn->query($sql_upcoming);
$row_upcoming = $result_upcoming->fetch_assoc();
$upcoming_events = $row_upcoming['upcoming_events'];

// Count past events
$sql_past = "SELECT COUNT(*) AS past_events FROM events WHERE event_date < CURDATE()";
$result_past = $conn->query($sql_past);
$row_past = $result_past->fetch_assoc();
$past_events = $row_past['past_events'];

// Count unread messages (for header notification)
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
    <title>Lango Region Admin - Events</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

    <!-- Bootstrap & Icons -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" />

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">

</head>

<body>
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

        <a href="admin.php"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a>
        <a href="messages.php"><i class="bi bi-envelope"></i> <span>Messages</span> <?php if ($unread_count > 0): ?><span class="badge bg-danger ms-auto"><?php echo $unread_count; ?></span><?php endif; ?></a>
        <a href="updates.php"><i class="bi bi-megaphone"></i> <span>Updates</span></a>
        <a href="events.php" class="active"><i class="bi bi-calendar-event"></i> <span>Events</span></a>
        <a href="users.php"><i class="bi bi-people"></i> <span>Users</span></a>
        <!-- <a href="reports.php"><i class="bi bi-bar-chart"></i> <span>Reports</span></a> -->
        <a href="settings.php"><i class="bi bi-gear"></i> <span>Settings</span></a>
        <a href="logout.php" class="mt-auto"><i class="bi bi-box-arrow-left"></i> <span>Logout</span></a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="page-title">Event Management</h1>
            <div class="d-none d-sm-inline-block">
                <button type="button" class="btn btn-primary action-btn" data-bs-toggle="modal" data-bs-target="#addEventModal">
                    <i class="bi bi-calendar-plus me-2"></i>Add New Event
                </button>
            </div>
        </div>

        <!-- Alert Messages -->
        <?php if (!empty($success_message)): ?>
            <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <?php echo $success_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <!-- Trigger confetti animation -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    createConfetti();
                });
            </script>
        <?php endif; ?>

        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo $error_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Event Summary Cards -->
        <div class="row mb-4">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="dashboard-card">
                    <div class="position-relative">
                        <i class="bi bi-calendar-event-fill float-animation"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                            <i class="bi bi-stars"></i>
                        </span>
                    </div>
                    <h4>Total Events</h4>
                    <p class="h3 counter-animation"><?php echo $total_events; ?></p>
                    <div class="progress mt-3" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%; background-color: var(--primary-color);" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="dashboard-card">
                    <div class="position-relative">
                        <i class="bi bi-calendar-check-fill float-animation"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                            <i class="bi bi-arrow-up"></i>
                        </span>
                    </div>
                    <h4>Upcoming Events</h4>
                    <p class="h3 counter-animation"><?php echo $upcoming_events; ?></p>
                    <div class="progress mt-3" style="height: 5px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($total_events > 0) ? ($upcoming_events / $total_events * 100) : 0; ?>%;" aria-valuenow="<?php echo $upcoming_events; ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_events; ?>"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="dashboard-card">
                    <div class="position-relative">
                        <i class="bi bi-calendar-x-fill float-animation"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <i class="bi bi-arrow-down"></i>
                        </span>
                    </div>
                    <h4>Past Events</h4>
                    <p class="h3 counter-animation"><?php echo $past_events; ?></p>
                    <div class="progress mt-3" style="height: 5px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo ($total_events > 0) ? ($past_events / $total_events * 100) : 0; ?>%;" aria-valuenow="<?php echo $past_events; ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_events; ?>"></div>
                    </div>
                </div>
            </div>




        </div>
    </div>

    <!-- Event Filters -->
    <div class="mb-4">
        <div class="d-flex flex-wrap">
            <a href="events.php?filter=all" class="event-filter <?php echo ($filter == 'all' || !isset($filter)) ? 'active' : ''; ?>">
                <i class="bi bi-grid-fill me-2"></i>All Events
            </a>
            <a href="events.php?filter=upcoming" class="event-filter <?php echo ($filter == 'upcoming') ? 'active' : ''; ?>">
                <i class="bi bi-calendar-check me-2"></i>Upcoming
            </a>
            <a href="events.php?filter=past" class="event-filter <?php echo ($filter == 'past') ? 'active' : ''; ?>">
                <i class="bi bi-calendar-x me-2"></i>Past
            </a>
            <a href="events.php?filter=workshop" class="event-filter <?php echo ($filter == 'workshop') ? 'active' : ''; ?>">
                <i class="bi bi-tools me-2"></i>Workshops
            </a>
            <a href="events.php?filter=conference" class="event-filter <?php echo ($filter == 'conference') ? 'active' : ''; ?>">
                <i class="bi bi-people-fill me-2"></i>Conferences
            </a>
            <a href="events.php?filter=seminar" class="event-filter <?php echo ($filter == 'seminar') ? 'active' : ''; ?>">
                <i class="bi bi-easel me-2"></i>Seminars
            </a>
        </div>
    </div>

    <!-- Events List -->
    <div class="container-fluid px-4">
        <div class="row">
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <?php
                    // Format date for display
                    $event_date = new DateTime($row['event_date']);
                    $day = $event_date->format('d');
                    $month = $event_date->format('M');
                    $year = $event_date->format('Y');

                    // Determine status
                    $today = new DateTime();
                    $is_past = $event_date < $today;
                    $status_class = $is_past ? 'bg-secondary' : 'bg-success';
                    $status_text = $is_past ? 'Past' : 'Upcoming';
                    $status_icon = $is_past ? 'bi-calendar-x' : 'bi-calendar-check';
                    ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="event-card">
                            <div class="event-image">
                                <img src="uploads/events/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                                <div class="event-date-badge">
                                    <span class="day"><?php echo $day; ?></span>
                                    <span class="month"><?php echo $month; ?> <?php echo $year; ?></span>
                                </div>
                                <div class="event-type">
                                    <span class="badge <?php echo $row['event_type'] == 'workshop' ? 'bg-warning' : ($row['event_type'] == 'conference' ? 'bg-info' : 'bg-primary'); ?> text-white">
                                        <?php echo ucfirst($row['event_type']); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="event-content">
                                <h5 class="event-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                <p class="event-location">
                                    <i class="bi bi-geo-alt-fill me-1 text-primary"></i>
                                    <?php echo htmlspecialchars($row['location']); ?>
                                </p>
                                <p class="event-description"><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="status-chip <?php echo $status_class; ?> text-white">
                                        <i class="bi <?php echo $status_icon; ?>"></i> <?php echo $status_text; ?>
                                    </span>
                                    <div class="btn-group">
                                        <a href="event-details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="edit-event.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="events.php?delete_event=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this event?');">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center p-5">
                        <i class="bi bi-calendar-x display-4 d-block mb-3"></i>
                        <h4>No events found</h4>
                        <p>No events match your current filter criteria. Try a different filter or add a new event.</p>
                        <button type="button" class="btn btn-primary action-btn mt-3" data-bs-toggle="modal" data-bs-target="#addEventModal">
                            <i class="bi bi-calendar-plus me-2"></i>Add New Event
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Add Event Modal -->
        <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="addEventModalLabel">Create New Event</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="events.php" enctype="multipart/form-data" id="eventForm">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="event_title" class="form-label">Event Title *</label>
                                        <input type="text" class="form-control" id="event_title" name="event_title" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="event_date" class="form-label">Event Date *</label>
                                                <input type="date" class="form-control datepicker" id="event_date" name="event_date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="event_time" class="form-label">Event Time</label>
                                                <input type="time" class="form-control timepicker" id="event_time" name="event_time">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="event_location" class="form-label">Location *</label>
                                                <input type="text" class="form-control" id="event_location" name="event_location" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="event_capacity" class="form-label">Capacity</label>
                                                <input type="number" class="form-control" id="event_capacity" name="event_capacity" min="0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="event_type" class="form-label">Event Type *</label>
                                        <select class="form-select" id="event_type" name="event_type" required>
                                            <option value="">Select event type</option>
                                            <option value="workshop">Workshop</option>
                                            <option value="conference">Conference</option>
                                            <option value="seminar">Seminar</option>
                                            <option value="meeting">Meeting</option>
                                            <option value="exhibition">Exhibition</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="event_description" class="form-label">Description *</label>
                                        <textarea class="form-control" id="event_description" name="event_description" rows="6" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Event Image</label>
                                        <div class="file-upload-container" id="imageUploadContainer">
                                            <input type="file" class="form-control" id="event_image" name="event_image" accept="image/jpeg, image/jpg, image/png">
                                            <div class="file-upload-icon">
                                                <i class="bi bi-cloud-arrow-up"></i>
                                            </div>
                                            <p class="file-upload-text">
                                                Drag & drop or click to upload
                                                <small class="d-block text-muted mt-1">JPG, JPEG or PNG, max 5MB</small>
                                            </p>
                                        </div>
                                        <div id="imagePreview" class="mt-3 d-none">
                                            <img src="" alt="Image Preview" class="img-fluid rounded">
                                            <button type="button" class="btn btn-sm btn-danger mt-2" id="removeImage">
                                                <i class="bi bi-trash me-1"></i>Remove Image
                                            </button>
                                        </div>
                                    </div>

                                    <div class="event-preview mt-4">
                                        <div class="p-4">
                                            <h5 class="mb-3">Event Preview</h5>
                                            <div class="border rounded p-3 bg-white">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="rounded-circle bg-primary text-white p-2 me-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                        <i class="bi bi-calendar-event"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 event-preview-title">Event Title</h6>
                                                        <small class="text-muted event-preview-date">Date & Time</small>
                                                    </div>
                                                </div>
                                                <div class="small text-muted mb-2">
                                                    <i class="bi bi-geo-alt me-1"></i> <span class="event-preview-location">Location</span>
                                                </div>
                                                <div class="small event-preview-description text-truncate">Description will appear here</div>
                                                <div class="mt-2">
                                                    <span class="badge event-preview-type bg-primary">Type</span>
                                                    <small class="ms-2 text-muted">
                                                        <i class="bi bi-people"></i> <span class="event-preview-capacity">0</span> capacity
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="custom-tooltip mt-3">
                                                <i class="bi bi-info-circle text-primary"></i>
                                                <span class="tooltip-text">This is a live preview of your event. Data updates as you type!</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="add_event" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i>Save Event
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
        <script>
            // Initialize datepicker
            flatpickr(".datepicker", {
                dateFormat: "Y-m-d",
                minDate: "today"
            });

            // Initialize timepicker
            flatpickr(".timepicker", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i"
            });

            // Image upload preview
            document.getElementById('event_image').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').classList.remove('d-none');
                        document.getElementById('imagePreview').querySelector('img').src = e.target.result;
                        document.getElementById('imageUploadContainer').classList.add('d-none');
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Remove image
            document.getElementById('removeImage').addEventListener('click', function() {
                document.getElementById('event_image').value = '';
                document.getElementById('imagePreview').classList.add('d-none');
                document.getElementById('imageUploadContainer').classList.remove('d-none');
            });

            // Event preview live update
            const eventForm = document.getElementById('eventForm');

            // Update preview as user types
            eventForm.addEventListener('input', updatePreview);

            function updatePreview() {
                // Get form values
                const title = document.getElementById('event_title').value || 'Event Title';
                const date = document.getElementById('event_date').value;
                const time = document.getElementById('event_time').value;
                const location = document.getElementById('event_location').value || 'Location';
                const capacity = document.getElementById('event_capacity').value || '0';
                const description = document.getElementById('event_description').value || 'Description will appear here';
                const typeSelect = document.getElementById('event_type');
                const type = typeSelect.options[typeSelect.selectedIndex].text;

                // Format date and time
                let dateTimeText = 'Date & Time';
                if (date) {
                    const dateObj = new Date(date);
                    const formatter = new Intl.DateTimeFormat('en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric'
                    });
                    dateTimeText = formatter.format(dateObj);
                    if (time) {
                        dateTimeText += ' at ' + time;
                    }
                }

                // Update preview elements
                document.querySelector('.event-preview-title').textContent = title;
                document.querySelector('.event-preview-date').textContent = dateTimeText;
                document.querySelector('.event-preview-location').textContent = location;
                document.querySelector('.event-preview-description').textContent = description;
                document.querySelector('.event-preview-capacity').textContent = capacity;

                // Update type badge
                const typeBadge = document.querySelector('.event-preview-type');
                if (type === 'Workshop') {
                    typeBadge.className = 'badge event-preview-type bg-warning';
                } else if (type === 'Conference') {
                    typeBadge.className = 'badge event-preview-type bg-info';
                } else if (type === 'Seminar') {
                    typeBadge.className = 'badge event-preview-type bg-primary';
                } else if (type === 'Meeting') {
                    typeBadge.className = 'badge event-preview-type bg-success';
                } else if (type === 'Exhibition') {
                    typeBadge.className = 'badge event-preview-type bg-secondary';
                } else {
                    typeBadge.className = 'badge event-preview-type bg-dark';
                }
                typeBadge.textContent = type === 'Select event type' ? 'Type' : type;
            }

            // Create confetti animation for success message
            function createConfetti() {
                const colors = ['#C1053F', '#e3336d', '#9a0433', '#42a5f5', '#4caf50', '#ff9800'];
                const container = document.body;

                for (let i = 0; i < 100; i++) {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.width = Math.random() * 10 + 5 + 'px';
                    confetti.style.height = Math.random() * 10 + 5 + 'px';
                    confetti.style.animationDuration = Math.random() * 3 + 2 + 's';
                    confetti.style.opacity = Math.random() * 0.5 + 0.5;
                    container.appendChild(confetti);

                    // Remove confetti after animation
                    setTimeout(() => {
                        confetti.remove();
                    }, 5000);
                }
            }

            // Counter animation
            document.addEventListener('DOMContentLoaded', function() {
                const counters = document.querySelectorAll('.counter-animation');

                counters.forEach(counter => {
                    const target = parseInt(counter.innerText);
                    let count = 0;
                    const duration = 2000; // ms
                    const increment = Math.ceil(target / (duration / 30)); // Update every 30ms

                    const timer = setInterval(() => {
                        count += increment;
                        if (count >= target) {
                            counter.innerText = target;
                            clearInterval(timer);
                        } else {
                            counter.innerText = count;
                        }
                    }, 30);
                });
            });
        </script>
</body>

</html>