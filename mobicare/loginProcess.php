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

$email = getPostValue('email');
$password = getPostValue('password');

// Using prepared statements to prevent SQL injection
$sql = "SELECT * FROM clients WHERE email = ? AND password = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Error preparing the query: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $row['email'];
    $_SESSION['fname'] = $row['firstname'];
    $_SESSION['lname'] = $row['lastname'];
    $_SESSION['address'] = $row['default_delivery_address'];
    $_SESSION['profilePic'] = $row['profilePic'];

    mysqli_close($conn);
    header('Location: index.php');
    exit();
} else {
    mysqli_close($conn);
    header('Location: login.php?login_error=1');
    exit();
}
?>
