<?php
@include 'includes/dbh.inc.php'; // Database connection

// Handle appointment submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_appointment'])) {
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $query = mysqli_real_escape_string($conn, $_POST['query']);

    $insert_query = "INSERT INTO appointments (customer_name, appointment_date, query) VALUES ('$customer_name', '$appointment_date', '$query')";
    
    if (mysqli_query($conn, $insert_query)) {
        echo "<script>alert('Appointment submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Fetch all appointments
$appointments_query = "SELECT * FROM appointments ORDER BY created_at DESC";
$appointments_result = mysqli_query($conn, $appointments_query);
$appointments = mysqli_fetch_all($appointments_result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FitZone Fitness Center - Booking</title>
    <style>
        /* Place the provided CSS styles here */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #000000, #00001D);
            color: #fff;
            
        }
        h1 {
            color: #fdae40;
            text-align: center;
        }
        h2 {
            color: wheat;
            text-align: center;
        }
        .appointment-form, .response-form {
    background-color: #000024;
    padding: 20px;
    border-radius: 8px;
    margin: 40px auto; /* Centering the form */
    width: 80%; /* You can adjust this width as necessary */
    max-width: 600px; /* This limits the maximum width for larger screens */
}

        input, textarea {
            width: 100%;
            padding: 6px;
            margin: 15px 0;
            border: none;
            border-radius: 4px;
            background-color: #333; /* Match background color */
            color: #fff; /* Text color */
        }
        button {
            padding: 10px;
            background-color: #DAA520;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition */
        }
        button:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        table {
    width: 90%;
    border-collapse: collapse;
    margin: 20px auto; /* Center the table */
    background-color: #1a1a2e; /* Dark background for the table */
    border-radius: 8px; /* Rounded corners for the table */
    overflow: hidden; /* Ensures border radius applies */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for depth */
}

th, td {
    padding: 15px; /* Increased padding for a better look */
    text-align: center;
    border: 1px solid #444; /* Darker border color */
}

th {
    background-color: #fdae40; /* Header background color */
    color: #000; /* Text color for headers */
    font-weight: bold; /* Bold text for headers */
}

tr:hover {
    background-color: #444; /* Darker background on hover */
    color: #fdae40; /* Change text color on hover */
}

tbody tr:nth-child(even) {
    background-color: #222; /* Dark background for even rows */
}

tbody tr:nth-child(odd) {
    background-color: #1a1a2e; /* Slightly lighter background for odd rows */
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
        <li><a href="blogs.php">Blogs</a></li> 
        <li><a href="FAQs.php">FAQs</a></li> 
        <li><a href="aboutus.php">Aboutus</a></li><br> 
        <li><a href="membership.php">Membership</a></li> 
        <li><a href="events.php">Events & Promotions</a></li> 
        
    </ul>
    </nav>
  </header>



<a href="javascript:history.back()" class="back-button">←</a>

<h1>Manage Appointments</h1>

<!-- Appointment Submission Form -->
<div class="appointment-form">
    <h2>Submit an Appointment</h2>
    <form method="POST">
        <input type="text" name="customer_name" placeholder="Your Name" required>
        <input type="datetime-local" name="appointment_date" required>
        <textarea name="query" placeholder="Your Query" rows="4" required></textarea>
        <button type="submit" name="submit_appointment">Submit Appointment</button>
    </form>
</div>

<!-- Appointments List -->
<h2>Upcoming Appointments</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Appointment Date</th>
            <th>Query</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($appointments as $appointment) { ?>
            <tr>
                <td><?php echo $appointment['id']; ?></td>
                <td><?php echo $appointment['customer_name']; ?></td>
                <td><?php echo date("Y-m-d H:i", strtotime($appointment['appointment_date'])); ?></td>
                <td><?php echo $appointment['query']; ?></td>
             
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
