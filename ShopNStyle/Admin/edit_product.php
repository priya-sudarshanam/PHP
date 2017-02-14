<?php include_once('session.php');
      include_once('model.php');
      include_once('header.php');

$productid = $_GET['productid'];
$row = fetch_product_data($productid)[0];
$categories = load_category();
$origins = load_origin();
?>

<head>
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/additional-methods.min.js"></script>
    <script src="./js/validation.js"></script>

</head>
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
                    <div class="col-md-5 well">
                        <div class="hero-unit-table">   
                          <div class="hero-unit-table">   
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="edit-product">
                                <div class="alert alert-info"><strong>Edit Product</strong> </div>
                                <hr>
                                <div class="control-group">
                                    <label class="control-label" for="name">Name</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="inputName" class = "form-control"
                                               value="<?php echo htmlspecialchars($row['PName']); ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputDesc">Description</label>
                                    <div class="controls">
                                        <input type="text"  name="description"  class = "form-control" value="<?php echo $row['PDescription']; ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputCategory">Category</label>
                                    <div class="controls">
                                        <select name="category" class = "form-control" required>
                                            <option><?php echo $row['PCategory'];  ?></option>
											<option></option>
                                            <?php
                                              foreach($categories as $category) { ?>
                                                  <option><?php echo $category['CategoryName'] ?></option>
                                             <?php   }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputOrigin">Origin</label>
                                    <div class="controls">
                                        <select name="originated" class = "form-control" required>
                                            <option><?php echo $row['Originated'];  ?></option>
                                            <option></option>
                                            <?php
                                            foreach($origins as $origin) { ?>
                                                <option><?php echo $origin['OriginName'] ?></option>
                                            <?php   }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPrice">Price</label>
                                    <div class="controls">
                                        <input type="text" name="price" value="<?php echo $row['PPrice']; ?>" required/>
                                        <div class="text-error" id="priceerrror"></div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputQuantity">Quantity</label>
                                    <div class="controls">
                                        <input type="text" name="quantity" class = "form-control"  value="<?php echo $row['Quantity']; ?>" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="existingImage">Existing Image:</label>
                                    <div class="controls">
                                        <img src="<?php echo $row['Location']; ?>" class="img-rounded" width="100" height="100">
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label" for="inputImage"> Replaced Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image" class = "form-control">
                                    </div>
                                </div>
								
									<hr/>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
										<span><a href = "product.php" class = "btn btn-danger"> Back</a></span>
                                    </div>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['update'])) {
                                $productname = $_POST['name'];
                                $productdesc = $_POST['description'];
                                $productcategory = $_POST['category'];
                                $productoriginate = $_POST['originated'];
                                $productprice = $_POST['price'];
                                $qty = $_POST['quantity'];

                                $location = $row['Location'];

                                if (!empty($_FILES['image']['tmp_name'])) {
                                    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                    $image_name = addslashes($_FILES['image']['name']);
                                    $image_size = getimagesize($_FILES['image']['tmp_name']);

                                    move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                    $location = "upload/" . $_FILES["image"]["name"];
                                }
                                $success= update_product($productname,$productdesc,$productcategory,$productoriginate,$productprice,$qty,$location,$productid);
                                if ($success) {
                                    echo "<i class='fa fa-check-circle-o fa-2x text-success'>Successfully saved information.</i>";
                                    header('location: product.php');
                                    exit();
                                } else {
                                    echo "<i class='fa fa-exclamation-circle fa-2x text-error'>Error saving.</i>";
                                }


                            }
                            ?>


                        </div>
                        </div>
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
   <?php include_once ('script.php');?>
</body>
</html>
