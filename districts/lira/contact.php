<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Lira District - UNCCI</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .district-header {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('images/lira-district.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            margin-bottom: 30px;
        }

        .section-card {
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .section-card:hover {
            transform: translateY(-5px);
        }

        .business-directory .card {
            margin-bottom: 20px;
        }

        .news-item {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .news-item:last-child {
            border-bottom: none;
        }

        .stats-box {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .stats-number {
            font-size: 36px;
            font-weight: bold;
            color: #C1053F;
        }

        .map-container {
            height: 400px;
            margin-bottom: 30px;
        }

        .event-card {
            margin-bottom: 20px;
        }

        .tab-content {
            padding: 20px;
            border: 1px solid #dee2e6;
            border-top: none;
            border-radius: 0 0 0.25rem 0.25rem;
        }
        .btn{
            background-color: #C1053F;
            color: #ffffff;
            border: #C1053F;
        }
    </style>
</head>

<body>

    <!-- header.php -->
    <header>
       <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="Lira Chamber of Commerce Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="districtsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Districts
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="districtsDropdown">
                                <li><a class="dropdown-item active" href="lira.php">Lira</a></li>
                                <li><a class="dropdown-item" href="dokolo.php">Dokolo</a></li>
                                <li><a class="dropdown-item" href="apac.php">Apac</a></li>
                                <li><a class="dropdown-item" href="kwania.php">Kwania</a></li>
                                <li><a class="dropdown-item" href="kole.php">Kole</a></li>
                                <li><a class="dropdown-item" href="oyam.php">Oyam</a></li>
                                <li><a class="dropdown-item" href="otuke.php">Otuke</a></li>
                                <li><a class="dropdown-item" href="alebtong.php">Alebtong</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="businesses.php" id="districtsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Businesses
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="districtsDropdown">
                                <li><a class="dropdown-item active" href="directory.php">Business Directory</a></li>
                                <li><a class="dropdown-item" href="investment.php">Investment Opportunities</a></li>
                            </ul>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary" href="membership.php">Join Chamber</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>

    <!-- District Header -->
    <div class="district-header text-center">
        <div class="container">
            <h1 class="display-4">Contact us</h1>
            <p class="lead">Say Something!</p>
        
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
     
        <!-- Contact & Feedback Section -->
        <div class="row mt-4 mb-5">
            <div class="col-md-6">
                <div class="card section-card">
                    <div class="card-header bg-primary text-white">
                        <h3><i class="fas fa-envelope me-2"></i> Contact Chamber Office</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5><i class="fas fa-map-marker-alt me-2 text-danger"></i> Office Location</h5>
                            <p>Plot 25 Obote Avenue, Lira City.</p>
                        </div>
                        <div class="mb-3">
                            <h5><i class="fas fa-phone me-2 text-success"></i> Contact Numbers</h5>
                            <p>+256 774016223</p>
                        </div>
                        <div class="mb-3">
                            <h5><i class="fas fa-envelope me-2 text-primary"></i> Email Addresses</h5>
                            <p> lirachamberofcommerce@gmail.com</p>
                        </div>
                        <div class="mb-3">
                            <h5><i class="far fa-clock me-2 text-warning"></i> Office Hours</h5>
                            <p>Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: 9:00 AM - 12:00 PM<br>Sunday: Closed</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card section-card">
                    <div class="card-header bg-info text-white">
                        <h3><i class="fas fa-comment-alt me-2"></i> Feedback & Inquiries</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Inquiry Category</label>
                                <select class="form-select" id="category">
                                    <option selected>Select a category</option>
                                    <option value="membership">Chamber Membership</option>
                                    <option value="business">Business Support</option>
                                    <option value="events">Events & Programs</option>
                                    <option value="investment">Investment Opportunities</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Your Message</label>
                                <textarea class="form-control" id="message" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer.php -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h5>Lango Region Chamber</h5>
                    <p>Promoting business growth and economic development across the Lango sub-region.</p>
                    <div class="social-links mt-3">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h5>Districts</h5>
                    <ul class="list-unstyled">
                        <li><a href="lira.php" class="text-white text-decoration-none">Lira</a></li>
                        <li><a href="dokolo.php" class="text-white text-decoration-none">Dokolo</a></li>
                        <li><a href="apac.php" class="text-white text-decoration-none">Apac</a></li>
                        <li><a href="kwania.php" class="text-white text-decoration-none">Kwania</a></li>
                        <li><a href="kole.php" class="text-white text-decoration-none">Kole</a></li>
                        <li><a href="oyam.php" class="text-white text-decoration-none">Oyam</a></li>
                        <li><a href="otuke.php" class="text-white text-decoration-none">Otuke</a></li>
                        <li><a href="alebtong.php" class="text-white text-decoration-none">Alebtong</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="events.php" class="text-white text-decoration-none">Events Calendar</a></li>
                        <li><a href="membership.php" class="text-white text-decoration-none">Membership Benefits</a></li>
                        <li><a href="resources.php" class="text-white text-decoration-none">Business Resources</a></li>
                        <li><a href="news.php" class="text-white text-decoration-none">News & Updates</a></li>
                        <li><a href="gallery.php" class="text-white text-decoration-none">Gallery</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h5>Contact Us</h5>
                    <address>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i> Main Street, Lira Municipality</p>
                        <p class="mb-1"><i class="fas fa-phone me-2"></i> +256 414 123789</p>
                        <p class="mb-1"><i class="fas fa-envelope me-2"></i> info@langochamber.org</p>
                    </address>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <?php echo date('Y'); ?> Lango Region Chamber of Commerce. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy.php" class="text-white text-decoration-none">Privacy Policy</a></li>
                        <li class="list-inline-item ms-3"><a href="terms.php" class="text-white text-decoration-none">Terms of Use</a></li>
                        <li class="list-inline-item ms-3"><a href="sitemap.php" class="text-white text-decoration-none">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>