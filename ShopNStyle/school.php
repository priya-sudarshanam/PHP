<?php include('header.php');
include('admin/model.php'); ?>
<body>
<?php
include('navtop.php');
?>
<div id="background">

    <div id="page">
        <?php include ('nav_sidebar.php');?>
        <div id="content">
            <div class="hero-unit-table">
                <div id="header">
                </div>
                <div id="body">
                    <h3>List of Our Products</h3>
                    <p>
                        <?php include ('product_menu.php');?>
                    </p>

                    <ul class="thumbnails">
                        <?php
                        $rows = fetch_product_details('School');
                        if (count($rows) > 0) {
                            foreach ($rows as $row) {
                                $id = $row['ProductID'];
                                ?>

                                <li class="span3">
                                    <div class="thumbnail">
                                        <img data-src="holder.js/300x200" alt="">
                                        <div class="alert alert-info">
                                            <div class="font1"><?php echo $row['PName']; ?></div>
                                        </div>
                                        <hr>
                                        <a href="#<?php echo $id; ?>" data-toggle="modal"><img
                                                    src="admin/<?php echo $row['Location'] ?>" class="img-rounded"
                                                    alt="" width="160" height="200"></a>
                                        <p>
                                        <p> Price: <?php echo $row['PPrice']; ?></p>
                                        </p>


                                    </div>
                                </li>

                                <!-- picture modal -->
                                <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">

                                        <div class="span2">

                                            <img src="admin/<?php echo $row['Location']; ?>" width="200" height="200"
                                                 class="img-rounded">
                                        </div>
                                        <div class="span3">
                                            <p>Name</p>
                                            <div class="alert alert-success">
                                                &nbsp;&nbsp;<?php echo $row['PName'] ?></div>
                                            <p>Description</p>
                                            <div class="alert alert-success">
                                                &nbsp;&nbsp;<?php echo $row['PDescription'] ?></div>

                                            <div class="alert alert-success">&nbsp;&nbsp;&nbsp;&nbsp;Made
                                                in: <?php echo $row['Originated'] ?> </div>
                                            <p>Price</p>
                                            <div class="alert alert-success">
                                                &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['PPrice'] ?></div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i
                                                    class="icon-remove"></i>&nbsp;Close
                                        </button>
                                    </div>
                                </div>
                                <!-- end modal -->


                            <?php }
                        }?>

                    </ul>

                </div>
                <div id="footer">
                    <?php include('footer.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer_bottom.php');
?>
</body>



</html>