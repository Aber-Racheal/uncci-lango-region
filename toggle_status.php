<?php
require_once 'php/db_con.php';

// Check if necessary parameters exist
if (isset($_GET['action']) && $_GET['action'] == 'toggleRead' && isset($_GET['contact_id']) && isset($_GET['status'])) {
    $contact_id = $_GET['contact_id'];
    $status = $_GET['status'];

    // Determine new read_status based on the current status
    if ($status == 'unread') {
        $read_status = 1;  // Set as read
    } else {
        $read_status = 0;  // Set as unread
    }

    // Update the read_status in the database
    $updateQuery = "UPDATE contact_form SET read_status = ? WHERE contact_id = ?";
    if ($stmt = $conn->prepare($updateQuery)) {
        $stmt->bind_param("ii", $read_status, $contact_id);
        
        if ($stmt->execute()) {
            // Successfully updated, redirect to the contact list page
            header("Location: messages.php");
            exit;
        } else {
            echo "Error updating status: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid parameters.";
}
?>
