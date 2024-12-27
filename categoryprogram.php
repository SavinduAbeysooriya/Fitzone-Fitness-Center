<?php
@include 'includes/dbh.inc.php';
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check if 'category_id' is set in the URL
if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
    $category_id = mysqli_real_escape_string($conn, trim($_GET['category_id']));
    // Fetch the category name using category ID
    $category_query = "SELECT Name FROM category WHERE id = '$category_id'";
    $category_result = mysqli_query($conn, $category_query);

    if (!$category_result || mysqli_num_rows($category_result) === 0) {
        die('Invalid category.');
    }
    $category_row = mysqli_fetch_assoc($category_result);
    $category_name = $category_row['Name'];
    // Fetch products based on the category name
    $query = "SELECT * FROM programs WHERE category = '$category_name'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    // Check if any products were found for the selected category
    if (mysqli_num_rows($result) === 0) {
        echo '<p class="text-center">No programs found for this category: ' . htmlspecialchars($category_name) . '</p>';
    }
} else {
    // Redirect to foodsearch.php if 'category_id' is missing or empty
    header('Location: pragramsearch.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Programs-Fitzone Fitness center</title>

    <link rel="stylesheet" href="css/style.css">
    <style>
        /* General styling */
        * {
            
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: linear-gradient(to bottom, #000000, #00001D);
            min-height: 100vh; /* Ensures body covers full viewport height */
            margin: 0; /* Removes default margin */

        }

        .container {
            width: 75%;
            margin: 20px auto;
            padding: 20px;
        }

        .program-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px 0;
        }

        .program-menu-box {
            background: linear-gradient(to top, #000000, #000033);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
        }

        .program-menu-box:hover {
            transform: translateY(-10px);
        }

        .img-responsive {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .text-center {
            text-align: center;
            color: white;
        }

        .program-price {
            font-size: 1.2rem;
            color: #b8860b;
            margin: 10px 0;
        }

        .program-detail {
            font-size: 0.9rem;
            color: #747d8c;
        }
        h4{
            color: white;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            font-size: 1rem;
            border-radius: 5px;
            background-color: #b8860b;
            color: white;
            cursor: pointer;
            margin-top: 10px;
            display: inline-block;
        }

        .btn:hover {
            background-color: red;
        }

        h1 {
            color: #333;
            font-size: 2.2rem;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .food-menu-box {
                width: 100%;
            }
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
<body>

<div class="container">
<a href="javascript:history.back()" class="back-button">←</a>
    <h1 class="text-center">Programs in Category: <?php echo htmlspecialchars($category_name); ?></h1>

    <div class="product-display">
        <div class="program-menu">
            <?php
            // Check if any products were found for the selected category
            if (isset($noProramsMessage)) {
                echo '<p class="text-center">' . htmlspecialchars($noProgramsMessage) . '</p>';
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    $image = isset($row['image']) ? htmlspecialchars($row['image']) : 'default-image.jpg';
                    $name = isset($row['name']) ? htmlspecialchars($row['name']) : 'Unknown Program';
                    $price = isset($row['price']) ? htmlspecialchars($row['price']) : '0.00';
                    $description = isset($row['description']) ? htmlspecialchars($row['description']) : 'No description available.';
            ?>
            <div class="program-menu-box">
                <div class="program-menu-img">
                    <img src="Assets/<?php echo $image; ?>" alt="<?php echo $name; ?>" class="img-responsive">
                </div>
                <div class="program-menu-desc">
                    <h4><?php echo $name; ?></h4>
                    <p class="program-price"><?php echo $price; ?>$</p>
                    <p class="program-detail"><?php echo $description; ?></p>
                    <br>
                    <a href="buy.php?id=<?php echo $row['id']; ?>" class="btn">Buy Now</a>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>
