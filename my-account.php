<?php
    include('partials-front/menu.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>

    <!-- css file link -->
    <link href="assets/css/signup1.css" type="text/css" rel="stylesheet" >
    <link href="assets/css/stylemainn.css" type="text/css" rel="stylesheet" >

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/41354f2a54.js" crossorigin="anonymous"></script>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&family=Playfair+Display&family=Zen+Dots&display=swap" rel="stylesheet">
    


</head>
<body>
    <div class="wrap6 flex-ja">
        <div class="section flex-jaf">
                <div class="content">
                    <div class="box">
                        <h2>Profile</h2>
                    </div>
                </div>

                <div class="contactform">
                    <form method="post" action="">
                        <?php
                            $currentUser = $_SESSION['username'];
                            $sql = "SELECT * FROM users WHERE username='$currentUser'";

                            $gotResult = mysqli_query($conn,$sql);

                            if($gotResult) {
                                if(mysqli_num_rows($gotResult)>0) {
                                    while($row = mysqli_fetch_assoc($gotResult)) {
                                        // print_r($row['username']);
                                        ?>

                                            <div class="inputs">
                                                <input type="text" name="updateusername" value="<?php echo $row['username']; ?>">
                                            </div>
                                            <div class="inputs">
                                                <input type="email" name="updateemail" value="<?php echo $row['email']; ?>">
                                            </div>
                                            <div class="takeaction">
                                            <div class="signUp">
                                                <button type="submit" name="update">Update</button></div>
                                            </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        
                        
                    </form>
                </div>
        </div>
    </div>


 <!-- <div class="wrap6 flex-ja">
 <div class="section flex-jaf">
 <div class="contactform">
                    <form method="post" action="">
                        <?php
                            $currentUser = $_SESSION['username'];
                            $sql = "SELECT * FROM users WHERE username='$currentUser'";

                            $gotResult = mysqli_query($conn,$sql);

                            if($gotResult) {
                                if(mysqli_num_rows($gotResult)>0) {
                                    while($row = mysqli_fetch_assoc($gotResult)) {
                                        // print_r($row['username']);
                                        ?>

                                            <div class="inputs">
                                                <input type="text" name="updateusername" value="<?php echo $row['username']; ?>">
                                            </div>
                                            <div class="inputs">
                                                <input type="email" name="updateemail" value="<?php echo $row['email']; ?>">
                                            </div>
                                            <div class="takeaction">
                                            <div class="signUp">
                                                <button type="submit" name="update">Update</button></div>
                                            </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        
                        
                    </form>
                </div>
                        </div>
                        </div> -->
    <script src="script.js"></script>
</body>
</html>
