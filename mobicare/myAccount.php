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
    

      
<section class="py-2">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="w-100 justify-content-between d-flex">
                    <h4><b>Orders</b></h4>
                    <a href="edit_account.php" class="btn btn btn-default btn-flat bg-maroon"><div class="fa fa-user-cog"></div> Edit Account Details</a>
                    <a href="index.php" class="btn btn btn-default btn-flat bg-maroon"><div class="fa fa-arrow-left"></div> Back</a>
                </div>
                <hr class="border-warning">
                <table class="table table-stripped text-dark">
                    <colgroup>
                        <col width="10%">
                        <col width="15%">
                        <col width="25%">
                        <col width="25%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>DateTime</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody>



                    <?php
                    $email = $_SESSION['email'];
                    // Assuming you have a valid database connection in the variable $conn
                    $i = 1;
                    						$qry = $conn->query("SELECT o.*, CONCAT(c.firstname, ' ', c.lastname) AS client
                                                                         FROM orders o
                                                                         INNER JOIN clients c ON c.id = o.client_id
                                                                         WHERE c.email = '$email'
                                                                         ORDER BY UNIX_TIMESTAMP(o.date_created) DESC");
                    						while($row = $qry->fetch_assoc()):
                    					?>
                    						<tr>
                    							<td class="text-center"><?php echo $i++; ?></td>
                    							<td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                    							<td><?php echo $row['id'] ?></td>
                    							<td class="text-left"><?php echo number_format($row['amount']) ?></td>
                    							<td class="text-center">
                                                    <?php if($row['status'] == 0): ?>
                                                        <span class="badge badge-light">Pending</span>
                                                    <?php elseif($row['status'] == 1): ?>
                                                        <span class="badge badge-primary">Packed</span>
                    								<?php elseif($row['status'] == 2): ?>
                                                        <span class="badge badge-warning">Out for Delivery</span>
                    								<?php elseif($row['status'] == 3): ?>
                                                        <span class="badge badge-success">Delivered</span>
                    								<?php elseif($row['status'] == 5): ?>
                                                        <span class="badge badge-success">Picked Up</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">Cancelled</span>
                                                    <?php endif; ?>
                                                </td>
                        </tr>
                    <?php endwhile;
                    //$stmt->close();
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

 <!---Footer--->
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
    
<script>
    function cancel_book(id) {
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=update_book_status",
            method: "POST",
            data: {id: id, status: 2},
            dataType: "json",
            error: function (err) {
                console.log(err);
                alert_toast("An error occurred", 'error');
                end_loader();
            },
            success: function (resp) {
                if (typeof resp === 'object' && resp.status === 'success') {
                    alert_toast("Book cancelled successfully", 'success');
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    console.log(resp);
                    alert_toast("An error occurred", 'error');
                }
                end_loader();
            }
        });
    }

    $(function () {
        $('.view_order').click(function () {
            uni_modal("Order Details", "./admin/orders/view_order.php?view=user&id=" + $(this).attr('data-id'), 'large');
        });
        $('table').dataTable();
    });
</script>




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
