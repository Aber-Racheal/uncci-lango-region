<?php
require_once 'php/db_con.php'; // Include the database connection

// Get event ID from URL parameter
$event_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($event_id <= 0) {
    header("Location: events.php");
    exit();
}

// Fetch event details
$sql = "SELECT * FROM events WHERE event_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: events.php");
    exit();
}

$event = $result->fetch_assoc();

// Format the event date
$event_date = new DateTime($event['event_date']);
$formatted_date = $event_date->format('F j, Y'); // e.g., "March 15, 2024"
$day = $event_date->format('d');
$month_year = $event_date->format('M Y');

// Determine if event is past or upcoming
$is_past = $event_date < new DateTime();
$status_text = $is_past ? 'Past Event' : 'Upcoming Event';
$status_class = $is_past ? 'past-event' : 'upcoming-event';

// Get event type styling class
$event_type_class = '';
switch ($event['event_type']) {
    case 'workshop':
        $event_type_class = 'workshop-type';
        break;
    case 'conference':
        $event_type_class = 'conference-type';
        break;
    default:
        $event_type_class = 'general-type';
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>UNCCI - Lango Region</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    <link href="assets/img/UNCCI-logo.png" rel="icon" />
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" /> -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link
        href="assets/vendor/bootstrap/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
        rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
        href="assets/vendor/glightbox/css/glightbox.min.css"
        rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />
    <style>
        /* Event Details Page Styles */

        .join-now {
            background-color: #c1053f;
            color: white;
            height: 20px;
            width: auto;
            border-radius: 5px;
        }

        .join-now-nav {
            background-color: #c1053f;
            padding: 10px;
            color: white;
            height: 40px;
            width: auto;
            border-radius: 10px;
        }

        :root {
            --primary-color: #C1053F;
            --primary-dark: #9A0432;
            --primary-light: #E91E63;
            --secondary-color: #2C3E50;
            --accent-color: #3498DB;
            --light-gray: #F8F9FA;
            --medium-gray: #E9ECEF;
            --dark-gray: #6C757D;
            --text-dark: #2C3E50;
            --text-light: #7F8C8D;
            --success: #28A745;
            --warning: #FFC107;
            --info: #17A2B8;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.15);
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }

        /* Global Styles */
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
        }

        /* Back Button */
        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
            font-weight: 600;
            padding: 12px 24px;
            border-radius: var(--border-radius);
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        /* Event Image Container */
        .event-image-container {
            position: relative;
            overflow: hidden;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            background: white;
            padding: 8px;
        }

        .event-image-container img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: calc(var(--border-radius) - 4px);
            transition: var(--transition);
        }

        .event-image-container:hover img {
            transform: scale(1.05);
        }

        /* Event Title */
        .event-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        /* Event Meta Information */
        .event-meta {
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border-left: 4px solid var(--primary-color);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid var(--medium-gray);
            transition: var(--transition);
        }

        .meta-item:last-child {
            border-bottom: none;
        }

        .meta-item:hover {
            background-color: rgba(193, 5, 63, 0.02);
            padding-left: 8px;
            border-radius: 8px;
        }

        .meta-item i {
            color: var(--primary-color);
            font-size: 1.2rem;
            width: 20px;
            text-align: center;
        }

        .meta-item strong {
            color: var(--text-dark);
            font-weight: 600;
            min-width: 80px;
        }

        /* Badges */
        .badge {
            padding: 8px 16px;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge.bg-primary {
            background-color: var(--primary-color) !important;
            color: white;
        }

        .badge.bg-secondary {
            background-color: var(--secondary-color) !important;
            color: white;
        }

        .badge.bg-success {
            background-color: var(--success) !important;
            color: white;
        }

        .badge.bg-warning {
            background-color: var(--warning) !important;
            color: var(--text-dark);
        }

        .badge.bg-info {
            background-color: var(--info) !important;
            color: white;
        }

        /* Event Subtitle */
        .event-subtitle h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--secondary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.5rem;
            display: inline-block;
        }

        /* Event Description */
        .event-description,
        .additional-description {
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
        }

        .event-description h3,
        .additional-description h3 {
            color: var(--text-dark);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-left: 20px;
        }

        .event-description h3::before,
        .additional-description h3::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border-radius: 2px;
        }

        .description-content {
            color: var(--text-light);
            font-size: 1.1rem;
            line-height: 1.8;
        }

        /* Sidebar */
        .event-sidebar {
            position: sticky;
            top: 2rem;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
            background: white;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border-bottom: none;
            padding: 1.25rem 1.5rem;
        }

        .card-header h5 {
            font-weight: 700;
            margin: 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Quick Info Date Display */
        .date-display {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
        }

        .day-number {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1;
        }

        .month-year {
            font-size: 1.1rem;
            font-weight: 500;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Quick Info List */
        .card-body ul li {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 0;
            color: var(--text-light);
            font-weight: 500;
        }

        .card-body ul li i {
            color: var(--primary-color);
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        /* Status Indicator */
        .status-indicator {
            padding: 1.5rem;
            border-radius: var(--border-radius);
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .status-indicator.bg-success {
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0.05));
            color: var(--success);
        }

        .status-indicator.bg-warning {
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.05));
            color: #e69500;
        }

        .status-indicator.bg-secondary {
            background: linear-gradient(135deg, rgba(108, 117, 125, 0.1), rgba(108, 117, 125, 0.05));
            color: var(--dark-gray);
        }

        .status-indicator i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        .status-indicator h6 {
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Buttons */
        .btn {
            padding: 12px 24px;
            font-weight: 600;
            border-radius: var(--border-radius);
            transition: var(--transition);
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), #7a0329);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success), #1e7e34);
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #1e7e34, #155724);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-info {
            background: linear-gradient(135deg, var(--info), #138496);
            color: white;
        }

        .btn-info:hover {
            background: linear-gradient(135deg, #138496, #0c5460);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-outline-secondary {
            border: 2px solid var(--medium-gray);
            color: var(--text-dark);
            background: white;
        }

        .btn-outline-secondary:hover {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 0.875rem;
        }

        /* Action Buttons */
        .event-actions {
            padding: 2rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border-top: 4px solid var(--primary-color);
        }

        /* Creation Info */
        .card:last-child .card-body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            color: var(--text-light);
            text-align: center;
        }

        .card:last-child .card-body i {
            color: var(--primary-color);
            margin-right: 8px;
        }

        /* Scroll Top Button */
        #scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border-radius: 50%;
            text-decoration: none;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 1000;
            box-shadow: var(--shadow);
        }

        #scroll-top:hover {
            background: linear-gradient(135deg, var(--primary-dark), #7a0329);
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        #scroll-top.active {
            opacity: 1;
            visibility: visible;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .event-sidebar {
                position: static;
                margin-top: 2rem;
            }

            .event-title {
                font-size: 2rem;
            }

            .event-image-container img {
                height: 300px;
            }
        }

        @media (max-width: 768px) {
            .event-meta {
                padding: 1.5rem;
            }

            .event-description,
            .additional-description {
                padding: 1.5rem;
            }

            .card-body {
                padding: 1.25rem;
            }

            .day-number {
                font-size: 2.5rem;
            }

            .event-title {
                font-size: 1.75rem;
            }

            .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }

            .event-actions {
                padding: 1.5rem;
            }

            .event-actions .btn {
                display: block;
                margin: 0.5rem 0;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding: 0 1rem;
            }

            .meta-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
                text-align: left;
            }

            .meta-item strong {
                min-width: auto;
            }

            .event-image-container img {
                height: 250px;
            }

            .date-display {
                padding: 1rem;
            }

            .day-number {
                font-size: 2rem;
            }

            .month-year {
                font-size: 1rem;
            }
        }

        /* Animation Effects */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .event-title,
        .event-meta,
        .event-description,
        .additional-description,
        .card {
            animation: fadeInUp 0.6s ease-out;
        }

        .event-meta {
            animation-delay: 0.1s;
        }

        .event-description {
            animation-delay: 0.2s;
        }

        .additional-description {
            animation-delay: 0.3s;
        }

        .card:nth-child(1) {
            animation-delay: 0.4s;
        }

        .card:nth-child(2) {
            animation-delay: 0.5s;
        }

        .card:nth-child(3) {
            animation-delay: 0.6s;
        }

        /* Hover Effects */
        .meta-item,
        .card-body ul li {
            transition: var(--transition);
        }

        .card-body ul li:hover {
            background-color: rgba(193, 5, 63, 0.05);
            padding-left: 8px;
            border-radius: 6px;
        }

        /* Loading States */
        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
        }

        /* Focus States for Accessibility */
        .btn:focus,
        .btn-outline-primary:focus,
        .btn-outline-secondary:focus {
            outline: 2px solid var(--primary-color);
            outline-offset: 2px;
        }

        /* Print Styles */
        @media print {

            .btn,
            #scroll-top,
            .event-actions {
                display: none !important;
            }

            .card {
                box-shadow: none;
                border: 1px solid #ddd;
            }

            .event-image-container {
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <!-- Add your header/navigation here if you have one -->

    <main>
        <div class="container mt-5">
            <!-- Back button -->
            <div class="mb-4">
                <a href="index.php #events-section" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Back to Events
                </a>
            </div>

            <!-- Event Details -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Event Image -->
                    <?php if (!empty($event['image'])): ?>
                        <div class="event-image-container mb-4">
                            <img src="uploads/events/<?php echo htmlspecialchars($event['image']); ?>"
                                class="img-fluid rounded"
                                alt="<?php echo htmlspecialchars($event['event_name']); ?>">
                        </div>
                    <?php endif; ?>

                    <!-- Event Title -->
                    <h1 class="event-title mb-3"><?php echo htmlspecialchars($event['event_name']); ?></h1>

                    <!-- Event Meta Information -->
                    <div class="event-meta mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <i class="bi bi-calendar-event"></i>
                                    <strong>Date:</strong> <?php echo $formatted_date; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <i class="bi bi-clock"></i>
                                    <strong>Time:</strong> <?php echo htmlspecialchars($event['event_time']); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <strong>Location:</strong> <?php echo htmlspecialchars($event['location']); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <i class="bi bi-people"></i>
                                    <strong>Capacity:</strong> <?php echo htmlspecialchars($event['capacity']); ?> people
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <i class="bi bi-tag"></i>
                                    <strong>Type:</strong>
                                    <span class="badge <?php echo $event_type_class; ?>">
                                        <?php echo ucfirst(htmlspecialchars($event['event_type'])); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <i class="bi bi-info-circle"></i>
                                    <strong>Status:</strong>
                                    <span class="badge <?php echo $status_class; ?>">
                                        <?php echo $status_text; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Title (if different from event_name) -->
                    <?php if (!empty($event['title']) && $event['title'] !== $event['event_name']): ?>
                        <div class="event-subtitle mb-3">
                            <h2><?php echo htmlspecialchars($event['title']); ?></h2>
                        </div>
                    <?php endif; ?>

                    <!-- Event Description -->
                    <div class="event-description mb-4">
                        <h3>About This Event</h3>
                        <div class="description-content">
                            <?php echo nl2br(htmlspecialchars($event['event_description'])); ?>
                        </div>
                    </div>

                    <!-- Additional Description (if different from event_description) -->
                    <?php if (!empty($event['description']) && $event['description'] !== $event['event_description']): ?>
                        <div class="additional-description mb-4">
                            <h3>Additional Information</h3>
                            <div class="description-content">
                                <?php echo nl2br(htmlspecialchars($event['description'])); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="event-sidebar">
                        <!-- Quick Info Card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Quick Info</h5>
                            </div>
                            <div class="card-body">
                                <div class="quick-info-item">
                                    <div class="date-display text-center mb-3">
                                        <div class="day-number"><?php echo $day; ?></div>
                                        <div class="month-year"><?php echo $month_year; ?></div>
                                    </div>
                                </div>

                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="bi bi-clock"></i>
                                        <?php echo htmlspecialchars($event['event_time']); ?>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-geo-alt"></i>
                                        <?php echo htmlspecialchars($event['location']); ?>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-people"></i>
                                        Max <?php echo htmlspecialchars($event['capacity']); ?> attendees
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-tag"></i>
                                        <?php echo ucfirst(htmlspecialchars($event['event_type'])); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Event Status Card -->
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <div class="status-indicator <?php echo $status_class; ?>">
                                    <i class="bi <?php echo $is_past ? 'bi-calendar-x' : 'bi-calendar-check'; ?>"></i>
                                    <h6><?php echo $status_text; ?></h6>
                                </div>

                                <?php if (!$is_past): ?>
                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="bi bi-calendar-plus"></i>
                                            Add to Calendar
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Event Creation Info -->
                        <?php if (!empty($event['created_at'])): ?>
                            <div class="card">
                                <div class="card-body">
                                    <small class="text-muted">
                                        <i class="bi bi-info-circle"></i>
                                        Event created on: <?php echo date('M j, Y', strtotime($event['created_at'])); ?>
                                    </small>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <!-- <div class="row mt-5">
                <div class="col-12">
                    <div class="event-actions text-center">
                        <a href="index.php #events-section" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-arrow-left"></i> Back to Events
                        </a>
                        
                        <?php if (!$is_past): ?>
                        <button class="btn btn-success me-2">
                            <i class="bi bi-person-plus"></i> Register for Event
                        </button>
                        <button class="btn btn-info">
                            <i class="bi bi-share"></i> Share Event
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div> -->
        </div>
    </main>
    <footer id="footer" class="footer dark-background">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.php" class="logo d-flex align-items-center">
                        <img src="assets/img/UNCCI-logo.png" alt="UNCCI logo" />
                        <span class="sitename">UNCCI - Lango Region</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Plot 25 Obote Avenue, Lira City.</p>
                        <!-- <p>New York, NY 535022</p> -->
                        <p class="mt-3">
                            <strong>Phone:</strong> <span>+256 774016223</span>
                        </p>
                        <p>
                            <strong>Email:</strong>
                            <span>lirachamberofcommerce@gmail.com</span>
                        </p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="services.html #features">Districts</a></li>
                        <li><a href="services.html">Services</a></li>

                        <li><a href="new&media.php">News & Media</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <p>
                        Becoming a member of the UNCCI - Lango region means connecting
                        with a dynamic network of business leaders and gaining access to
                        valuable resources, events, and opportunities. Take the next step
                        in growing your business and contributing to the region’s economic
                        development. Join us today!
                    </p>

                </div>

                <a href="membership.php" class="join-now">JOIN NOW</a>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>
                © <span>Copyright</span>
                <strong class="px-1 sitename">UNCCI - Lango Region</strong>
                <span>All Rights Reserved</span>
            </p>

        </div>
    </footer>
    <!-- Add your footer here if you have one -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Scroll Top -->
    <a
        href="#"
        id="scroll-top"
        class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <!-- <div id="preloader"></div> -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>