<?php
@include 'includes/dbh.inc.php';

if (!$conn) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

// Check if 'id' is passed in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Query to get the product details along with any associated promotion (Full Outer Join)
    $query = "
    SELECT 
        p.name AS program_name, 
        p.image AS program_image, 
        p.price AS program_price, 
        promo.name AS promo_name, 
        promo.image AS promo_image, 
        promo.price AS promo_price
    FROM programs p
    LEFT JOIN events promo 
        ON p.id = promo.id
    WHERE p.id = $product_id

    UNION

    SELECT 
        p.name AS program_name, 
        p.image AS program_image, 
        p.price AS program_price, 
        promo.name AS promo_name, 
        promo.image AS promo_image, 
        promo.price AS promo_price
    FROM events promo
    LEFT JOIN programs p 
        ON p.id = promo.id
    WHERE promo.id = $product_id
";

    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Set the variables for the product details
        $program_name = $row['program_name'];
        $program_image = $row['program_image'];
        $program_price = $row['program_price'];

        // Set the variables for promotion details if they exist
        $promotion_name = $row['promo_name'];
        $promotion_image = $row['promo_image'];
        $promotion_price = $row['promo_price'];
    } else {
        echo "Product not found!";
        $program_name = $program_image = $program_price = ''; // Default values to avoid undefined variable issues
        $promotion_name = $promotion_image = $promotion_price = ''; // Default values for promotion
    }
} else {
    echo "No product selected!";
    $program_name = $program_image = $program_price = ''; // Default values to avoid undefined variable issues
    $promotion_name = $promotion_image = $promotion_price = ''; // Default values for promotion
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Now-Fitzone Fitness center</title>

<style>
    
/* CSS for All */
*{
    margin: 0 0;
    padding: 0 0;
    font-family: Arial, Helvetica, sans-serif;
    
}
body{
    background: linear-gradient(to top, #000000, #00001D);
}
.container{
    width: 80%;
    margin: 0 auto;
    padding: 1%;
}
.img-responsive{
    width: 100%;
}
.img-curve{
    border-radius: 15px;
}

.text-right{
    text-align: right;
}
.text-center{
    text-align: center;
}
.text-left{
    text-align: left;
}
.text-white{
    color: white;
}

.clearfix{
    clear: both;
    float: none;
}

a{
    color: #ff6b81;
    text-decoration: none;
}
a:hover{
    color: #ff4757;
}

.btn{
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
}
.btn-primary{
    background-color: #b8860b ;
    color: black;
    cursor: pointer;
}
.btn-primary:hover{
    color: white;
    background-color: red;
}
h2{
    color: #2f3542;
    font-size: 2rem;
    margin-bottom: 2%;
}
h3{
    font-size: 1.5rem;
}
.float-container{
    position: relative;
}
.float-text{
    position: absolute;
    bottom: 50px;
    left: 40%;
}
fieldset{
    border: 1px solid white;
    margin: 5%;
    padding: 3%;
    border-radius: 5px;
}



/* CSS for Food Menu */
.program-menu{
    background-color: #ececec;
    padding: 4% 0;
}
.program-menu-box{
    width: 43%;
    margin: 1%;
    padding: 2%;
    float: left;
    background-color: white;
    border-radius: 15px;
}

.program-menu-img{
    width: 20%;
    float: left;
}

.program-menu-desc{
    width: 70%;
    float: left;
    margin-left: 8%;
    color:  #b8860b;
}

.program-price{
    font-size: 1.2rem;
    margin: 2% 0;
}
.program-detail{
    font-size: 1rem;
    color: #747d8c;
}



/* for Order Section */
.order{
    width: 50%;
    margin: 0 auto;
}
.input-responsive{
    width: 96%;
    padding: 1%;
    margin-bottom: 3%;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    
}
.order-label{
    margin-bottom: 1%; 
    font-weight: bold;
    
    color: wheat;
}


/* CSS for Mobile Size or Smaller Screen */

@media only screen and (max-width:768px){
    .logo{
        width: 80%;
        float: none;
        margin: 1% auto;
    }

    .menu ul{
        text-align: center;
    }

    .program-search input[type="search"]{
        width: 90%;
        padding: 2%;
        margin-bottom: 3%;
    }

    .btn{
        width: 91%;
        padding: 2%;
    }

    .program-search{
        padding: 10% 0;
    }

    .categories{
        padding: 20% 0;
    }
    h2{
        margin-bottom: 10%;
    }
    .box-3{
        width: 100%;
        margin: 4% auto;
    }

    .program-menu{
        padding: 20% 0;
    }

    .program-menu-box{
        width: 90%;
        padding: 5%;
        margin-bottom: 5%;
    }
    .social{
        padding: 5% 0;
    }
    .order{
        width: 100%;
    }
}



/* CSS for Promotion Menu */
.promotion-menu-img {
    width: 20%; /* Same as food image */
    float: left; /* Aligns left */
}

.promotion-menu-desc {
    width: 70%; /* Same width for description */
    float: left; /* Aligns left */
    margin-left: 8%; /* Same margin as food description */
}

.promotion-price {
    font-size: 1.2rem; /* Consistent font size */
    margin: 2% 0; /* Margin consistent with food price */
}

.order-label {
    margin-bottom: 1%; 
    font-weight: bold; /* Keep order label consistent */
}

.back-button {
            position: fixed;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background-color: #FFD700;
            color: #000;
            border-radius: 5%;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #FFC107;
        }


    </style>
</head>

<body>
    
<a href="javascript:history.back()" class="back-button">←</a>

   <!-- Food Search Section -->
   <section class="program-search">
        <div class="container">
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="process_order.php" method="POST" class="order">
            <input type="hidden" name="food-title" value="<?php echo !empty($promotion_name) ? $promotion_name : $program_name; ?>">
                <fieldset>
                    <legend style="color:white">Selected Program</legend>

                    <!-- Display product details -->
                    <div class="program-menu-img">
                    <img src="Assets/<?php 
                      if (!empty($promotion_name)) { 
                           echo $promotion_image; 
                      } else if (!empty($program_name)) { 
                        echo $program_image; 
                          } 
                      ?>" alt="<?php echo !empty($promotion_name) ? $promotion_name : $program_name; ?>" class="img-responsive img-curve">
                    </div>

                    <div class="program-menu-desc">
                    <H3 style="color:  #b8860b;">$<?php 
                   // Display the price based on whether a promotion exists
                    if (!empty($promotion_price)) {
                     echo $promotion_price; 
                    } else if (!empty($program_price)) { 
                      echo $program_price; 
                     } 
                      ?></h3>

                        <p class="program-price"><?php echo !empty($promotion_name) ? $promotion_name : $program_name; ?></p>

                      

                    </div>
                 </fieldset>

                <!-- Delivery Details Section -->
                <fieldset>
                    <legend style="color:white">Enter Your Details</legend>

                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Enter Your Name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Enter Contact Number" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Enter Email" class="input-responsive" required>

                    <div class="order-label">Startig Date</div>
                    <input type="date" name="Starting-date" placeholder="Date" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="5" placeholder="Enter Address: Street, City, Country" class="input-responsive" required></textarea>
                    

                    <input type="submit" name="submit" value="Buy Now" class="btn btn-primary">
                </fieldset>

            </form>
        </div>
    </section>

</body>
</html