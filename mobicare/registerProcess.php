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

$fname = getPostValue('fname');
$lname = getPostValue('lname');
$email = getPostValue('email');
$pwd = getPostValue('pwd');
$contact = getPostValue('contact');
$address = getPostValue('address');


// Handle Profile Picture Upload
$profilePic = $_FILES['profilePic']['name'];
$profilePicTmp = $_FILES['profilePic']['tmp_name'];
$profilePicPath = 'profile_pics/' . $profilePic;

// Create the 'profile_pics' directory if it doesn't exist
if (!is_dir('profile_pics')) {
    mkdir('profile_pics', 0777, true);
}

// Using prepared statements to prevent SQL injection
$sql = "INSERT INTO clients (firstname, lastname, contact, email, password, default_delivery_address, profilePic) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Error preparing the customer details query: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $contact, $email, $pwd, $address, $profilePicPath);
if (!mysqli_stmt_execute($stmt)) {
    die("Error inserting customer details: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);

// Move uploaded Profile Picture to the target directory
if (move_uploaded_file($profilePicTmp, $profilePicPath)) {
    mysqli_close($conn);
    echo "Registration Successful!";
    header('refresh:2; url=login.php');
    exit();
} else {
    mysqli_close($conn);
    echo "Error uploading Profile Picture!";
}
?>
