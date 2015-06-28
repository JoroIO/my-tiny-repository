<?php
	error_reporting(0);

	//Get film title from the search bar
	$film_title = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';
	$title_array = explode(' ', $film_title);
	$title_query = "";
	if (!empty($title_array)){
		foreach($title_array as $key=>$value){
			$title_array[$key]=str_replace("-"," ",$value);
			if ($key!= count($title_array) - 1){ 
				$title_query .= "Title LIKE '%$title_array[$key]%' AND "; 
			}
			else {
				$title_query .= "Title LIKE '%$title_array[$key]%'"; 
			}
		}
	}
	//Get genres and put them in an array
	$genre = isset($_GET['genre']) ? $_GET['genre'] : '';
	$genre_array = [];
	if (!empty($genre)){
		foreach($genre as $value){
			array_push($genre_array, '"'.$value.'"');
		}
	}
		
	$length = count($genre_array);
	$genre_list = implode(', ', $genre_array);
	//Get film year
	$film_year = isset($_GET['year']) ? $_GET['year'] : '';
	
	include("database.php");
	if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
	}
	
	//Filter by title only
	if (!empty($film_title) && empty($genre) && empty($film_year) && empty($mood)){
		$query="SELECT ID,Title,Year,Description,Image FROM films WHERE $title_query" ;
	}
	
	//Filter by genre only
	if (empty($film_title) && !empty($genre) && empty($film_year) && empty($mood)){
		$query="SELECT ID,Title,Year,Description,Image FROM films WHERE (ID IN (SELECT DISTINCT(Film_ID) FROM genres WHERE Genre IN ($genre_list) GROUP BY Film_ID HAVING COUNT(*)>=$length))" ;
	}
	
	//Filter by year only
	if (empty($film_title) && empty($genre) && !empty($film_year) && empty($mood)){
		$query = "SELECT ID,Title,Year,Description,Image FROM films WHERE Year=$film_year" ;
	}
	
	//Filter by title and genre
	if (!empty($film_title) && !empty($genre) && empty($film_year) && empty($mood)){
		$query="SELECT ID,Title,Year,Description,Image FROM films WHERE $title_query AND (ID IN (SELECT DISTINCT(Film_ID) FROM genres WHERE Genre IN ($genre_list) GROUP BY Film_ID HAVING COUNT(*)>=$length))" ;
	}
	
	//Filter by title and year
	if (!empty($film_title) && empty($genre) && !empty($film_year) && empty($mood)){
		$query="SELECT ID,Title,Year,Description,Image FROM films WHERE $title_query AND Year=$film_year" ;
	}
	
	//Filter by genre and year
	if (empty($film_title) && !empty($genre) && !empty($film_year) && empty($mood)){
		$query="SELECT ID,Title,Year,Description,Image FROM films WHERE (ID IN (SELECT DISTINCT(Film_ID) FROM genres WHERE Genre IN ($genre_list) GROUP BY Film_ID HAVING COUNT(*)>=$length)) AND Year=$film_year" ;
	}
	
	//Filter by title, genre and year
	if (!empty($film_title) && !empty($genre) && !empty($film_year) && empty($mood)){
		$query="SELECT ID,Title,Year,Description,Image FROM films WHERE $title_query AND (ID IN (SELECT DISTINCT(Film_ID) FROM genres WHERE Genre IN ($genre_list) GROUP BY Film_ID HAVING COUNT(*)>=$length)) AND Year=$film_year" ;
	}
	
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
		
		<form action="unregistered_user.php" method="get">
		<div class="row">
			<div class="box">
			
				<div class="row">
					<div class="col-lg-10">
						<input type="text" class="form-control" name="keywords" value="<?php echo $_GET['keywords']; ?>">
					</div>
					<div class="col-lg-2" align="center">
						<input type="submit" class="btn btn-default btn-lg" name="search" value="Search">
					</div>				
				</div>
				
				<div class="row">
						<div class="col-lg-2">
							<input type="checkbox" name="genre[]" value="Action" <?php foreach($genre_array as $key=>$value){ if(($_GET['genre'][$key])=='Action'){ echo "checked"; } } ?> > Action</input>
						</div>
						<div class="col-lg-2">
							<input type="checkbox" name="genre[]" value="Comedy" <?php foreach($genre_array as $key=>$value){ if(($_GET['genre'][$key])=='Comedy'){ echo "checked"; } } ?> > Comedy</input> 
						</div>
						<div class="col-lg-2">
							<select name="year" >
							    <option value="Year">Year</option>
								<option value="1990" <?php if($film_year == 1990) echo "selected"; ?> >1990</option>
								<option value="1991" <?php if($film_year == 1991) echo "selected"; ?> >1991</option>
								<option value="1992" <?php if($film_year == 1992) echo "selected"; ?> >1992</option>
								<option value="1993" <?php if($film_year == 1993) echo "selected"; ?> >1993</option>
								<option value="1994" <?php if($film_year == 1994) echo "selected"; ?> >1994</option>
								<option value="1995" <?php if($film_year == 1995) echo "selected"; ?> >1995</option>
								<option value="1996" <?php if($film_year == 1996) echo "selected"; ?> >1996</option>
								<option value="1997" <?php if($film_year == 1997) echo "selected"; ?> >1997</option>
								<option value="1998" <?php if($film_year == 1998) echo "selected"; ?> >1998</option>
								<option value="1999" <?php if($film_year == 1999) echo "selected"; ?> >1999</option>
								<option value="2000" <?php if($film_year == 2000) echo "selected"; ?> >2000</option>
								<option value="2001" <?php if($film_year == 2001) echo "selected"; ?> >2001</option>
								<option value="2002" <?php if($film_year == 2002) echo "selected"; ?> >2002</option>
								<option value="2003" <?php if($film_year == 2003) echo "selected"; ?> >2003</option>
								<option value="2004" <?php if($film_year == 2004) echo "selected"; ?> >2004</option>
								<option value="2005" <?php if($film_year == 2005) echo "selected"; ?> >2005</option>
								<option value="2006" <?php if($film_year == 2006) echo "selected"; ?> >2006</option>
								<option value="2007" <?php if($film_year == 2007) echo "selected"; ?> >2007</option>
								<option value="2008" <?php if($film_year == 2008) echo "selected"; ?> >2008</option>
								<option value="2009" <?php if($film_year == 2009) echo "selected"; ?> >2009</option>
								<option value="2010" <?php if($film_year == 2010) echo "selected"; ?> >2010</option>
								<option value="2011" <?php if($film_year == 2011) echo "selected"; ?> >2011</option>
								<option value="2012" <?php if($film_year == 2012) echo "selected"; ?> >2012</option>
								<option value="2013" <?php if($film_year == 2013) echo "selected"; ?> >2013</option>
								<option value="2014" <?php if($film_year == 2014) echo "selected"; ?> >2014</option>
								<option value="2015" <?php if($film_year == 2015) echo "selected"; ?> >2015</option>
							</select>
						</div>					
				</div>		

				<div class="row">
						<div class="col-lg-2">
							<input type="checkbox" name="genre[]" value="Drama" <?php foreach($genre_array as $key=>$value){ if(($_GET['genre'][$key])=='Drama'){ echo "checked"; } } ?> > Drama</input> 
						</div>
						<div class="col-lg-2">
							<input type="checkbox" name="genre[]" value="Fantasy" <?php foreach($genre_array as $key=>$value){ if(($_GET['genre'][$key])=='Fantasy'){ echo "checked"; } } ?> > Fantasy</input>
						</div>
				</div>							

				<div class="row">
						<div class="col-lg-2">
							<input type="checkbox" name="genre[]" value="Horror" <?php foreach($genre_array as $key=>$value){ if(($_GET['genre'][$key])=='Horror'){ echo "checked"; } } ?> > Horror</input> 
						</div>
						<div class="col-lg-2">
							<input type="checkbox" name="genre[]" value="Romantic" <?php foreach($genre_array as $key=>$value){ if(($_GET['genre'][$key])=='Romantic'){ echo "checked"; } } ?> > Romantic</input> 
						</div>
				</div>
			
			</div>
		</div>
		</form>
		
		<div class="row">
			<div class="box">		
				
				<?php	
		echo   '<div class="row">
					<div class="col-lg-12">
						<hr>
						<h2 class="intro-text text-center">The
							<strong>Result</strong>
						</h2>
						<hr>
					</div>
				</div>';
				
				if (mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
						echo	'<div class="col-lg-12">
									<div class="col-lg-6">
										<img class="img-responsive img-border" style="width: 200px;" src="img/'.$row["Image"].'">
									</div>
									
									<div class="col-lg-6">
										<h2>'.$row["Title"].'
											<br>
											<small>'.$row["Year"].'</small>
										</h2>
										<p>'.$row["Description"].'</p>
										<a href="movieReview.php?id='.$row["ID"].'" class="btn btn-default btn-lg">Read More</a>
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
			
			</div>
		</div>
		<!--</form>-->
		
        <div class="row">
            <div class="box">
			
				<div class="row">
					<div class="col-lg-12">
						<hr>
						<h2 class="intro-text text-center">Our recommendations
							<strong>for you</strong>
						</h2>
						<hr>
					</div>
				</div>	
				
				
				<div class="row">
					<div class="col-lg-4 text-center" style="padding-left:60px; padding-right:60px;">
						
						<h4>Comedy</h4>
						
						<div id="carousel-example-generic" class="carousel slide">
							<div class="carousel-inner">
								<div class="item active">
									<a href="movieReview.php?id=12" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/InsideOut.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=15" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/Ted2.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=4" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/22JumpStreet.jpg"></a>
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-lg-4 text-center" style="padding-left:60px; padding-right:60px;">
					
						<h4>Action</h4>
					
						<div id="carousel-example-generic" class="carousel slide">					
							<div class="carousel-inner">
								<div class="item active">
									<a href="movieReview.php?id=1" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/ThePacifier.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=14" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/Taken3.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=13" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/Survivor.jpg"></a>
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-lg-4 text-center" style="padding-left:60px; padding-right:60px;">
					
						<h4>Romantic</h4>
					
						<div id="carousel-example-generic" class="carousel slide">
							<div class="carousel-inner">
								<div class="item active">
									<a href="movieReview.php?id=6" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/Bravetown.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=11" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/TheAgeOfAdaline.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=7" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/Insurgent.jpg"></a>
								</div>
							</div>
						</div>
					</div>
				</div>		
				
				
				<div class="row">
					<div class="col-lg-4 text-center" style="padding-top:50px; padding-left:60px; padding-right:60px;">
						
						<h4>Fantasy</h4>
						
						<div id="carousel-example-generic" class="carousel slide">
							<div class="carousel-inner">
								<div class="item active">
									<a href="movieReview.php?id=8" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/TheMatrix.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=16" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/Tomorrowland.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=3" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/ToothFairy.jpg"></a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 text-center" style="padding-top:50px; padding-left:60px; padding-right:60px;">
					
						<h4>Drama</h4>
					
						<div id="carousel-example-generic" class="carousel slide">	
							<div class="carousel-inner">
								<div class="item active">
									<a href="movieReview.php?id=11" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/TheAgeOfAdaline.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=1" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/ThePacifier.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=6" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/Bravetown.jpg"></a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 text-center" style="padding-top:50px; padding-left:60px; padding-right:60px;">
					
						<h4>Horror</h4>
					
						<div id="carousel-example-generic" class="carousel slide">
							<div class="carousel-inner">
								<div class="item active">
									<a href="movieReview.php?id=8" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/TheRing.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=9" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/TheMatrix.jpg"></a>
								</div>
								<div class="item">
									<a href="movieReview.php?id=14" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:300px; margin:auto;" src="img/Taken3.jpg"></a>
								</div>
							</div>
						</div>
					</div>				
				</div>
				
				
            </div><!-- /.box -->
        </div><!-- /.row -->			
		
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
	
    <!-- Script to Activate the Carousel -->
    <script>
		$('.carousel').carousel({
			interval: 4000 //changes the speed
		})	
    </script>

</body>

</html>