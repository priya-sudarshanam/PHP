<?php include_once ('session.php');
      include_once ('header.php');
      include_once('model.php');
      ?>
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
                <a class="navbar-brand" href="#	">Shop N' Style</a>
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
                    <div class="col-md-12">
                        <h1 class="page-header">
                        </h1>
						<div class="hero-unit-table">   
                           <table cellpadding="0" cellspacing="0" border="0" class="table table-condensed table-striped table-bordered" id="dataTables-example">
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Messages</strong>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Name of Sender</th>
                                        <th>Email Address</th>
                                        <th>Message</th>
                                        <th>Responded</th>
                                        <th>Responded Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rows = load_message();
                                    if (count($rows) > 0) {
                                    foreach ($rows as $row) {
                                        $message_id = $row['MessageID'];
                                        ?>
                                        <tr>
                                            <td style = "width:150px";><?php echo $row['Name']; ?></td>
                                            <td style = "width:200px";><?php echo $row['Email']; ?></td> 
                                            <td style = "width:600px;"><?php echo $row['Message']; ?></td>
                                            <td style = "width:600px;"><?php echo $row['Responded'] ? 'Yes' : 'No'; ?></td>
                                            <td style = "width:600px;"><?php echo $row['RespondedMessage']?></td>
                                            <td width="160">
                                                <a href="edit_message.php<?php echo '?messageid=' . $message_id; ?>"
                                                   class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>
                                            </td>
                                            <?php } } ?>
										</tr>
									
                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
				<div>
               
                
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
