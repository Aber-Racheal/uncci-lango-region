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

        .btn {
            background-color: #C1053F;
            color: #ffffff;
            border: #C1053F;
        }

        :root {
            --primary-color: #C1053F;
            --secondary-color: #C1053F;
            --accent-color: #f39c12;
            --light-bg: #f8f9fa;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            color: #333;
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
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/lira-district.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 30px;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 15px;
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
        
        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 40px 0 20px;
        }
        
        .social-icons a {
            color: white;
            margin-right: 15px;
            font-size: 1.2rem;
        }
    
    </style>
</head>

<body>

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
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Businesses</h1>
            <p class="lead mb-4">Supporting local businesses and fostering economic growth in our community</p>
            <a href="membership.php" class="btn btn-primary btn-lg me-2">Become a Member</a>
            <a href="about.php" class="btn btn-outline-light btn-lg">Learn More</a>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
      

        <div class="row">

         <!-- Business Directory and Investment Section HTML -->
<div class="container my-5">
    <div class="row">
        <!-- Main Content Column -->
        <div class="col-lg-8">
            <!-- Business and Investment Opportunities -->
            <div class="card section-card" id="investment">
                <div class="card-header bg-success text-white">
                    <h3><i class="fas fa-chart-line me-2"></i> Business & Investment Opportunities</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h4 class="mb-4 border-bottom pb-2">Key Investment Areas</h4>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="card investment-card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-seedling investment-area-icon text-success"></i>
                                        <h5 class="card-title">Agro-processing</h5>
                                        <p class="card-text">Opportunities in processing facilities for sunflower oil, grain milling, and fruit processing with abundant raw materials available locally.</p>
                                        <button class="btn btn-sm btn-outline-success mt-2" data-bs-toggle="modal" data-bs-target="#agroModal">Learn More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card investment-card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-solar-panel investment-area-icon text-warning"></i>
                                        <h5 class="card-title">Renewable Energy</h5>
                                        <p class="card-text">Growing demand for solar installations, biogas, and energy-efficient products with supportive government policies.</p>
                                        <button class="btn btn-sm btn-outline-warning mt-2" data-bs-toggle="modal" data-bs-target="#energyModal">Learn More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card investment-card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-store investment-area-icon text-primary"></i>
                                        <h5 class="card-title">Retail & Distribution</h5>
                                        <p class="card-text">Expanding market for modern retail establishments serving the growing urban population in Lira municipality.</p>
                                        <button class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#retailModal">Learn More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card investment-card h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-hotel investment-area-icon text-info"></i>
                                        <h5 class="card-title">Hospitality</h5>
                                        <p class="card-text">Opportunities for quality accommodation, conference facilities, and food services for business travelers and tourists.</p>
                                        <button class="btn btn-sm btn-outline-info mt-2" data-bs-toggle="modal" data-bs-target="#hospitalityModal">Learn More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h4 class="mb-3 border-bottom pb-2">Success Story</h4>
                        <div class="success-story">
                            <h5 class="text-success">Lira Integrated Oil Processing Plant</h5>
                            <p>Established in 2018, this facility processes locally grown sunflower seeds into high-quality cooking oil. Starting with a capacity of 5 tonnes per day, the plant has expanded to 20 tonnes daily production and now employs over 75 people directly and supports more than 3,000 farmers.</p>
                            <p class="mb-0">The company has secured export markets in South Sudan and DRC, contributing significantly to Lira's economic growth.</p>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="#" id="downloadInvestmentGuide" class="btn download-btn"><i class="fas fa-file-pdf me-2"></i> Download Investment Guide</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Business Directory -->
            <div class="card section-card" id="directory">
                <div class="card-header bg-dark text-white">
                    <h3><i class="fas fa-building me-2"></i> Business Directory</h3>
                </div>
                <div class="card-body">
                    <div class="directory-filters">
                        <div class="directory-search">
                            <input type="text" id="searchBusiness" class="form-control" placeholder="Search businesses...">
                            <button id="searchBtn" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                        
                        <div class="mb-3">
                            <label for="categoryFilter" class="form-label">Filter by Category:</label>
                            <select id="categoryFilter" class="form-select">
                                <option value="all">All Categories</option>
                                <option value="agriculture">Agriculture</option>
                                <option value="retail">Retail</option>
                                <option value="services">Services</option>
                                <option value="manufacturing">Manufacturing</option>
                                <option value="hospitality">Hospitality</option>
                            </select>
                        </div>
                    </div>

                    <ul class="nav nav-tabs" id="directoryTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-selected="true">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="agriculture-tab" data-bs-toggle="tab" data-bs-target="#agriculture" type="button" role="tab" aria-selected="false">Agriculture</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="retail-tab" data-bs-toggle="tab" data-bs-target="#retail" type="button" role="tab" aria-selected="false">Retail</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-selected="false">Services</button>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="directoryTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel">
                            <div id="allBusinesses" class="business-listing">
                                <!-- All businesses will be loaded here -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="agriculture" role="tabpanel">
                            <div id="agricultureBusinesses" class="business-listing">
                                <!-- Agriculture businesses will be loaded here -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="retail" role="tabpanel">
                            <div id="retailBusinesses" class="business-listing">
                                <!-- Retail businesses will be loaded here -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="services" role="tabpanel">
                            <div id="servicesBusinesses" class="business-listing">
                                <!-- Service businesses will be loaded here -->
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="directory.php" id="viewFullDirectory" class="btn btn-outline-dark">View Full Directory</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- JavaScript for functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Business directory data
    const businesses = [
        {
            id: 1,
            name: "Lira Grain Processors",
            category: "agriculture",
            description: "Grain processing and marketing",
            featured: true,
            contact: "+256 772 123456",
            location: "Lira Industrial Park"
        },
        {
            id: 2,
            name: "Northern Agro Inputs",
            category: "agriculture",
            description: "Agricultural supplies and equipment",
            featured: false,
            contact: "+256 772 234567",
            location: "Main Street, Lira"
        },
        {
            id: 3,
            name: "Lango Organic Farms",
            category: "agriculture",
            description: "Organic produce and certification",
            featured: false,
            contact: "+256 772 345678",
            location: "Agribusiness Zone"
        },
        {
            id: 4,
            name: "Lira Shopping Center",
            category: "retail",
            description: "Department store and supermarket",
            featured: true,
            contact: "+256 772 456789",
            location: "Town Center"
        },
        {
            id: 5,
            name: "Unity Electronics",
            category: "retail",
            description: "Consumer electronics and appliances",
            featured: false,
            contact: "+256 772 567890",
            location: "Main Street, Lira"
        },
        {
            id: 6,
            name: "Modern Fashions",
            category: "retail",
            description: "Clothing and accessories",
            featured: false,
            contact: "+256 772 678901",
            location: "Lira Market Area"
        },
        {
            id: 7,
            name: "Lira Business Advisory",
            category: "services",
            description: "Business consulting and accounting",
            featured: true,
            contact: "+256 772 789012",
            location: "ICT & Innovation Hub"
        },
        {
            id: 8,
            name: "Northern IT Solutions",
            category: "services",
            description: "Computer services and internet",
            featured: false,
            contact: "+256 772 890123",
            location: "ICT & Innovation Hub"
        },
        {
            id: 9,
            name: "Lango Legal Associates",
            category: "services",
            description: "Legal and corporate services",
            featured: false,
            contact: "+256 772 901234",
            location: "Town Center"
        },
        {
            id: 10,
            name: "Lira Comfort Hotel",
            category: "hospitality",
            description: "Accommodation and conference facilities",
            featured: true,
            contact: "+256 772 345678",
            location: "Town Center"
        },
        {
            id: 11,
            name: "Northern Furniture Factory",
            category: "manufacturing",
            description: "Wood furniture production",
            featured: false,
            contact: "+256 772 456789",
            location: "Lira Industrial Park"
        },
        {
            id: 12,
            name: "Sunrise Bakery",
            category: "manufacturing",
            description: "Bread and pastry production",
            featured: true,
            contact: "+256 772 567890",
            location: "Main Street, Lira"
        }
    ];

    // Industrial zones data
    const industrialZones = {
        'industrial-park': {
            name: 'Lira Industrial Park',
            established: '2015',
            description: 'Primary processing and manufacturing hub with modern infrastructure',
            features: [
                'Available spaces: 7 plots',
                '24/7 electricity supply',
                'Shared waste management facility',
                'Security services'
            ]
        },
        'terminal': {
            name: 'Railway Terminal Business Zone',
            established: '2019',
            description: 'Logistics and warehouse facilities with railway connection',
            features: [
                'Available spaces: 3 warehouses',
                'Loading/unloading equipment',
                'Container storage area',
                'Customs clearance office'
            ]
        },
        'agribusiness': {
            name: 'Agribusiness Processing Zone',
            established: '2020',
            description: 'Food processing and agricultural equipment with cold storage',
            features: [
                'Available spaces: 12 plots',
                'Cold storage facilities',
                'Quality testing laboratory',
                'Packaging center'
            ]
        },
        'ict-hub': {
            name: 'Lira ICT & Innovation Hub',
            established: '2023',
            description: 'Technology and service businesses with high-speed internet',
            features: [
                'Available spaces: 5 office units',
                'Co-working spaces',
                'Training facilities',
                'Business incubation support'
            ]
        }
    };

    // Function to create business card HTML
    function createBusinessCard(business) {
        return `
            <div class="list-group-item business-card" data-id="${business.id}" data-category="${business.category}">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">${business.name}</h6>
                    ${business.featured ? '<small><i class="fas fa-star text-warning"></i> Featured</small>' : ''}
                </div>
                <p class="mb-1"><small>${business.description}</small></p>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <small class="text-muted"><i class="fas fa-map-marker-alt"></i> ${business.location}</small>
                    <button class="btn btn-sm btn-outline-primary view-details" data-id="${business.id}">Details</button>
                </div>
            </div>
        `;
    }

    // Function to load businesses into tabs
    function loadBusinesses() {
        const allBusinessesHTML = businesses.map(createBusinessCard).join('');
        document.getElementById('allBusinesses').innerHTML = allBusinessesHTML;
        
        const agricultureBusinesses = businesses.filter(b => b.category === 'agriculture');
        document.getElementById('agricultureBusinesses').innerHTML = 
            agricultureBusinesses.length > 0 
                ? agricultureBusinesses.map(createBusinessCard).join('') 
                : '<p class="text-center py-3">No agriculture businesses found.</p>';
        
        const retailBusinesses = businesses.filter(b => b.category === 'retail');
        document.getElementById('retailBusinesses').innerHTML = 
            retailBusinesses.length > 0 
                ? retailBusinesses.map(createBusinessCard).join('') 
                : '<p class="text-center py-3">No retail businesses found.</p>';
        
        const serviceBusinesses = businesses.filter(b => b.category === 'services');
        document.getElementById('servicesBusinesses').innerHTML = 
            serviceBusinesses.length > 0 
                ? serviceBusinesses.map(createBusinessCard).join('') 
                : '<p class="text-center py-3">No service businesses found.</p>';
    }

    // Load businesses initially
    loadBusinesses();

    // Search functionality
    document.getElementById('searchBtn').addEventListener('click', function() {
        performSearch();
    });

    document.getElementById('searchBusiness').addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            performSearch();
        }
    });

    function performSearch() {
        const searchTerm = document.getElementById('searchBusiness').value.toLowerCase();
        const categoryFilter = document.getElementById('categoryFilter').value;
        
        const filteredBusinesses = businesses.filter(business => {
            const matchesSearch = business.name.toLowerCase().includes(searchTerm) || 
                                 business.description.toLowerCase().includes(searchTerm);
            
            const matchesCategory = categoryFilter === 'all' || business.category === categoryFilter;
            
            return matchesSearch && matchesCategory;
        });
        
        document.getElementById('allBusinesses').innerHTML = 
            filteredBusinesses.length > 0 
                ? filteredBusinesses.map(createBusinessCard).join('') 
                : '<p class="text-center py-3">No businesses found matching your search criteria.</p>';
        
        // Show the All tab
        document.querySelector('#directoryTabs button[data-bs-target="#all"]').click();
    }

    // Category filter
    document.getElementById('categoryFilter').addEventListener('change', function() {
        performSearch();
    });

    // Business details modal functionality
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('view-details') || e.target.parentElement.classList.contains('view-details')) {
            const button = e.target.classList.contains('view-details') ? e.target : e.target.parentElement;
            const businessId = parseInt(button.getAttribute('data-id'));
            const business = businesses.find(b => b.id === businessId);
            
            if (business) {
                // Show business details in a modal or expand the card
                alert(`
                    ${business.name}
                    Category: ${business.category.charAt(0).toUpperCase() + business.category.slice(1)}
                    Description: ${business.description}
                    Location: ${business.location}
                    Contact: ${business.contact}
                `);
                // In a real implementation, this would use a proper modal
            }
        }
    });

   

    // Download Investment Guide PDF functionality
    document.getElementById('downloadInvestmentGuide').addEventListener('click', function(e) {
        e.preventDefault();
        // In a real implementation, this would download a PDF file
        // For demo purposes, we'll show an alert
        alert('Investment Guide PDF is being downloaded...');
        
        // Simulate download
        setTimeout(function() {
            alert('Download complete! The investment guide has been saved to your device.');
        }, 1500);
    });

  
});
</script>

      


    </div>

    <!-- footer.php -->
    
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