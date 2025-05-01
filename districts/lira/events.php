<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Lira District Chamber of Commerce</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #1a5276;
            --secondary-color: #2980b9;
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
        
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('images/events-header.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            margin-bottom: 50px;
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
            margin-bottom: 30px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .event-card .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        
        .event-date {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            color: var(--primary-color);
            padding: 10px 15px;
            text-align: center;
            border-radius: 5px;
        }
        
        .event-day {
            font-size: 1.8rem;
            font-weight: 700;
            line-height: 1;
        }
        
        .event-month {
            font-size: 1rem;
            text-transform: uppercase;
        }
        
        .event-time, .event-location {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: #666;
        }
        
        .event-time i, .event-location i {
            margin-right: 10px;
            color: var(--primary-color);
        }
        
        .event-category {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: var(--accent-color);
            color: white;
            padding: 5px 10px;
            font-size: 0.8rem;
            border-radius: 3px;
        }
        
        .nav-pills .nav-link {
            color: #666;
            border-radius: 30px;
            padding: 8px 20px;
            margin-right: 10px;
            margin-bottom: 10px;
        }
        
        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
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
        
        .calendar-header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px;
            text-align: center;
        }
        
        .calendar-day {
            height: 120px;
            border: 1px solid #ddd;
            padding: 10px;
            position: relative;
        }
        
        .calendar-day:hover {
            background-color: var(--light-bg);
        }
        
        .calendar-day-number {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .has-event {
            background-color: rgba(41, 128, 185, 0.1);
        }
        
        .event-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: var(--accent-color);
            border-radius: 50%;
            margin-right: 5px;
        }
        
        .event-preview {
            font-size: 0.8rem;
            color: var(--primary-color);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 3px;
        }
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="events.php">Events</a>
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
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary" href="membership.php">Join Chamber</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="page-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Chamber Events</h1>
            <p class="lead">Connect, learn, and grow with our business community</p>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mb-5">
        <!-- View Toggle and Filter -->
        <div class="row mb-4">
            <div class="col-md-6">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-list-tab" data-bs-toggle="pill" data-bs-target="#pills-list" type="button" role="tab" aria-controls="pills-list" aria-selected="true">
                            <i class="fas fa-list me-2"></i>List View
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-calendar-tab" data-bs-toggle="pill" data-bs-target="#pills-calendar" type="button" role="tab" aria-controls="pills-calendar" aria-selected="false">
                            <i class="fas fa-calendar-alt me-2"></i>Calendar View
                        </button>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-md-end mb-3">
                    <select class="form-select w-auto" id="eventCategoryFilter">
                        <option value="all">All Categories</option>
                        <option value="networking">Networking</option>
                        <option value="training">Training & Workshops</option>
                        <option value="community">Community Events</option>
                        <option value="business">Business Expos</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="pills-tabContent">
            <!-- List View -->
            <div class="tab-pane fade show active" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
                <!-- Featured Event -->
                <div class="row mb-5">
                    <div class="col-12">
                        <h2 class="section-title">Featured Event</h2>
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="images/featured-event.jpg" class="img-fluid rounded-start h-100 w-100" style="object-fit: cover;" alt="Annual Business Expo">
                                    <div class="event-category">Business Expo</div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body p-4">
                                        <h3 class="card-title mb-3">Annual Lira Business Expo 2025</h3>
                                        <div class="event-time mb-3">
                                            <i class="far fa-calendar-alt"></i>
                                            <div>
                                                <strong>April 5-6, 2025</strong><br>
                                                9:00 AM - 5:00 PM
                                            </div>
                                        </div>
                                        <div class="event-location mb-3">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <div>
                                                <strong>Lira Exhibition Grounds</strong><br>
                                                Plot 45, Main Street, Lira District

                                                </div>
                                        </div>
                                        <p class="card-text">The Annual Lira Business Expo brings together businesses from across the district to showcase their products and services. This two-day event features exhibitor booths, business seminars, networking opportunities, and more. Don't miss this chance to promote your business, meet potential clients, and learn from industry experts.</p>
                                        <div class="d-flex align-items-center justify-content-between mt-4">
                                            <div>
                                                <span class="badge bg-warning text-dark me-2">130 Exhibitors</span>
                                                <span class="badge bg-info text-dark">20+ Speakers</span>
                                            </div>
                                            <a href="event-details.php?id=101" class="btn btn-primary">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <h2 class="section-title">Upcoming Events</h2>
                <div class="row">
                    <?php
                    // In a real application, this would be fetched from a database
                    $upcoming_events = [
                        [
                            'id' => 1,
                            'title' => 'Business Networking Breakfast',
                            'date' => 'March 10, 2025',
                            'day' => '10',
                            'month' => 'Mar',
                            'time' => '7:30 AM - 9:00 AM',
                            'location' => 'Grand Hotel Lira',
                            'address' => '123 Main Road, Lira',
                            'description' => 'Start your day with meaningful connections! Join business leaders from across Lira District for breakfast and structured networking.',
                            'image' => 'images/event1.jpg',
                            'category' => 'Networking'
                        ],
                        [
                            'id' => 2,
                            'title' => 'Digital Marketing Workshop',
                            'date' => 'March 15, 2025',
                            'day' => '15',
                            'month' => 'Mar',
                            'time' => '2:00 PM - 4:00 PM',
                            'location' => 'Lira Business Center',
                            'address' => '45 Commerce Avenue, Lira',
                            'description' => 'Learn practical digital marketing strategies to grow your business online. Topics include social media marketing, SEO, and content creation.',
                            'image' => 'images/event2.jpg',
                            'category' => 'Training'
                        ],
                        [
                            'id' => 3,
                            'title' => 'Small Business Financing Forum',
                            'date' => 'March 20, 2025',
                            'day' => '20',
                            'month' => 'Mar',
                            'time' => '10:00 AM - 12:00 PM',
                            'location' => 'Lira Community Hall',
                            'address' => '78 Unity Road, Lira',
                            'description' => 'Discover financing options available for small businesses in Lira District. Representatives from various financial institutions will be present.',
                            'image' => 'images/event3.jpg',
                            'category' => 'Business'
                        ],
                        [
                            'id' => 4,
                            'title' => 'Community Clean-Up Initiative',
                            'date' => 'March 25, 2025',
                            'day' => '25',
                            'month' => 'Mar',
                            'time' => '9:00 AM - 12:00 PM',
                            'location' => 'Lira Town Center',
                            'address' => 'Central Business District, Lira',
                            'description' => 'Join fellow business owners in our quarterly community clean-up. Help make Lira a cleaner, more attractive place to do business.',
                            'image' => 'images/event4.jpg',
                            'category' => 'Community'
                        ],
                        [
                            'id' => 5,
                            'title' => 'Tax Compliance Workshop',
                            'date' => 'March 30, 2025',
                            'day' => '30',
                            'month' => 'Mar',
                            'time' => '2:00 PM - 4:00 PM',
                            'location' => 'Lira Business Center',
                            'address' => '45 Commerce Avenue, Lira',
                            'description' => 'Stay compliant with tax regulations. This workshop will cover tax filing procedures, deductions, and recent changes in tax law.',
                            'image' => 'images/event5.jpg',
                            'category' => 'Training'
                        ],
                        [
                            'id' => 6,
                            'title' => 'Business After Hours Mixer',
                            'date' => 'April 2, 2025',
                            'day' => '02',
                            'month' => 'Apr',
                            'time' => '5:30 PM - 7:30 PM',
                            'location' => 'Sunset Lounge',
                            'address' => '90 Riverside Drive, Lira',
                            'description' => 'Unwind and network in a relaxed setting. Complimentary drinks and appetizers will be served. Bring your business cards!',
                            'image' => 'images/event6.jpg',
                            'category' => 'Networking'
                        ]
                    ];

                    foreach ($upcoming_events as $event) {
                        echo '<div class="col-md-6 col-lg-4 event-item" data-category="'.strtolower($event['category']).'">
                                <div class="card event-card">
                                    <div class="position-relative">
                                        <img src="'.$event['image'].'" class="card-img-top" alt="'.$event['title'].'">
                                        <div class="event-date">
                                            <div class="event-day">'.$event['day'].'</div>
                                            <div class="event-month">'.$event['month'].'</div>
                                        </div>
                                        <div class="event-category">'.htmlspecialchars($event['category']).'</div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">'.$event['title'].'</h5>
                                        <div class="event-time">
                                            <i class="far fa-clock"></i>
                                            <span>'.$event['time'].'</span>
                                        </div>
                                        <div class="event-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>'.$event['location'].'</span>
                                        </div>
                                        <p class="card-text">'.$event['description'].'</p>
                                        <a href="event-details.php?id='.$event['id'].'" class="btn btn-outline-primary">View Details</a>
                                    </div>
                                </div>
                              </div>';
                    }
                    ?>
                </div>

                <!-- Pagination -->
                <nav aria-label="Events pagination" class="mt-4">
                    <ul class="pagination justify-content-center">
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

            <!-- Calendar View -->
            <div class="tab-pane fade" id="pills-calendar" role="tabpanel" aria-labelledby="pills-calendar-tab">
                <div class="calendar-controls d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0">March 2025</h3>
                    <div>
                        <button class="btn btn-outline-secondary"><i class="fas fa-chevron-left"></i></button>
                        <button class="btn btn-outline-primary mx-2">Today</button>
                        <button class="btn btn-outline-secondary"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="calendar-header">
                                <th>Sunday</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->
                            <tr>
                                <td class="calendar-day text-muted">
                                    <div class="calendar-day-number">23</div>
                                </td>
                                <td class="calendar-day text-muted">
                                    <div class="calendar-day-number">24</div>
                                </td>
                                <td class="calendar-day text-muted">
                                    <div class="calendar-day-number">25</div>
                                </td>
                                <td class="calendar-day text-muted">
                                    <div class="calendar-day-number">26</div>
                                </td>
                                <td class="calendar-day text-muted">
                                    <div class="calendar-day-number">27</div>
                                </td>
                                <td class="calendar-day text-muted">
                                    <div class="calendar-day-number">28</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">1</div>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">2</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">3</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">4</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">5</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">6</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">7</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">8</div>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">9</div>
                                </td>
                                <td class="calendar-day has-event">
                                    <div class="calendar-day-number">10</div>
                                    <div class="event-preview">
                                        <span class="event-dot"></span>7:30 AM: Business Networking Breakfast
                                    </div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">11</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">12</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">13</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">14</div>
                                </td>
                                <td class="calendar-day has-event">
                                    <div class="calendar-day-number">15</div>
                                    <div class="event-preview">
                                        <span class="event-dot"></span>2:00 PM: Digital Marketing Workshop
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">16</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">17</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">18</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">19</div>
                                </td>
                                <td class="calendar-day has-event">
                                    <div class="calendar-day-number">20</div>
                                    <div class="event-preview">
                                        <span class="event-dot"></span>10:00 AM: Small Business Financing Forum
                                    </div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">21</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">22</div>
                                </td>
                            </tr>
                            <!-- Row 5 -->
                            <tr>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">23</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">24</div>
                                </td>
                                <td class="calendar-day has-event">
                                    <div class="calendar-day-number">25</div>
                                    <div class="event-preview">
                                        <span class="event-dot"></span>9:00 AM: Community Clean-Up
                                    </div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">26</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">27</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">28</div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">29</div>
                                </td>
                            </tr>
                            <!-- Row 6 -->
                            <tr>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">30</div>
                                    <div class="event-preview">
                                        <span class="event-dot"></span>2:00 PM: Tax Compliance Workshop
                                    </div>
                                </td>
                                <td class="calendar-day">
                                    <div class="calendar-day-number">31</div>
                                </td>
                                <td class="calendar-day text-muted">
                                    <div class="calendar-day-number">1</div>
                                </td>
                                <td class="calendar-day text-muted has-event">
                                    <div class="calendar-day-number">2</div>
                                    <div class="event-preview">
                                        <span class="event-dot"></span>5:30 PM: Business After Hours
                                    </div>
                                </td>
                                <td class="calendar-day text-muted">
                                    <div class="calendar-day-number">3</div>
                                </td>
                                <td class="calendar-day text-muted">
                                    <div class="calendar-day-number">4</div>
                                </td>
                                <td class="calendar-day text-muted">
                                    <div class="calendar-day-number">5</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Event Registration -->
        <div class="bg-light p-4 rounded-3 mt-5">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h3>Want to host an event?</h3>
                    <p>If you're a Chamber member and want to host or propose an event, we'd love to hear from you. Click below to submit your event proposal.</p>
                </div>
                <div class="col-md-5 text-md-end mt-3 mt-md-0">
                    <a href="propose-event.php" class="btn btn-primary">Propose an Event</a>
                    <a href="event-guidelines.php" class="btn btn-outline-secondary ms-2">View Guidelines</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Past Events Section -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="section-title">Past Events</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="images/past-event1.jpg" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Annual Business Dinner">
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <h5 class="card-title">Annual Business Dinner 2024</h5>
                                    <p class="card-text small text-muted">December 15, 2024</p>
                                    <p class="card-text">Our annual gala celebrating business excellence in Lira District, featuring awards and special guest speakers.</p>
                                    <a href="past-event-details.php?id=95" class="btn btn-sm btn-outline-secondary">View Photos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="images/past-event2.jpg" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Women in Business Forum">
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <h5 class="card-title">Women in Business Forum</h5>
                                    <p class="card-text small text-muted">November 20, 2024</p>
                                    <p class="card-text">A platform for female entrepreneurs to network, share experiences, and learn from established business leaders.</p>
                                    <a href="past-event-details.php?id=94" class="btn btn-sm btn-outline-secondary">View Photos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="past-events.php" class="btn btn-outline-primary">View All Past Events</a>
            </div>
        </div>
    </section>

    <!-- Event Sponsorship -->
    <section class="container my-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">Event Sponsorship</h2>
                <p>Sponsoring Chamber events gives your business valuable exposure to the Lira business community. We offer various sponsorship levels to fit different budgets and marketing objectives.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Brand visibility at well-attended business events</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Opportunities to connect with potential clients and partners</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Recognition in Chamber publications and website</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Demonstrate your commitment to the local business community</li>
                </ul>
                <a href="sponsorship-opportunities.php" class="btn btn-primary mt-3">Learn About Sponsorship</a>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <img src="images/sponsorship.jpg" class="img-fluid rounded" alt="Event Sponsorship">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="images/logo-white.png" alt="Lira Chamber of Commerce Logo" class="mb-4" height="60">
                    <p>The Lira District Chamber of Commerce is dedicated to promoting business growth and economic development in our community.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="index.php" class="text-white">Home</a></li>
                        <li class="mb-2"><a href="events.php" class="text-white">Events</a></li>
                        <li class="mb-2"><a href="resources.php" class="text-white">Resources</a></li>
                        <li class="mb-2"><a href="about.php" class="text-white">About Us</a></li>
                        <li class="mb-2"><a href="contact.php" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 Business Avenue, Lira District</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> +256 777 123 456</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@liracc.org</li>
                        <li class="mb-2"><i class="fas fa-clock me-2"></i> Mon-Fri: 8:00 AM - 5:00 PM</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Member Login</h5>
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-sm" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-sm" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-light btn-sm">Login</button>
                        <div class="mt-2">
                            <a href="forgot-password.php" class="text-white-50 small">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <?php echo date('Y'); ?> Lira District Chamber of Commerce. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="privacy-policy.php" class="text-white-50 me-3">Privacy Policy</a>
                    <a href="terms-of-service.php" class="text-white-50">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Event filtering functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Event category filter
            const categoryFilter = document.getElementById('eventCategoryFilter');
            const eventItems = document.querySelectorAll('.event-item');
            
            categoryFilter.addEventListener('change', function() {
                const selectedCategory = this.value;
                
                eventItems.forEach(item => {
                    if (selectedCategory === 'all' || item.dataset.category === selectedCategory) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
            
            // Calendar day hover effect for events
            const calendarDays = document.querySelectorAll('.calendar-day');
            
            calendarDays.forEach(day => {
                day.addEventListener('mouseover', function() {
                    if (this.classList.contains('has-event')) {
                        this.style.cursor = 'pointer';
                    }
                });
                
                day.addEventListener('click', function() {
                    if (this.classList.contains('has-event')) {
                        // In a real application, this would open an event details popup
                        console.log('Day clicked with events');
                    }
                });
            });
        });
    </script>
</body>
</html>