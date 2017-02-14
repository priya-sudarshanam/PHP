<head>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="js/validation.js"></script>
    <script type="text/css" src="./css/bootstrap.css"></script>
</head>

<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">4
    <?php $roles = load_roles();
    ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="alert alert-info" id="myModalLabel"><strong><center>Add New User </center></strong></h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="add-user">
                    <div class="control-group">
                        <label class="control-label" for="firstname">FirstName:</label>
                        <div class="controls">
                            <input type="text" class = "form-control" name="firstname" id="firstname" placeholder="John or John-Jean" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="lastname">LastName:</label>
                        <div class="controls">
                            <input type="text"  name="lastname" class = "form-control" placeholder="John or John-Jean" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="username">Username:</label>
                        <div class="controls">
                            <input type="text" name="username"  class = "form-control" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password">Password:</label>
                        <div class="controls">
                            <input type="password" name="password" id="password" class = "form-control"  placeholder="Password" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="repeatpassword">Repeat Password:</label>
                        <div class="controls">
                            <input type="password" name="rpassword" class = "form-control"  placeholder="Password" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="inputRole">Role:</label>
                        <div class="controls">
                            <select name="role" class = "form-control" required>
                                <option></option>
                                <?php
                                foreach($roles as $values) { ?>
                                    <option><?php echo $values['RoleName'] ?></option>
                                <?php  }?>
                            </select>
                        </div>
                    </div>

                    <hr/>

                    <div class="control-group">
                        <div class="controls">
                               <button type="submit" name="add" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Add</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>




            </div>

        </div>
    </div>
</div>

