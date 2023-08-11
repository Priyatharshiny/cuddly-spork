<?php include('partials-front/menu.php'); ?>
<style>
    .orderpg .product-details{
        display: flex;
        width: 500px;
        margin: 25px 0px;
    }
    .orderpg .food-menu-desc{
        display: flex;
        justify-content: center;
        align-items: left;
        flex-direction: column;
    }
    .orderpg .span{
        width: 300px;
        display: flex;
        justify-content: space-between;
        margin: 0px;
    }
    .order-details{
        display: flex;
        flex-direction: column;
        width: 480px;
        margin-top: 25px;
    }

    .orderpg .order-details input[type=text], input[type=tel], input[type=email], input[type=submit], textarea{
        background: transparent;
        padding: 10px;
        border: 2px solid var(--yellow);
        border-radius: 5px;
        }
        h3{
            color: var(--yellow);
        }
    .orderpg .order-details div{
        margin-top: 15px;
    }
    .orderpg .buttondesign{
        margin-top: 20px;
        background-color: var(--yellow) !important;
    }
</style>

<section id="categories" class="categories">
    
    <div class="orderpg">
    
        <div class="container">
            <a href="cart.php" class='error'>Order Cancel</a>
            <br>
            <br>

            <h3>Fill this form to confirm your order.</h3>

            <form action="purchase.php" method="POST" class="order">

                <fieldset class="order-details">
                    <h3>Delivery Details</h3>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="Enter Your Full Name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="phone_no" placeholder="Enter Your Phone Number Eg: 065 492 7927" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" class="input-responsive" required>

                    <div class="order-label">Delivery Date</div>
                    <input type="date" name="delivery_date" class="input-responsive" required>
                    
                    <div class="order-label">Address</div>
                    <textarea name="address" rows="3" placeholder="Enter Your Address" class="input-responsive" required></textarea>

                   <button class="buttondesign btnn" name="purchase">Confirm Order</button>
                                       
                </fieldset>

            </form>
        </div>
    </div>

</section>

<?php include('partials-front/footer.php'); ?>


    
