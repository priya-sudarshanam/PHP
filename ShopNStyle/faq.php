<?php include_once('header.php'); ?>
<head>
    <link href = "admin/css/jquery-ui.css" rel = "stylesheet">
    <script src = "admin/js/jquery-1.10.2.js"></script>
    <script src = "admin/js/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#accordion" ).accordion();
        });
    </script>
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
                        <h3>Frequently Asked Question</h3>
                        <div class="hero-unit-table">
										<div id="accordion">
	<h3>What is the mode of payment uses in this site ?</h3>
	<div><li style = "color:red;"> This site uses pay-pal transaction as the primary mode of payments.</li> </div>
	<h3>How long can the transaction will be process ?</h3>
	<div>As soon as the pay-pal account is already settled on </div>
	<h3>As customer how will I be assure that the products will be on-hand? </li> </h3>
	<div><li style = "color:red;">As the account has been already process and been deducted from the customer the product will be at the customer's hand not less than 3 day's depend's on the location.</li></div>
	<h3>Do you offer discount?</h3>
	<div><li style = "color:red;">Yes absolutely but only seasonal.
	</li></div>
</div>
                            
                        </div>
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