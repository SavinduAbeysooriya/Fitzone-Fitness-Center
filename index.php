<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitzone Fitness Center</title>
    
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
  background-image: url('Assets/gym_homepage.jpg'); 
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
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
  background: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
  backdrop-filter: blur(3px); /* Frosted glass effect */
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
  list-style: none;
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

/* Hero section */
.hero {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 100px 50px;
  
  background-size: cover; 
  background-position: center; 
  background-repeat: no-repeat;
  height: 649px; 
  width: 100%;
  position: relative;
  color: #fff;
  z-index: 1;
}

.hero::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); 
  z-index: -1;
}

.hero .content {
  max-width: 50%;
  z-index: 2;
}

.hero .content h2 {
  font-size: 4rem;
  font-family: 'Impact', sans-serif;
  color: white;
  margin-bottom: 20px;
  line-height: 1.2;
}

.hero .content p {
  font-size: 1.2rem;
  line-height: 1.6;
  margin-bottom: 30px;
  color: #bbb;
}

.cta-btn {
  padding: 15px 30px;
  background-color: #fdae40;
  color: #202020;
  text-decoration: none;
  border-radius: 5px;
  font-size: 1.1rem;
  font-weight: bold;
  margin-right: 10px;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.cta-btn:hover {
  background-color: #fff;
  color: #fdae40;
}

.hero .image img {
  max-width: 450px;
  border-radius: 10px;
  z-index: 2;
}


/* Styles for larger screens */
@media (min-width: 992px) {
  .hero .content h2 {
    font-size: 5rem;
  }

  .hero .content p {
    font-size: 1.5rem;
  }
}

/* Styles for tablet screens */
@media (min-width: 768px) and (max-width: 991px) {
  nav .logo img {
    width: 50px;
    height: 50px;
  }

  nav .logo h1 {
    font-size: 1.5rem;
  }

  .hero {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .hero .content {
    max-width: 80%;
    text-align: center;
  }

  .hero .content h2 {
    font-size: 3rem;
  }

  .hero .content p {
    font-size: 1rem;
  }
}

/* Styles for mobile screens */
@media (max-width: 767px) {
  nav {
    flex-direction: column;
    padding: 10px;
  }

  nav .logo img {
    width: 40px;
    height: 40px;
  }

  nav .logo h1 {
    font-size: 1.2rem;
  }

  nav ul {
    flex-direction: column;
    text-align: center;
  }

  nav ul li {
    margin: 10px 0;
  }

  .hero {
    flex-direction: column;
    padding: 50px 20px;
    text-align: center;
    height: auto;
  }

  .hero .content {
    max-width: 100%;
    text-align: center;
  }

  .hero .content h2 {
    font-size: 2.5rem;
  }

  .hero .content p {
    font-size: 1rem;
  }

  .cta-btn {
    padding: 10px 20px;
    font-size: 1rem;
  }
}
</style>

</head>
<body>  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  <header>
    <nav>
        <div class="logo">
          <img src="Assets/gym_logo.png" alt="Logo" />
            <h1>Fitzone Fitness Center</h1>
        </div>
    </nav>
  </header>

  <section class="hero">
    <div class="content">
        <h2>WHERE<br>STRENGTH<br>MEETS WELLNESS</h2>
        <p>
        Your ultimate fitness destination, offering a blend of strength training, group classes, and personalized coaching to keep you motivated and thriving.
        </p>
        <a href="customerregister.php" class="cta-btn">Register</a>
        <a href="customerlogin.php" class="cta-btn">Login</a>
    </div>
</section>




</body>
</html>
