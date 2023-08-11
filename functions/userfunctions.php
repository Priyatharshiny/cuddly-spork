<?php
    function getCartItems()
    {
        global $conn;
        $query = "SELECT c.id as cid, c.food_id, c.	food_qty, f.id as fid, f.title, f.image_name, f.price 
            FROM carts c, tbl_food f WHERE c.food_id=f.id ORDER BY c.id DESC";
        return $query_run = mysqli_query($conn, $query);
    }

?>