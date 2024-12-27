<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results-Fitzone fitness center</title>

    <style>
   /* Overall page styling */
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #000000, #00001D);
    margin: 10%;
    padding: 0;
}
.container {
    width: 90%;
    margin: 0 auto;
    padding: 20px;
}
h2 {
    text-align: center;
    margin-bottom: 20px;
    color: white;
}
p{
    color: yellow;
}

/* Food menu styling */
.program-menu-box {
    display: flex;
    align-items: center;
    background-color:rgb(0, 01, 100);
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0,0 , 0.1);
    margin-bottom: 15px; /* Less space between items */
    padding: 15px; /* Reduced padding */
    transition: transform 0.3s ease;
}
.program-menu-box:hover {
    transform: scale(1.02);
}
.program-menu-img {
    flex: 1;
    max-width: 120px; /* Reduced image width */
    margin-right: 15px;
}
.program-menu-img img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    object-fit: cover;
}
.program-menu-desc {
    flex: 2;
}
.program-menu-desc h3 {
    font-size: 18px; /* Smaller font for title */
    color: #b8860b;
    margin-bottom: 5px;
}
.program-price {
    font-size: 16px; /* Reduced font size for price */
    color: red;
    margin-bottom: 5px;
}
.program-detail {
    font-size: 14px; /* Smaller font for description */
    color: #eeeeee;
    margin-bottom: 10px;
}

/* Buttons styling */
.buttons {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
}
.btn {
    padding: 8px 15px; /* Reduced button size */
    font-size: 14px; /* Smaller font size for buttons */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
    
}
.btn-primary {
    background-color: #d4af37;
    color: black;
}
.btn-primary:hover {
    background-color: red;
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
  
    </style>
</head>


<a href="javascript:history.back()" class="back-button">←</a>

<body>
    <h2 class="text-center">Search Results</h2>
    <br>
    <br>
        </div>

    <?php
    // Database connection details
    @include 'includes/dbh.inc.php';

    if (!$conn) {
     die("Failed to connect to database: " . mysqli_connect_error());
    }
  
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Get the search term from the form
        $searchQuery = $_POST['search'];

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM programs WHERE name LIKE ? OR description LIKE ? OR category LIKE ? OR price LIKE?");
        $searchPattern = "%$searchQuery%";
        $stmt->bind_param("ssss", $searchPattern, $searchPattern, $searchPattern, $searchPattern);

        // Execute the query
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output the results as styled food menu items
            while ($row = $result->fetch_assoc()) {
                echo "<div class='program-menu-box'>";
                echo "<div class='program-menu-img'>";
                echo "<img src='Assets/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "' class='img-responsive img-curve'>";
                echo "</div>";
                echo "<div class='program-menu-desc'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<p class='program-price'>$" . $row['price'] . "</p>";
                echo "<p class='program-detail'>" . $row['description'] . "</p>";
                echo "<a href='buy.php?id=" . $row['id'] . "' class='btn btn-primary'>Buy Now</a>";
                
                echo "</div>";
                echo "<div class='clearfix'></div>";
                echo "</div>";
            }
        } else {
            echo "<p>No results found for '$searchQuery'.</p>";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
    ?>

    </div>
</body>
</html>
