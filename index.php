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
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
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
            <li><a href="index.php"  class="active">Home</a></li>
            <li class="dropdown">
              <a href="about.php"
                ><span>About</span>
                <i class="bi bi-chevron-down toggle-dropdown"></i
              ></a>
              <ul>
                <li><a href="about.php #who-we-are">Who We Are</a></li>
                <li><a href="about.php #team">Board of Directors</a></li>
                <li class="dropdown">
                  <a href="about.php #clients"
                    ><span>Our Partners</span>
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
          data-bs-interval="5000"
        >
          <div class="carousel-item active">
            <img src="assets/img/hero-carousel/coffee.png" alt="" />
            <div class="container">
              <h2>Enhancing Business Opportunities in Lango Region</h2>
              <p>Transforming Lango into a Thriving Economic Hub</p>
              <a href="about.html" class="btn-get-started"
                >Learn more about us</a
              >
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
              <a href="about.html" class="btn-get-started"
                >Learn more about us</a
              >
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
            data-bs-slide="prev"
          >
            <span
              class="carousel-control-prev-icon bi bi-chevron-left"
              aria-hidden="true"
            ></span>
          </a>

          <a
            class="carousel-control-next"
            href="#hero-carousel"
            role="button"
            data-bs-slide="next"
          >
            <span
              class="carousel-control-next-icon bi bi-chevron-right"
              aria-hidden="true"
            ></span>
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
              data-aos-delay="200"
            >
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
                  class="watch-video d-flex align-items-center position-relative"
                >
                  <i class="bi bi-play-circle"></i>
                  <a
                    href="https://youtu.be/O9DJu_aAMpU?si=U1ArWP-u6g3zMbaT"
                    class="glightbox stretched-link"
                    >Watch Video</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /About Section -->

      <!-- <section id="about" class="about section">

      <div class="container">

        <div class="row position-relative">

          <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200"><img src="assets/img/about.jpg"></div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <h2 class="inner-title">Message from the director</h2>
            <div class="our-story"> -->
      <!-- <h4>Est 1988</h4> -->
      <!-- <h3>Our Story</h3>
              <p>Inventore aliquam beatae at et id alias. Ipsa dolores amet consequuntur minima quia maxime autem. Quidem id sed ratione. Tenetur provident autem in reiciendis rerum at dolor. Aliquam consectetur laudantium temporibus dicta minus dolor.</p>
              <ul>
                <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commo</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
              </ul>
              <p>Vitae autem velit excepturi fugit. Animi ad non. Eligendi et non nesciunt suscipit repellendus porro in quo eveniet. Molestias in maxime doloremque.</p>

              <div class="watch-video d-flex align-items-center position-relative">
                <i class="bi bi-play-circle"></i>
                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox stretched-link">Watch Video</a>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section>/About Section -->

      <!-- Services Section -->
      <!-- <section id="services" class="services section light-background"> -->
      <!-- <div class="container">
          <div class="row gy-4">
            <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <div class="service-item item-cyan position-relative">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"
                    ></path>
                  </svg>
                  <i class="bi bi-activity"></i>
                </div>
                <a href="service-details.html" class="stretched-link">
                  <h3>Nesciunt Mete</h3>
                </a>
                <p>
                  Provident nihil minus qui consequatur non omnis maiores. Eos
                  accusantium minus dolores iure perferendis tempore et
                  consequatur.
                </p>
              </div>
            </div> -->
      <!-- End Service Item -->

      <!-- <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="service-item item-orange position-relative">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"
                    ></path>
                  </svg>
                  <i class="bi bi-broadcast"></i>
                </div>
                <a href="service-details.html" class="stretched-link">
                  <h3>Eosle Commodi</h3>
                </a>
                <p>
                  Ut autem aut autem non a. Sint sint sit facilis nam iusto
                  sint. Libero corrupti neque eum hic non ut nesciunt dolorem.
                </p>
              </div>
            </div> -->
      <!-- End Service Item -->

      <!-- <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <div class="service-item item-teal position-relative">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"
                    ></path>
                  </svg>
                  <i class="bi bi-easel"></i>
                </div>
                <a href="service-details.html" class="stretched-link">
                  <h3>Ledo Markt</h3>
                </a>
                <p>
                  Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                  Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.
                </p>
              </div>
            </div> -->
      <!-- End Service Item -->

      <!-- <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <div class="service-item item-red position-relative">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"
                    ></path>
                  </svg>
                  <i class="bi bi-bounding-box-circles"></i>
                </div>
                <a href="service-details.html" class="stretched-link">
                  <h3>Asperiores Commodit</h3>
                </a>
                <p>
                  Non et temporibus minus omnis sed dolor esse consequatur.
                  Cupiditate sed error ea fuga sit provident adipisci neque.
                </p>
                <a href="service-details.html" class="stretched-link"></a>
              </div>
            </div> -->
      <!-- End Service Item -->

      <!-- <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <div class="service-item item-indigo position-relative">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"
                    ></path>
                  </svg>
                  <i class="bi bi-calendar4-week icon"></i>
                </div>
                <a href="service-details.html" class="stretched-link">
                  <h3>Velit Doloremque</h3>
                </a>
                <p>
                  Cumque et suscipit saepe. Est maiores autem enim facilis ut
                  aut ipsam corporis aut. Sed animi at autem alias eius labore.
                </p>
                <a href="service-details.html" class="stretched-link"></a>
              </div>
            </div> -->
      <!-- End Service Item -->

      <!-- <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <div class="service-item item-pink position-relative">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"
                    ></path>
                  </svg>
                  <i class="bi bi-chat-square-text"></i>
                </div>
                <a href="service-details.html" class="stretched-link">
                  <h3>Dolori Architecto</h3>
                </a>
                <p>
                  Hic molestias ea quibusdam eos. Fugiat enim doloremque aut
                  neque non et debitis iure. Corrupti recusandae ducimus enim.
                </p>
                <a href="service-details.html" class="stretched-link"></a>
              </div>
            </div> -->
      <!-- End Service Item -->
      <!-- </div>
        </div>
      </section> -->
      <!-- /Services Section -->
      <!-- Blog Posts Section -->
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
      
      <!-- /Blog Posts Section -->

      <!-- Portfolio Section -->
      <!-- <section id="portfolio" class="portfolio section"> -->
      <!-- Section Title -->
      <!-- <div class="container section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
          <p>
            Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
            consectetur velit
          </p>
        </div> -->
      <!-- End Section Title -->

      <!-- <div class="container">
          <div
            class="isotope-layout"
            data-default-filter="*"
            data-layout="masonry"
            data-sort="original-order"
          >
            <ul
              class="portfolio-filters isotope-filters"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-product">Card</li>
              <li data-filter=".filter-branding">Web</li>
            </ul> -->
      <!-- End Portfolio Filters -->

      <!-- <div
              class="row gy-4 isotope-container"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app"
              >
                <img
                  src="assets/img/masonry-portfolio/masonry-portfolio-1.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="portfolio-info">
                  <h4>App 1</h4>
                  <p>Lorem ipsum, dolor sit</p>
                  <a
                    href="assets/img/masonry-portfolio/masonry-portfolio-1.jpg"
                    title="App 1"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox preview-link"
                    ><i class="bi bi-zoom-in"></i
                  ></a>
                  <a
                    href="portfolio-details.html"
                    title="More Details"
                    class="details-link"
                    ><i class="bi bi-link-45deg"></i
                  ></a>
                </div>
              </div> -->
      <!-- End Portfolio Item -->

      <!-- <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
              >
                <img
                  src="assets/img/masonry-portfolio/masonry-portfolio-2.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="portfolio-info">
                  <h4>Product 1</h4>
                  <p>Lorem ipsum, dolor sit</p>
                  <a
                    href="assets/img/masonry-portfolio/masonry-portfolio-2.jpg"
                    title="Product 1"
                    data-gallery="portfolio-gallery-product"
                    class="glightbox preview-link"
                    ><i class="bi bi-zoom-in"></i
                  ></a>
                  <a
                    href="portfolio-details.html"
                    title="More Details"
                    class="details-link"
                    ><i class="bi bi-link-45deg"></i
                  ></a>
                </div>
              </div> -->
      <!-- End Portfolio Item -->

      <!-- <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
              >
                <img
                  src="assets/img/masonry-portfolio/masonry-portfolio-3.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="portfolio-info">
                  <h4>Branding 1</h4>
                  <p>Lorem ipsum, dolor sit</p>
                  <a
                    href="assets/img/masonry-portfolio/masonry-portfolio-3.jpg"
                    title="Branding 1"
                    data-gallery="portfolio-gallery-branding"
                    class="glightbox preview-link"
                    ><i class="bi bi-zoom-in"></i
                  ></a>
                  <a
                    href="portfolio-details.html"
                    title="More Details"
                    class="details-link"
                    ><i class="bi bi-link-45deg"></i
                  ></a>
                </div>
              </div> -->
      <!-- End Portfolio Item -->

      <!-- <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app"
              >
                <img
                  src="assets/img/masonry-portfolio/masonry-portfolio-4.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="portfolio-info">
                  <h4>App 2</h4>
                  <p>Lorem ipsum, dolor sit</p>
                  <a
                    href="assets/img/masonry-portfolio/masonry-portfolio-4.jpg"
                    title="App 2"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox preview-link"
                    ><i class="bi bi-zoom-in"></i
                  ></a>
                  <a
                    href="portfolio-details.html"
                    title="More Details"
                    class="details-link"
                    ><i class="bi bi-link-45deg"></i
                  ></a>
                </div>
              </div> -->
      <!-- End Portfolio Item -->

      <!-- <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
              >
                <img
                  src="assets/img/masonry-portfolio/masonry-portfolio-5.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="portfolio-info">
                  <h4>Product 2</h4>
                  <p>Lorem ipsum, dolor sit</p>
                  <a
                    href="assets/img/masonry-portfolio/masonry-portfolio-5.jpg"
                    title="Product 2"
                    data-gallery="portfolio-gallery-product"
                    class="glightbox preview-link"
                    ><i class="bi bi-zoom-in"></i
                  ></a>
                  <a
                    href="portfolio-details.html"
                    title="More Details"
                    class="details-link"
                    ><i class="bi bi-link-45deg"></i
                  ></a>
                </div>
              </div> -->
      <!-- End Portfolio Item -->

      <!-- <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
              >
                <img
                  src="assets/img/masonry-portfolio/masonry-portfolio-6.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="portfolio-info">
                  <h4>Branding 2</h4>
                  <p>Lorem ipsum, dolor sit</p>
                  <a
                    href="assets/img/masonry-portfolio/masonry-portfolio-6.jpg"
                    title="Branding 2"
                    data-gallery="portfolio-gallery-branding"
                    class="glightbox preview-link"
                    ><i class="bi bi-zoom-in"></i
                  ></a>
                  <a
                    href="portfolio-details.html"
                    title="More Details"
                    class="details-link"
                    ><i class="bi bi-link-45deg"></i
                  ></a>
                </div>
              </div> -->
      <!-- End Portfolio Item -->

      <!-- <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app"
              >
                <img
                  src="assets/img/masonry-portfolio/masonry-portfolio-7.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="portfolio-info">
                  <h4>App 3</h4>
                  <p>Lorem ipsum, dolor sit</p>
                  <a
                    href="assets/img/masonry-portfolio/masonry-portfolio-7.jpg"
                    title="App 3"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox preview-link"
                    ><i class="bi bi-zoom-in"></i
                  ></a>
                  <a
                    href="portfolio-details.html"
                    title="More Details"
                    class="details-link"
                    ><i class="bi bi-link-45deg"></i
                  ></a>
                </div>
              </div> -->
      <!-- End Portfolio Item -->

      <!-- <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
              >
                <img
                  src="assets/img/masonry-portfolio/masonry-portfolio-8.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="portfolio-info">
                  <h4>Product 3</h4>
                  <p>Lorem ipsum, dolor sit</p>
                  <a
                    href="assets/img/masonry-portfolio/masonry-portfolio-8.jpg"
                    title="Product 3"
                    data-gallery="portfolio-gallery-product"
                    class="glightbox preview-link"
                    ><i class="bi bi-zoom-in"></i
                  ></a>
                  <a
                    href="portfolio-details.html"
                    title="More Details"
                    class="details-link"
                    ><i class="bi bi-link-45deg"></i
                  ></a>
                </div>
              </div> -->
      <!-- End Portfolio Item -->

      <!-- <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
              >
                <img
                  src="assets/img/masonry-portfolio/masonry-portfolio-9.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="portfolio-info">
                  <h4>Branding 3</h4>
                  <p>Lorem ipsum, dolor sit</p>
                  <a
                    href="assets/img/masonry-portfolio/masonry-portfolio-9.jpg"
                    title="Branding 2"
                    data-gallery="portfolio-gallery-branding"
                    class="glightbox preview-link"
                    ><i class="bi bi-zoom-in"></i
                  ></a>
                  <a
                    href="portfolio-details.html"
                    title="More Details"
                    class="details-link"
                    ><i class="bi bi-link-45deg"></i
                  ></a>
                </div>
              </div> -->
      <!-- End Portfolio Item -->
      <!-- </div> -->
      <!-- End Portfolio Container -->
      <!-- </div> -->
      <!-- </div>
      </section> -->
      <!-- /Portfolio Section -->

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
                alt=""
              />
            </div>
            <!-- End Client Item -->

            <div class="col-xl-3 col-md-4 client-logo">
              <img
                src="assets/img/partners/partner-2.jpg"
                class="img-fluid"
                alt=""
              />
            </div>
            <!-- End Client Item -->

            <div class="col-xl-3 col-md-4 client-logo">
              <img
                src="assets/img/partners/partner-3.png"
                class="img-fluid"
                alt=""
              />
            </div>
            <!-- End Client Item -->

            <div class="col-xl-3 col-md-4 client-logo">
              <img
                src="assets/img/partners/partner-4.png"
                class="img-fluid"
                alt=""
              />
            </div>
            <!-- End Client Item -->

            <div class="col-xl-3 col-md-4 client-logo">
              <img
                src="assets/img/partners/partner-5.jpg"
                class="img-fluid"
                alt=""
              />
            </div>
            <!-- End Client Item -->

            <div class="col-xl-3 col-md-4 client-logo">
              <img
                src="assets/img/partners/partner-6.jpeg"
                class="img-fluid"
                alt=""
              />
            </div>
            <!-- End Client Item -->

            <div class="col-xl-3 col-md-4 client-logo">
              <img
                src="assets/img/partners/partner-7.png"
                class="img-fluid"
                alt=""
              />
            </div>
            <!-- End Client Item -->

            <div class="col-xl-3 col-md-4 client-logo">
              <img
                src="assets/img/partners/partner-8.jpg"
                class="img-fluid"
                alt=""
              />
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

          <a  href="membership.php" class="join-now">JOIN NOW</a>
         
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
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

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
