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
	<?php require 'nav.php';?>

	<!-- Container -->	
    <div class="container">
		<div class="row">
			<div class="box">
			
			<form action="admin.php" method="get">
				<div class="row">
					<div class="col-lg-12">
						<hr>
						<h2 class="intro-text text-center">Admin
							<strong>functions</strong>
							<br>
							<small>Add a movie</small>
						</h2>
						<hr>
					</div>
				</div>

				<?php
				error_reporting(0);
				
				$title = isset($_GET['title']) ? $_GET['title'] : '';
				$duration = isset($_GET['duration']) ? $_GET['duration'] : '';
				$genres = isset($_GET['genres']) ? $_GET['genres'] : '';
				$director = isset($_GET['director']) ? $_GET['director'] : '';
				$actors = isset($_GET['actors']) ? $_GET['actors'] : '';
				$year = isset($_GET['year']) ? $_GET['year'] : '';
				$description = isset($_GET['description']) ? $_GET['description'] : '';
				$rating  = isset($_GET['rating']) ? $_GET['rating'] : '';
				$image = isset($_GET['image']) ? $_GET['image'] : '';
					
				if (!empty($title) && !empty($duration) && !empty($genres) && !empty($director) && !empty($actors) && !empty($year) && !empty($description) && !empty($rating) && !empty($image)){
					
					include("database.php");
					
					if ($con->connect_error) {
						die("Connection failed: " . $con->connect_error);
					}
					
					$sql = "INSERT INTO films (Title, Duration, Genre, Director, Actor, Year, Description, Rating, Image)
										VALUES ('$title', '$duration', '$genres', '$director', '$actors', '$year', '$description', '$rating', '$image')";
										
					if ($con->query($sql) === TRUE) {
						echo "The film was added successfully!";
					} else {
						echo "Sorry, the film could not be added. Try again later!";
					}
					$con->close();	
				}
				else{
					echo '<div class="row"><div class="col-lg-2 col-lg-offset-3">Please fill in all the fields!</div></div>';
				}	
			    ?>	

				<div class="row">
					<div class="col-lg-2 col-lg-offset-3">
						<p>Title:</p>
					</div>
					<div class="col-lg-4">
						<input id="title" type="text" name="title" class="form-control" value="<?php if (empty($title) || empty($duration) || empty($genres) || empty($director) || empty($actors) || empty($year) || empty($description) || empty($rating) || empty($image)){ echo $_GET['title']; }?>"/>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2 col-lg-offset-3">
						<p>Duration:</p>
					</div>
					<div class="col-lg-4">
						<input id="duration" type="text" name="duration" class="form-control" placeholder="In minutes" value="<?php if (empty($title) || empty($duration) || empty($genres) || empty($director) || empty($actors) || empty($year) || empty($description) || empty($rating) || empty($image)){ echo $_GET['duration']; }?>"/>
					</div>
				</div>	
				
				<div class="row">
					<div class="col-lg-2 col-lg-offset-3">
						<p>Genres:</p>
					</div>
					<div class="col-lg-4">
						<input id="genres" type="text" name="genres" class="form-control" placeholder="Add more than one genre separated with commas" value="<?php if (empty($title) || empty($duration) || empty($genres) || empty($director) || empty($actors) || empty($year) || empty($description) || empty($rating) || empty($image)){ echo $_GET['genres']; }?>"/>
					</div>
				</div>	
				
				<div class="row">
					<div class="col-lg-2 col-lg-offset-3">
						<p>Director:</p>
					</div>
					<div class="col-lg-4 ">
						<input id="director" type="text" name="director" class="form-control" placeholder="Only one" value="<?php if (empty($title) || empty($duration) || empty($genres) || empty($director) || empty($actors) || empty($year) || empty($description) || empty($rating) || empty($image)){ echo $_GET['director']; }?>"/>
					</div>
				</div>					
				
				<div class="row">
					<div class="col-lg-2 col-lg-offset-3">
						<p>Actors:</p>
					</div>
					<div class="col-lg-4">
						<input id="actors" type="text" name="actors" class="form-control" placeholder="Add more than one actor separated with commas" value="<?php if (empty($title) || empty($duration) || empty($genres) || empty($director) || empty($actors) || empty($year) || empty($description) || empty($rating) || empty($image)){ echo $_GET['actors']; }?>"/>
					</div>
				</div>					
				
				<div class="row">
					<div class="col-lg-2 col-lg-offset-3">
						<p>Year:</p>
					</div>
					<div class="col-lg-4">
						<input id="year" type="text" name="year" class="form-control" value="<?php if (empty($title) || empty($duration) || empty($genres) || empty($director) || empty($actors) || empty($year) || empty($description) || empty($rating) || empty($image)){ echo $_GET['year']; }?>"/>
					</div>
				</div>					
				
				<div class="row">
					<div class="col-lg-2 col-lg-offset-3">
						<p>Description:</p>
					</div>
					<div class="col-lg-4">
						<textarea rows="7" id="description" type="text" name="description" class="form-control" value="<?php if (empty($title) || empty($duration) || empty($genres) || empty($director) || empty($actors) || empty($year) || empty($description) || empty($rating) || empty($image)){ echo $_GET['description']; }?>"></textarea>
					</div>
				</div>				
				
				<div class="row">
					<div class="col-lg-2 col-lg-offset-3">
						<p>Rating:</p>
					</div>
					<div class="col-lg-4">
						<input id="rating" type="text" name="rating" class="form-control" value="<?php if (empty($title) || empty($duration) || empty($genres) || empty($director) || empty($actors) || empty($year) || empty($description) || empty($rating) || empty($image)){ echo $_GET['rating']; }?>"/>
					</div>
				</div>	

				<div class="row">
					<div class="col-lg-2 col-lg-offset-3">
						<p>Image:</p>
					</div>
					<div class="col-lg-4">
						<input id="image" type="file" name="image" accept="image/*" value="<?php if (empty($title) || empty($duration) || empty($genres) || empty($director) || empty($actors) || empty($year) || empty($description) || empty($rating) || empty($image)){ echo $_GET['image']; }?>"/>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-1 col-lg-offset-5">
						<input type="submit" class="btn btn-default btn-lg" value="Add the movie"/>
					</div>
				</div>					
				</form>
				
			</div>			
		</div>			
	</div>	

</body>	