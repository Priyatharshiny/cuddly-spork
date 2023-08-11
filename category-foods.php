<?php include('partials-front/menu.php'); ?>

<?php
    //Check whether id is passed or not
    if(isset($_GET['category_id']))
    {
        //Category id is set and get the id
        $category_id = $_GET['category_id'];
        
        //Get category title based on category ID
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

        //Execute the query
        $res = mysqli_query($conn,$sql);

        //Get the value from database
        $row = mysqli_fetch_assoc($res);
        //Get the title
        $category_title = $row['title'];
    }
    else
    {
        //Category not passed
        //Redirect to home page
        header('location:'.SITEURL);
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Products on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center"> Our Product Menu</h2>

            <?php
                //Create sql query to get foods based on selected category
                $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id AND featured='Yes'";
                
                //Execute the query
                $res2 = mysqli_query($conn, $sql2);

                //Count the rows
                $count2 = mysqli_num_rows($res2);

                //Check whether food is available or not
                if($count2>0)
                {
                    //Food Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if($image_name=="")
                                    {
                                        //Image not available
                                        echo "<div class='error'>Image not found.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>

                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <span class="food-title"><?php echo $title ?></span>
                                <span class="food-price">Rs.<?php echo $price; ?></span>
                                <input type="hidden" name="title" id="title<?php echo $id ?>" value="<?php echo $title ?>">
                                <input type="hidden" name="price" id="price<?php echo $id ?>" value="<?php echo $price ?>">
                                <input type="hidden" name="image_name" id="image_name<?php echo $id ?>" value="<?php echo $image_name; ?>">
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                
                                <button class="buttondesign btnn" onclick="decrementValue(<?php echo $id ?>)">-</button>  
                                <input type="number" name="quantity" id="quantity<?php echo $id ?>" value="1" min="1" style="width: 40px;" disabled>
                                <button class="buttondesign btnn" onclick="incrementValue(<?php echo $id ?>)">+</button>
                                
                                <br>
                                <br>

                                <button name="add_to_cart" class="buttondesign btnn addToCartBtn" id="<?php echo $id; ?>">Add to Cart <i class="fa fa-shopping-cart me-2"></i></button>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                { ?>
                    <!-- Food not available -->
                    
                    <div class='error'>
                        <p style="text-align: center;">Product Not Available.</p>
                    </div>
                
                    <?php   
                }
            ?>

            <div class="clearfix"></div>
  

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <script>

        function incrementValue(id) {
            var input = document.getElementById('quantity' + id);
            input.stepUp();
        }

        function decrementValue(id) {
            var input = document.getElementById('quantity' + id);
            input.stepDown();
        }

    </script>

<?php include('partials-front/footer.php'); ?>