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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="../index.php">
                    <img src="../assets/img/UNCCI-logo.png" alt="Lango Region Chamber of Commerce" height="40">
                    <!-- <h1 class="sitename">Lira</h1> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="lira.php">Home</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="events.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pricing.html">Membership</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="resources.php">Resources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="login.php" class="btn btn-outline-light me-2">Login</a>
                        <a href="../pricing.html" class="btn btn-primary">Join Chamber</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- District Header -->
    <div class="district-header text-center">
        <div class="container">
            <h1 class="display-4">Lira District</h1>
            <p class="lead">The Commercial Hub of Lango Region</p>
            <div class="d-flex justify-content-center mt-4">
                <a href="#investment" class="btn  mx-2">Investment Opportunities</a>
                <a href="#directory" class="btn btn-outline-light mx-2">Business Directory</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Quick Stats Row -->
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="stats-box">
                    <div class="stats-number">474, 200</div>
                    <div>Population (2023)</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-box">
                    <div class="stats-number">1,326</div>
                    <div>Registered Businesses</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-box">
                    <div class="stats-number">12.4%</div>
                    <div>Economic Growth</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-box">
                    <div class="stats-number">4</div>
                    <div>Industrial Zones</div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Main Content Column -->
            <div class="col-lg-8">
                <!-- District Overview Section -->
                <div class="card section-card">
                    <div class="card-header bg-primary text-white">
                        <h3><i class="fas fa-info-circle me-2"></i> Overview of Lira District</h3>
                    </div>
                    <div class="card-body">
                        <p>Lira District, established in 1974, is the commercial center of Lango sub-region in Northern Uganda. Located approximately 340 kilometers north of Kampala, it covers an area of 1,326 square kilometers with a population of approximately 474,200 residents.</p>

                        <p>As the economic heartbeat of the Lango region, Lira is known for its vibrant agricultural sector, particularly in cotton, sunflower, and grain production. The district has experienced significant development in the post-conflict era, with expanding commercial infrastructure and growing investment across multiple sectors.</p>

                        <div class="mt-4">
                            <h5>Economic Profile</h5>
                            <ul>
                                <li><strong>Primary Sectors:</strong> Agriculture, Agro-processing, Retail Trade</li>
                                <li><strong>Key Crops:</strong> Cotton, Sunflower, Millet, Sorghum, Groundnuts</li>
                                <li><strong>Emerging Sectors:</strong> Renewable Energy, Hospitality, ICT</li>
                                <li><strong>Major Exports:</strong> Sunflower Oil, Cotton, Grains</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Business and Investment Opportunities -->
                <div class="card section-card" id="investment">
                    <div class="card-header bg-success text-white">
                        <h3><i class="fas fa-chart-line me-2"></i> Business & Investment Opportunities</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5>Key Investment Areas</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-seedling text-success me-2"></i> Agro-processing</h5>
                                            <p class="card-text">Opportunities in processing facilities for sunflower oil, grain milling, and fruit processing with abundant raw materials available locally.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-solar-panel text-warning me-2"></i> Renewable Energy</h5>
                                            <p class="card-text">Growing demand for solar installations, biogas, and energy-efficient products with supportive government policies.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-store text-primary me-2"></i> Retail & Distribution</h5>
                                            <p class="card-text">Expanding market for modern retail establishments serving the growing urban population in Lira municipality.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-hotel text-info me-2"></i> Hospitality</h5>
                                            <p class="card-text">Opportunities for quality accommodation, conference facilities, and food services for business travelers and tourists.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Success Story</h5>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Lira Integrated Oil Processing Plant</h5>
                                    <p class="card-text">Established in 2018, this facility processes locally grown sunflower seeds into high-quality cooking oil. Starting with a capacity of 5 tonnes per day, the plant has expanded to 20 tonnes daily production and now employs over 75 people directly and supports more than 3,000 farmers.</p>
                                    <p class="card-text">The company has secured export markets in South Sudan and DRC, contributing significantly to Lira's economic growth.</p>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="lira-investment-guide.php" class="btn btn-success">Download Investment Guide</a>
                        </div>
                    </div>
                </div>

                <!-- Chamber Activities -->
                <div class="card section-card">
                    <div class="card-header bg-info text-white">
                        <h3><i class="fas fa-calendar-alt me-2"></i> Chamber of Commerce Activities</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Upcoming Events</h5>
                                <div class="event-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Lira Agribusiness Forum</h5>
                                            <p class="card-text"><i class="far fa-calendar-alt me-2"></i> March 15, 2025</p>
                                            <p class="card-text"><i class="fas fa-map-marker-alt me-2"></i> Lira Hotel Conference Center</p>
                                            <a href="#" class="btn btn-sm btn-outline-primary">Register Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="event-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">SME Training Workshop</h5>
                                            <p class="card-text"><i class="far fa-calendar-alt me-2"></i> April 5-6, 2025</p>
                                            <p class="card-text"><i class="fas fa-map-marker-alt me-2"></i> Chamber Offices, Lira</p>
                                            <a href="#" class="btn btn-sm btn-outline-primary">Register Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Recent Initiatives</h5>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Business Resilience Program</h6>
                                            <small>Started Jan 2025</small>
                                        </div>
                                        <p class="mb-1">Supporting 50 businesses with training and microfinance</p>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Youth Entrepreneurship Initiative</h6>
                                            <small>Ongoing</small>
                                        </div>
                                        <p class="mb-1">Mentorship and startup support for young entrepreneurs</p>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Digital Skills Training</h6>
                                            <small>Monthly</small>
                                        </div>
                                        <p class="mb-1">Technology adoption workshops for local businesses</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Chamber Leadership</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <img src="images/placeholder-chairman.jpg" class="rounded-circle mb-3" width="100" height="100" alt="Chairman">
                                            <h5 class="card-title">Mr. John Okello</h5>
                                            <p class="card-text text-muted">District Chamber Chairman</p>
                                            <p class="card-text"><small><i class="fas fa-envelope me-2"></i> chairman@lirachamber.org</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <img src="images/placeholder-secretary.jpg" class="rounded-circle mb-3" width="100" height="100" alt="Secretary">
                                            <h5 class="card-title">Ms. Sarah Apio</h5>
                                            <p class="card-text text-muted">Executive Secretary</p>
                                            <p class="card-text"><small><i class="fas fa-envelope me-2"></i> secretary@lirachamber.org</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tourism and Cultural Highlights -->
                <div class="card section-card">
                    <div class="card-header bg-warning text-dark">
                        <h3><i class="fas fa-landmark me-2"></i> Tourism & Cultural Highlights</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="images/placeholder-lira-cultural.jpg" class="img-fluid rounded mb-3" alt="Lira Cultural Center">
                                <h5>Lira Cultural Center</h5>
                                <p>A hub for traditional Lango performances, crafts, and cultural exhibitions. The center hosts regular events showcasing the rich heritage of the region.</p>
                            </div>
                            <div class="col-md-6">
                                <img src="images/placeholder-lake-kyoga.jpg" class="img-fluid rounded mb-3" alt="Lake Kyoga">
                                <h5>Lake Kyoga</h5>
                                <p>Located south of Lira, Lake Kyoga offers fishing, boating, and bird watching opportunities. The lake's shores are home to diverse wildlife and fishing communities.</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Business Hospitality</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Lira Hotel</h5>
                                            <p class="card-text"><i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i></p>
                                            <p class="card-text"><small><i class="fas fa-map-marker-alt me-2"></i> Main Street, Lira</small></p>
                                            <p class="card-text"><small>Conference facilities available</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Churchill Courts</h5>
                                            <p class="card-text"><i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i></p>
                                            <p class="card-text"><small><i class="fas fa-map-marker-alt me-2"></i> Airport Road, Lira</small></p>
                                            <p class="card-text"><small>Business center and Wi-Fi</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Pauline Hotel</h5>
                                            <p class="card-text"><i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i></p>
                                            <p class="card-text"><small><i class="fas fa-map-marker-alt me-2"></i> Commercial Avenue, Lira</small></p>
                                            <p class="card-text"><small>Restaurant and meeting rooms</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Business Directory Preview -->
                <div class="card section-card" id="directory">
                    <div class="card-header bg-dark text-white">
                        <h3><i class="fas fa-building me-2"></i> Business Directory</h3>
                    </div>
                    <div class="card-body">
                        <form class="mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search businesses...">
                                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </form>

                        <ul class="nav nav-tabs" id="directoryTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="agriculture-tab" data-bs-toggle="tab" data-bs-target="#agriculture" type="button" role="tab" aria-selected="true">Agriculture</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="retail-tab" data-bs-toggle="tab" data-bs-target="#retail" type="button" role="tab" aria-selected="false">Retail</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-selected="false">Services</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="directoryTabContent">
                            <div class="tab-pane fade show active" id="agriculture" role="tabpanel">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Lira Grain Processors</h6>
                                            <small><i class="fas fa-star text-warning"></i> Featured</small>
                                        </div>
                                        <p class="mb-1"><small>Grain processing and marketing</small></p>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Northern Agro Inputs</h6>
                                            <small></small>
                                        </div>
                                        <p class="mb-1"><small>Agricultural supplies and equipment</small></p>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Lango Organic Farms</h6>
                                            <small></small>
                                        </div>
                                        <p class="mb-1"><small>Organic produce and certification</small></p>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="retail" role="tabpanel">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Lira Shopping Center</h6>
                                            <small><i class="fas fa-star text-warning"></i> Featured</small>
                                        </div>
                                        <p class="mb-1"><small>Department store and supermarket</small></p>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Unity Electronics</h6>
                                            <small></small>
                                        </div>
                                        <p class="mb-1"><small>Consumer electronics and appliances</small></p>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Modern Fashions</h6>
                                            <small></small>
                                        </div>
                                        <p class="mb-1"><small>Clothing and accessories</small></p>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="services" role="tabpanel">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Lira Business Advisory</h6>
                                            <small><i class="fas fa-star text-warning"></i> Featured</small>
                                        </div>
                                        <p class="mb-1"><small>Business consulting and accounting</small></p>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Northern IT Solutions</h6>
                                            <small></small>
                                        </div>
                                        <p class="mb-1"><small>Computer services and internet</small></p>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Lango Legal Associates</h6>
                                            <small></small>
                                        </div>
                                        <p class="mb-1"><small>Legal and corporate services</small></p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <a href="lira-directory.php" class="btn btn-outline-dark">View Full Directory</a>
                        </div>
                    </div>
                </div>

                <!-- News and Updates -->
                <div class="card section-card">
                    <div class="card-header bg-danger text-white">
                        <h3><i class="far fa-newspaper me-2"></i> News & Updates</h3>
                    </div>
                    <div class="card-body">
                        <div class="news-item">
                            <h5>New Road Network to Boost Trade</h5>
                            <p class="text-muted"><small><i class="far fa-calendar-alt me-2"></i> February 15, 2025</small></p>
                            <p>Construction has begun on a new road network connecting Lira to surrounding districts, expected to reduce transportation costs for businesses by up to 30%.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                        </div>
                        <div class="news-item">
                            <h5>Chamber Partners with DFCU Bank</h5>
                            <p class="text-muted"><small><i class="far fa-calendar-alt me-2"></i> February 8, 2025</small></p>
                            <p>Lira Chamber of Commerce signs MOU with DFCU Bank to provide subsidized loans for SMEs in the agricultural value chain.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                        </div>
                        <div class="news-item">
                            <h5>New Youth Enterprise Fund Launched</h5>
                            <p class="text-muted"><small><i class="far fa-calendar-alt me-2"></i> January 29, 2025</small></p>
                            <p>Government launches UGX 5 billion fund to support youth-led businesses in Lira and neighboring districts.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                        </div>

                        <div class="text-center mt-3">
                            <a href="lira-news.php" class="btn btn-outline-danger">More News</a>
                        </div>
                    </div>
                </div>

                <!-- Government Info -->
                <div class="card section-card">
                    <div class="card-header bg-secondary text-white">
                        <h3><i class="fas fa-landmark me-2"></i> Government Resources</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-group mb-4">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Commercial Officer's Office</h6>
                                </div>
                                <p class="mb-1"><small><i class="fas fa-phone me-2"></i> +256 414 123456</small></p>
                                <p class="mb-1"><small><i class="fas fa-envelope me-2"></i> commercial@lira.go.ug</small></p>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Business Registration Desk</h6>
                                </div>
                                <p class="mb-1"><small><i class="fas fa-phone me-2"></i> +256 414 789012</small></p>
                                <p class="mb-1"><small><i class="fas fa-envelope me-2"></i> registration@lira.go.ug</small></p>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Tax Information Office</h6>
                                </div>
                                <p class="mb-1"><small><i class="fas fa-phone me-2"></i> +256 414 345678</small></p>
                                <p class="mb-1"><small><i class="fas fa-envelope me-2"></i> tax@lira.go.ug</small></p>
                            </a>
                        </div>

                        <h5>Business Licenses & Permits</h5>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Trading License
                                <a href="#" class="btn btn-sm btn-outline-primary">Apply</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Health Permits
                                <a href="#" class="btn btn-sm btn-outline-primary">Apply</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Signage Permit
                                <a href="#" class="btn btn-sm btn-outline-primary">Apply</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Infrastructure Map Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card section-card">
                    <div class="card-header bg-primary text-white">
                        <h3><i class="fas fa-map-marked-alt me-2"></i> Infrastructure & Industrial Zones</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="map-container">
                                    <!-- Replace with actual map or embed Google Maps with API key -->
                                    <img src="images/placeholder-map.jpg" class="img-fluid" alt="Lira Infrastructure Map">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>Industrial Zones</h5>
                                <div class="list-group mb-4">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Lira Industrial Park</h6>

                                            <small>Established 2015</small>
                                        </div>
                                        <p class="mb-1">Primary processing and manufacturing hub</p>
                                        <small>Available spaces: 7 plots</small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Railway Terminal Business Zone</h6>
                                            <small>Established 2019</small>
                                        </div>
                                        <p class="mb-1">Logistics and warehouse facilities</p>
                                        <small>Available spaces: 3 warehouses</small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Agribusiness Processing Zone</h6>
                                            <small>Established 2020</small>
                                        </div>
                                        <p class="mb-1">Food processing and agricultural equipment</p>
                                        <small>Available spaces: 12 plots</small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Lira ICT & Innovation Hub</h6>
                                            <small>Established 2023</small>
                                        </div>
                                        <p class="mb-1">Technology and service businesses</p>
                                        <small>Available spaces: 5 office units</small>
                                    </a>
                                </div>

                                <h5>Infrastructure</h5>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Power Supply
                                        <span class="badge bg-success rounded-pill">Reliable</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Water Access
                                        <span class="badge bg-success rounded-pill">Good</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Internet Connectivity
                                        <span class="badge bg-warning rounded-pill">Improving</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Road Networks
                                        <span class="badge bg-warning rounded-pill">Developing</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Community Initiatives Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card section-card">
                    <div class="card-header bg-success text-white">
                        <h3><i class="fas fa-hands-helping me-2"></i> Community & Social Initiatives</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>CSR Showcase</h5>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Lira Grain Processors - School Feeding Program</h5>
                                        <p class="card-text">Supporting 15 schools with daily meals for over 5,000 students, improving attendance and academic performance.</p>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">Ongoing since 2022</small>
                                            <span class="badge bg-success">Education</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Churchill Courts - Community Health Outreach</h5>
                                        <p class="card-text">Quarterly health camps providing free medical services to underserved communities in Lira District.</p>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">Started 2023</small>
                                            <span class="badge bg-primary">Healthcare</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Public-Private Partnerships</h5>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Lira Youth Skills Development Initiative</h5>
                                        <p class="card-text">A joint program between Lira Chamber of Commerce, the District Government, and local businesses to train youth in market-relevant skills.</p>
                                        <ul class="list-unstyled">
                                            <li><small><i class="fas fa-check-circle text-success me-2"></i> 350 youth trained in 2023-2024</small></li>
                                            <li><small><i class="fas fa-check-circle text-success me-2"></i> 70% employment/self-employment rate</small></li>
                                            <li><small><i class="fas fa-check-circle text-success me-2"></i> Expanding to cover 500 youth in 2025</small></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Women in Agribusiness Program</h5>
                                        <p class="card-text">Supporting women entrepreneurs in agricultural value chains through training, mentorship, and access to markets.</p>
                                        <ul class="list-unstyled">
                                            <li><small><i class="fas fa-check-circle text-success me-2"></i> 200 women entrepreneurs supported</small></li>
                                            <li><small><i class="fas fa-check-circle text-success me-2"></i> 35 new businesses established</small></li>
                                            <li><small><i class="fas fa-check-circle text-success me-2"></i> UGX 500 million in new market access</small></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <a href="lira-community.php" class="btn btn-success">Learn More About Community Initiatives</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            <p>Lira Chamber of Commerce Building<br>Main Street, Lira Municipality<br>Plot 15, Oyite Road</p>
                        </div>
                        <div class="mb-3">
                            <h5><i class="fas fa-phone me-2 text-success"></i> Contact Numbers</h5>
                            <p>Main Office: +256 414 123789<br>Member Services: +256 414 123790<br>Business Support: +256 414 123791</p>
                        </div>
                        <div class="mb-3">
                            <h5><i class="fas fa-envelope me-2 text-primary"></i> Email Addresses</h5>
                            <p>General Inquiries: info@lirachamber.org<br>Membership: members@lirachamber.org<br>Events: events@lirachamber.org</p>
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