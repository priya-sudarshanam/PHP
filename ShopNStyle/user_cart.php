<?php include('header.php'); ?>
<?php include_once('session.php'); ?>
<?php include_once('admin/model.php'); ?>
<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">
        <?php
        include ('navbarfixed.php');
        ?>

        <div id="page">
            <?php include ('nav_sidebar2.php');?>
            <div id="content">
                <div class="hero-unit-table">
                    <div id="header">
                      

                    </div>
                    <div id="body">
                        <h3>Cart</h3>
                        <div class="hero-unit-table">

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rows = load_order_details($ses_id, 'Pending');
                                    $cart_count = count($rows);

                                    if ($cart_count > 0) {
                                    foreach ($rows as $cart_row) {
                                        $order_id = $cart_row['OrderID'];
                                        $product_id = $cart_row['ProductID'];
                                        $product_row = fetch_product_data($product_id)[0];
                                        ?>

                                        <tr>
                                            <td><?php echo $product_row['PName']; ?></td>
                                            <td><?php echo $cart_row['Price']; ?></td>
                                            <td><?php echo $cart_row['Qty']; ?></td>
                                            <td><?php echo ($cart_row['Price'] * $cart_row['Qty']); ?></td>
                                            <td width="100"><a href="#orderdel<?php echo $order_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-remove icon-large"></i>&nbsp;Remove</a></td>
                                        </tr>
                                        <!-- product delete modal -->
                                    <div id="orderdel<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Remove &nbsp;</strong>this item?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="remove_item.php<?php echo '?id=' . $order_id; ?>" ><i class="icon-check icon-large"></i>&nbsp;Yes</a>
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;No</button>

                                        </div>
                                    </div>
                                    <!-- end delete modal -->

                                <?php } } ?>

                                </tbody>
                            </table>




                        </div>

                        <?php
                        if ($cart_count > 0) {
                            $result = load_order_details_for_customer($ses_id, 'Pending');

                                ?>
                                <center> <a href="#order" role="button"  data-toggle="modal"class="btn btn-success"><i class="icon-truck icon-large"></i>&nbsp;Order Payments?</a></center>
                                <div class="pull-right">
                                    <div class="span"><div class="alert alert-success">
                                            <i class="icon-credit-card icon-large"></i>&nbsp;Total:&nbsp;<?php echo (int)$result; ?>
                                        </div></div>
                                </div>

                            <?php
                        }
                        ?>
                    

                        <!-- product order modal -->
                        <div id="order" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
							<div class="alert alert-info">Payment</div>
							 <div class="alert alert-danger">By Clicking Paypal Icon you Agree to the&nbsp;<strong>Terms and Condition &nbsp;</strong>of this company</div>
						
			
					
							<a class="btn" href="pay.php<?php echo '?id='.$ses_id; ?>">Yes</a>
				

							
							   
							   
                            </div>
                            <div class="modal-footer">
                            
                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;No</button>

                            </div>
                        </div>
                        <!-- end delete modal -->

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