<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php include('admin/model.php'); ?>

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



                        <h3>List of Our Products</h3>
                        <p>
                        
						<?php include ('navbar_menu.php');?>
						

                        </p>
                        <ul class="thumbnails">
                            <?php
                            $rows = fetch_product_details('Travelling');
                            if (count($rows) > 0) {
                            foreach ($rows as $row) {
                                $id = $row['ProductID'];
								$qty = $row['Quantity'];
						        $results = load_product_details_for_product_id($id, 'Delivered');
                                $total_qty = count($results) > 0 ? (int)$qty - (int)$results[0]['Qty'] : 0;
                                ?>

                                <li class="span3">
                                    <div class="thumbnail">
                                        <img data-src="holder.js/300x200" alt="">
                                        <div class="alert alert-success"><div class="font1"><?php echo $row['PName']; ?></div></div>
                                        <hr>


                                        <a  href="#<?php echo $id; ?>" data-toggle="modal">
                                            <img src="admin/<?php echo $row['Location'] ?>" class="img-rounded" alt="" width="160" height="200"></a>


                                        <p>
                                            <a> Price: <?php echo $row['PPrice']; ?></a>
                                        </p>
                                     										<?php if($total_qty > 0){ ?>
                                        <a href="#add<?php echo $id; ?>"   data-toggle="modal" class="btn btn-success"><i class="icon-shopping-cart icon-large"></i>&nbsp;Add to Cart</a>
										<?php }else{ ?>
										<span class="label label-important">Out of Stock</span>
										<?php } ?>
                                        <?php include('order_modal.php'); ?>
                                    <?php }}
                                    ?>
                                    <?php
                                    if (isset($_POST['order'])) {
                                        $member_id = $_POST['member_id'];
                                        $quantity = $_POST['quantity'];
                                        $price = $_POST['price'];
                                        $product_id = $_POST['product_id'];
                                        $success = save_to_order_details($member_id,$quantity,$product_id,$price,'Pending','Credit Card');
                                        if ($success) {
                                            echo "<i class='fa fa-check-circle-o fa-2x text-success'>Successfully saved information.</i>";
                                        } else {
                                            echo "<i class='fa fa-exclamation-circle fa-2x text-error'>Error saving.</i>";
                                        }
                                 		?>
												<script>
																window.location = 'user_travelling.php';				
																</script>
										<?php
                                    }
                                    ?>
                        </ul>

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