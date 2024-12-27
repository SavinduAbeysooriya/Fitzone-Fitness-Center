<?php
@include 'includes/dbh.inc.php'; // Database connection
// Fetch membership plans
$query = "SELECT * FROM membership_plans";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$plans = [];
while ($row = mysqli_fetch_assoc($result)) {
    $plans[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Membership Plans</title>
    <script src="https://www.payhere.lk/lib/payhere.js"></script>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: black;
            background: linear-gradient(to bottom, #000000, #00001D);
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .section-title {
            font-size: 2rem;
            color: #fdae40;
            margin-bottom: 20px;
            text-align: center;
        }

        .membership-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Center items */
        }

        h1{
            text-align: center;
        }

        .membership-plan {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            margin: 10px;
            background-color: #000024; /* Match your theme */
            transition: transform 0.3s ease;
            text-align: center;
        }

        .membership-plan:hover {
            transform: scale(1.05);
        }

        .membership-plan h2 {
            color: #fdae40;
            font-size: 1.5rem;
            margin: 10px 0;
        }

        .membership-plan p {
            margin: 5px 0;
            color: #bbb;
        }

        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FFD700;
            color: #000;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #FFC107; /* Highlight on hover */
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
        <li><a href="Blogs.php">Blogs</a></li>
        <li><a href="feedbacks.php">Feedbacks</a></li> 
        <li><a href="FAQs.php">FAQs</a></li> 
        <li><a href="aboutus.php">Aboutus</a></li><br>  
        <li><a href="events.php">Events & Promotions</a></li> 
        <li><a href="booking.php">Booking</a></li> 
        
        
    </ul>
    </nav>
  </header>

  <a href="javascript:history.back()" class="back-button">←</a>

<h1>Our Membership Plans</h1>
<div class="membership-container">
    <?php foreach ($plans as $plan) { ?>
        <div class="membership-plan">
            <h2><?php echo $plan['plan_name']; ?></h2>
            <p><?php echo $plan['description']; ?></p>
            <p>Price: $<?php echo $plan['price']; ?></p>
            <p>Duration: <?php echo $plan['duration']; ?></p>
            <p>Benefits: <?php echo $plan['benefits']; ?></p>
            <?php if ($plan['promotion']) { ?>
                <p>Promotion: <?php echo $plan['promotion']; ?></p>
            <?php } ?>
            <button class="btn-primary" onclick="payNow(<?php echo $plan['id']; ?>, 
            '<?php echo $plan['plan_name']; ?>', '<?php echo $plan['description']; ?>', <?php echo $plan['price']; ?>)">Sign Up</button>
        </div>
    <?php } ?>
</div>
<script>
    function payNow(planId, planName, planDescription, price) {
        var payment = {
            "sandbox": true, // Set to false in production
            "merchant_id": "your_merchant_id", // Replace with your Merchant ID
            "return_url": "https://yourwebsite.com/success.php",
            "cancel_url": "https://yourwebsite.com/cancel.php",
            "notify_url": "https://yourwebsite.com/notify.php", // For payment notifications
            "order_id": "order_" + Math.random().toString(36).substr(2, 9), // Generate a unique order ID
            "items": planName, // Payment item
            "amount": price, // Amount in dollars
            "currency": "USD",
            "first_name": "John", // Customer's first name
            "last_name": "Doe", // Customer's last name
            "email": "customer@example.com", // Customer's email
            "phone": "0112345678", // Customer's phone number
            "address": "No 1, Main Street", // Customer's address
            "city": "Colombo", // Customer's city
            "country": "Sri Lanka" // Customer's country
        };
        payhere.startPayment(payment);
    }
</script>

</body>
</html>
