<?php
require_once 'php/db_con.php'; // Include the database connection

// Fetch posts from the database
$sql = "SELECT * FROM updates ORDER BY created_at DESC";
$result = $conn->query($sql);

// Pagination setup
$limit = 3; // Limit per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$start = ($page - 1) * $limit; // Start for the LIMIT query

// Fetch the total number of posts for pagination
$sql_count = "SELECT COUNT(*) as total FROM updates";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_posts = $row_count['total']; // Total posts

// Calculate total pages
$total_pages = ceil($total_posts / $limit);

// Fetch posts for the current page
$sql = "SELECT * FROM updates ORDER BY created_at DESC LIMIT $start, $limit";
$result = $conn->query($sql);
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
  </style>
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">
      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/UNCCI-logo.png" alt="" />
        <h1 class="sitename">Lango Region</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li class="dropdown">
            <a href="about.php"><span>About</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="about.php #who-we-are">Who We Are</a></li>
              <li><a href="about.php #team">Board of Directors</a></li>
              <li class="dropdown">
                <a href="about.php #clients"><span>Our Partners</span>
                  <!-- <i class="bi bi-chevron-down toggle-dropdown"></i
                  > -->
                </a>
                <!-- <ul>
                    <li><a href="#">Deep Dropdown 1</a></li>
                    <li><a href="#">Deep Dropdown 2</a></li>
                    <li><a href="#">Deep Dropdown 3</a></li>
                    <li><a href="#">Deep Dropdown 4</a></li>
                    <li><a href="#">Deep Dropdown 5</a></li>
                  </ul> -->
              </li>
            </ul>
          </li>
          <li><a href="services.html #features">Districts</a></li>
          <li><a href="services.html">Services</a></li>
          <!-- <li><a href="portfolio.html">Portfolio</a></li> -->
          <li><a href="membership.php">Membership</a></li>
          <li><a href="new&media.php">News&Media</a></li>
          <li><a href="contact.html">Contact</a></li>
          <a href="" class="join-now-nav">JOIN NOW</a>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <div
        id="hero-carousel"
        class="carousel slide carousel-fade"
        data-bs-ride="carousel"
        data-bs-interval="5000">
        <div class="carousel-item active">
          <img src="assets/img/hero-carousel/coffee.png" alt="" />
          <div class="container">
            <h2>Enhancing Business Opportunities in Lango Region</h2>
            <p>Transforming Lango into a Thriving Economic Hub</p>
            <a href="about.html" class="btn-get-started">Learn more about us</a>
          </div>
        </div>
        <!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/technology.avif" alt="" />
          <div class="container">
            <h2>Technological innovation and digital transformation</h2>
            <p>
              Support the creation of agricultural tech startups focused on
              innovations like digital traceability, blockchain, and precision
              farming.
            </p>
            <a href="about.html" class="btn-get-started">Learn more about us</a>
          </div>
        </div>
        <!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/financial.avif" alt="" />
          <div class="container">
            <h2>Financial Inclusion and SME Support</h2>
            <p>
              Help strengthen local cooperatives and associations to increase
              collective action.
            </p>
            <a href="about.php" class="btn-get-started">Learn More</a>
          </div>
        </div>
        <!-- End Carousel Item -->


        <div class="carousel-item">
          <img src="assets/img/hero-carousel/sunflowers.jpg" alt="" />
          <div class="container">
            <h2>Fostering Growth and Opportunity in Lango's Business Landscape</h2>
            <p>
              Together, we cultivate a thriving community, where innovation and collaboration bloom.
            </p>
            <a href="about.php" class="btn-get-started">Learn More</a>
          </div>
        </div>
        <!-- End Carousel Item -->


        <div class="carousel-item">
          <img src="assets/img/hero-carousel/soybeans.avif" alt="" />
          <div class="container">
            <h2>Fostering Growth and Opportunity in Lango's Business Landscape</h2>
            <p>
              Together, we cultivate a thriving community, where innovation and collaboration bloom.
            </p>
            <a href="about.php" class="btn-get-started">Learn More</a>
          </div>
        </div>
        <!-- End Carousel Item -->


        <div class="carousel-item">
          <img src="assets/img/hero-carousel/cows.jpg" alt="" />
          <div class="container">
            <h2>Fostering Growth and Opportunity in Lango's Business Landscape</h2>
            <p>
              Together, we cultivate a thriving community, where innovation and collaboration bloom.
            </p>
            <a href="about.php" class="btn-get-started">Learn More</a>
          </div>
        </div>
        <!-- End Carousel Item -->


        <div class="carousel-item">
          <img src="assets/img/hero-carousel/sheanuts.jpg" alt="" />
          <div class="container">
            <h2>Fostering Growth and Opportunity in Lango's Business Landscape</h2>
            <p>
              Together, we cultivate a thriving community, where innovation and collaboration bloom.
            </p>
            <a href="about.php" class="btn-get-started">Learn More</a>
          </div>
        </div>
        <!-- End Carousel Item -->

        <a
          class="carousel-control-prev"
          href="#hero-carousel"
          role="button"
          data-bs-slide="prev">
          <span
            class="carousel-control-prev-icon bi bi-chevron-left"
            aria-hidden="true"></span>
        </a>

        <a
          class="carousel-control-next"
          href="#hero-carousel"
          role="button"
          data-bs-slide="next">
          <span
            class="carousel-control-next-icon bi bi-chevron-right"
            aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>
      </div>
    </section>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container">
        <div class="row position-relative">
          <div
            class="col-lg-7 about-img"
            data-aos="zoom-out"
            data-aos-delay="200">
            <img src="assets/img/about.png" alt="Dr. Morris Chris Ongom" />

          </div>
          <p><strong>Dr. Morris Chris Ongom</strong></p>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <h2 class="inner-title">Message from the director</h2>
            <div class="our-story">
              <!-- <h4>Est 1988</h4> -->
              <!-- <h3>Our Story</h3> -->
              <p>
                Dear Esteemed Members and Stakeholders, <br>
                It is with great enthusiasm that I introduce the Uganda National Chamber of Commerce
                and Industry, Lira Branch Board of Directors' Leadership Charter for 2024. This charter is
                not merely a set of guidelines; it embodies our unwavering commitment to shaping a
                future where our business community thrives, both locally and on the global stage.
                Our aspiration is clear: to lead as the foremost private sector body in Lira and the
                broader Lango region, empowering our members with an influential network for business
                growth that spans local, regional, and global markets. Guided by this aspiration, our
                mission is to champion the interests of our members, driving economic prosperity through
                strategic partnerships, advocacy for favorable policies, and robust capacity building
                initiatives.
                This leadership charter is pivotal to realizing our strategic future. It outlines the roles and
                responsibilities of our board members with precision, ensuring effective governance and
                decision-making. It sets forth clear standards for conducting meetings, implementing
                resolutions, and fostering accountability at every level. Upholding our core values of
                integrity, inclusivity, and ethical conduct, this charter will serve as our compass, guiding us
                towards sustainable growth and resilience in the face of challenges and opportunities in
                the 21st century.
                As the Chairman, I am dedicated to fostering a collaborative environment where
                innovation thrives, opportunities abound, and challenges are met with resilience,
                innovations and partnerships locally and abroad. Together, we will leverage our collective
                strengths to create an ecosystem where businesses flourish, jobs are created, and
                communities prosper.
                I urge each of you to embrace this charter wholeheartedly, as it represents our collective
                commitment to excellence and the future prosperity of our region. Let us stand united in
                advancing the Uganda National Chamber of Commerce and Industry, Lira Branch, to new
                heights of success and impact.
                Thank you for your unwavering dedication and continued support.
              </p>
              <!-- <ul>
                <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commo</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
              </ul> -->
              <!-- <p>
                  Vitae autem velit excepturi fugit. Animi ad non. Eligendi et
                  non nesciunt suscipit repellendus porro in quo eveniet.
                  Molestias in maxime doloremque.
                </p> -->

              <div
                class="watch-video d-flex align-items-center position-relative">
                <i class="bi bi-play-circle"></i>
                <a
                  href="https://youtu.be/O9DJu_aAMpU?si=U1ArWP-u6g3zMbaT"
                  class="glightbox stretched-link">Watch Video</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /About Section -->


    <section id="blog-posts" class="blog-posts section">
      <div class="container">
        <div class="row gy-4">
          <div class="container section-title" data-aos="fade-up">
            <h2>News & Media</h2>
            <p>
              Stay up-to-date with the latest news, insights, and updates from
              our company. Explore our media coverage, press releases, and
              announcements to learn more about our achievements and future
              endeavors.
            </p>
          </div>

          <?php
          if ($result->num_rows > 0) {
            // Output data for each post
            while ($row = $result->fetch_assoc()) {
              echo '
                              <div class="col-lg-4">
                                  <article class="position-relative h-100">
                                      <div class="post-img position-relative overflow-hidden">
                                          <img src="' . $row['image'] . '" class="img-fluid" alt="News Image">
                                          <span class="post-date">' . date('F j', strtotime($row['created_at'])) . '</span>
                                      </div>
                                      <div class="post-content d-flex flex-column">
                                          <h3 class="post-title">' . $row['title'] . '</h3>
                                          <div class="meta d-flex align-items-center">
                                              <div class="d-flex align-items-center">
                                                  <i class="bi bi-person"></i> <span class="ps-2">' . $row['author'] . '</span>
                                              </div>
                                              <span class="px-3 text-black-50">/</span>
                                              <div class="d-flex align-items-center">
                                                  <i class="bi bi-folder2"></i> <span class="ps-2">' . $row['category'] . '</span>
                                              </div>
                                          </div>
                                          <p>' . substr($row['content'], 0, 100) . '...</p>
                                          <hr>
                                          <a href="news-media-details.php?id=' . $row['id'] . '" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                                      </div>
                                  </article>
                              </div>';
            }
          } else {
            echo "<p>No news available at the moment.</p>";
          }
          // Close the connection
          $conn->close();
          ?>
        </div>
      </div>
    </section>


    <!-- Clients Section -->
    <section id="clients" class="clients section" id="clients">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Partners</h2>
        <p>
          We are proud to collaborate with exceptional partners who share our
          commitment to innovation, excellence, and delivering outstanding
          results. Together, we create value and drive success in every
          project we undertake.
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0 clients-wrap">
          <div class="col-xl-3 col-md-4 client-logo">
            <img
              src="assets/img/partners/partner-1.jpg"
              class="img-fluid"
              alt="" />
          </div>
          <!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img
              src="assets/img/partners/partner-2.jpg"
              class="img-fluid"
              alt="" />
          </div>
          <!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img
              src="assets/img/partners/partner-3.png"
              class="img-fluid"
              alt="" />
          </div>
          <!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img
              src="assets/img/partners/partner-4.png"
              class="img-fluid"
              alt="" />
          </div>
          <!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img
              src="assets/img/partners/partner-5.jpg"
              class="img-fluid"
              alt="" />
          </div>
          <!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img
              src="assets/img/partners/partner-6.jpeg"
              class="img-fluid"
              alt="" />
          </div>
          <!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img
              src="assets/img/partners/partner-7.png"
              class="img-fluid"
              alt="" />
          </div>
          <!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img
              src="assets/img/partners/partner-8.jpg"
              class="img-fluid"
              alt="" />
          </div>
          <!-- End Client Item -->
        </div>
      </div>
    </section>
    <!-- /Clients Section -->
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

  <!-- Scroll Top -->
  <a
    href="#"
    id="scroll-top"
    class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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