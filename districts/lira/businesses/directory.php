<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Business Directory - UNCCI</title>
    <meta name="description" content="Comprehensive business directory for Lango region">
    <meta name="keywords" content="business, directory, Lango, Uganda, commerce">

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
        :root {
            --primary-color: #C1053F;
            --secondary-color: #C1053F;
            --accent-color: #f39c12;
            --light-bg: #f8f9fa;
            --dark-bg: #343a40;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            color: #333;
            background-color: #f8f9fa;
        }
        
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand img {
            height: 50px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/business-directory.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            margin-bottom: 30px;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 15px;
            color: var(--dark-bg);
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .filter-button {
            margin-bottom: 10px;
            font-weight: 500;
            border-radius: 30px;
            padding: 8px 16px;
            transition: all 0.3s;
            background-color: #f8f9fa;
            color: #333;
            border: 2px solid #dee2e6;
        }
        
        .filter-button:hover {
            background-color: #e9ecef;
        }
        
        .filter-button.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .search-box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        
        .business-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .business-logo {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-top-left-radius: calc(0.25rem - 1px);
            border-top-right-radius: calc(0.25rem - 1px);
        }
        
        .business-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1;
        }
        
        .pagination .page-item .page-link {
            color: var(--primary-color);
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .featured-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(243, 156, 18, 0.9);
            color: white;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .premium-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(52, 152, 219, 0.9);
            color: white;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .business-info {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .business-footer {
            margin-top: auto;
            border-top: 1px solid rgba(0,0,0,0.125);
            padding-top: 10px;
        }
        
        .location-badge {
            background-color: #e9ecef;
            color: #495057;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.75rem;
            display: inline-block;
            margin-right: 5px;
        }
        
        .business-type-badge {
            border-radius: 30px;
            padding: 3px 10px;
            font-size: 0.75rem;
        }
        
        .retail {
            background-color: #d4edda;
            color: #155724;
        }
        
        .wholesale {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .advanced-filters {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: none;
        }
        
        .directory-map {
            height: 400px;
            width: 100%;
            border-radius: 5px;
            margin-top: 30px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .business-logo {
                height: 150px;
            }
            
            .filter-scroll {
                overflow-x: auto;
                white-space: nowrap;
                padding-bottom: 10px;
                margin-bottom: 10px;
            }
            
            .filter-scroll::-webkit-scrollbar {
                height: 4px;
            }
            
            .filter-scroll::-webkit-scrollbar-thumb {
                background: #ccc;
                border-radius: 4px;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar would go here -->

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Business Directory</h1>
            <p class="lead mb-4">Discover and connect with businesses across the Lango region</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="search-box">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Search businesses by name, service, or products..." aria-label="Search businesses">
                            <button class="btn btn-primary" type="button"><i class="fas fa-search"></i> Search</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">Over 500 businesses listed</small>
                            <button class="btn btn-link p-0" id="advancedFilterToggle">
                                Advanced Filters <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Advanced Search Filters -->
        <div id="advancedFilters" class="advanced-filters mb-4">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="districtFilter" class="form-label">District</label>
                    <select class="form-select" id="districtFilter">
                        <option value="" selected>All Districts</option>
                        <option value="lira">Lira</option>
                        <option value="dokolo">Dokolo</option>
                        <option value="apac">Apac</option>
                        <option value="kwania">Kwania</option>
                        <option value="kole">Kole</option>
                        <option value="oyam">Oyam</option>
                        <option value="otuke">Otuke</option>
                        <option value="alebtong">Alebtong</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="businessTypeFilter" class="form-label">Business Type</label>
                    <select class="form-select" id="businessTypeFilter">
                        <option value="" selected>All Types</option>
                        <option value="retail">Retail</option>
                        <option value="wholesale">Wholesale</option>
                        <option value="services">Services</option>
                        <option value="manufacturing">Manufacturing</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="employeeCountFilter" class="form-label">Employee Count</label>
                    <select class="form-select" id="employeeCountFilter">
                        <option value="" selected>Any Size</option>
                        <option value="micro">Micro (1-9)</option>
                        <option value="small">Small (10-49)</option>
                        <option value="medium">Medium (50-249)</option>
                        <option value="large">Large (250+)</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="establishedFilter" class="form-label">Established Year</label>
                    <select class="form-select" id="establishedFilter">
                        <option value="" selected>Any Year</option>
                        <option value="2020-2025">2020-2025</option>
                        <option value="2010-2019">2010-2019</option>
                        <option value="2000-2009">2000-2009</option>
                        <option value="before-2000">Before 2000</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Special Features</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="featureChamberMember" value="chamber-member">
                            <label class="form-check-label" for="featureChamberMember">Chamber Member</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="featureWomenOwned" value="women-owned">
                            <label class="form-check-label" for="featureWomenOwned">Women-Owned</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="featureYouthOwned" value="youth-owned">
                            <label class="form-check-label" for="featureYouthOwned">Youth-Owned</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="featureExporter" value="exporter">
                            <label class="form-check-label" for="featureExporter">Exporter</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-md-end align-self-end">
                    <button class="btn btn-outline-secondary me-2">Reset Filters</button>
                    <button class="btn btn-primary">Apply Filters</button>
                </div>
            </div>
        </div>

        <!-- Filter Categories -->
        <div class="mb-4 filter-scroll">
            <button class="btn filter-button active" data-filter="all">All Categories</button>
            <button class="btn filter-button" data-filter="agriculture">Agriculture</button>
            <button class="btn filter-button" data-filter="retail">Retail</button>
            <button class="btn filter-button" data-filter="wholesale">Wholesale</button>
            <button class="btn filter-button" data-filter="manufacturing">Manufacturing</button>
            <button class="btn filter-button" data-filter="services">Professional Services</button>
            <button class="btn filter-button" data-filter="hospitality">Hospitality & Tourism</button>
            <button class="btn filter-button" data-filter="construction">Construction</button>
            <button class="btn filter-button" data-filter="education">Education</button>
            <button class="btn filter-button" data-filter="health">Healthcare</button>
            <button class="btn filter-button" data-filter="tech">Technology</button>
            <button class="btn filter-button" data-filter="transport">Transport & Logistics</button>
            <button class="btn filter-button" data-filter="energy">Energy</button>
            <button class="btn filter-button" data-filter="finance">Financial Services</button>
            <button class="btn filter-button" data-filter="cosmetics">Beauty & Cosmetics</button>
        </div>

        <!-- Directory View Options -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="text-muted">Showing 1-20 of 524 businesses</span>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-secondary active" id="gridViewBtn">
                    <i class="fas fa-th-large"></i> Grid
                </button>
                <button type="button" class="btn btn-outline-secondary" id="listViewBtn">
                    <i class="fas fa-list"></i> List
                </button>
                <button type="button" class="btn btn-outline-secondary" id="mapViewBtn">
                    <i class="fas fa-map-marked-alt"></i> Map
                </button>
            </div>
        </div>

        <!-- Directory Grid View -->
        <div id="directoryGridView">
            <div class="row">
                <!-- Agriculture Business -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-category="agriculture">
                    <div class="card business-card h-100">
                        <div class="featured-badge">Featured</div>
                        <img src="images/placeholder-business1.jpg" class="business-logo" alt="Lira Grain Processors">
                        <div class="card-body business-info">
                            <h5 class="card-title">Lira Grain Processors</h5>
                            <span class="business-type-badge retail mb-2">Retail</span>
                            <p class="card-text">Leading processor and distributor of quality grains and cereals from Northern Uganda.</p>
                            <div class="mb-2">
                                <span class="location-badge"><i class="fas fa-map-marker-alt"></i> Lira</span>
                            </div>
                            <div class="business-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                    <div>
                                        <span class="me-2"><i class="fas fa-phone text-success"></i></span>
                                        <span><i class="fas fa-envelope text-primary"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Retail Business -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-category="retail">
                    <div class="card business-card h-100">
                        <img src="images/placeholder-business2.jpg" class="business-logo" alt="Lira Shopping Center">
                        <div class="card-body business-info">
                            <h5 class="card-title">Lira Shopping Center</h5>
                            <span class="business-type-badge retail mb-2">Retail</span>
                            <p class="card-text">Modern department store offering a wide range of products and household goods.</p>
                            <div class="mb-2">
                                <span class="location-badge"><i class="fas fa-map-marker-alt"></i> Lira</span>
                            </div>
                            <div class="business-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                    <div>
                                        <span class="me-2"><i class="fas fa-phone text-success"></i></span>
                                        <span><i class="fas fa-envelope text-primary"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Manufacturing Business -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-category="manufacturing">
                    <div class="card business-card h-100">
                        <div class="premium-badge">Premium</div>
                        <img src="images/placeholder-business3.jpg" class="business-logo" alt="Northern Oil Mills">
                        <div class="card-body business-info">
                            <h5 class="card-title">Northern Oil Mills</h5>
                            <span class="business-type-badge wholesale mb-2">Wholesale</span>
                            <p class="card-text">Producer of high-quality sunflower oil and related products using locally sourced materials.</p>
                            <div class="mb-2">
                                <span class="location-badge"><i class="fas fa-map-marker-alt"></i> Lira</span>
                            </div>
                            <div class="business-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                    <div>
                                        <span class="me-2"><i class="fas fa-phone text-success"></i></span>
                                        <span><i class="fas fa-envelope text-primary"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hospitality Business -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-category="hospitality">
                    <div class="card business-card h-100">
                        <img src="images/placeholder-business4.jpg" class="business-logo" alt="Lira Grand Hotel">
                        <div class="card-body business-info">
                            <h5 class="card-title">Lira Grand Hotel</h5>
                            <span class="business-type-badge retail mb-2">Retail</span>
                            <p class="card-text">Premium accommodation with modern amenities and conference facilities in Lira town.</p>
                            <div class="mb-2">
                                <span class="location-badge"><i class="fas fa-map-marker-alt"></i> Lira</span>
                            </div>
                            <div class="business-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                    <div>
                                        <span class="me-2"><i class="fas fa-phone text-success"></i></span>
                                        <span><i class="fas fa-envelope text-primary"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technology Business -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-category="tech">
                    <div class="card business-card h-100">
                        <img src="images/placeholder-business5.jpg" class="business-logo" alt="Northern IT Solutions">
                        <div class="card-body business-info">
                            <h5 class="card-title">Northern IT Solutions</h5>
                            <span class="business-type-badge retail mb-2">Services</span>
                            <p class="card-text">Providing cutting-edge IT services, computer repair, and software solutions for businesses.</p>
                            <div class="mb-2">
                                <span class="location-badge"><i class="fas fa-map-marker-alt"></i> Lira</span>
                            </div>
                            <div class="business-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                    <div>
                                        <span class="me-2"><i class="fas fa-phone text-success"></i></span>
                                        <span><i class="fas fa-envelope text-primary"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Education Business -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-category="education">
                    <div class="card business-card h-100">
                        <img src="images/placeholder-business6.jpg" class="business-logo" alt="Lango Professional Institute">
                        <div class="card-body business-info">
                            <h5 class="card-title">Lango Professional Institute</h5>
                            <span class="business-type-badge retail mb-2">Services</span>
                            <p class="card-text">Professional skills training institution offering vocational and technical courses.</p>
                            <div class="mb-2">
                                <span class="location-badge"><i class="fas fa-map-marker-alt"></i> Lira</span>
                            </div>
                            <div class="business-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                    <div>
                                        <span class="me-2"><i class="fas fa-phone text-success"></i></span>
                                        <span><i class="fas fa-envelope text-primary"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cosmetics Business -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-category="cosmetics">
                    <div class="card business-card h-100">
                        <div class="featured-badge">Featured</div>
                        <img src="images/placeholder-business7.jpg" class="business-logo" alt="Natural Beauty Products">
                        <div class="card-body business-info">
                            <h5 class="card-title">Natural Beauty Products</h5>
                            <span class="business-type-badge wholesale mb-2">Wholesale & Retail</span>
                            <p class="card-text">Manufacturer and distributor of organic beauty products made from local ingredients.</p>
                            <div class="mb-2">
                                <span class="location-badge"><i class="fas fa-map-marker-alt"></i> Dokolo</span>
                            </div>
                            <div class="business-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                    <div>
                                        <span class="me-2"><i class="fas fa-phone text-success"></i></span>
                                        <span><i class="fas fa-envelope text-primary"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Finance Business -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-category="finance">
                    <div class="card business-card h-100">
                        <img src="images/placeholder-business8.jpg" class="business-logo" alt="Lango Microfinance">
                        <div class="card-body business-info">
                            <h5 class="card-title">Lango Microfinance</h5>
                            <span class="business-type-badge retail mb-2">Services</span>
                            <p class="card-text">Financial services provider supporting small businesses and farmers with affordable loans.</p>
                            <div class="mb-2">
                                <span class="location-badge"><i class="fas fa-map-marker-alt"></i> Apac</span>
                            </div>
                            <div class="business-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                                    <div>
                                        <span class="me-2"><i class="fas fa-phone text-success"></i></span>
                                        <span><i class="fas fa-envelope text-primary"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="Business directory pagination">
                <ul class="pagination justify-content-center mt-4">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Directory List View (Hidden by default) -->
        <div id="directoryListView" style="display: none;">
            <div class="list-group">
                <!-- Agriculture Business -->
                <div class="list-group-item list-group-item-action p-0 overflow-hidden" data-category="agriculture">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <div class="position-relative h-100">
                                <img src="images/placeholder-business1.jpg" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="Lira Grain Processors">
                                <div class="featured-badge" style="font-size: 0.7rem; padding: 3px 6px;">Featured</div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="card-body d-flex flex-<div class="col-md-10">
    <div class="card-body d-flex flex-column h-100">
        <div class="d-flex justify-content-between">
            <div>
                <h5 class="card-title">Lira Grain Processors</h5>
                <span class="business-type-badge retail mb-2">Retail</span>
                <span class="location-badge"><i class="fas fa-map-marker-alt"></i> Lira</span>
            </div>
            <div>
                <span class="me-2"><i class="fas fa-phone text-success"></i></span>
                <span><i class="fas fa-envelope text-primary"></i></span>
            </div>
        </div>
        <p class="card-text">Leading processor and distributor of quality grains and cereals from Northern Uganda.</p>
        <div class="mt-auto">
            <button class="btn btn-sm btn-outline-primary">View Details</button>
        </div>
    </div>
</div>
</div>

<!-- Retail Business -->
<div class="list-group-item list-group-item-action p-0 overflow-hidden" data-category="retail">
    <div class="row g-0">
        <div class="col-md-2">
            <img src="images/placeholder-business2.jpg" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="Lira Shopping Center">
        </div>
        <div class="col-md-10">
            <div class="card-body d-flex flex-column h-100">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Lira Shopping Center</h5>
                        <span class="business-type-badge retail mb-2">Retail</span>
                        <span class="location-badge"><i class="fas fa-map-marker-alt"></i> Lira</span>
                    </div>
                    <div>
                        <span class="me-2"><i class="fas fa-phone text-success"></i></span>
                        <span><i class="fas fa-envelope text-primary"></i></span>
                    </div>
                </div>
                <p class="card-text">Modern department store offering a wide range of products and household goods.</p>
                <div class="mt-auto">
                    <button class="btn btn-sm btn-outline-primary">View Details</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add more list items similar to the above pattern for other businesses -->
</div>

<!-- Directory Map View (Hidden by default) -->
<div id="directoryMapView" style="display: none;">
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Business Locations</h5>
            <p class="card-text text-muted mb-3">View all businesses on the map. Click on a marker to see more details.</p>
            <div class="directory-map" id="businessMap">
                <!-- Map will be loaded here -->
                <img src="images/map-placeholder.jpg" alt="Map Placeholder" class="img-fluid w-100" style="height: 400px; object-fit: cover;">
            </div>
        </div>
    </div>
</div>
</div>

<!-- Call to Action -->
<section class="py-5 bg-light mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h2 class="mb-4">Are You a Business Owner?</h2>
                <p class="lead mb-4">Join our business directory to increase your visibility and connect with potential customers across the Lango region.</p>
                <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                    <a href="#" class="btn btn-primary btn-lg">Add Your Business</a>
                    <a href="#" class="btn btn-outline-secondary btn-lg">Learn About Premium Listings</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Toggle advanced filters
        $("#advancedFilterToggle").click(function() {
            $("#advancedFilters").slideToggle();
            $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
        });
        
        // Category filters
        $(".filter-button").click(function() {
            var value = $(this).attr('data-filter');
            
            $(".filter-button").removeClass('active');
            $(this).addClass('active');
            
            if(value == "all") {
                $("[data-category]").show("1000");
            } else {
                $("[data-category]").not('[data-category="'+value+'"]').hide("1000");
                $('[data-category="'+value+'"]').show("1000");
            }
        });
        
        // View switching
        $("#gridViewBtn").click(function() {
            $(this).addClass('active');
            $("#listViewBtn, #mapViewBtn").removeClass('active');
            $("#directoryGridView").show();
            $("#directoryListView, #directoryMapView").hide();
        });
        
        $("#listViewBtn").click(function() {
            $(this).addClass('active');
            $("#gridViewBtn, #mapViewBtn").removeClass('active');
            $("#directoryListView").show();
            $("#directoryGridView, #directoryMapView").hide();
        });
        
        $("#mapViewBtn").click(function() {
            $(this).addClass('active');
            $("#gridViewBtn, #listViewBtn").removeClass('active');
            $("#directoryMapView").show();
            $("#directoryGridView, #directoryListView").hide();
            
            // Initialize map if needed
            // This would be where you'd add code to initialize a Google Maps or Leaflet map
        });
    });
</script>
</body>
</html>