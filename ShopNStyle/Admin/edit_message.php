<?php include_once('session.php');
include_once('model.php');
include_once('header.php');

$row = fetch_message($_GET['messageid'])[0];

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
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="edit-message">
                                <div class="alert alert-info"><strong>Edit Message</strong> </div>
                                <div class="control-group">
                                    <label class="control-label" for="name">From</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="inputName" class = "form-control" autofocus="autofocus" value="<?php echo $row['Name'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputDesc">Email</label>
                                    <div class="controls">
                                        <input type="text"  name="description"  class = "form-control" value="<?php echo $row['Email']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputCategory">Message</label>
                                    <div class="controls">
                                        <input type="text"  name="description"  class = "form-control" value="<?php echo $row['Message']; ?>"
                                               readonly>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputOrigin">Responded ?</label>
                                    <div class="controls">
                                        <input type="checkbox" name="responded" value="Yes" /> Yes
                                        <input type="checkbox" name="responded" value="No" /> No
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPrice">Responded Message</label>
                                    <div class="controls">
                            <textarea class="contact_text_area" id="respondedmessage" placeholder="Enter your message" name="respondedmessage"
                                     required> </textarea>
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
                                $messageid = $_GET['messageid'];
                                $responded = $_POST['responded'] === 'Yes' ? 1 : 0;
                                $respondedmessage = $_POST['respondedmessage'];
                                if (!empty($responded) && !empty($respondedmessage)) {
                                    $success = update_message($responded, $respondedmessage, $messageid);
                                    if ($success) {
                                        header('location: messages.php');
                                        exit();
                                    }
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
