<?php
include_once ('header.php');
include_once ('admin/model.php');
?>
<head>
    <script src="admin/js/jquery.js"></script>
    <script src="admin/js/jquery-ui.min.js"></script>
    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/jquery.validate.min.js"></script>
    <script src="admin/js/additional-methods.min.js"></script>
    <script src="admin/js/validation.js"></script>
</head>
<body>
<?php
include_once ('navtop.php');
?>
<div id="background">
    <div id="page">
        <?php include_once ('nav_sidebar.php');?>
        <div id="content">
            <div class="hero-unit-table">
                <div id="header">
                </div>
                <div id="body">
                    <h3>Contact Us</h3>
                    <hr>
                    <div class = "panel panel-well span6 alert alert-success">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="contact">
                            <div class="control-group">
                                <label class="control-label" for="inputfirstname">Full Name</label>
                                <div class="controls">
                                    <input type="text" name="full_name" id="name" autofocus="autofocus"
                                           placeholder="John Smith or John-Jean Smith or John Smith-David" required>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Email Address</label>
                                <div class="controls">
                                    <input type="email" name="email" id="txtemail" placeholder="abc@youremail.com">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputMessage">Message</label>
                                <div class="controls">
                                    <textarea class="contact_text_area" rows=11 cols=50 maxlength=250 minlength=5 id="message" placeholder="Enter your message" name="message" required>

                                    </textarea>
                                </div>
                            </div>

                            <div class="errorTxt"></div>
                            <div class="control-group">
                                <div class="controls">

                                    <button type="submit" name="contact" class="btn btn-success"><i class="icon-pencil"></i>&nbsp;Contact</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <?php
                    if (isset($_POST['contact'])) {
                        $email = $_POST['email'];
                        $message = $_POST['message'];
                        $name = $_POST['full_name'];
                        if ($email && $message && $name) {
                            if (save_contact_details($name, $email, $message)) {
                                echo "<i class='fa fa-check-circle-o fa-2x text-success'>Successfully saved information.</i>";
                            } else {
                                echo "<i class='fa fa-exclamation-circle fa-2x text-error'>Error saving.</i>";
                            }
                        }
                    }
                    ?>

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