<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobile_store_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function getPostValue($key) {
    return isset($_POST[$key]) ? $_POST[$key] : '';
}

$customerId = getPostValue('customerId');
$fname = getPostValue('fname');
$lname = getPostValue('lname');
$email = getPostValue('email');
$pwd = getPostValue('pwd');
$address = getPostValue('address');

// Handle Profile Picture Upload (similar to the registration process)
$profilePic = $_FILES['profilePic']['name'];
$profilePicTmp = $_FILES['profilePic']['tmp_name'];
$profilePicPath = 'profile_pics/' . $profilePic;

// Create the 'profile_pics' directory if it doesn't exist
if (!is_dir('profile_pics')) {
    mkdir('profile_pics', 0777, true);
}

// Using prepared statements to prevent SQL injection
$sql = "UPDATE clients SET firstname=?, lastname=?, email=?, password=?, default_delivery_address=?, profilePic=? WHERE id=?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Error preparing the customer details query: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $email, $pwd, $address, $profilePicPath, $customerId);
if (!mysqli_stmt_execute($stmt)) {
    die("Error updating customer details: " . mysqli_stmt_error($stmt));
}

// Move uploaded Profile Picture to the target directory (similar to the registration process)
if (move_uploaded_file($profilePicTmp, $profilePicPath)) {
    echo "Profile Picture uploaded and details updated successfully!";
} else {
    echo "Error uploading Profile Picture!";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
