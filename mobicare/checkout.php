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

  <style>
    .popup {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #333;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        z-index: 9999;
    }

  </style>

  <script>
      // Function to display a popup message
      function showPopup(message) {
          // Create a new element for the popup
          var popup = document.createElement("div");
          popup.className = "popup";
          popup.textContent = message;

          // Append the popup element to the body
          document.body.appendChild(popup);

          // Remove the popup after a certain duration
          setTimeout(function() {
              document.body.removeChild(popup);
          }, 3000); // Display for 3 seconds
      }

      // Function to handle the order placement
      function placeOrder() {
          // You can perform validation and error handling here

          // Display success popup
          showPopup("Order placed successfully!");
      }
  </script>


  <body>
<!-- ***** Preloader Start *****
<div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
     ***** Preloader End ***** -->

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

    




 <!-- Page Content -->

<section class="py-5">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body"></div>
            <h3 class="text-center"><b>Checkout</b></h3>
                    <a href="products.php" class="btn btn btn-default btn-flat bg-maroon"><div class="fa fa-arrow-left"></div> Back</a>
            <hr class="border-dark">
            <form action="success.php" id="place_order">
                <input type="hidden" name="amount" value="<?php echo $total ?>">
                <input type="hidden" name="payment_method" value="cod">
                <input type="hidden" name="paid" value="0">
                <div class="row row-col-1 justify-content-center">
                    <div class="col-6">
                    <div class="form-group col mb-0">
                    <label for="" class="control-label">Order Type</label>
                    </div>
                    <div class="form-group d-flex pl-2">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input custom-control-input-primary" type="radio" id="customRadio4" name="order_type" value="1" checked="">
                          <label for="customRadio4" class="custom-control-label">For Delivery</label>
                        </div>
                        <!--<div class="custom-control custom-radio ml-3">
                          <input class="custom-control-input custom-control-input-primary custom-control-input-outline" type="radio" id="customRadio5" name="order_type" value="2">
                          <label for="customRadio5" class="custom-control-label">For Pick up</label>
                        </div> -->
                      </div>
                        <div class="form-group col address-holder">
                            <label for="" class="control-label"></label>
                            <h4>Your phone will be delivered to the address saved when creating the account</h4>
                        </div>
                        <br>
                        <br>
                        <div class="col">
                          <!-- test -->
                    <?php
                                                    // Start the session at the beginning of the file
                                                    //session_start();
                                        $productPrice = 0;
                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                        // Retrieve values from POST data
                                                        if (isset($_SESSION['product_qty'])) {
                                                            $quantity = intval($_SESSION['product_qty']);
                                                        }

                                                        // Retrieve the product name from the session
                                                        if (isset($_SESSION['product_totalPrice'])) {
                                                          $productPrice = $_SESSION['product_totalPrice'];
                                                        }
                                                        if (isset($_SESSION['product_ID'])) {
                                                            $productID = $_SESSION['product_ID'];
                                                        }
                                                    }
                    ?>
                            <span><h4><b>Total: Rs. </b> <?php echo $productPrice ?></h4></span>
                            <span><h4><b>QTY: </b> <?php echo $quantity ?></h4></span>
                            <span><h4><b>email: </b> <?php echo $_SESSION['email'] ?></h4></span>
                            
                        </div>

                           <?php
                           // Assuming you have already set up your session variables and retrieved the necessary values

                           if ($_SERVER["REQUEST_METHOD"] == "POST") {
                               // Retrieve values from the form submission
                               //$productPrice = $_POST['amount']; // Assuming the form field name is 'amount'
                               $email = $_SESSION['email'];
                               $orderDate = date("Y-m-d H:i:s"); // Current date and time

                               // You can perform validation and sanitation on the data if needed

                               // Insert data into the 'orders' table


                               $servername = "localhost";
                               $username = "root";
                               $password = "";
                               $dbname = "mobile_store_db";



                               $conn = new mysqli($servername, $username, $password, $dbname);
                               if ($conn->connect_error) {
                                   die("Connection failed: " . $conn->connect_error);
                               }

                               // Retrieve user ID based on email
                                                                  $userQuery = "SELECT id FROM clients WHERE email = '$email'";
                                                                  $userResult = $conn->query($userQuery);

                                                                  if ($userResult->num_rows > 0) {
                                                                      $userRow = $userResult->fetch_assoc();
                                                                      $userId =$userRow['id'];


                               // Insert data into the 'orders' table with user ID
                                       $sql = "INSERT INTO orders (client_id, amount, date_created) VALUES ('$userId', '$productPrice', '$orderDate')";

                                       if ($conn->query($sql) === TRUE) {
                                           echo "";
                                       } else {
                                           echo "Error: " . $sql . "<br>" . $conn->error;
                                       }
                                   } else {
                                       echo "User with provided email not found.";
                                   }

                                     // Construct the query to update the inventory
                                   $updateQuery = "UPDATE inventory SET quantity = quantity - $quantity WHERE product_id = $productID";


                                   if ($conn->query($updateQuery) === TRUE) {
                                    echo "";
                                   } else {
                                     echo "Error: " . $updateQuery . "<br>" . $conn->error;
                                                                          }
                                   } else {
                                      echo "product id not found.";
                                   }

                                  $conn->close();

                           ?>


                        <hr>
                        <div class="col my-3">
                        <h4 class="text-muted">Payment Method :</h4>
                        <p style="font-size: 18px;">Cash On Delivery</p>
                        <br>
                            <div class="d-flex w-100 justify-content-between">
                                <button type="submit" class="filled-button" onclick="placeOrder()">Place the Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


 <!--Page Content End -->

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