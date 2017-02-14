<?php include_once('header.php'); ?>
<?php include_once('admin/model.php');
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
?>
<head>
    <script src="admin/js/jquery-ui.min.js"></script>
    <script src=admin/js/jquery.min.js"></script>
    <script src="admin/js/jquery.validate.min.js"></script>
    <script src="admin/js/additional-methods.min.js"></script>
    <script src="admin/js/validation.js"></script>
</head>
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

                        <h3>Shop N' Style</h3>
                        <div class="signup">
                            <a href="register.php" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Sign Up</a>
                        </div>
                        <hr>

                        <div class="row-fluid">
                            <div class="span12">

                                <div class="row-fluid">
                                    <div class="span2"></div>
                                    <div class="span8">
                                        <ul class="thumbnails">
                                            <li class="span12">
                                                <div class="thumbnail">
                                                    <img data-src="admin/js/holder/holder.js/100x200/#000:#fff"  src="admin/images/login.jpg"   alt="" />
                                                    <form class="form-horizontal" method="post" id="order" enctype="multipart/form-data" name="order">
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputEmail">Email</label>
                                                            <div class="controls">
                                                                <input type="text" id="inputEmail" name="email" placeholder="Email" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputPassword">Password</label>
                                                            <div class="controls">
                                                                <input type="password" id="inputPassword" name="password" placeholder="Password" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <div class="controls">

                                                                <button type="submit" class="btn btn-primary" name="login"><i class="icon-signin icon-large"></i>&nbsp;Sign in</button>
                                                            </div>
                                                            <br>
                                         <?php
                                           if (isset($_POST['login'])) {
                                              $results = get_user_details($_POST['email'], $_POST['password']);
                                               if (count($results) === 1) {
                                                  $_SESSION['id'] = $results[0]['MemberID'];
                                                  ?>
											<script>
                                                window.location = 'user_school.php';
												</script>

												  <?php
													session_write_close();
                                                    } else {
													session_write_close();
                                                                    ?>
                                                  <div class="alert alert-error">Please check your username and password</div>
                                                                <?php }
                                                            }
                                                            ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>

                                        </ul>





                                    </div>
                                    <div class="span2">

                                    </div>
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
    <?php 
    include('footer_bottom.php');
    ?>
</body>



</html>