<?php
require_once 'php/db_con.php';

// Fetch all messages from the database
$sql = "SELECT contact_id, name, email, subject, message, created_at, read_status
        FROM contact_form
        ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);

// Count the number of unread messages
$sql_unread = "SELECT COUNT(*) AS unread_count FROM contact_form WHERE read_status = 0";
$result_unread = $conn->query($sql_unread);
$row_unread = $result_unread->fetch_assoc();
$unread_count = $row_unread['unread_count'];

// Count total messages
$sql_total = "SELECT COUNT(*) AS total_messages FROM contact_form";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_messages = $row_total['total_messages'];

// Count total updates
$sql_updates = "SELECT COUNT(*) AS total_updates FROM updates";
$result_updates = $conn->query($sql_updates);
$row_updates = $result_updates->fetch_assoc();
$total_updates = $row_updates['total_updates'];

// Count total events (add this to your database queries)
$sql_events = "SELECT COUNT(*) AS total_events FROM events";
$result_events = $conn->query($sql_events);
$row_events = $result_events->fetch_assoc();
$total_events = $row_events['total_events'] ?? 0; // Default to 0 if table doesn't exist yet


// fetching existing events for display on the UI
$fetch = "SELECT * FROM events ORDER BY event_date DESC";
$fetched_events = $conn->query($fetch);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Lango Region Admin Dashboard</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">

  <!-- Bootstrap & Icons -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


  <link href="main.css" rel="stylesheet">


</head>

<body>
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center">
      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/UNCCI-logo.png" alt="Lango Region Logo" style="max-height: 50px;">
        <h1 class="sitename">Lango Region</h1>
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

  <!-- Main Content -->
  <div class="content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="page-title">Dashboard Overview</h1>
      <div class="d-none d-sm-inline-block">
        <div class="date-time text-muted">
          <i class="bi bi-calendar3"></i> <span id="currentDate">Today's Date</span>
        </div>
      </div>
    </div>

    <!-- Welcome Banner -->
    <div class="row mb-4">
      <div class="col-12">
        <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-md-8">
                <h2 class="animate__animated animate__fadeIn">Welcome to Lango Region Admin Panel! 🎉</h2>
                <p class="lead text-muted animate__animated animate__fadeIn animate__delay-1s">Manage your site, track stats, and engage with your community - all in one place.</p>
                <div class="animate__animated animate__fadeIn animate__delay-2s">
                  <a href="#" class="btn btn-primary action-btn" data-bs-toggle="modal" data-bs-target="#quickTipsModal">
                    <i class="bi bi-lightbulb me-2"></i>Quick Tips
                  </a>
                </div>
              </div>
              <div class="col-md-4 d-none d-md-block">
                <img src="assets/img/illustration.svg" onerror="this.src='/api/placeholder/400/320'; this.onerror=null;" class="img-fluid float-animation" alt="Dashboard Illustration">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Dashboard Summary -->
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="dashboard-card">
          <i class="bi bi-envelope-fill float-animation"></i>
          <h4>Total Messages</h4>
          <p class="h3 counter-animation"><?php echo $total_messages; ?></p>
          <div class="progress mt-3" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 75%; background-color: var(--primary-color);" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="dashboard-card">
          <i class="bi bi-envelope-exclamation-fill float-animation"></i>
          <h4>Unread Messages</h4>
          <p class="h3 counter-animation"><?php echo $unread_count; ?></p>
          <div class="progress mt-3" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: <?php echo ($unread_count / $total_messages * 100 > 0) ? $unread_count / $total_messages * 100 : 0; ?>%; background-color: var(--primary-color);" aria-valuenow="<?php echo $unread_count; ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_messages; ?>"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="dashboard-card">
          <i class="bi bi-megaphone-fill float-animation"></i>
          <h4>Total Updates</h4>
          <p class="h3 counter-animation"><?php echo $total_updates; ?></p>
          <div class="progress mt-3" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 85%; background-color: var(--primary-color);" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="dashboard-card">
          <i class="bi bi-calendar-event-fill float-animation"></i>
          <h4>Total Events</h4>
          <p class="h3 counter-animation"><?php echo $total_events; ?></p>
          <div class="progress mt-3" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 60%; background-color: var(--primary-color);" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4 mb-4">
      <div class="col-12">
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
          <div class="card-body">
            <h5 class="card-title mb-3"><i class="bi bi-lightning-charge-fill me-2 text-warning"></i>Quick Actions</h5>
            <div class="row text-center">
              <div class="col-md-3 col-6 mb-3 mb-md-0">
                <a href="updates.php" class="btn btn-primary action-btn w-100">
                  <i class="bi bi-plus-circle me-2"></i>Post Update
                </a>
              </div>
              <div class="col-md-3 col-6 mb-3 mb-md-0">
                <a href="events.php" class="btn btn-success action-btn w-100">
                  <i class="bi bi-calendar-plus me-2"></i>Add Event
                </a>
              </div>
              <div class="col-md-3 col-6">
                <a href="messages.php" class="btn btn-warning action-btn w-100">
                  <i class="bi bi-envelope me-2"></i>View Messages
                </a>
              </div>
              <div class="col-md-3 col-6">
                <a href="reports.php" class="btn btn-info action-btn w-100 text-white">
                  <i class="bi bi-file-earmark-text me-2"></i>Generate Report
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Messages and Activity -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
          <div class="card-header bg-white pt-4 pb-3 border-0">
            <div class="d-flex align-items-center justify-content-between">
              <h5 class="card-title mb-0"><i class="bi bi-envelope-paper me-2 text-primary"></i>Recent Messages</h5>
              <a href="messages.php" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table custom-table mb-0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm me-2 bg-light rounded-circle text-center" style="width: 35px; height: 35px; line-height: 35px;">
                              <?php echo strtoupper(substr($row['name'], 0, 1)); ?>
                            </div>
                            <?php echo htmlspecialchars($row['name']); ?>
                          </div>
                        </td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['subject']); ?></td>
                        <td><?php echo date("d M Y", strtotime($row['created_at'])); ?></td>
                        <td>
                          <?php if ($row['read_status'] == 0): ?>
                            <span class="badge badge-fun bg-danger">Unread</span>
                          <?php else: ?>
                            <span class="badge badge-fun bg-success">Read</span>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endwhile; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="5" class="text-center py-4">No messages found</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
          <div class="card-header bg-white pt-4 pb-3 border-0">
            <h5 class="card-title mb-0"><i class="bi bi-activity me-2 text-success"></i>Recent Activity</h5>
          </div>
          <div class="card-body">
            <div class="timeline">
              <div class="timeline-item mb-4 pb-4 border-bottom">
                <div class="d-flex">
                  <div class="timeline-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; flex-shrink: 0;">
                    <i class="bi bi-envelope"></i>
                  </div>
                  <div class="ms-3">
                    <h6 class="mb-1">New message received</h6>
                    <p class="text-muted mb-0">From: John Doe</p>
                    <small class="text-muted">2 hours ago</small>
                  </div>
                </div>
              </div>

              <div class="timeline-item mb-4 pb-4 border-bottom">
                <div class="d-flex">
                  <div class="timeline-icon bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; flex-shrink: 0;">
                    <i class="bi bi-megaphone"></i>
                  </div>
                  <div class="ms-3">
                    <h6 class="mb-1">New update posted</h6>
                    <p class="text-muted mb-0">New partnership announcement</p>
                    <small class="text-muted">Yesterday</small>
                  </div>
                </div>
              </div>

              <div class="timeline-item">
                <div class="d-flex">
                  <div class="timeline-icon bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; flex-shrink: 0;">
                    <i class="bi bi-calendar-event"></i>
                  </div>
                  <div class="ms-3">
                    <h6 class="mb-1">New event created</h6>
                    <p class="text-muted mb-0">Regional Business Forum</p>
                    <small class="text-muted">3 days ago</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-light text-center py-3">
            <a href="#" class="text-primary text-decoration-none">View All Activity <i class="bi bi-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Events -->
    <div class="row mb-4">
      <div class="col-12">
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
          <div class="card-header bg-white pt-4 pb-3 border-0">
            <div class="d-flex align-items-center justify-content-between">
              <h5 class="card-title mb-0"><i class="bi bi-calendar-event me-2 text-success"></i>Upcoming Events</h5>
              <a href="events.php" class="btn btn-sm btn-outline-success">Manage Events</a>
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <?php if ($fetched_events && $fetched_events->num_rows > 0): ?>
                <?php while ($row = $fetched_events->fetch_assoc()) : ?>
                  <?php
                  // Format date for display
                  $event_date = new DateTime($row['event_date']);
                  $day = $event_date->format('d');
                  $month = $event_date->format('M');
                  $year = $event_date->format('Y');

                  // Determine status
                  $today = new DateTime();
                  $is_past = $event_date < $today;
                  $status_class = $is_past ? 'bg-secondary' : 'bg-success';
                  $status_text = $is_past ? 'Past' : 'Upcoming';
                  $status_icon = $is_past ? 'bi-calendar-x' : 'bi-calendar-check';
                  ?>
                  <div class="col-md-4 mb-3">
                    <div class="card h-100 border-0 shadow-sm">
                      <div class="card-body">
                        <div class="event-image">
                        <img src="uploads/events/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                        <div class="event-date-badge">
                            <span class="day"><?php echo $day; ?></span>
                            <span class="month"><?php echo $month;  ?><?php echo $year;?> </span>

                          </div>
                        </div>
                
                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <span class="badge bg-primary event-type"><?php echo ucfirst($row['event_type']); ?></span>
                      
                        </div>
                        <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                        <p class="card-text text-muted mb-3"><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                        <div class="d-flex align-items-center text-muted mb-3">
                          <i class="bi bi-geo-alt me-2"></i>
                          <span><?php echo htmlspecialchars($row['location']); ?></span>
                        </div>
                        <div class="d-flex align-items-center text-muted">
                          <i class="bi bi-clock me-2"></i>
                          <span><?php echo $row['event_time'] ?></span>
                        </div>
                        
                      </div>
                      <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                     
                                    <span class="status-chip <?php echo $status_class; ?> text-white">
                                        <i class="bi <?php echo $status_icon; ?>"></i> <?php echo $status_text; ?>
                                    </span>
                                    <div class="btn-group">
                                        <a href="event-details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="edit-event.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="events.php?delete_event=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this event?');">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                
                      </div>
                    </div>
                  </div>
                <?php endwhile ?>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- System Status -->
  <!-- <div class="row">
    <div class="col-12">
      <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-header bg-white pt-4 pb-3 border-0">
          <h5 class="card-title mb-0"><i class="bi bi-speedometer2 me-2 text-danger"></i>System Status</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
              <h6 class="mb-3">Server Performance</h6>
              <div class="progress mb-3" style="height: 8px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 87%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="d-flex justify-content-between">
                <span class="text-muted small">CPU Usage: 13%</span>
                <span class="text-success small">Excellent</span>
              </div>

              <h6 class="mt-4 mb-3">Database Status</h6>
              <div class="progress mb-3" style="height: 8px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="d-flex justify-content-between">
                <span class="text-muted small">Storage Usage: 65%</span>
                <span class="text-primary small">Good</span>
              </div>
            </div>

            <div class="col-md-6">
              <h6 class="mb-3">Recent Activity</h6>
              <div class="table-responsive">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>User</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="badge bg-info text-white">Login</span></td>
                      <td>admin@langoregion.com</td>
                      <td>Just now</td>
                    </tr>
                    <tr>
                      <td><span class="badge bg-success text-white">Update</span></td>
                      <td>content@langoregion.com</td>
                      <td>3 hours ago</td>
                    </tr>
                    <tr>
                      <td><span class="badge bg-warning text-dark">Edit</span></td>
                      <td>events@langoregion.com</td>
                      <td>Yesterday</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Footer -->
  <footer class="mt-5 p-4 text-center">
    <div class="text-muted">
      &copy; <?php echo date('Y'); ?> Lango Region Administration. All rights reserved.
    </div>
  </footer>
  </div>

  <!-- Quick Access Menu -->
  <div class="quick-access" id="quickAccess">
    <i class="bi bi-plus"></i>
  </div>

  <!-- Quick Access Menu Content -->
  <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
    <div id="quickAccessToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-primary text-white">
        <i class="bi bi-lightning-charge-fill me-2"></i>
        <strong class="me-auto">Quick Actions</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        <div class="list-group list-group-flush">
          <a href="messages.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <span><i class="bi bi-envelope me-2"></i>Messages</span>
            <span class="badge bg-primary rounded-pill"><?php echo $unread_count; ?></span>
          </a>
          <a href="updates.php" class="list-group-item list-group-item-action">
            <i class="bi bi-megaphone me-2"></i>Post Update
          </a>
          <a href="events.php" class="list-group-item list-group-item-action">
            <i class="bi bi-calendar-plus me-2"></i>Add Event
          </a>
          <a href="settings.php" class="list-group-item list-group-item-action">
            <i class="bi bi-gear me-2"></i>Settings
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Tips Modal -->
  <div class="modal fade" id="quickTipsModal" tabindex="-1" aria-labelledby="quickTipsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="quickTipsModalLabel"><i class="bi bi-lightbulb text-warning me-2"></i>Admin Quick Tips</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-4">
            <h6><i class="bi bi-envelope-paper me-2 text-primary"></i>Managing Messages</h6>
            <p class="text-muted small">Check your inbox regularly. Respond to urgent inquiries within 24 hours for better user engagement.</p>
          </div>
          <div class="mb-4">
            <h6><i class="bi bi-megaphone me-2 text-success"></i>Posting Updates</h6>
            <p class="text-muted small">Keep content concise and relevant. Include images when possible for better engagement.</p>
          </div>
          <div class="mb-4">
            <h6><i class="bi bi-calendar-event me-2 text-danger"></i>Managing Events</h6>
            <p class="text-muted small">Always include complete details: date, time, location, and contact information for attendees.</p>
          </div>
          <div>
            <h6><i class="bi bi-people me-2 text-info"></i>User Management</h6>
            <p class="text-muted small">Regularly review user permissions to ensure data security across the platform.</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Got it!</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="main.js"></script>
  <script>
            // Initialize datepicker
            flatpickr(".datepicker", {
                dateFormat: "Y-m-d",
                minDate: "today"
            });

            // Initialize timepicker
            flatpickr(".timepicker", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i"
            });

            // Image upload preview
            document.getElementById('event_image').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').classList.remove('d-none');
                        document.getElementById('imagePreview').querySelector('img').src = e.target.result;
                        document.getElementById('imageUploadContainer').classList.add('d-none');
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Remove image
            document.getElementById('removeImage').addEventListener('click', function() {
                document.getElementById('event_image').value = '';
                document.getElementById('imagePreview').classList.add('d-none');
                document.getElementById('imageUploadContainer').classList.remove('d-none');
            });

            // Event preview live update
            const eventForm = document.getElementById('eventForm');

            // Update preview as user types
            eventForm.addEventListener('input', updatePreview);

            function updatePreview() {
                // Get form values
                const title = document.getElementById('event_title').value || 'Event Title';
                const date = document.getElementById('event_date').value;
                const time = document.getElementById('event_time').value;
                const location = document.getElementById('event_location').value || 'Location';
                const capacity = document.getElementById('event_capacity').value || '0';
                const description = document.getElementById('event_description').value || 'Description will appear here';
                const typeSelect = document.getElementById('event_type');
                const type = typeSelect.options[typeSelect.selectedIndex].text;

                // Format date and time
                let dateTimeText = 'Date & Time';
                if (date) {
                    const dateObj = new Date(date);
                    const formatter = new Intl.DateTimeFormat('en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric'
                    });
                    dateTimeText = formatter.format(dateObj);
                    if (time) {
                        dateTimeText += ' at ' + time;
                    }
                }

                // Update preview elements
                document.querySelector('.event-preview-title').textContent = title;
                document.querySelector('.event-preview-date').textContent = dateTimeText;
                document.querySelector('.event-preview-location').textContent = location;
                document.querySelector('.event-preview-description').textContent = description;
                document.querySelector('.event-preview-capacity').textContent = capacity;

                // Update type badge
                const typeBadge = document.querySelector('.event-preview-type');
                if (type === 'Workshop') {
                    typeBadge.className = 'badge event-preview-type bg-warning';
                } else if (type === 'Conference') {
                    typeBadge.className = 'badge event-preview-type bg-info';
                } else if (type === 'Seminar') {
                    typeBadge.className = 'badge event-preview-type bg-primary';
                } else if (type === 'Meeting') {
                    typeBadge.className = 'badge event-preview-type bg-success';
                } else if (type === 'Exhibition') {
                    typeBadge.className = 'badge event-preview-type bg-secondary';
                } else {
                    typeBadge.className = 'badge event-preview-type bg-dark';
                }
                typeBadge.textContent = type === 'Select event type' ? 'Type' : type;
            }

            // Create confetti animation for success message
            function createConfetti() {
                const colors = ['#C1053F', '#e3336d', '#9a0433', '#42a5f5', '#4caf50', '#ff9800'];
                const container = document.body;

                for (let i = 0; i < 100; i++) {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.width = Math.random() * 10 + 5 + 'px';
                    confetti.style.height = Math.random() * 10 + 5 + 'px';
                    confetti.style.animationDuration = Math.random() * 3 + 2 + 's';
                    confetti.style.opacity = Math.random() * 0.5 + 0.5;
                    container.appendChild(confetti);

                    // Remove confetti after animation
                    setTimeout(() => {
                        confetti.remove();
                    }, 5000);
                }
            }

            // Counter animation
            document.addEventListener('DOMContentLoaded', function() {
                const counters = document.querySelectorAll('.counter-animation');

                counters.forEach(counter => {
                    const target = parseInt(counter.innerText);
                    let count = 0;
                    const duration = 2000; // ms
                    const increment = Math.ceil(target / (duration / 30)); // Update every 30ms

                    const timer = setInterval(() => {
                        count += increment;
                        if (count >= target) {
                            counter.innerText = target;
                            clearInterval(timer);
                        } else {
                            counter.innerText = count;
                        }
                    }, 30);
                });
            });
        </script>

  <!-- Custom Script -->

</body>

</html>