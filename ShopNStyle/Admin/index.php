<?php include_once ('model.php'); ?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
      Shop N' Style
    </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<form method = "post" >
  <h1>Administrator Log in</h1>
  <div class="inset">
  <p>
    <label for="username">USERNAME</label>
    <input style = "color:white;"type="text" name="username" id="username" autofocus="autofocus" required>
  </p>
  <p>
    <label for="password">PASSWORD</label>
    <input style = "color:white;" type="password" name="password" id="password" required>
  </p>

  </div>
   <center><p class="p-container" >
  
    <input type="submit" name="login" id="go" value="Log in">
	
  </p>
  </center>
</form>
	<?php
    if(isset($_POST['login']))
							{
							
							$username=$_POST['username'];
							$password=$_POST['password'];
							$result = user_exists($username, $password);
                           if (!$result) {
                                echo "<i class='fa fa-exclamation-circle fa-2x text-error'>Error saving.</i>";
                            } else {
                                session_start();
                                $_SESSION['role_id'] = (int)$result;
                                header('Location: product.php');
                                exit();
                            }

							
							}
							?>
	



</body>
</html>
