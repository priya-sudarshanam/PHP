<?php include_once ('session.php');
      include_once ('header.php');
      include_once ('model.php'); ?>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Shop N' Style</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown"> 
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      						
					 Welcome : Administrator
                    </a>
                  
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
       <?php include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
						
						
						<div class="hero-unit-table">   
                             <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Order Table</strong>
                                </div>
								    <ul class="breadcrumb"> 
										<li>Orders<span class="divider">/</span></li>				
										<li  class="active">Pending Orders<span class="divider">/</span></li>
										<li><a href="delivered.php">Delivered</a> <span class="divider">/</span></li>
									
									</ul>
                                <thead>
                                    <tr>
                                       
                                        <th>Product Name</th>
                                        <th>Customer Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
										<th>Status</th>
										<th>Mode of Payment</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                    $rows = load_order_and_member_details_for_status('Pending');
                                    if (count($rows) > 0) {
                                    foreach ($rows as $cart_row) {
                                        ?>

                                        <tr>
                                           
                                            <td><?php echo $cart_row['PName']; ?></td>
                                            <td><?php echo $cart_row['FirstName']." ".$cart_row['LastName']; ?></td>
                                            <td><?php echo $cart_row['Price']; ?></td>
                                            <td><?php echo $cart_row['Qty']; ?></td>
                                            <td><?php echo $cart_row['Qty'] * $cart_row['Price']; ?></td>
                                            <td><?php echo $cart_row['Status']; ?></td>
										    <td><?php echo $cart_row['ModeOfPayment']; ?></td>
										    <td width="140"><a href="update_status.php<?php echo '?id='.$cart_row['OrderID']; ?>" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Confirm Order</a></td>
											
                                        </tr>
                                            
                                            
                                           
                                            <!-- product delete modal -->
                                  
                                    <!-- end delete modal -->

                                    </tr>
                                <?php }  }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
                
				
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <?php include ('script.php');?>
</body>
</html>
