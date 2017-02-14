<?php include('header.php'); ?>
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
           <?php include ('nav_sidebar.php');
           ?>
            <div id="content">
                <div class="hero-unit-table">
                    <div id="header">
                    </div>
                    <div id="body">
                        <h3>About Us</h3>
                        <div class="hero-unit-table">

							<div id="accordion">
										<h3>About The Website</h3>
										<div>A e-commerce website using technologies as PHP, HTML 5, CSS, SQL Server. Using model layer speaking to the sql server and
                                            performing CRUD operations easier with BootStrap responses to the user.
                                        </div>
										<h3>Mission</h3>
										<div>Converting the site to use MVC pattern completely</div>
										<h3>Vision</h3>
										<div>Converting the site to use MVC pattern completely</div>
										<h3>About the Developer</h3>
										<div>Worked on various technologies. Love to explore breadth and depth wise.</div>
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