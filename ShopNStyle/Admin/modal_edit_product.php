<?php include_once ('session.php');
include_once ('model.php');
include_once ('header.php');

$row = fetch_product_data($productid)[0];
$categories = load_category();
$origins = load_origin();
?>


<head>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="js/validation.js"></script>
    <script type="text/css" src="./css/bootstrap.css"></script>
</head>

<div class="modal fade" id="editModal<?php echo $productid;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">4
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="alert alert-info" id="myModalLabel"><strong><center>Edit Product </center></strong></h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="edit-product">
                    <div class="control-group">
                        <label class="control-label" for="name">Name</label>
                        <div class="controls">
                            <input type="text" name="name" id="inputName" class = "form-control" autofocus="autofocus" value="<?php echo $row['PName'] ?>" required>
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
                            <select name="category" class = "form-control" required>
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

                    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                    $image_name = addslashes($_FILES['image']['name']);
                    $image_size = getimagesize($_FILES['image']['tmp_name']);

                    move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                    $location = "upload/" . $_FILES["image"]["name"];

                    update_product($productname,$productdesc,$productcategory,$productoriginate,$productprice,$qty,$location,$productid);
                    header('location:product.php');

                }
                ?>

            </div>

        </div>
    </div>
</div>

