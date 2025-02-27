<?php
require_once 'php/db_con.php';

// Fetch all messages from the database
$sql = "SELECT contact_id, name, email, subject, message, created_at, read_status, reply, reply_timestamp
        FROM contact_form
        ORDER BY created_at DESC";
$result = $conn->query($sql);



// Count the number of unread messages
$sql_unread = "SELECT COUNT(*) AS unread_count FROM contact_form WHERE read_status = 0";
$result_unread = $conn->query($sql_unread);
$row_unread = $result_unread->fetch_assoc();
$unread_count = $row_unread['unread_count'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Messages - Company Template</title>

  <!-- Include the necessary head links and styles (same as your original code) -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- Bootstrap & Icons -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="main.css">
  <!-- <style>
    /* Sidebar Styles */
    #wrapper {
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 250px;
      position: fixed;
      height: 100%;
      background: #C1053F;
      padding-top: 20px;
    }

    .sidebar a {
      padding: 10px;
      text-decoration: none;
      font-size: 16px;
      color: white;
      display: block;
    }

    .sidebar a:hover {
      background: black;
    }

    .badge.bg-success {
      background-color: #28a745;
    }

    .page-title,
    .starter-section {
      padding-left: 20px;
      /* Prevent content from touching the left edge */
    }

    .badge.bg-warning {
      background-color: #ffc107;
    }

    /* Ensure smooth transition */
    .sidebar-nav ul li a {
      transition: background-color 0.3s;
    }

    .badge.bg-success {
      background-color: #28a745;
    }


    .sidebar-nav ul li a {
      transition: background-color 0.3s;
    }

    /* Table Styling */
    table th,
    table td {
      padding: 12px;
      text-align: center;
    }

    table th {
      background-color: #f4f4f4;
    }

    #header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      background-color: #fff;
      box-shadow: 0 4px 2px -2px gray;
    }

    #header .container {
      padding-left: 250px;
      /* Adjust to accommodate the fixed sidebar */
    }

    #header .logo {
      display: flex;
      align-items: center;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
    }

    :root {
      --primary-color: #C1053F;
      --primary-light: #e3336d;
      --primary-dark: #9a0433;
      --text-light: #ffffff;
      --bg-light: #f8f9fa;
      --sidebar-width: 280px;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f5f5;
      overflow-x: hidden;
    }

    /* Header Styles */
    .header {
      background-color: white;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      padding: 10px 0;
      z-index: 100;
    }

    .sitename {
      color: var(--primary-color);
      font-weight: 700;
      font-size: 1.5rem;
      margin-left: 10px;
    }

    /* Sidebar Styles */
    .sidebar {
      width: var(--sidebar-width);
      position: fixed;
      height: 100%;
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
      padding-top: 70px;
      z-index: 99;
      box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .sidebar-header {
      padding: 20px;
      text-align: center;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      margin-bottom: 20px;
    }

    .admin-profile {
      display: inline-block;
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background-color: white;
      margin-bottom: 10px;
      overflow: hidden;
      border: 3px solid white;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
    }

    .admin-profile img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .sidebar a {
      padding: 12px 20px;
      text-decoration: none;
      font-size: 16px;
      color: rgba(255, 255, 255, 0.8);
      display: flex;
      align-items: center;
      transition: all 0.3s ease;
      border-left: 4px solid transparent;
    }

    .sidebar a i {
      margin-right: 10px;
      font-size: 20px;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background: rgba(255, 255, 255, 0.1);
      color: white;
      border-left: 4px solid white;
    }

    /* Content Styles */
    .content {
      margin-left: var(--sidebar-width);
      padding: 20px;
      transition: all 0.3s ease;
      padding-top: 80px;
    }

    .page-title {
      font-weight: 700;
      color: #333;
      margin-bottom: 30px;
      position: relative;
      padding-bottom: 10px;
    }

    .page-title::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 50px;
      background-color: var(--primary-color);
    }

    /* Dashboard Cards */
    .dashboard-card {
      background: white;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
      text-align: center;
      transition: all 0.3s ease;
      overflow: hidden;
      position: relative;
      height: 100%;
      border-bottom: 4px solid var(--primary-color);
    }

    .dashboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .dashboard-card i {
      font-size: 40px;
      margin-bottom: 15px;
      background: linear-gradient(45deg, var(--primary-color), var(--primary-light));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .dashboard-card h4 {
      color: #555;
      font-size: 18px;
      margin-bottom: 10px;
    }

    .dashboard-card .h3 {
      font-weight: 700;
      font-size: 2.5rem;
      color: #333;
    }

    /* Action Buttons */
    .action-btn {
      border-radius: 50px;
      padding: 10px 25px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
      transform: translateY(-2px);
    }

    /* Table Styles */
    .custom-table {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
    }

    .custom-table thead th {
      background-color: var(--primary-color);
      color: white;
      padding: 15px;
      font-weight: 600;
    }

    .custom-table tbody tr:hover {
      background-color: #f8f9fa;
    }

    .custom-table td {
      padding: 15px;
      vertical-align: middle;
    }

    /* Fun Animations */
    @keyframes float {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-10px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    .float-animation {
      animation: float 3s ease-in-out infinite;
    }

    /* Responsive */
    @media (max-width: 992px) {
      .sidebar {
        width: 70px;
        padding-top: 90px;
      }

      .sidebar a span {
        display: none;
      }

      .sidebar a {
        padding: 15px;
        justify-content: center;
      }

      .sidebar a i {
        margin-right: 0;
        font-size: 24px;
      }

      .content {
        margin-left: 70px;
      }

      .sidebar-header {
        display: none;
      }
    }

    /* Fun elements */
    .badge-fun {
      position: relative;
      overflow: hidden;
    }

    .badge-fun::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(transparent, rgba(255, 255, 255, 0.3), transparent);
      transform: rotate(30deg);
      transition: 0.5s;
    }

    .badge-fun:hover::after {
      transform: rotate(30deg) translate(50%, 50%);
    }

    /* Quick access popover */
    .quick-access {
      position: fixed;
      right: 30px;
      bottom: 30px;
      width: 60px;
      height: 60px;
      background-color: var(--primary-color);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 24px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      z-index: 999;
      transition: all 0.3s ease;
    }

    .quick-access:hover {
      transform: scale(1.1);
      background-color: var(--primary-dark);
    }
  </style> -->
</head>

<body class="starter-page-page">
  <!-- <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center"> -->

  <!-- <a href="index.html" class="logo d-flex align-items-center me-auto"> -->
  <!-- Uncomment the line below if you also wish to use an image logo -->
  <!-- <img src="assets/img/UNCCI-logo.png" alt="">
        <h1 class="sitename">Lango Region</h1><span>.</span> -->
  <!-- </a>

      <nav id="navmenu" class="navmenu">

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav> -->


  <!-- 
    </div>
  </header> -->


  <!-- Sidebar and Header -->
  <!-- <div id="wrapper"> -->
  <!-- <div class="sidebar" id="sidebar">
      <div class="sidebar-header"> -->
  <!-- Sidebar Header Content -->
  <!-- </div>
      <nav class="sidebar-nav">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="admin.php">General</a></li>
          <li><a href="updates.php">Updates</a></li>
          <li>
            <a href="messages.php" class="active">
              <i class="fas fa-envelope"></i> Messages
              <?php if ($unread_count > 0): ?>
                <span class="badge bg-danger"><?php echo $unread_count; ?></span>
              <?php endif; ?>
            </a>
          </li>
          <li><a href="settings.html">Settings</a></li>
        </ul>
      </nav>

    </div> -->

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center">
      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/UNCCI-logo.png" alt="Lango Region Logo" style="max-height: 50px;">
        <h1 class="sitename">Lango Region<span style="color: var(--primary-color);">.</span></h1>
      </a>

      <div class="d-flex align-items-center ms-auto">
        <div class="dropdown me-3">
          <a class="dropdown-toggle text-dark text-decoration-none" href="#" role="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell position-relative">
              <?php if ($unread_count > 0): ?>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.5rem;">
                  <?php echo $unread_count; ?>
                </span>
              <?php endif; ?>
            </i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
            <li>
              <h6 class="dropdown-header">Notifications</h6>
            </li>
            <li><a class="dropdown-item" href="messages.php">You have <?php echo $unread_count; ?> unread messages</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="notifications.php">View all notifications</a></li>
          </ul>
        </div>

        <div class="dropdown me-3">
          <a class="dropdown-toggle d-flex align-items-center text-dark text-decoration-none" href="#" role="button" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="me-2 d-none d-sm-block">
              <small class="text-muted d-block">Welcome</small>
              <span class="fw-semibold">Admin</span>
            </div>
            <img src="assets/img/profile-placeholder.jpg" alt="Admin" class="rounded-circle" width="32" height="32">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
            <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person me-2"></i>My Profile</a></li>
            <li><a class="dropdown-item" href="settings.php"><i class="bi bi-gear me-2"></i>Settings</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>


  <!-- Sidebar -->
  <div class="sidebar">
    <div class="sidebar-header">
      <div class="admin-profile">
        <img src="assets/img/profile-placeholder.jpg" alt="Admin Profile">
      </div>
      <h6 class="text-white mb-0">Admin User</h6>
      <small class="text-white-50">Administrator</small>
    </div>

    <a href="admin.php" class="active"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a>
    <a href="messages.php"><i class="bi bi-envelope"></i> <span>Messages</span> <?php if ($unread_count > 0): ?><span class="badge bg-danger ms-auto"><?php echo $unread_count; ?></span><?php endif; ?></a>
    <a href="updates.php"><i class="bi bi-megaphone"></i> <span>Updates</span></a>
    <a href="events.php"><i class="bi bi-calendar-event"></i> <span>Events</span></a>
    <a href="users.php"><i class="bi bi-people"></i> <span>Users</span></a>
    <a href="reports.php"><i class="bi bi-bar-chart"></i> <span>Reports</span></a>
    <a href="settings.php"><i class="bi bi-gear"></i> <span>Settings</span></a>
    <a href="logout.php" class="mt-auto"><i class="bi bi-box-arrow-left"></i> <span>Logout</span></a>
  </div>



  <div class="main-content content" id="main-content">
    <div class="container mt-5">
      <h2 class="text-center">Contact Form Messages</h2>

      <?php if ($result->num_rows > 0) : ?>
        <table class="table table-striped mt-3">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Message</th>
              <th>Created At</th>
              <th>Read Status</th>
              <th>Reply</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
              <tr>
                <td><?php echo $row['contact_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo substr($row['message'], 0, 50) . "..."; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                  <?php
                  if ($row['read_status'] == 1) {
                    echo '<span class="badge bg-success">Read</span>';
                  } else {
                    echo '<span class="badge bg-warning">Unread</span>';
                  }
                  ?>
                </td>
                <td><?php echo $row['reply'] ? 'Replied' : 'Not replied'; ?></td>
                <td>
                  <?php if ($row['read_status'] == 1) : ?>
                    <a href="toggle_status.php?action=toggleRead&contact_id=<?php echo $row['contact_id']; ?>&status=read" class="btn btn-sm btn-warning">Mark as Unread</a>
                  <?php else : ?>
                    <a href="toggle_status.php?action=toggleRead&contact_id=<?php echo $row['contact_id']; ?>&status=unread" class="btn btn-sm btn-info">Mark as Read</a>
                  <?php endif; ?>
                  <a href="reply_message.php?id=<?php echo $row['contact_id']; ?>" class="btn btn-sm btn-primary">Reply</a>
                  <a href="message_detail.php?contact_id=<?php echo $row['contact_id']; ?>" class="btn btn-sm btn-info">View Details</a>
                </td>

              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php else : ?>
        <p>No messages found.</p>
      <?php endif; ?>

    </div>
  </div>
  </div>

</body>

</html>