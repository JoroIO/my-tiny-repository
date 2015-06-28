<?php 
	include "database.php";
	
	$query = "SELECT ID,Title,Year,Description,Image FROM films ORDER BY Title ASC";
	
	if (!empty($query)){
		$result = mysqli_query($con, $query);
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Movies - Movie Filter</title>

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
                    <h2 class="intro-text text-center">Movie
                        <strong>Review</strong>
                    </h2>
                    <hr>
                </div>
				
					<!--<div class="col-lg-12">-->
					<?php					
					if (mysqli_num_rows($result) > 0){
						while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
							echo	'   <div class="col-lg-12">
											<div class="col-lg-6">
												<img class="img-responsive img-border" style="width: 200px;" src="img/'.$row["Image"].'">
											</div>
											
											<div class="col-lg-6">
												<h2>'.$row["Title"].'
													<br>
													<small>'.$row["Year"].'</small>
												</h2>
												<p>'.$row["Description"].'</p>
												<a href="movieReview.php?id='.$row["ID"].'">
													<input type="submit" name="'.$row["Title"].'" class="btn btn-default btn-lg" value="Read more">
												</a>
											</div>
										</div>
									
									<div class="col-lg-12">
									<hr>
									</div>';
						}
					}
					else{
						echo '<p class="text-center">No results found!</p>';
					}
					
					mysqli_close($con);
					?>	
					<!--</div>-->
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
