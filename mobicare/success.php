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

  <h1>Order placed successfully. Thank you for your purchase
  <div style="text-align: center; padding: 50px;">
          <a href="index.php"><button>Return to Home</button></a>
      </div>
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

    </body>
  </html>