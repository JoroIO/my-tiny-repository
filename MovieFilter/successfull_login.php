<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Logout - Movie Filter</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/movie_filter.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>

	
	<?php 
		require 'nav.php'; 	
    ?>
	
	<!-- Container -->
    <div class="container">
	
       <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Logout
                        <strong>
                    </h2>
                    <hr>
                    <form role="form" action="login.php" method="POST">
						<div class="row">
                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label>You have logged in successfully!</label>
								<label>Please wait 3 seconds for the page to refresh...</label>
                            </div>
						</div>
                    </form>
				</div>
            </div>
        </div>	
    <?php
		if ($_SESSION['uname'] == "administrator"){
			header('Refresh: 3; url=admin.php');
		}
		else{
			header('Refresh: 3; url=registered_user.php');
		}
	?>
		
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>

</body>

</html>