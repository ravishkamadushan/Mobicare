<?php
   session_start();
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
    
    
    <style>
     /* Styles for the product items */
.product-item {
    border: 1px solid #ccc;
    padding: 15px;
    text-align: center;
    background-color: #fff;
    margin-bottom: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    /* Set a fixed height and width */
    width: 250px;
    height: 350px;
}

.product-item:hover {
    transform: translateY(-5px);
}

/* Styles for the product title */
.product-title {
    font-size: 18px;
    margin-top: 20px;
    color: #333;
}

/* Styles for the product price */
.product-price {
    font-size: 16px;
    color: #e74c3c;
    margin-top: 20px;
}

/* Styles for the "View More" button */
.filled-button {
    display: inline-block;
    padding: 8px 16px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.filled-button:hover {
    background-color: #2980b9;
}


  /* Styles for the search form */
  .search-form {
    display: flex;
    align-items: center;
    background-color: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
  }

  .search-form input[type="text"] {
    flex: 1;
    padding: 8px;
    border: none;
    border-radius: 5px;
    outline: none;
  }

  .search-form button {
    background-color: #a4c639;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 8px 15px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .search-form button:hover {
    background-color: #5ea31d;
  }

  /* Styles for the sorting form */
  .sorting-options {
    display: flex;
    align-items: center;
    margin-top: 15px;
  }

  .sorting-options label {
    margin-right: 10px;
  }

  .sorting-options select {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
  }

  .sorting-options button {
    background-color: #a4c639;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .sorting-options button:hover {
    background-color: #5ea31d;
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
      <nav class="navbar navbar-expand-lg">
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
              <li class="nav-item active">
                <a class="nav-link" href="products.php">Products</a>
              </li>
              <li class="nav-item dropdown">
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
              <li class="nav-item">
                            <?php
                         
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
                                echo '<a class="nav-link" href="register.php">Sign Up</a>';
                            }
                            ?>
                        </li>
              </li>
              
              
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Products</h1>
            <span>Find your favourite produts for the best price</span>
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="products.php" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Search by name" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="sorting-options">
                <form action="products.php" method="GET">
                    <label for="sorting">Sort by:</label>
                    <select id="sorting" name="sorting">
                        <option value="name_asc" <?php echo isset($_GET['sorting']) && $_GET['sorting'] === 'name_asc' ? 'selected' : ''; ?>>Name (A-Z)</option>
                        <option value="name_desc" <?php echo isset($_GET['sorting']) && $_GET['sorting'] === 'name_desc' ? 'selected' : ''; ?>>Name (Z-A)</option>
                        <option value="price_asc" <?php echo isset($_GET['sorting']) && $_GET['sorting'] === 'price_asc' ? 'selected' : ''; ?>>Price (Low to High)</option>
                        <option value="price_desc" <?php echo isset($_GET['sorting']) && $_GET['sorting'] === 'price_desc' ? 'selected' : ''; ?>>Price (High to Low)</option>
                    </select>
                    <button type="submit">Apply</button>
                </form>
            </div>
        </div>
    </div>
</div>




    <br>
    <br>

    
      
    <section class="py-2">
    <div class="container">
        <div class="row">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mobile_store_db";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            //retrieve product id, name, price and picture from DB
            $query = "SELECT p.id, p.name, i.price, p.phonePic
                        FROM products p
                        INNER JOIN inventory i ON p.id = i.product_id";
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $sorting = isset($_GET['sorting']) ? $_GET['sorting'] : '';

            //Search function
            if (!empty($search)) {
                $query .= " WHERE p.name LIKE '%$search%'";
            }

            //sorting function
            if (!empty($sorting)) {
                switch ($sorting) {
                    case 'name_asc':
                        $query .= " ORDER BY p.name ASC";
                        break;
                    case 'name_desc':
                        $query .= " ORDER BY p.name DESC";
                        break;
                    case 'price_asc':
                        $query .= " ORDER BY i.price ASC";
                        break;
                    case 'price_desc':
                        $query .= " ORDER BY i.price DESC";
                        break;
                    // Add more sorting options as needed
                }
            }

            //store the result from the query
            $result = mysqli_query($conn, $query);
            //loop through the results to fetch all the rows in the table and store required column data in the variables
            while ($row = mysqli_fetch_assoc($result)):
            $phonePic = $row['phonePic'];
                        if (!empty($phonePic)) {
                                // Assuming $phonePic contains the binary image data
                                $imageSrc = 'data:image/jpeg;base64,' . base64_encode($phonePic);
                            } else {
                                // Default image source in case phonePic is empty
                                $imageSrc = 'path/to/default/image.jpg';
                            }
                        $productName = $row['name'];
            ?>

            <!-- display the retrieved data in the html components-->
            <div class="col-md-4">
                <div class="product-item">
                    <img src="<?php echo $imageSrc; ?>" alt="<?php echo $productName; ?>" width="100" height="100">
                    <h2 class="product-title"><?php echo htmlspecialchars($row['name']); ?></h2>
                    <p class="product-price">Rs. <?php echo number_format($row['price'], 2); ?></p>
                    <a href="product-details.php?id=<?php echo $row['id']; ?>" class="filled-button">View More</a>
                </div>
            </div>

            <?php endwhile; ?>
        </div>
    </div>
</section>


   
        <br>
        <br>

   

        <br>
        <br>


      </div>
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