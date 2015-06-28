<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration - Movie Filter</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/movie_filter.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>

<?php require 'nav.php'; 

	$con = mysqli_connect("localhost", "root", "") or die(mysql_error());
	mysqli_select_db($con, "moviefilterdb") or die(mysql_error());

		if(isset($_POST['submit'])){
			
			header("location:login.php");

			$password = $_POST['pass'];
			$confpassword = $_POST['confpass'];

			if($password == $confpassword){
				//All good.Continue :)

				$fname = mysqli_real_escape_string($con, $_POST['fname']);
				$lname = mysqli_real_escape_string($con, $_POST['lname']);
				$uname = mysqli_real_escape_string($con, $_POST['uname']);
				$email = mysqli_real_escape_string($con, $_POST['email']);
				$password = mysqli_real_escape_string($con, $password);
                $gender = $_POST['gender']; 

				$password = md5($password);
				$confpassword = md5($confpassword);

				$sql = mysqli_query($con, "SELECT * FROM `users` WHERE `uname` = '$uname'");
				if(mysqli_num_rows($sql) > 1){
					print '<script type="text/javascript">'; 
					print 'alert("Sorry, that user already exists.")'; 
					print '</script>';	
					exit();
				}else{
                    for($i=0; $i < sizeof($gender); $i++){
					   mysqli_query($con, "INSERT INTO `users` (`id`, `fname`, `lname`, `uname`, `email`, `password`, `gender`) VALUES (NULL, '$fname', '$lname', '$uname', '$email', '$password', '".$gender[$i]."')") or die(mysql_error());   
                    }
                    print '<script type="text/javascript">'; 
					print 'alert("You are registered.Now you can log in.")'; 
					print '</script>';

				}
			}else{
				print '<script type="text/javascript">'; 
				print 'alert("Sorry, your passwords do not match.")'; 
				print '</script>'; 
				exit();
			}

		}
?>
	
	<!-- Container -->
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Registration
                        <strong>form</strong>
                    </h2>
                    <hr>
                    <form role="form" action="registration.php" method="POST">
                        <div class="row">
                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname">
                            </div>
						</div>	
						<div class="row">
                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname">
                            </div>
						</div>
						<div class="row">
                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label>User Name</label>
                                <input type="text" class="form-control" pattern=".{6,}" title="Six or more characters" id="uname" name="uname">
								<small>More than 6 chars</small>
                            </div>
						</div>
						<div class="row">
                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label>E-mail</label>
                                <input type="text" class="form-control" pattern="*+@*.*" title="It is not a valid e-mail." id="email" name="email">
                            </div>
						</div>
						<div class="row">
                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label>Password</label>
                                <input type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="pass" name="pass">
								<small>More than 8 chars (1 capital letter, 1 minuscule, 1 number)</small>
                            </div>
						</div>
						<div class="row">
                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="confpass" name="confpass">
                            </div>
						</div>
						<div class="row">
                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label>Gender</label>
								<br>
                                <input type="radio" value="male" name="gender[]"> Male
								<br>
                                <input type="radio" value="female" name="gender[]"> Female
                            </div>
						</div>	
						<div class="row">
							<!--<input type="submit" value="Registration" class="btn btn-default btn-lg col-lg-offset-4"/>-->
							<button class="btn btn-default btn-lg col-lg-offset-4" onclick="window.location.href='login.php'" id="submit" name="submit">Registration</button>
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
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
