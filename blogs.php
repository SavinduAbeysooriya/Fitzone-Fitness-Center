<?php
// Database connection
@include 'includes/dbh.inc.php';

// SQL query to fetch blog posts
$sql = "SELECT * FROM blogs ORDER BY published_link DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs - FitZone Fitness Center</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #000;
            background: linear-gradient(to bottom, #000000, #00001D);
            color: #fff;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        .section-title {
            font-size: 2.5rem;
            color: #fdae40;
            margin-bottom: 30px;
        }
        .blog-item {
            background-color: #000021;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .blog-item:hover {
            transform: scale(1.02);
        }
        .blog-title {
            color: #FFD700;
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .blog-summary {
            font-size: 1.1rem;
        }
        .blog-date {
            font-size: 0.9rem;
            color: #aaa;
        }
        .blog-image {
            width: 100%;
            height: auto;
            max-height: 300px;
            border-radius: 8px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .blog-btn{
        display: inline-block;
            padding: 10px 20px;
            color: #000;
            background-color: #FFD700; /* Yellow */
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .blog-btn:hover {
            background-color: #FFC107; /* Darker yellow on hover */
            color: #fff;
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
        <li><a href="FAQs.php">FAQs</a></li> 
        <li><a href="aboutus.php">Aboutus</a></li><br> 
        <li><a href="membership.php">Membership</a></li> 
        <li><a href="events.php">Events & Promotions</a></li> 
        <li><a href="booking.php">Booking</a></li> 
        
        
    </ul>
    </nav>
  </header>



<a href="javascript:history.back()" class="back-button">←</a>
<div class="container">
    <h1 class="section-title">Our Latest Blogs</h1>
    
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="blog-item">
                <img src="Assets/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="blog-image">
                
                <h2 class="blog-title"><?php echo htmlspecialchars($row['title']); ?></h2>
                <p class="blog-summary"><?php echo htmlspecialchars($row['summary']); ?></p>
                <a href="<?php echo htmlspecialchars($row['published_link']); ?>" target="_blank" class="blog-btn">Read more</a></p>
              
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No blogs available at the moment. Check back later!</p>
    <?php endif; ?>
</div>
</body>
</html>
