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

</head>

<body>
   <?php include 'includes/global-header.php'; ?>
    <main>
        <div class="page-title accent-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">News & Media</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li class="current">News & Media</li>
                    </ol>
                </nav>
            </div>
        </div>
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

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-sm" onclick="window.print()">
                            <i class="bi bi-printer"></i> Print Article
                        </button>
                        <button class="btn btn-outline-success btn-sm" onclick="copyLink()">
                            <i class="bi bi-link-45deg"></i> Copy Link
                        </button>
                        <a href="new&media.php" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-left"></i> Back to News
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="news-actions text-center">
                        <a href="new&media.php" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-arrow-left"></i> Back to News & Media
                        </a>
                        <button class="btn btn-primary me-2" onclick="window.print()">
                            <i class="bi bi-printer"></i> Print Article
                        </button>
                        <button class="btn btn-success" onclick="shareOnWhatsApp()">
                            <i class="bi bi-share"></i> Share Article
                        </button>
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
     <?php include 'includes/global-footer.php'; ?>
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
    <script>
        // Get current page URL and article title for sharing
        const currentUrl = window.location.href;
        const articleTitle = "<?php echo addslashes($news['title']); ?>";

        function shareOnFacebook() {
            const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;
            window.open(facebookUrl, '_blank', 'width=600,height=400');
        }

        function shareOnTwitter() {
            const twitterUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}&text=${encodeURIComponent(articleTitle)}`;
            window.open(twitterUrl, '_blank', 'width=600,height=400');
        }

        function shareOnWhatsApp() {
            const whatsappUrl = `https://wa.me/?text=${encodeURIComponent(articleTitle + ' ' + currentUrl)}`;
            window.open(whatsappUrl, '_blank');
        }

        function copyLink() {
            navigator.clipboard.writeText(currentUrl).then(function() {
                alert('Link copied to clipboard!');
            }, function(err) {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = currentUrl;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                alert('Link copied to clipboard!');
            });
        }

        // Print function
        function printArticle() {
            window.print();
        }
    </script>
</body>

</html>