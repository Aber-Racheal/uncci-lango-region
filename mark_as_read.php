<?php
require_once 'php/db_con.php';

// Toggle read/unread status
if (isset($_GET['action']) && $_GET['action'] == 'toggleRead' && isset($_GET['contact_id']) && isset($_GET['status'])) {
    $contact_id = $_GET['contact_id'];
    $current_status = $_GET['status'] == 'unread' ? 0 : 1;  // Assuming 'unread' is 0 and 'read' is 1
    
    // Update the read status in the database
    $updateQuery = "UPDATE contact_form SET read_status = ? WHERE contact_id = ?";
    if ($stmt = $conn->prepare($updateQuery)) {
        $stmt->bind_param("ii", $current_status, $contact_id);
        
        if ($stmt->execute()) {
            echo "Message marked as " . ($current_status ? 'Read' : 'Unread');
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }
    
    // Redirect back to the page to refresh the data
    header("Location: php/contact.php");
    exit;
}
?>
