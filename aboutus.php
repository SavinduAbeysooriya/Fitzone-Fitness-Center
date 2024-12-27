<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - FitZone Fitness Center</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: black;
            background: linear-gradient(to bottom, #000000, #00001D);
            color: #fff;
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
        }
        .about-text {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .feature-box {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color:  #000024;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .feature-box:hover {
            transform: scale(1.05);
        }
        .feature-icon {
            font-size: 2rem;
            margin-right: 15px;
            color: #fdae40;
        }
        .feature-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #fdae40;
            margin-bottom: 5px;
        }
        .feature-text {
            color: #bbb;
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
  margin: 0 15px;
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
            position: fixed;  /* Fixed position to keep it on the screen */
            top: 50%;         /* Center vertically */
            right: 20px;      /* Position 20px from the right side */
            transform: translateY(-50%);  /* Adjust for vertical centering */
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
        

        /* Mobile styles */
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
        <li><a href="FAQs.php">FAQs</a></li><br> 
        <li><a href="membership.php">Membership</a></li> 
        <li><a href="events.php">Events & Promotions</a></li> 
        <li><a href="booking.php">Booking</a></li> 
        
        
    </ul>
    </nav>
  </header>
<a href="javascript:history.back()" class="back-button">←</a>
    <div class="container">
        <h1 class="section-title">ABOUT US</h1>
        <p class="about-text">
            Welcome to <strong>FitZone Fitness Center</strong>, your ultimate destination for fitness and well-being in Kurunegala. We understand the importance of a balanced lifestyle in today’s fast-paced world, where work, family, and social obligations often come first. FitZone is here to help you prioritize your health and achieve a sustainable, fulfilling lifestyle through fitness.
        </p>
        <h2 class="section-title">Why Choose FitZone?</h2>

        <div class="feature-box">
            <div class="feature-icon">⚡</div>
            <div>
                <div class="feature-title">Fast Response</div>
                <p class="feature-text">Our high-speed infrastructure and advanced booking system ensure quick and efficient service, so you can start your fitness journey without delay.</p>
            </div>
        </div>

        <div class="feature-box">
            <div class="feature-icon">🔒</div>
            <div>
                <div class="feature-title">Security</div>
                <p class="feature-text">We prioritize the protection of your information with advanced security protocols and robust firewalls, ensuring a safe environment for our members.</p>
            </div>
        </div>

        <div class="feature-box">
            <div class="feature-icon">✔️</div>
            <div>
                <div class="feature-title">Reliability</div>
                <p class="feature-text">Enjoy uninterrupted services with a seamless experience. Our commitment to quality ensures that you can rely on us for all your fitness needs.</p>
            </div>
        </div>

        <div class="feature-box">
            <div class="feature-icon">➕</div>
            <div>
                <div class="feature-title">Customization</div>
                <p class="feature-text">FitZone offers personalized training options that cater to your unique fitness goals. Whether you're interested in weight management, strength building, or flexibility training, we tailor programs to suit you.</p>
            </div>
        </div>

        <div class="feature-box">
            <div class="feature-icon">⬆️</div>
            <div>
                <div class="feature-title">Scalability</div>
                <p class="feature-text">Our flexible membership plans are designed to adapt to your evolving fitness needs, making it easy to find a plan that works for you, no matter where you are on your fitness journey.</p>
            </div>
        </div>

        <div class="feature-box">
            <div class="feature-icon">💬</div>
            <div>
                <div class="feature-title">Support</div>
                <p class="feature-text">We’re here for you 24/7. Our dedicated support team is available to assist with any inquiries, ensuring you always feel supported and motivated.</p>
            </div>
        </div>
        
        <p class="about-text">
            Our state-of-the-art facility offers a wide range of services, from personalized training sessions to group classes and nutrition counseling. We cater to all fitness levels with specialized programs in cardio, strength training, and yoga. At FitZone, we believe that fitness is more than just a physical activity—it’s a path to enhanced mental and emotional wellness as well.
        </p>
        
        <p class="about-text">
            Our team of certified trainers is ready to support you every step of the way. Join FitZone today and become part of a community that values health, motivation, and personal growth. Let’s achieve your goals together!
        </p>
    </div>
</body>
</html>
