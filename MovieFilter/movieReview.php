<?php 
$film_id=$_GET['id'];

	
	include("database.php");
	if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
	}
	$query="SELECT * FROM films WHERE ID=$film_id";
	$result = mysqli_query($con, $query);
	$row=mysqli_fetch_array($result, MYSQLI_BOTH);
	
	//$title = $row['Title'];
	//$duration = $row['Duration'];
	//$genre = $row['Genre'];
	//$director = $row['Director'];
	//$actors = $row['Actor'];
	//$year = $row['Year'];
	//$description=$row['Description'];
	//$image = $row['Image'];
	
	mysqli_close($con);
	//print_r($_SESSION);
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
	<?php 
		require 'nav.php';
		$_SESSION['ID'] = $_GET['id'];
	?>
	
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
				<?php
					$actors_array = explode(",", $row["Actor"]);
					//print_r($actors_array);
					$actors = "";
					if (!empty($actors_array)){
						foreach($actors_array as $key=>$value){
							if (($key==0)||($key==1)){ 
							    $trimmed_value = ltrim($value);
								$actors .= "<a href='#'>$trimmed_value</a> , "; 
							}
							else {
								$trimmed_value = ltrim($value);
								$actors .= "<a href='#'>$trimmed_value</a>"; 
							}
						}
					}
					
					echo'<div class="col-lg-12">
							<div class="col-lg-6">
								<img class="img-responsive img-border" style="width: 350px;" src="img/'.$row["Image"].'">
							</div>
							
							<div class="col-lg-6">
								<h2>'.$row["Title"].'
									<br>
									<small>'.$row["Year"].'</small>
								</h2>
								<p><strong>Genre:</strong> '.$row["Genre"].'</p>
								<p><strong>Duration:</strong> '.$row["Duration"].' min</p>
								<p><strong>Director:</strong> <a href="#">'.$row["Director"].'</a></p>
								<p><strong>Actors:</strong> '.$actors.'</p>
								<p><strong>Review:</strong> '.$row["Description"].'</p>';
								if (!isset($_SESSION["uname"])){
								    echo '<p><strong>Comment: </strong><small>(you have to log in to use this feature)</small></p>
									<textarea rows="4" style="width:100%" disabled></textarea>
									<input class="btn btn-default btn-lg" type="submit" value="Comment" disabled/>';
								}
								else{
									echo
									'<form action="successfull_comment.php" method="get">
										<p><strong>Comment:</strong></p>
										<textarea rows="4" style="width:100%" name="description"></textarea>
									<input class="btn btn-default btn-lg" type="submit" value="Comment" />
									</form>';
									
								}
							echo	
							'</div>
						</div>';
				?>
				
				<div class="col-lg-12">
                    <hr>
					<h2 class="intro-text text-center">Older
						<strong>Comments</strong>
						<?php
							if (!isset($_SESSION["uname"])){
								echo '<small>(you have to log in to use this feature)</small>';
							}
						?>
					</h2>
                    <hr>
                </div>
				
				<?php
					include("database.php");
					if ($con->connect_error) {
						die("Connection failed: " . $con->connect_error);
					}
					
					$comment_query = "SELECT Username, Comment, Date FROM comments WHERE Film_ID=$film_id";
					$comments_result = mysqli_query($con, $comment_query);
					if (mysqli_num_rows($comments_result) > 0){
						while ($row_comments = mysqli_fetch_array($comments_result, MYSQLI_BOTH)) {
							echo '<div class="col-lg-4 col-lg-offset-4">
					                <p><strong>Username: </strong>'.$row_comments['Username'].'</p>
					                <p><strong>Date: </strong>'.$row_comments['Date'].'</p>
					                <p><strong>Comment: </strong>'.$row_comments['Comment'].'</p>
				                </div>
								<div class="col-lg-12">
									<hr>
								</div>';	
						}
					}
					else{
						echo '<p class="text-center">There are no commens yet!</p>';
					}
					mysqli_close($con);
				?>

		<div class="col-lg-12 text-center">
			<ul class="pager">
				<li class="previous"><a class="back">&larr; Back</a></li>
			</ul>
		</div>		

				
            </div>
        </div>		
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- Gratzi's JS -->	
	<script>
		$(document).ready(function(){
			$('a.back').click(function(){
				parent.history.back();
				return false;
			});
		});
	</script>
</body>

</html>
