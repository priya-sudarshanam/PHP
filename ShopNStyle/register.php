<?php include_once('header.php');
   include_once('admin/model.php'); ?>

<head>
    <script src="admin/js/jquery.js"></script>
    <script src="admin/js/jquery-ui.min.js"></script>
    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/jquery.validate.min.js"></script>
    <script src="admin/js/additional-methods.min.js"></script>
    <script src="admin/js/validation.js"></script>
</head>
<body>
    <div id="background">
        <div id="page">
           <?php include ('nav_sidebar.php');?>
            <div id="content">
                <div id="header">
                </div>
                <div id="body">

                    <h3>Register</h3>
                    <hr>

                    <div class="row-fluid">
                        <div class="span12">

                            <div class="row-fluid">
                                <div class="span2">

                                </div>
                                <div class="span6">
                                    <?php
                                    if (isset($_REQUEST['register'])) {
                                        $password = $_POST['password'];
                                        $rpassword = $_POST['rpassword'];
                                        $firstname = $_POST['first_name'];
                                        $lastname = $_POST['last_name'];
                                        $email = $_POST['email'];
                                        if (save_register_details($firstname, $lastname, $email, $password)) {
                                            echo "<i class='fa fa-check-circle-o fa-2x text-success'>Successfully saved information.</i>";
                                        } else {
                                            echo "<i class='fa fa-exclamation-circle fa-2x text-error'>Error saving.</i>";
                                        }
                                    }
                                    ?>

                                    <form class="form-horizontal" method="post" enctype="multipart/form-data" id="register">
                                        <div class="control-group">
                                            <label class="control-label" for="inputfirstname">Firstname</label>
                                            <div class="controls">
                                                <input type="text" name="first_name" id="first_name" placeholder="Firstname" autofocus="autofocus">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputlastname">Lastname</label>
                                            <div class="controls">
                                                <input type="text" name="last_name" id="last_name" placeholder="Lastname">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Email Address</label>
                                            <div class="controls">
                                                <input type="email" name="email" id="txtemail" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Password</label>
                                            <div class="controls">
                                                <input type="password" name="password" id="txtpassword" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Re-Type Password</label>
                                            <div class="controls">
                                                <input type="password" name="rpassword" id="txtrpassword" placeholder="Re-Type Password">
                                            </div>
                                        </div>
                                        <div class="errorTxt"></div>
                                        <div class="control-group">
                                            <div class="controls">

                                                <button type="submit" name="register" class="btn btn-success"><i class="icon-pencil"></i>&nbsp;Register</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="span3">

                                </div>
                            </div>
                        </div>
                    </div>






                </div>
                <div id="footer">
<?php include('footer.php'); ?>
                </div>
            </div>
        </div>
    </div>
</body>



</html>