<div class="navbar navbar-fixed-top">
    <div class="navbar-inner2">
        <div class="name">
            <div class="alert alert-info2">
                Welcome:
                <?php include_once('admin/model.php');
                $row = load_user($ses_id)[0];
                $count = count_orders($ses_id);
                echo $row['Firstname'] . " " . $row['Lastname'];
                ?>
            </div>
            <div class="btn-group">
                <a href = "logout.php" class = "btn"><i class="icon-cog icon-large"></i>&nbsp;Log out</a>
                <button class="btn dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="logout.php"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
                </ul>
            </div>
            <div class="pull-right"> <a href="user_cart.php" class="btn btn-info"><i class="icon-shopping-cart icon-large"></i>&nbsp;My Cart
                 (<?php echo $count; ?>)
                </a>

            </div>
          
            </br>



        </div>   
    </div>
</div>