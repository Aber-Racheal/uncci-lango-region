<?php
$current_page = basename($_SERVER['PHP_SELF']); // Gets the current filename
?>
<head>
  <!-- In global-header.php or each page's <head> -->
<link rel="stylesheet" href="assets/css/global-styles/global.css">

</head>
<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container position-relative d-flex align-items-center">
    <a href="index.php" class="logo d-flex align-items-center me-auto">
      <img src="assets/img/UNCCI-logo.png" alt="UNCCI logo" />
      <span class="sitename">Lango Region</span>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.php" class="<?= $current_page == 'index.php' ? 'active' : '' ?>">Home</a></li>
        <li class="dropdown">
          <a href="about.php" class="<?= $current_page == 'about.php' ? 'active' : '' ?>">
            <span>About</span>
            <i class="bi bi-chevron-down toggle-dropdown"></i>
          </a>
          <ul>
            <li><a href="about.php#who-we-are">Who We Are</a></li>
            <li><a href="about.php#team">Board of Directors</a></li>
            <li><a href="about.php#clients">Our Partners</a></li>
          </ul>
        </li>
        <li><a href="services.html#features" class="<?= $current_page == 'services.html' ? 'active' : '' ?>">Districts</a></li>
        <li><a href="services.php" class="<?= $current_page == 'services.html' ? 'active' : '' ?>">Services</a></li>
        <li><a href="membership.php" class="<?= $current_page == 'membership.php' ? 'active' : '' ?>">Membership</a></li>
        <li><a href="events.php" class="<?= $current_page == 'events.php' ? 'active' : '' ?>">Events</a></li>
        <li><a href="new&media.php" class="<?= $current_page == 'new&media.php' ? 'active' : '' ?>">News&Media</a></li>
        <li><a href="contact.php" class="<?= $current_page == 'contact.html' ? 'active' : '' ?>">Contact</a></li>
        <a href="membership.php" class="join-now-nav">JOIN NOW</a>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</header>
