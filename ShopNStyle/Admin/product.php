<?php include_once ('session.php');
include_once ('model.php');
include_once ('header.php');?>
<head>
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
            <a class="navbar-brand" href="#	">Surf N'Shop</a>
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
    <div id="page-wrapper">

        <div id="page-inner">
            <div class="col-md-12">
                <h1 class="page-header">

                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        Add Product
                    </button>


                </h1>
                <?php include_once ('modal_add_product.php');
                if (isset($_POST['save'])) {

                                $productname = $_POST['productname'];
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

                                $success = save_product($productname,
                                                        $productdesc,
                                                        $productcategory,
                                                        $productoriginate,
                                                        $productprice,
                                                        $qty,
                                                        $location);

                                if ($success) {
                                    echo "<i class='fa fa-check-circle-o fa-2x text-success'>Successfully saved information.</i>";
                                } else {
                                    echo "<i class='fa fa-exclamation-circle fa-2x text-error'>Error saving.</i>";
                                }
                           }

                            ?>


            </div>
            <div class="row">

                <div class="hero-unit-table">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <div class="alert alert-info">
                            <strong><i class="icon-user icon-large"></i>&nbsp;Product Table</strong>
                        </div>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Origin</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $rows = load_all_products();
                        if (count($rows) > 0) {
                            foreach ($rows as $row) {
                                $productid = $row['ProductID'];
                                $product_qty = load_product_details_for_product_id($productid, 'Delivered');

                                $total= (isset($product_qty) && isset($product_qty['Qty'])) ? (int)$row['Quantity'] - (int)$product_qty['Qty'] : (int)$row['Quantity'];
                                $updated_qty = update_qty($total, $productid);

                                ?>
                                <tr class="warning">
                                    <td><?php echo $row['PName']; ?></td>
                                    <td><?php echo $row['PDescription']; ?></td>
                                    <td><?php echo $row['PCategory']; ?></td>
                                    <td><?php echo $row['Originated']; ?></td>
                                    <td style="text-align:right;"><?php echo number_format($row['PPrice'],2); ?></td>
                                    <td style="text-align:center;"><?php echo $total; ?></td>
                                    <td width="50" align="center"><img src="<?php echo $row['Location']; ?>" class="img-rounded" width="50" height="40"></td>
                                    <td width="160">
                                        <a href="#delete_product<?php echo $productid; ?>" role="button"
                                           data-target = "#delete_product<?php echo $productid;?>
                                           "data-toggle="modal" class="btn btn-danger">
                                            <i class="icon-trash icon-large"></i>&nbsp;Delete</a>

                                        <a href="edit_product.php<?php echo '?productid=' . $productid; ?>"
                                           class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>
                                    </td>
                                    <!-- product delete modal -->
                                    <?php include ('delete_product_modal.php');?>

                                    <!-- end delete modal -->

                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
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
