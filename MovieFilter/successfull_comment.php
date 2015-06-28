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
		
		include("database.php");
		if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		} 
		
		$film_id = $_SESSION['ID'];
		$description = isset($_GET['description']) ? $_GET['description'] : '';
		$username = $_SESSION['uname'];

		$sql = "INSERT INTO comments (Film_ID, Username, Comment)
							VALUES ('$film_id', '$username', '$description')";
									
		/*if (!empty($description)){
			mysqli_query($con, $sql);
		}*/	
		
    ?>
	
	<!-- Container -->
    <div class="container">	
       <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Logout
                    </h2>
                    <hr>
                    <form role="form" action="login.php" method="POST">
						<div class="row">
                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label><?php 
									if ($con->query($sql) === TRUE) {
										echo "Your comment was posted successfully! Please wait for the page to reload...";
									} else {
										echo "Sorry, your comment was not posted! Please try again...";
									}
									$con->close();
									header('Refresh: 5; url=movieReview.php?id='.$film_id.' ');
								?></label>
                            </div>
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