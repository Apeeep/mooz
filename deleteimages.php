<?php
include './config/connection.php';

function deleteImage($userId) {
  global $connection;

  // Fetch user image data
  $getImage = $connection->query("SELECT users_img FROM users WHERE id_users = '$userId'");
  $imageData = $getImage->fetch_assoc();
  $userImage = $imageData['users_img'];

  // Check if the image file exists and delete it
  $imagePath = "./images/$userImage";
  if (file_exists($imagePath)) {
    unlink($imagePath);

    // Update the user record to remove the image reference
    $connection->query("UPDATE users SET users_img = NULL WHERE id_users = '$userId'");
  }
}

// Call the function with the user ID from the $_GET parameter
if (isset($_GET['id'])) {
  $userId = $_GET['id'];
  deleteImage($userId);
  
  // Redirect to the users list page
  header("location:userslist.php");
}
?>
