<?php
require_once 'php/db_con.php'; // Include the database connection

// Fetch posts from the database
$sql = "SELECT * FROM updates ORDER BY created_at DESC";
$result = $conn->query($sql);

// Pagination setup
$limit = 6; // Limit per page
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
  <title>news - UNCCI - Lango Region</title>
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

    /* Pagination Container */
    .pagination {
      display: flex;
      list-style: none;
      padding: 0;
      margin: 0;
    }

    /* Pagination Item */
    .page-item {
      margin: 0 5px;
    }

    /* Pagination Link */
    .page-link {
      display: block;
      padding: 8px 12px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      text-decoration: none;
      color: #333;
      font-weight: 500;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Hover Effect */
    .page-link:hover {
      background-color: #C1053F;
      /* Core Color */
      color: white;
    }

    /* Active Page Styling */
    .page-link.active {
      background-color: #C1053F;
      /* Core Color */
      color: white;
      border-color: #C1053F;
    }

    /* Disabled State */
    .page-item.disabled .page-link {
      background-color: #f0f0f0;
      color: #ddd;
      cursor: not-allowed;
    }

    /* Responsive Styles */
    @media (max-width: 767px) {
      .pagination {
        flex-wrap: wrap;
      }
    }
  </style>
</head>


<body class="blog-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">
    <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/UNCCI-logo.png" alt="" />
        <h1 class="sitename">Lango Region</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="dropdown">
            <a href="about.php"><span>About</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="about.php #who-we-are">Who We Are</a></li>
              <li><a href="about.php #team">Board of Directors</a></li>
              <li class="dropdown">
                <a href="about.php #clients"><span>Our Partners</span>
                </a>

              </li>
            </ul>
          </li>
          <li><a href="services.html #features">Districts</a></li>
          <li><a href="services.html">Services</a></li>
          <!-- <li><a href="portfolio.html">Portfolio</a></li> -->
          <li><a href="membership.php">Membership</a></li>
          <!-- <li><a href="services.html">Services</a></li> -->
          <li><a href="new&media.php" class="active">News&Media</a></li>
          <li><a href="contact.html">Contact</a></li>
          <a href="membership.php" class="join-now-nav">JOIN NOW</a>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>


  <main class="main">

    <!-- Page Title -->
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
    </div><!-- End Page Title -->

    <!-- News Posts Section -->
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
          <!-- End post list item -->

          <!-- End post list item -->
        </div>
      </div>
    </section>

    <!-- News Pagination Section -->
    <section id="news-pagination" class="news-pagination section">
      <div class="container">
        <div class="d-flex justify-content-center">
          <ul class="pagination">
            <!-- Previous Button -->
            <?php if ($page > 1): ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                  <i class="bi bi-chevron-left"></i>
                </a>
              </li>
            <?php else: ?>
              <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                  <i class="bi bi-chevron-left"></i>
                </a>
              </li>
            <?php endif; ?>

            <!-- Page Numbers -->
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
              <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
              </li>
            <?php endfor; ?>

            <!-- Next Button -->
            <?php if ($page < $total_pages): ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                  <i class="bi bi-chevron-right"></i>
                </a>
              </li>
            <?php else: ?>
              <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next">
                  <i class="bi bi-chevron-right"></i>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </section>

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
        <!-- <div class="col-lg-4 col-md-12 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>
              Subscribe to our newsletter and receive the latest news about our
              products and services!
            </p>
            <form
              action="forms/newsletter.php"
              method="post"
              class="php-email-form"
            >
              <div class="newsletter-form">
                <input type="email" name="email" /><input
                  type="submit"
                  value="Subscribe"
                />
              </div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">
                Your subscription request has been sent. Thank you!
              </div>
            </form>
          </div> -->
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