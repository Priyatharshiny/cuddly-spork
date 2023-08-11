<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "project") or die(mysqli_error());
    

    if(mysqli_connect_error()) {
        echo "<script>
            alert('cannot connect to database');
            window.location.href='deliveryDetails.php';
        </script>";
        exit();
    }

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    
    if(isset($_POST['purchase'])) {

        $query1 = "INSERT INTO `order`(`full_name`, `phone_no`, `delivery_date`, `address`) VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[delivery_date]','$_POST[address]')";

        if(mysqli_query($conn, $query1))
        {
            $order_id = mysqli_insert_id($conn);
            $query2 = "INSERT INTO `order_food`(`order_id`, `title`, `image_name`, `price`, `quantity`, `total_price`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = mysqli_prepare($conn, $query2);

            if($stmt)
            {
                mysqli_stmt_bind_param($stmt, "issdids", $order_id, $title, $image_name, $price, $quantity, $total_price, $status);
                foreach($_SESSION['cart'] as $key => $values)
                {
                    $title = $values['title'];
                    $image_name = $values['image_name'];
                    $price = $values['price'];
                    $quantity = $values['quantity'];
                    $total_price = $price * $quantity;
                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "<script>
                    alert('Order Placed');
                    window.location.href='index.php';
                </script>";
            }
            else
            {
                echo "<script>
                    alert('SQL Query Prepare Error');
                    window.location.href='deliveryDetails.php';
                </script>";
            }
        }
        else
        {
            echo "<script>
                alert('SQL Error');
                window.location.href='deliveryDetails.php';
            </script>";
        }
    }
}


?>