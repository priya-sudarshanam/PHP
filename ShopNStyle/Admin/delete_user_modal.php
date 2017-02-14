<?php include_once ('session.php');
include_once ('model.php');
include_once ('header.php');?>
<head>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="js/validation.js"></script>
    <script type="text/css" src="./css/bootstrap.css"></script>
</head>

<div class="modal fade" id="delete_user<?php echo $user_id ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <h4 class="modal-title" id="myModalLabel"><center>Delete Product </center></h4>
                                        </div>
                                         <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Delete &nbsp;</strong> <?php echo $row['FirstName'] . " " . $row['LastName']; ?>?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="delete_user.php<?php echo '?id=' . $user_id; ?>" ><i class="icon-check"></i>&nbsp;Yes</a>
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;No</button>

                                        </div>
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  
									  
									  
 </div>