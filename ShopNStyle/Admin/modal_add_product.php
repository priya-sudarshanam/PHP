<head>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="js/validation.js"></script>
    <script type="text/css" src="./css/bootstrap.css"></script>
</head>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php
    $categories = load_category();
    $origins = load_origin();
    ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="alert alert-info" id="myModalLabel"><strong><center>Add Product </center></strong></h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="product">
                    <hr>
                    <div class="control-group">
                        <label class="control-label" for="inputName">Name:</label>
                        <input type="text" name="productname" class="form-control" placeholder="Name" autofocus="autofocus" required>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="inputDesc">Description:</label>
                        <div class="controls">
                            <input type="text" class="form-control"  name="description"  placeholder="Description" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputCategory">Category:</label>
                        <div class="controls">
                            <select name="category" class = "form-control" required>
                                <option>Please select</option>
                                <?php
                                foreach($categories as $category) { ?>
                                    <option><?php echo $category['CategoryName'] ?></option>
                                <?php   }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputOrigin">Origin:</label>
                        <div class="controls">
                            <select name="originated" class = "form-control" required>
                               <option>Please select</option>
                                <?php
                                foreach($origins as $origin) { ?>
                                    <option><?php echo $origin['OriginName'] ?></option>
                                <?php   }?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="inputPrice">Price:</label>
                        <div class="controls">
                            <input type="text" name="price"  class = "form-control" placeholder="Price" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="inputQuantity">Quantity:</label>
                        <div class="controls">
                            <input type="text" name="quantity" placeholder="Quantity"  class = "form-control" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="inputImage">Image:</label>
                        <div class="controls">
                            <input type="file" name="image" required>
                        </div>
                    </div>
                    <div class = "modal-footer">
                        <button name="save" class="btn btn-primary" type="submit">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

