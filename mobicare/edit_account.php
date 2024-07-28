<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MobiCare Online Store - Login</title>
  
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <style>
        body {
            font-family: 'Poppins', sans-serif;

        }

    

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        h2 {
            margin-top: 30px;
            color: #333;
        }

        .profile-pic {
            text-align: center;
        }

        .profile-pic img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 30px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }

        .user-details {
            margin-top: 20px;
        }

        .user-details h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .user-details p {
            margin-bottom: 10px;
            color: #555;
        }
        
    </style>
</head>

<body>
 <!-- ***** Preloader Start ***** -->
<div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
</div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="#"><i class="fa fa-envelope"></i>contact.mobicare@gmail.com</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>0112233444</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="https://www.facebook.com/profile.php?id=61550206393129&mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>


  <header class="">
      <nav class="navbar navbar-expand-lg" style="background-color: #000000;">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>MobiCare Online Store</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
              </li>
              <li class="nav-item dropdown ">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
              
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about.php">About Us</a>
                    <a class="dropdown-item" href="blog.php">Blog</a>
                    <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                    <a class="dropdown-item" href="terms.php">Terms & Conditions</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">My Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      </header>

      <br>
      <br>
      <br>
      <br>
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobile_store_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details from the database
$email = $_SESSION['email'];
$sql = "SELECT * FROM clients WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error fetching user details: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['fname'] = $row['firstname'];
    $_SESSION['lname'] = $row['lastname'];
    $_SESSION['address'] = $row['default_delivery_address'];

}

// Handle form submission
if (isset($_POST['updateAccount'])) {
    // Update the user's details
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];

    $sql = "UPDATE clients SET firstname = '$fname', lastname = '$lname', default_delivery_address = '$address' WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error updating user details: " . mysqli_error($conn));
    }

    // Update session variables with new details
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['address'] = $address;
}
// Handle form submission for updating the profile picture
if (isset($_POST['updateProfilePic'])) {
  if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {
      $uploadDirectory = 'uploads'; // Relative path to the upload directory
      $newFilename = $_SESSION['email'] . '_' . basename($_FILES['profilePic']['name']);
      $uploadPath = $uploadDirectory . '/' . $newFilename;

      // Check if the upload directory exists, if not, create it
      if (!file_exists($uploadDirectory)) {
          mkdir($uploadDirectory, 0777, true); // Creates the directory recursively
      }

      // Move the uploaded file to the desired location
      if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $uploadPath)) {
          // Update the profilePic field in the database
          $sql = "UPDATE clients SET profilePic = '$uploadPath' WHERE email = '$email'";
          $result = mysqli_query($conn, $sql);

          if (!$result) {
              die("Error updating profile picture: " . mysqli_error($conn));
          }

          // Update the session variable with the new profile picture path
          $_SESSION['profilePic'] = $uploadPath;

          // Redirect to the profile page after updating the picture
      
          
      } else {
          echo "Failed to move uploaded file.";
      }
  } else {
      echo "Error uploading profile picture.";
  }
}

mysqli_close($conn);
?>







    
    <br><br><br>


    
    <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 style="margin: 0;">Welcome, <?php echo $_SESSION['fname']; ?></h1>
        <div>
            <button onclick="history.back()" style="font-weight: bold; font-size: 22px;">My Orders</button>
            
        </div>
    </div>

  
    <div class="row">
    <div class="col-md-4 profile-pic" style="margin-top: 20px;">
        <?php
        $profilePicPath = isset($row['profilePic']) ? $row['profilePic'] : 'default_profile.jpg';
        ?>
        <img src="<?php echo $profilePicPath; ?>" alt="Profile Picture" style="margin-bottom: 20px;">
        <form method="post" enctype="multipart/form-data">
        <input type="file" name="profilePic" id="profilePicInput" style="display: none;">
        </form>
    </div>
    
    <div class="col-md-8 user-details">
        <p style="font-size: 18px;"><strong>Name:</strong> <?php echo $_SESSION['fname']; ?>
        <strong></strong> <?php echo $_SESSION['lname']; ?></p>
        <p style="font-size: 18px;"><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
        <p style="font-size: 18px;"><strong>Address:</strong> <?php echo $_SESSION['address']; ?></p>
    </div>
</div>

<br>
        <!-- Profile Picture Update Form -->
<div class="container">
    <h2>Update Profile Picture</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="profilePic">Profile Picture:</label>
        <input type="file" name="profilePic"><br>
        <input type="submit" name="updateProfilePic" value="Update Profile Picture">
    </form>
</div>
<br>
<br>
<!-- Account Details Update Form -->
<div class="container">
    <h2>Update Account Details</h2>
    <form method="post">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo $_SESSION['fname']; ?>" required><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?php echo $_SESSION['lname']; ?>" required><br>

        <label for="email">Email: (Email cannot be changed)</label>
        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" readonly><br>

        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $_SESSION['address']; ?>" required><br>

        <!-- Password related field -->
        <label for="password">New Password:</label>
        <input type="password" name="password"><br>

        <input type="submit" name="updateAccount" value="Update Account Details">
    </form>
</div>
</div>
<br>
        
<footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-item">
            <h4>MobiCare Online Store</h4>
            <p>Step into the future of mobile technology at MobiCare. From the latest flagship smartphones to a vast array of cutting-edge accessories, we curate a world of endless possibilities, ensuring your journey with us is nothing short of extraordinary.</p>
            <ul class="social-icons">
              <li><a rel="nofollow" href="https://www.facebook.com/profile.php?id=61550206393129&mibextid=ZbWKwL" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="checkout.php"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
          </div>
        
          <div class="col-md-4 footer-item">
            <!--Footer item -->
          </div>
          <div class="col-md-4 footer-item">
            <h4>Quick Links</h4>
            <ul class="menu-list">
            <li><a href="index.php">Home</a></li>
              <li><a href="products.php">Products</a></li>
              <li><a href="about.php">About Us</a></li>
              <li><a href="contact.php">Contact Us</a></li>
            </ul>
          </div>
</div>
</div>
</div>
<script>
    document.getElementById("contact-form").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Get form data
        var formData = new FormData(this);

        // Send form data to the server
        fetch("process_contact_form.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Display the pop-up message
            alert("Thank you for your valuable feedback!");

            // Clear the form fields
            document.getElementById("name").value = "";
            document.getElementById("email").value = "";
            document.getElementById("message").value = "";
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
</script>
</footer>

    <div class="sub-footer">

        <div class="row">
          <div class="col-md-12">
            <p>
                Copyright © 2023 MobiCare</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    
  

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>
