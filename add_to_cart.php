<?php

    session_start();

    if(isset($_SESSION['cart'])) {

        $cart_id = array_column($_SESSION['cart'], "id");

        if (in_array($_POST['id'], $cart_id)) {
            echo "already_in_cart";
        }
        
       // if(!in_array($_POST['id'],  $cart_id)) 
        
        else{
            $item_array = array(
                "id" => $_POST['id'],
                "title" => $_POST['title'],
                "image_name" => $_POST['image_name'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity']
            );
    
            $_SESSION['cart'][] = $item_array;
            echo "added_to_cart";
        }
    }
    else
    {
        $item_array = array(
            "id" => $_POST['id'],
            "title" => $_POST['title'],
            "image_name" => $_POST['image_name'],
            "price" => $_POST['price'],
            "quantity" => $_POST['quantity']
        );

        $_SESSION['cart'][] = $item_array;
        echo "added_to_cart";
    }


?>