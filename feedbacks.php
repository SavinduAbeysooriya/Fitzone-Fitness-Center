<?php
// Database connection settings
@include 'includes/dbh.inc.php';

if (isset($_POST['submit'])) {
    $profile_name = mysqli_real_escape_string($conn, $_POST['name']);
    $profile_feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
    $profile_rating = mysqli_real_escape_string($conn, $_POST['rating']);
    
    // Change here to match the form input name
    $profile_image = $_FILES['profilePic']['name'];
    $profile_image_tmp_name = $_FILES['profilePic']['tmp_name'];
    $profile_image_folder = 'Assets/' . basename($profile_image);
    
    if (empty($profile_image) || empty($profile_name) || empty($profile_feedback) || empty($profile_rating)) {
        $message[] = 'Please fill out all fields.';
    } else {
        // Ensure the file upload was successful before inserting into the database
        if (move_uploaded_file($profile_image_tmp_name, $profile_image_folder)) {
            $insert = "INSERT INTO feedback (profile_pic, name, feedback, rating) VALUES 
            ('$profile_image', '$profile_name', '$profile_feedback', '$profile_rating')";
            $upload = mysqli_query($conn, $insert);
            if ($upload) {
                $message[] = 'New feedback added successfully.';
            } else {
                $message[] = 'Could not add the feedback: ' . mysqli_error($conn);
            }
        } else {
            $message[] = 'Failed to upload profile picture.';
        }
    }
}
// SQL query to select all feedback
$sql = "SELECT * FROM feedback ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - FitZone Fitness Center</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: black;
            background: linear-gradient(to bottom, #000000, #00001D);
            color: #fff;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .section-title {
            font-size: 2rem;
            color: #fdae40;
            margin-bottom: 20px;
        }
        .feedback-item {
            padding: 20px;
            
            background-color: #000024;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            flex-direction: column; 
            
        }
        .feedback-item:hover {
            transform: scale(1.05);
        }

            .feedback-item img {
                width: 80px;
                height: 80px;
                margin-bottom: 10px; /* Space below the image */
            }
        .form-label {
            color: #fdae40;
            font-weight: bold;
        }
        .form-control, .form-select {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }
        .form-control::placeholder {
            color: #bbb;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            font-size: 2rem;
            color: #444;
            cursor: pointer;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input[type="radio"]:checked ~ label {
            color: #FFD700;
        }
        
        header {
            background-color: transparent;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
            padding: 0 20px;
            background: #000020;
            border-radius: 0px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            margin: 0px 0px;
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
            transform: scale(1.1);
        }

        nav .logo h1 {
            color: #fdae40;
            font-size: 1.8rem;
            font-weight: bold;
        }

        nav ul {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            justify-content: center;
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
            color: #fdae40;
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

        /* Adjusting form for better layout */
        .feedback-form {
            background-color: #000024;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            max-width: 100%;
            aspect-ratio: 4 / 2; /* Maintains a 4:2 aspect ratio */
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            .feedback-form {
                aspect-ratio: 2 / 1; /* Adjust for smaller screens */
            }

            .feedback-item {
                flex-direction: column; /* Stack items for smaller screens */
            }

            .feedback-item img {
                width: 80px;
                height: 80px;
                margin-bottom: 10px; /* Space below the image */
            }

            .feedback-list {
                padding: 0 15px; /* Padding adjustment */
            }
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

<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '<span class="message">' . htmlspecialchars($message) . '</span>';
    }
}
?>
<header>
    <nav>
        <div class="logo">
          <img src="Assets\gym_logo.png" alt="Logo" />
            <h1>Fitzone Fitness center</h1>
        </div>
        <ul>
       
        <li><a href="programs.php">Programs</a></li> 
        <li><a href="blogs.php">Blogs</a></li> 
        <li><a href="FAQs.php">FAQs</a></li> 
        <li><a href="aboutus.php">Aboutus</a></li><br> 
        <li><a href="membership.php">Membership</a></li> 
        <li><a href="events.php">Events & Promotions</a></li> 
        <li><a href="booking.php">Booking</a></li> 
        
        
    </ul>
    </nav>
  </header>

<div class="container">
    <h1 class="section-title">Add Your Feedback</h1>
    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" class="feedback-item">
        <div class="mb-3">
            <label for="profilePic" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" id="profilePic" name="profilePic" accept="image/png, image/jpeg, image/jpg" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>

        <div class="mb-3">
            <label for="feedback" class="form-label">Feedback</label>
            <textarea class="form-control" id="feedback" name="feedback" rows="4" placeholder="Share your feedback" required></textarea>
        </div>

        <div class="mb-3 star-rating">
            <label class="form-label">Rating</label><br>
            <input type="radio" id="star5" name="rating" value="5" required>
            <label for="star5">★</label>
            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4">★</label>
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3">★</label>
            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2">★</label>
            <input type="radio" id="star1" name="rating" value="1">
            <label for="star1">★</label>
        </div>

        <button type="submit" name="submit" class="btn btn-warning">Submit Feedback</button>
    </form>
    <a href="javascript:history.back()" class="back-button">←</a>

    <!-- Feedback Display Section -->
    <h1 class="section-title">All Feedbacks</h1>
    
    
    <div class="feedback-list">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="feedback-item d-flex align-items-start">
                    <img src="Assets/<?php echo htmlspecialchars($row['profile_pic']); ?>" 
                    alt="Profile Picture" style="width: 150px; 50px; height: 150px; border-radius: 20%;">
                    
                    <div>
                        <h5><?php echo htmlspecialchars($row['name']); ?></h5>
                        <p><?php echo htmlspecialchars($row['feedback']); ?></p>
                        <p>Rating: <?php echo str_repeat('⭐', $row['rating']); ?> 
                        (<?php echo $row['rating']; ?>/5)</p>
                        <small>Submitted on: <?php echo date('F j, Y, g:i a', 
                        strtotime($row['created_at'])); ?></small>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No feedback available.</p>
        <?php endif; ?>
    </div>
   
</div>
    


</body>
</html>
