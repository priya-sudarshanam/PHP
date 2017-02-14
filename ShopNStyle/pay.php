<?php
include('session.php');
include_once('admin/model.php');
$get_id=$_GET['id'];
?>

<?php include('header.php'); ?>

<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">
  

        <div id="page">
            <div id="sidebar">
                <a href="user_index.php" class="logo"><img src="images/wine8.png" alt=""></a>
                <ul>
                    <li>
                        <span><a href="user_index.php"><i class="icon-home icon-large"></i>Home</a></span>
                    </li>
                    <li>
                        <span><a href="user_guitar.php"><i class=" icon-th-large icon-large"></i>Products</a></span>
                    </li>

                    <li>
                        <span><a href="user_about.php"><i class="icon-info-sign icon-large"></i>&nbsp;About US</a></span>
                    </li>

                    <li>
                        <span><a href="user_contact.php"><i class="icon-phone-sign icon-large"></i>Contact US</a></span>
                    </li>


                </ul>
                <?php include('sidebar.php'); ?>
                <div class="newsletter">

                </div>
            </div>
            <div id="content">
                <div class="hero-unit-table">
                    <div id="header">
                        

                    </div>
                    <div id="body">
                        <h3>Payment</h3>
                        <div class="hero-unit-table">

					
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr"  method="post">
                            <input type="hidden" name="cmd" value="_xclick" />
                            <input type="hidden" name="business" value="surfnshop@gmail.com" />
                            <input type="hidden" name="item_name" value="Bags" />
								
                               <?php
                               $rows = load_order_details($ses_id,'');
                               if (count($rows) > 0) {
                                    foreach ($rows as $cart_row ) {
                                        $order_id = $cart_row['OrderID'];
                                        $product_id = $cart_row['p=ProductID'];
                                        ?>
                            
                           <input type="hidden" name="item_number" value="<?php createRandomPassword(); ?>" />

                           <?php } } ?>
                           
                            <?php
                            if ($rows > 0) {
                                $result = load_order_details_for_customer($ses_id, '');
                                    ?>
                                    <input type="hidden" name="amount" value="<?php echo $result['Total']; ?>" />
                                <?php
                            } ?>


                            <input type="hidden" name="no_shipping" value="<?php echo 2; ?>" />
                            <input type="hidden" name="no_note" value="2" />
                            <input type="hidden" name="currency_code" value="PHP" />
                            <input type="hidden" name="lc" value="GB" />
                            
                            <input type="image" src="paypal_button.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="margin-left: 280px;" class="img-rounded" />
                            <img alt="fdff" border="0" src="paypal_button.png" width="1" height="1" />
                            <!-- Payment confirmed -->
                            <input type="hidden" name="return" value="https://tameraplazainn.x10.mx/savingreservation.php?confirmation<?php echo $confirmation; ?>" />
                            <!-- Payment cancelled -->
                            <input type="hidden" name="cancel_return" value="http://localhost/surfnshop/index.php" />
                            <input type="hidden" name="rm" value="2" />
                            <input type="hidden" name="notify_url" value="index.php" />
                            <input type="hidden" name="custom" value="any other custom field you want to pass" />
							
					
                        </form>
						
					
                           
                    </div>
                    </div>
                    <div id="footer">
<?php include('footer_user.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer_bottom.php'); ?>
</body>
</html>



						
                               