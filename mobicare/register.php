<!DOCTYPE html>
<html>
 <head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

<title>MobiCare Online Store</title>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/owl.css">
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
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
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
                        <li class="nav-item">
                            <?php
                            session_start();
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                                echo '<a class="nav-link" href="myAccount.php">My Account</a>';
                            } else {
                                echo '<a class="nav-link" href="login.php">Sign In</a>';
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                                echo '<a class="nav-link" href="logout.php">Logout</a>';
                            } else {
                                echo '<a class="nav-link active" href="register.php">Sign Up</a>';
                            }
                            ?>
                        </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
    <br>
    <br>
    <br>

    <div class="container">
        <h1 class="mt-5">Register</h1>
        <form action="registerProcess.php" method="post" enctype="multipart/form-data">
            <br>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter your First Name" name="fname" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" id="lname" placeholder="Enter your Last Name" name="lname" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="pwd">Password:</label>
                      <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd" required>
                    </div>
                    <div class="form-group">
                      <label for="contact">Contact Number:</label>
                      <input type="contact" class="form-control" id="contact" placeholder="Enter Contact Number" name="contact" required>
                    </div>                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="profilePic">Profile Picture:</label>
                        <input type="file" class="form-control-file" id="profilePic" name="profilePic" accept="image/*" required>
                    </div>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <p class="mt-3">Already have an account? <a href="login.php">Sign In</a></p>
        </form>
        <br>
    </div>

    <br>
    <br>
    


    <!---Footer--->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-item">
            <h4>MobiCare Online Store</h4>
            <p>Step into the future of mobile technology at MobiCare. 
                From the latest flagship smartphones to a vast array of cutting-edge accessories, we curate a world of endless
                 possibilities, ensuring your journey with us is nothing short of extraordinary.</p>
            <ul class="social-icons">
              <li><a rel="nofollow" href="https://www.facebook.com/profile.php?id=61550206393129&mibextid=ZbWKwL" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="checkout.php"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
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
          <div class="col-md-4 footer-item last-item">
            <h4>Contact Us</h4>
            <div class="contact-form">
            <form id="contact-form" action="process_contact_form.php" method="post">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                <fieldset>
                    <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                </fieldset>
            </div>
        </div>
    </form>
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


          </div>
        </div>
      </div>
    
    </footer>

    <div class="sub-footer">
      <div class="container">
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

<script>
    <?php
    if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
        echo "alert('Registration successful!');";
        $_SESSION['registration_success'] = false; // Reset the session variable
    }
    ?>
</script>



</body>
</html>
