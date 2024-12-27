<?php

@include 'config.php';

if(isset($_POST['add_event'])){

   $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
   $event_price =mysqli_real_escape_string($conn,$_POST['event_price']);
   $event_description = mysqli_real_escape_string($conn, $_POST['event_description']);
   $event_image = $_FILES['event_image']['name'];
   $event_image_tmp_name = $_FILES['event_image']['tmp_name'];
   $event_image_folder = 'C:/xampp/htdocs/gym/Assets/'.$event_image;

   if(empty($event_name) || empty($event_description) || empty($event_image) || empty($event_price)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO events(name, description, price, image) VALUES('$event_name', '$event_description', '$event_price', '$event_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($event_image_tmp_name, $event_image_folder);
         $message[] = 'new event added successfully';
      }else{
         $message[] = 'could not add the event';
      }
   }
};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM events WHERE id = $id");
   header('location:eventmng.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Events/Promotions - Fitzone Fitness Center</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to top, #000000, #00001D);
    color: #fff;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh; /* Ensure full-screen background */
    margin: 0; /* Remove any margin */
    padding: 0; /* Remove any padding */
    display: flex;
    justify-content: space-between;
}

        nav {
            position: fixed;
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
    height: 100%; /* Fill remaining height */
    display: flex;
    align-items: center;
    justify-content: center;
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

        .container {
      width: 100%;
      padding: 20px;
      margin-top: 50px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .admin-event-form-container {
      background: rgba(0, 0, 0, 0.8);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
      width: 100%;
      max-width: 600px;
      margin-bottom: 30px;
    }

    .admin-event-form-container h3 {
      font-size: 1.8rem;
      text-align: center;
      margin-bottom: 20px;
      color: #fdae40;
      font-weight: bold;
    }

    .admin-event-form-container .box {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: none;
      background-color: #333;
      color: #fff;
      font-size: 1rem;
    }

    .admin-event-form-container .btn {
      width: 100%;
      padding: 10px;
      background-color: #fdae40;
      color: #202020;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .admin-event-form-container .btn:hover {
      background-color: #fff;
      color: #fdae40;
    }

    .event-display {
    width: 100%;
    max-width: 1000px;
    margin-top: 30px;
}

.event-display-table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(0, 0, 0, 0.8);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
}

/* Make the table more responsive */
.event-display-table th,
.event-display-table td {
    padding: 15px;
    text-align: left;
    color: #fff;
}


    .event-display-table th {
      background-color: #fdae40;
      color: #202020;
      text-transform: uppercase;
      font-weight: bold;
      border-bottom: 1px solid #444;
    }

    .event-display-table tr:nth-child(even) {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .event-display-table tr:nth-child(odd) {
      background-color: rgba(0, 0, 0, 0.5);
    }

    .event-display-table a.btn {
      padding: 8px 15px;
      background-color: #fdae40;
      color: #202020;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
    }

    .event-display-table a.btn:hover {
      background-color: #fff;
      color: #fdae40;
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
       
        <a class="logout-btn" onclick="confirmLogout(event)">Logout</a>
    </section>



    <div class="container">
   <div class="admin-event-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Add Event or Promotion</h3>
         <input type="text" placeholder="Enter Event/Promotion Name" name="event_name" class="box">
         <input type="text" placeholder="Enter Event/Promotion Price/Discount" name="event_price" class="box">
         <input type="text" placeholder="Enter Event/Promotion Description" name="event_description" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="event_image" class="box">
         <input type="submit" class="btn" name="add_event" value="Add Event/Promotion">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM events");
   
   ?>
   <div class="event-display">
      <table class="event-display-table">
         <thead>
         <tr>
            <th>name</th>
            <th>price</th>
            <th>description</th>
            <th>image</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><img src="/gym/Assets/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td>
               <a href="eventmng.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> Delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>
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

    </script>
</body>
</html>
