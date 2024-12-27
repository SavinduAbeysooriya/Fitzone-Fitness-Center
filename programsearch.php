<?php
@include 'includes/dbh.inc.php';

if (!$conn) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch categories from the database
$query = "SELECT id, Name, Image FROM category";
$result = mysqli_query($conn, $query);


if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Store fetched categories in an array
$categories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

// Fetch products from the database
$programsQuery = "SELECT * FROM programs";
$programsResult = mysqli_query($conn, $programsQuery);

if (!$programsResult) {
    die("Query failed: " . mysqli_error($conn));
}

// Store fetched products in an array
$programs = [];
while ($row = mysqli_fetch_assoc($programsResult)) {
    $programs[] = $row;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search-Fitzone Fitness center</title>

<style>
     
/* CSS for All */
*{
    margin: 0 0;
    padding: 0 0;
    font-family: Arial, Helvetica, sans-serif;
    
}
body{
    background: linear-gradient(to bottom, #000000, #00001D);
   
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
    background-color: #FFC107;
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

/* CSS for Food SEarch Section */

.program-search{
    background-image: url(bg.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 7% 0;
}

.program-search input[type="search"]{
    width: 50%;
    padding: 1%;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
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


.wallpaper-section {
    display: flex;
    justify-content: space-between; /* Spacing between the images */
    align-items: center;
    margin-top: -10px;
}

.wallpaper {
    flex: 1;
    margin: 30px;
}

.wallpaper img {
    width: 90%;
    height: 300px;
    border-radius: 10px;
    object-fit: cover;
}

/* For mobile responsiveness */
@media (max-width: 768px) {
    .wallpaper-section {
        flex-direction: column;
    }

    .wallpaper {
        margin-bottom: 15px; /* Space between images in vertical layout */
    }
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
         
        <li><a href="programs.php">Programs</a></li> 
        <li><a href="feedbacks.php">Feedbacks</a></li> 
        <li><a href="blogs.php">Blogs</a></li> 
        <li><a href="FAQs.php">FAQs</a></li> 
        <li><a href="aboutus.php">Aboutus</a></li><br> 
        <li><a href="membership.php">Membership</a></li> 
        <li><a href="events.php">Events & Promotions</a></li> 
        <li><a href="booking.php">Booking</a></li> 
        
        
    </ul>
    </nav>
  </header>



<a href="javascript:history.back()" class="back-button">←</a>

    <!-- program sEARCH Section Starts Here -->
    <section class="program-search text-center">
    <div class="container">
        <form action="searchresult.php" method="POST">
            <input type="search" name="search" placeholder="Search for Programs.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>

<!-- Mobile wallpaper photos section -->
<div class="wallpaper-section">
        <div class="wallpaper">
            <img src="Assets/int1.jpeg" alt="Wallpaper 1" class="img-responsive">
        </div>
        <div class="wallpaper">
            <img src="Assets/int2.jpeg" alt="Wallpaper 2" class="img-responsive">
        </div>
        <div class="wallpaper">
            <img src="Assets/int3.jpeg" alt="Wallpaper 3" class="img-responsive">
        </div>


</body>
</html>