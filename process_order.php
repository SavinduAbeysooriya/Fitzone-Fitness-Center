<?php
@include 'includes/dbh.inc.php';

if (!$conn) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Retrieve form data
    $full_name = mysqli_real_escape_string($conn, $_POST['full-name']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $starting_date = mysqli_real_escape_string($conn, $_POST['Starting-date']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $program_title = mysqli_real_escape_string($conn, $_POST['food-title']);
    $amount = mysqli_real_escape_string($conn, !empty($promotion_price) ? $promotion_price : $food_price);

    // Insert order details into the orders table
    $query = "INSERT INTO orders (full_name, contact, email, starting_date, address, program_title, amount) 
              VALUES ('$full_name', '$contact', '$email', '$starting_date', '$address', '$program_title', '$amount')";
    
    if (mysqli_query($conn, $query)) {
        $order_id = mysqli_insert_id($conn); // Get the last inserted order ID

        // Redirect to PayHere payment gateway
        $merchant_id = 'YOUR_MERCHANT_ID'; // Replace with your PayHere Merchant ID
        $return_url = 'http://yourwebsite.com/return_url.php'; // URL to handle after payment
        $cancel_url = 'http://yourwebsite.com/cancel_url.php'; // URL if the payment is canceled
        $notify_url = 'http://yourwebsite.com/notify_url.php'; // URL for payment notification

        $items = $program_title;
        $currency = 'LKR';

        // Add a "Payment Now" button
        echo "
        <h2 style='color: yellow;'>Your order has been placed!</h2>
        <p style='color: white;'>Please proceed with the payment by clicking the button below.</p>
        <form id='payhereform' method='post' action='https://sandbox.payhere.lk/pay/checkout'>
            <input type='hidden' name='merchant_id' value='$merchant_id'>
            <input type='hidden' name='return_url' value='$return_url'>
            <input type='hidden' name='cancel_url' value='$cancel_url'>
            <input type='hidden' name='notify_url' value='$notify_url'>
            <input type='hidden' name='order_id' value='$order_id'>
            <input type='hidden' name='items' value='$items'>
            <input type='hidden' name='currency' value='$currency'>
            <input type='hidden' name='amount' value='$amount'>
            <input type='hidden' name='first_name' value='$full_name'>
            <input type='hidden' name='email' value='$email'>
            <input type='hidden' name='phone' value='$contact'>
            <input type='hidden' name='address' value='$address'>
            <input type='hidden' name='city' value=''>
            <input type='submit' value='Payment Now' class='btn btn-primary' style='margin-top: 20px;'>
        </form>
        <script type='text/javascript'>document.getElementById('payhereform').submit();</script>
        ";
    } else {
        echo "Failed to place order!";
    }
}
?>
