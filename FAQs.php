<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - FitZone Fitness Center</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: black;
            background: linear-gradient(to bottom, #000000, #00001D);
            color: #fff;
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
        .faq-item {
            padding: 20px;
            background-color: #000024;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .faq-item:hover {
            transform: scale(1.05);
        }
        .faq-question {
            font-size: 1.2rem;
            font-weight: bold;
            color: #fdae40;
            margin-bottom: 10px;
        }
        .faq-answer {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #bbb;
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
        <li><a href="membership.php">Membership</a></li> 
        <li><a href="events.php">Events & Promotions</a></li> 
        <li><a href="booking.php">Booking</a></li> 
        
        
    </ul>
    </nav>
  </header>



<a href="javascript:history.back()" class="back-button">←</a>
<div class="container">
    <h1 class="section-title">FREQUENTLY ASKED QUESTIONS</h1>

    <div class="faq-item">
        <div class="faq-question">What are your operating hours?</div>
        <p class="faq-answer">We are open Monday through Friday from 5:00 AM to 10:00 PM, and on weekends from 7:00 AM to 8:00 PM.</p>
    </div>

    <div class="faq-item">
        <div class="faq-question">Do you offer personal training sessions?</div>
        <p class="faq-answer">Yes, we offer personalized training sessions tailored to meet your individual fitness goals. Our certified trainers will work with you to develop a program that suits your needs.</p>
    </div>

    <div class="faq-item">
        <div class="faq-question">What types of membership plans are available?</div>
        <p class="faq-answer">We offer a variety of membership plans, including monthly, quarterly, and annual packages. We also have special packages for families, students, and corporate groups.</p>
    </div>

    <div class="faq-item">
        <div class="faq-question">Are there group classes available?</div>
        <p class="faq-answer">Yes, we offer a wide range of group classes, including yoga, Pilates, Zumba, and spinning. Check our class schedule for timings and availability.</p>
    </div>

    <div class="faq-item">
        <div class="faq-question">Is there a trial membership available?</div>
        <p class="faq-answer">We offer a one-day trial pass for first-time visitors, allowing you to experience our facilities and classes before committing to a membership.</p>
    </div>

    <div class="faq-item">
        <div class="faq-question">Do you provide nutrition counseling?</div>
        <p class="faq-answer">Yes, we have certified nutritionists on staff who can help you with diet planning and nutritional advice to complement your fitness journey.</p>
    </div>

    <div class="faq-item">
        <div class="faq-question">How can I book a class or personal training session?</div>
        <p class="faq-answer">You can book classes and personal training sessions through our online booking system or by calling our front desk.</p>
    </div>
</div>
</body>
</html>
