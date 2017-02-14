<?php include ('header.php');
  include_once('model.php');
 include ('script.php');?>
<html>
<head>

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
                      						
					   Welcome : ADMIN
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
                    <div class="col-md-12">
						
						
						<div class="hero-unit-table">   
									<div class="charts_container">
                                <div class="chart_container">
                                    <div class="alert alert-info">List of Products</div>  
                                    <canvas id="chartCanvas1" width="1100" height="400">
                                        Your web-browser does not support the HTML 5 canvas element.
                                    </canvas>

                                </div>
                            </div>
							
							<script type="application/javascript">

                                var chart1 = new AwesomeChart('chartCanvas1');


                                chart1.data = [
                                <?php
                                    $rows = load_all_products();
                                if (count($rows) > 0) {
                                foreach ($rows as $row) {
                                    ?>
                                    <?php echo $row['Quantity'] . ','; ?>
                                <?php } }; ?>
                                ];

                                chart1.labels = [
                                <?php
                                    $rows = load_all_products();
                                    if (count($rows) > 0) {
                                    foreach ($rows as $row) {
                                    ?>
                                    <?php echo "'" . $row['PName'] . "'" . ','; ?>
                                <?php } }; ?>
                                ];
                                chart1.colors = ['#006CFF', '#FF6600', '#34A038', '#945D59', '#93BBF4', '#F493B8'];
                                chart1.randomColors = true;
                                chart1.animate = true;
                                chart1.animationFrames = 30;
                                chart1.draw();


                                var chart5 = new AwesomeChart('chartCanvas5');
                                chart5.chartType = "pie";
                                chart5.title = "Worldwide browser market share: December 2010";
                                chart5.data = [	<?php
                                    $rows = load_all_products();
                                    if (count($rows) > 0) {
                                    foreach ($rows as $row) {
                                    ?>
                                    <?php echo $row['Quantity'] . ','; ?>
                                <?php } }; ?>];
                                chart5.labels = [	<?php
                                    $rows = load_all_products();
                                    if (count($rows) > 0) {
                                    foreach ($rows as $row) {
                                    ?>
                                    <?php echo "'" . $row['PName'] . "'" . ','; ?>
                                <?php }}; ?>];
                                chart5.colors = chart1.colors;
                                chart5.animate = true;
                                chart5.draw();
                            </script>


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


</body>
</html>
