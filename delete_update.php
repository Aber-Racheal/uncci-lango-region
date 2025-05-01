<?php
// Include database connection
include('php/db_con.php');

// Check if the update ID is set in the URL
if (isset($_GET['id'])) {
    $update_id = $_GET['id'];

    // Delete the update from the database
    $delete_query = "DELETE FROM updates WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $update_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Successfully deleted, redirect back to updates page
        header("Location: updates.php");
    } else {
        // Failed to delete, show error
        echo "Failed to delete the update.";
    }
}
?>
