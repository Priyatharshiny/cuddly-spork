<?php include('partials-front/menu.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Food</title>

    
    <script src="https://cdn.jsdelivr.net/npm/alerify@1.0.1/dist/alerify.min.js"></script>

   
</head>
<body>

    <!-- fOOD sEARCH Section Starts Here -->
    <section style="margin-top: 100px;" class="food-search text-center">
        <div class="container">

            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Product.." required>
                <input type="submit" name="submit" value="Search" class="buttondesign search">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->




    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <div class="section-title">
                <h2>Our Product Menu</h2>
            </div>

            <?php
                //Getting foods from database that are active
                //SQL Query
                // $sql2 = "SELECT * FROM tbl_food WHERE featured='Yes'";
                $sql2 = "SELECT F.id, F.title, F.price, F.description, F.image_name FROM `tbl_food` F INNER JOIN tbl_category C ON F.category_id=C.id WHERE F.featured='Yes' AND C.featured='Yes'";

                //Execute the query
                $res2 = mysqli_query($conn,$sql2);

                //Count Rows
                $count2 = mysqli_num_rows($res2);

                //Check Whether Food Available or not
                if($count2>0)
                {
                    //Food Available
                    while($row=mysqli_fetch_assoc($res2))
                    {
                        //Get all the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    //Check whether image is available or not
                                    if($image_name=="")
                                    {
                                        //Image not available
                                        echo "<div class='error'>Image not found</div>";
                                    }
                                    else
                                    {
                                        //Image available
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
                {
                    //Food not available
                    echo "<div class='error'></div>";
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
</body>

<?php include('partials-front/footer.php'); ?>

</html>