<?php
require_once 'php/db_con.php';

// Check if the message ID is passed in the URL
if (isset($_GET['contact_id'])) {
    $contact_id = $_GET['contact_id'];

    // Fetch the message details from the database
    $sql = "SELECT * FROM contact_form WHERE contact_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $contact_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the message exists
    if ($result->num_rows > 0) {
        $message = $result->fetch_assoc();
    } else {
        echo "Message not found.";
        exit;
    }
} else {
    echo "No message selected.";
    exit;
}

// Handle Mark as Read or Unread
if (isset($_POST['mark_as_read'])) {
    $sql_update = "UPDATE contact_form SET read_status = 1 WHERE contact_id = ?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("i", $contact_id);
    $stmt->execute();
    header("Location: message_detail.php?contact_id=" . $contact_id); // Reload the page to reflect changes
}

if (isset($_POST['mark_as_unread'])) {
    $sql_update = "UPDATE contact_form SET read_status = 0 WHERE contact_id = ?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("i", $contact_id);
    $stmt->execute();
    header("Location: message_detail.php?contact_id=" . $contact_id); // Reload the page to reflect changes
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Message Details - Company Template</title>
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add styles as needed */
    </style>
</head>

<body>
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <img src="assets/img/UNCCI-logo.png" alt="">
                <h1 class="sitename">Lango Region</h1><span>.</span>
            </a>
        </div>
    </header>

    <div class="container mt-5">
        <h2 class="text-center">Message Details</h2>

        <?php if (isset($message)) : ?>
            <div class="message-details">
                <h4>From: <?php echo $message['name']; ?> (<?php echo $message['email']; ?>)</h4>
                <p><strong>Subject:</strong> <?php echo $message['subject']; ?></p>
                <p><strong>Message:</strong></p>
                <p><?php echo nl2br($message['message']); ?></p>
                <p><strong>Created At:</strong> <?php echo $message['created_at']; ?></p>
                <p><strong>Read Status:</strong> 
                    <?php 
                        if ($message['read_status'] == 1) {
                            echo '<span class="badge bg-success">Read</span>';
                        } else {
                            echo '<span class="badge bg-warning">Unread</span>';
                        }
                    ?>
                </p>
                <p><strong>Reply Status:</strong> <?php echo $message['reply'] ? 'Replied' : 'Not Replied'; ?></p>
                <p><strong>Reply Timestamp:</strong> <?php echo $message['reply_timestamp'] ?: 'N/A'; ?></p>

                <hr>

                <!-- Reply Button -->
                <a href="reply_message.php?contact_id=<?php echo $message['contact_id']; ?>" class="btn btn-primary">Reply to Message</a>

                <hr>

                <!-- Mark as Read / Unread -->
                <form action="message_detail.php?contact_id=<?php echo $message['contact_id']; ?>" method="POST">
                    <?php if ($message['read_status'] == 0) : ?>
                        <button type="submit" name="mark_as_read" class="btn btn-success">Mark as Read</button>
                    <?php else : ?>
                        <button type="submit" name="mark_as_unread" class="btn btn-warning">Mark as Unread</button>
                    <?php endif; ?>
                </form>

                <hr>

                <a href="messages.php" class="btn btn-primary">Back to Messages</a>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>
