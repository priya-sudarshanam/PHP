<div class="modal fade" id="delete_product<?php echo $productid ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                                          
                <h4 class="modal-title" id="myModalLabel"><center>Delete Product </center></h4>
            </div>
            <div class="modal-body">
             <div class="alert alert-danger">Are you Sure you Want to <strong>Delete &nbsp;</strong> <?php echo $row['PName']; ?>?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="delete_product.php<?php echo '?productid=' . $productid; ?>" ><i class="icon-check"></i>&nbsp;Yes</a>
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;No</button>

                                        </div>
									   </div>
                                      
                                    </div>
									
									  
									  
									  
 </div>
                