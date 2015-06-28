<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Movie Filter</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/movie_filter.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>

	
	<?php require 'nav.php'; ?>
	
	<!-- Container -->
    <div class="container">
	
       <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Login
                        <strong>form</strong>
                    </h2>
                    <hr>
					
					<?php
						include("database.php");
						if ($con->connect_error) {
							die("Connection failed: " . $con->connect_error);
						}
						
						$uname = isset($_POST['username'])?mysqli_real_escape_string($con, $_POST['username']):'';
						$password = isset($_POST['password'])?mysqli_real_escape_string($con, $_POST['password']):'';					
						
						if (!empty($uname) && !empty($password)){
							$password = md5($password);
							$login_query = "SELECT * FROM `users` WHERE `uname` = '$uname' AND `password` = '$password'";
							$res = mysqli_query($con, $login_query);
							$row=mysqli_fetch_array($res, MYSQLI_BOTH);
							if (mysqli_num_rows($res) == 1){
								$_SESSION['uname']=$uname;
								mysqli_close($con);
								header("location:successfull_login.php");
							}
							else{
							
								echo'<div class="form-group col-lg-4 col-lg-offset-4" style="color:red">You entered incorrect username or password!</div>';
							}
							
						}
						else{
							echo '<div class="form-group col-lg-4 col-lg-offset-4" style="color:red">Please enter both username and password.</div>';
						}
						
					?>
					
					
                    <form role="form" action="login.php" method="POST">
						<div class="row">
                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label>User Name</label>
                                <input id="login_username" type="text" name="username" class="form-control" pattern=".{6,}" title="Six or more characters">
                            </div>
						</div>
						<div class="row">
                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label>Password</label>
                                <input id="login_password" type="password" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            </div>
						</div>
						<div class="row">	
							<button class="btn btn-default btn-lg col-lg-offset-4" name="submit" >Login</button>
						</div>
                    </form>
				</div>
            </div>
        </div>	

		
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>

</body>

</html>
