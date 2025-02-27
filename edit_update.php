<?php
// Include database connection file
include('php/db_con.php');

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $update_id = $_GET['id'];

    // Fetch the existing update data
    $update_query = "SELECT * FROM updates WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("i", $update_id);
    $stmt->execute();
    $update_result = $stmt->get_result();

    if ($update_result->num_rows == 1) {
        $update_data = $update_result->fetch_assoc();
    } else {
        echo "Update not found!";
        exit;
    }
}

// Handle form submission to update the update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $content = $_POST['content'];

    // Handle image upload if provided
    if ($_FILES['image']['name'] != "") {
        // Generate a unique image name to avoid overwriting
        $image = uniqid() . "_" . basename($_FILES['image']['name']);  // Generates unique image filename
        $target_dir = "uploads/";
        $target_file = $target_dir . $image;

        // Attempt to move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $error_message = "Error uploading the image.";
        }
    } else {
        // If no new image is uploaded, retain the current image
        $image = $update_data['image'];
    }

    // Update the record in the database
    $update_query = "UPDATE updates SET title = ?, author = ?, category = ?, content = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssssi", $title, $author, $category, $content, $image, $update_id);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        $success_message = "Update was successfully updated!";
    } else {
        $error_message = "Failed to update the update.";
    }
}
?>
<!-- HTML Form to Edit the Update -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Update</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Update</h2>
        
        <?php if (isset($success_message)) : ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST" action="edit_update.php?id=<?php echo $update_data['id']; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($update_data['title']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo htmlspecialchars($update_data['author']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($update_data['category']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required><?php echo htmlspecialchars($update_data['content']); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/jpeg, image/png, image/gif">
                <small>Current image: <?php echo $update_data['image']; ?></small>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
