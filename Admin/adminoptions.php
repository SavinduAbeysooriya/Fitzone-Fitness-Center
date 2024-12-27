<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Options - Fitzone Fitness Center</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #161617;
            color: #fff;
            background-image: url('/gym/Assets/gym_homepage.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        nav {
            position: absolute;
            top: 0;
            left: 0;
            width: 230px;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            padding: 20px;
            background: rgba(0, 0, 20, 20); /* Dark background */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        }
        nav ul {
            display: flex;
            flex-direction: column;
            list-style: none;
            width: 100%;
            padding-left: 0;
        }

        nav ul li {
            margin-bottom: 20px;
            width: 100%;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px;
            display: block;
            text-align: center;
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #fdae40;
            color: #202020;
            border-radius: 5px;
        }

        .hero {
            margin-left: 250px; /* To account for the sidebar */
            padding: 50px;
            height: 100vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .hero {
            margin-left: 250px; /* To account for the sidebar */
            padding: 50px;
            height: 100vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .hero .logo {
    position: absolute;
    top: -10px;
    right: 1000px;
    margin-bottom: 0; /* Remove bottom margin */
    text-align: right; /* Align text to the right */
}

.hero .logo img {
    width: 120px;
    height: 120px;
    margin-bottom: -80px;
    transition: transform 0.3s ease;
}

.hero .logo img:hover {
    transform: scale(1.1); /* Zoom effect on hover */
}
.hero .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #fdae40;
            color: #202020;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .hero .logout-btn:hover {
            background-color: #fff;
            color: #fdae40;
        }



        .hero .logout-btn:hover {
            background-color: #fff;
            color: #fdae40;
        }
        .hero .welcome-message {
    font-size: 3rem; /* Increase font size as needed */
    color: #F0F0F0;
    margin-bottom: 20px;
    text-align: center; /* Center align the text */
    font-weight: bold; /* Make the text bold */
    white-space: normal; /* Allow the text to wrap */
}
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="staffmng.php">Staff</a></li>
            <li><a href="programmng.php">Programs</a></li>
            <li><a href="categorymng.php">Categories</a></li>
            <li><a href="eventmng.php">Events & Promotions</a></li>
            <li><a href="membershipmng.php">Membership</a></li>
            <li><a href="blogmng.php">Blogs</a></li>
            <li><a href="customermng.php">Customers</a></li>
            <li><a href="ordermng.php">Orders</a></li>
            <li><a href="appoimentmng.php">Appointments</a></li>
            <li><a href="feedbackmng.php">Feedbacks</a></li>
        </ul>
    </nav>

    <section class="hero">
        <div class="logo">
            <img src="/gym/Assets/gym_logo.png" alt="Logo" />
        </div>
        <div class="welcome-message" id="welcomeMessage"></div>
        <a class="logout-btn" onclick="confirmLogout(event)">Logout</a>
    </section>

    <script>
        function confirmLogout(event) {
            event.preventDefault(); // Prevent the default link behavior
            var confirmAction = confirm("Do you want to logout?");
            if (confirmAction) {
                window.location.href = 'index.php'; // Modify this with your logout script path
            } else {
                console.log("User canceled logout.");
            }
        }

        // Typing animation function
        function typeWriter(text, element, delay) {
            let i = 0;
            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, delay);
                }
            }
            type();
        }

        // Start the typing effect
        const welcomeMessage = "Welcome to Admin Dashboard!";
        
        const messageElement = document.getElementById("welcomeMessage");
        typeWriter(welcomeMessage, messageElement, 100); // 100ms delay between each character

        
    </script>
</body>
</html>
