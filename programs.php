<?php
@include 'includes/dbh.inc.php';

if (!$conn) {
    die("Failed to connect to database: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs-Fitzone Fitness center</title>

<style>
/* CSS for All */
*{
    margin: 0 0;
    padding: 0 0;
    font-family: Arial, Helvetica, sans-serif;
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
    background-color: #ff6b81;
    color: white;
    cursor: pointer;
}
.btn-primary:hover{
    color: white;
    background-color: #ff4757;
}
h2{
    color: white;
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



/* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f8f9fa;
    color: #333;
}

/* Container */
.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;

    
}

.program-search {
    background: url('Assets/bg5.jpg') no-repeat center center/cover;
    color: #fff;
    padding: 60px 0;
    
}



/* Food Menu Section */
.program-menu {
    padding: 60px 0;
    background: linear-gradient(to top, #000000, #00001D);
}

.program-menu .text-center {
    margin-bottom: 40px;
    font-size: 2rem;
    font-weight: bold;
}

.program-menu-box {
    display: flex;
    flex-wrap: wrap;
    background-color:rgb(0, 29, 100);
    margin-bottom: 20px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.program-menu-box:hover {
    transform: translateY(-5px);
}

.program-menu-img {
    flex: 1;
    max-width: 150px;
    overflow: hidden;
}

.program-menu-img img {
    width: 100%;
    border-radius: 15px 0 0 15px;
    height: 100%;
    object-fit: cover;
}

.program-menu-desc {
    flex: 2;
    padding: 20px;
}

.program-menu-desc h4 {
    font-size: 1.5rem;
    color: #e6a200;
    margin-bottom: 10px;
}

.program-price {
    color: #20bf6b;
    font-size: 1.25rem;
    font-weight: bold;
}

.program-detail {
    margin: 15px 0;
    color: #666;
    line-height: 1.5;
}

.program-menu-desc .btn {
    background-color:brown;
    color: #fff;
    border: none;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.program-menu-desc .btn:hover {
    background-color:#e6a200;
    
}



header {
  background-color: transparent; /* Transparent to let the nav bar's style show */
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 80px;
  padding: 0 20px;
  background: #000020; /* Solid dark blue background */
  border-radius: 0px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Slight shadow for depth */
  margin: 0px 0px; /* Margin for spacing at the top */
}

nav .logo {
  display: flex;
  align-items: center;
}

nav .logo img {
  width: 120px;
  height: 120px;
  margin-right: 10px;
  transition: transform 0.3s ease;
}

nav .logo img:hover {
  transform: scale(1.1); /* Zoom effect on hover */
}

nav .logo h1 {
  color: #fdae40;
  font-size: 1.8rem;
  font-weight: bold;
}

nav ul {
    display: flex;
    flex-wrap: wrap; /* Allow items to wrap onto the next line */
    list-style: none;
    padding: 0;
    margin: 0;
    justify-content: center; /* Center the items horizontally */
}


nav ul li {
  margin: 0 12px;
}

nav ul li a {
  text-decoration: none;
  color: #fff;
  font-size: 1rem;
  font-weight: bold;
  transition: color 0.3s ease;
}

nav ul li a:hover {
  color: #fdae40; /* Change to highlight color on hover */
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

          


        @media (max-width: 768px) {
    nav{
        height: 300px;
    }
    nav .logo {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
    }

    nav .logo img {
        width: 60px;
        height: 60px;
    }

    nav .logo h1 {
        font-size: 1.2rem;
    }

    nav ul {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 100%;
    }

    nav ul li {
        margin: 5px 0;
    }

    nav ul li a {
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    nav .logo img {
        width: 50px;
        height: 50px;
    }

    nav ul {
        display: block; /* Stack items vertically for very small screens */
        text-align: center;
    }

    nav ul li {
        display: block; /* Ensures each link is on a new line */
        margin: 10px 0; /* Adds space between each item */
    }

    nav ul li a {
        font-size: 0.9rem;
        display: inline-block; /* Ensures the links can wrap naturally */
    }
}
.button-list {
    position: absolute; /* Positions the button list in a fixed position */
    bottom: 390px;    /* Adjusts the distance from the bottom */
    left: 20px; 
       /* Adjusts the distance from the left */
}

.cta-btn {
    display: block;            /* Makes the buttons block-level elements */
    padding: 10px 10px;       /* Button padding */
    background-color: #e6a200; /* Button background color */
    color: #202020;           /* Button text color */
    text-decoration: none;     /* Removes underline from links */
    border-radius: 5px;       /* Rounds button corners */
    font-size: 1.1rem;        /* Font size */
    font-weight: bold;        /* Makes the font bold */
    margin-bottom: 10px;      /* Adds space between buttons */
    transition: background-color 0.3s ease, color 0.3s ease; /* Button hover transition */
}

.cta-btn:hover {
    background-color: #fff;   /* Changes background color on hover */
    color: #fdae40;           /* Changes text color on hover */
}


</style>
</head>

<body>
<header>
    <nav>
        <div class="logo">
          <img src="Assets\gym_logo.png" alt="Logo" />
            <h1>Fitzone Fitness center</h1>
        </div>
        <ul>
        
        
        <li><a href="blogs.php">Blogs</a></li> 
        <li><a href="feedbacks.php">Feedbacks</a></li> 
        <li><a href="aboutus.php">Aboutus</a></li><br> 
        <li><a href="FAQs.php">FAQs</a></li> 
        <li><a href="membership.php">Membership</a></li> 
        <li><a href="booking.php">Booking</a></li> 
        
        
    </ul>
    </nav>
  </header>

  <a href="javascript:history.back()" class="back-button">←</a>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="program-search text-center">
        <div class="container">
        <div class="button-list">
      
        
        <a href="events.php" class="cta-btn">Events & Promotions</a>
        <a href="categories.php" class="cta-btn">Program Categories</a>
        <a href="programsearch.php" class="cta-btn">Search Programs</a>
        </div>
       

        </div>
    </section>
   
    <!-- fOOD MEnu Section Starts Here -->
    <section class="program-menu">
        <div class="container">
            <h2 class="text-center">ALL PROGRAMS</h2>

            <?php
        // Fetch products from the database
        $select_products = mysqli_query($conn, "SELECT * FROM programs");
        if (mysqli_num_rows($select_products) > 0) {
            // Loop through the products and display them
            while ($row = mysqli_fetch_assoc($select_products)) { 
        ?>
            <div class="program-menu-box">
                <div class="program-menu-img">
                    <img src="Assets/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="img-responsive img-curve">
                </div>

                <div class="program-menu-desc">
                    <h4><?php echo $row['name']; ?></h4>
                    <p class="program-price">$<?php echo $row['price']; ?></p>
                    <p class="program-detail">
                        <?php echo $row['description']; ?>
                    </p>
                    <br>

                   <a href="buy.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Buy now</a>

                </div>
            </div>
        <?php
            }
        } else {
            echo "<p class='text-center'>No programs available at the moment.</p>";
        }
        ?>

            <div class="clearfix"></div>
        </div>
    </section>

</body>
</html>

