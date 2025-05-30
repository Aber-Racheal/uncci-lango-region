<?php
require_once 'php/db_con.php'; // Include the database connection

// Define the events query string
$events_sql = "SELECT * FROM events ORDER BY event_date";


// Execute the query
$events_result = $conn->query($events_sql);

if (!$events_result) {
    die("Query failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>events - UNCCI - Lango Region</title>
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

<body class="blog-page">
    <?php include 'includes/global-header.php'; ?>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title accent-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Events</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Events</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <section class="events-section" id="events-section">
            <div class="container">
                <div class="row gy-4">
                    <div class="container section-title" data-aos="fade-up">
                        <h2>Events</h2>
                        <p>
                            Stay informed about our upcoming and past events. From conferences and workshops to community gatherings and special occasions, explore how we connect, celebrate, and make an impact together.
                        </p>
                    </div>

                    <div class="row gy-4">
                        <?php
                        if (isset($events_result) && $events_result->num_rows > 0):
                            while ($row = $events_result->fetch_assoc()):
                                $event_date = new DateTime($row['event_date']);
                                $day = $event_date->format('d');
                                $month_year = $event_date->format('M Y');
                                $is_past = $event_date < new DateTime();
                                $status_class = $is_past ? 'bg-secondary' : 'bg-success';
                                $status_text = $is_past ? 'Past' : 'Upcoming';
                                $status_icon = $is_past ? 'bi-calendar-x' : 'bi-calendar-check';
                                $event_type_class = $row['event_type'] == 'workshop' ? 'bg-warning' : ($row['event_type'] == 'conference' ? 'bg-info' : 'bg-primary');
                                $image_path = 'uploads/events/' . htmlspecialchars($row['image']);
                        ?>
                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                    <article class="event-card">
                                        <div class="event-image">
                                            <div class="post-img position-relative overflow-hidden">
                                                <img src="<?php echo $image_path; ?>" class="img-fluid" alt="Event Image">
                                                <div class="event-date-badge">
                                                    <strong><?php echo $day; ?></strong>
                                                    <small><?php echo $month_year; ?></small>
                                                </div>
                                                <div class="event-type-badge">
                                                    <span class="badge <?php echo $event_type_class; ?> text-white">
                                                        <?php echo ucfirst($row['event_type']); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="event-content">
                                            <h3 class="event-title"><?php echo htmlspecialchars($row['event_name']); ?></h3>

                                            <div class="event-meta">
                                                <div class="meta-item">
                                                    <i class="bi bi-geo-alt"></i>
                                                    <span><?php echo htmlspecialchars($row['location']); ?></span>
                                                </div>
                                                <div class="meta-item">
                                                    <i class="bi bi-clock"></i>
                                                    <span><?php echo htmlspecialchars($row['event_time']); ?></span>
                                                </div>
                                            </div>

                                            <p class="event-description">
                                                <?php echo htmlspecialchars(substr($row['event_description'], 0, 100)); ?>...
                                            </p>

                                            <div class="event-footer">
                                                <span class="status-chip <?php echo $status_class; ?> text-white">
                                                    <i class="bi <?php echo $status_icon; ?>"></i>
                                                    <?php echo $status_text; ?>
                                                </span>
                                                <a href="event-details.php?id=<?php echo urlencode($row['event_id']); ?>" class="readmore">
                                                    <span>Read More</span>
                                                    <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php
                            endwhile;
                        else:
                            ?>
                            <div class="col-12">
                                <div class="no-events-state">
                                    <i class="bi bi-calendar-event"></i>
                                    <h3>No Events Available</h3>
                                    <p>Check back soon for exciting upcoming events and activities!</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
        </section>

    </main>

    <?php include 'includes/global-footer.php'; ?>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

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