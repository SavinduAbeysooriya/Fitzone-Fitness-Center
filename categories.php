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
$programQuery = "SELECT * FROM programs";
$programResult = mysqli_query($conn, $programQuery);

if (!$programResult) {
    die("Query failed: " . mysqli_error($conn));
}
// Store fetched products in an array
$programs = [];
while ($row = mysqli_fetch_assoc($programResult)) {
    $programs[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories-Fitzone Fitness center</title>

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
    color: #dcdcdc;
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

/* CSS for Categories */
.categories{
    padding: 4% 0;
}

.box-3{
    width: 28%;
    float: left;
    margin: 2%;
}


.category-link {
    text-decoration: none; 
    color: inherit; 
    transition: transform 0.3s; 
}

.box-3 {
    position: relative; 
    overflow: hidden; 
    border-radius: 10px; 
    margin: 15px; 
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); 
    transition: transform 0.3s, box-shadow 0.3s; 
}

.box-3:hover {
    transform: scale(1.05); 
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3); 
}

.img-responsive {
    width: 100%; 
    height: auto; 
}

.float-text {
    position: absolute; 
    bottom: 10px; 
    left: 15px; 
    font-size: 24px; 
    background-color: rgba(0, 0, 0, 0.6); 
    padding: 10px; 
    border-radius: 5px; 
    transition: background-color 0.3s; 
}

.float-text:hover {
    background-color: rgba(0, 0, 0, 0.8); 
}

.program-categories {
     
    background: linear-gradient(to bottom, #000000, #00001D);
    padding: 4% 0; 
}

.program-category-box {
    position: relative; 
    overflow: hidden; 
    border-radius: 18px;
    
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); 
    transition: transform 0.3s, box-shadow 0.3s; 
}

.program-category-box:hover {
    transform: scale(1.05); 
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3); 
}

.category-link {
    display: block; 
    margin: 1%; 
    width: calc(25% - 2%); 
    height: 450px; /* Adjust the height value as needed */
    float: left; 
    text-decoration: none; 
    color: inherit; 
}

.img-responsive {
    width: 100%; 
    height: 400px; 
    object-fit: cover; 
}

.category-name {
    position: absolute; 
    bottom: 20px; 
    left: 15px; 
    font-size: 1.5rem; 
    color: #dcdcdc; 
    padding: 10px; 
    border-radius: 5px; 
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Adjust shadow size and color */
    
}



/* Responsive design */
@media (max-width: 768px) {
    .category-link {
        width: calc(50% - 2%); 
    }
}

@media (max-width: 480px) {
    .category-link {
        width: 100%; 
    }
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

    <!-- CAtegories Section Starts Here -->
    <section class="program-categories">
        <div class="container">
            <h2 class="text-center">Explore Programs by <strong>Categories</strong></h2>

            <?php if (count($categories) > 0): ?>
                <?php foreach ($categories as $category): ?>
                    <a href="categoryprogram.php?category_id=<?php echo $category['id']; ?>" class="category-link">
                        <div class="program-category-box">
                            <img src="Assets/<?php echo $category['Image']; ?>" alt="<?php echo $category['Name']; ?>" class="img-responsive img-curve">
                            <h3 class="category-name"><?php echo ($category['Name']); ?></h3>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">No categories available at the moment.</p>
            <?php endif; ?>

        <div class="clearfix"></div>
        </div>
    </section>
  
    
</body>
</html>