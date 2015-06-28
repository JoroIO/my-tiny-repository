<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Movie Filter</title>

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
	
    <div class="container">

        <div class="row">
            <div class="box">
	
                <div class="col-lg-4 text-center">
					
					<h4>coming soon</h4>
						
                    <div id="carousel-example-generic" class="carousel slide carousel1">
						<div class="carousel-inner">
							<div class="item active">
								<a href="movieReview.php?id=12" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/InsideOut.jpg"></a>
							</div>
							<div class="item">
								<a href="movieReview.php?id=15" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/Ted2.jpg"></a>
							</div>
							<div class="item">
								<a href="movieReview.php?id=10" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/BigGame.jpg"></a>
							</div>
                        </div>						
                    </div>
                </div>
				
                <div class="col-lg-4 text-center">
					
					<h4>top 6 this week</h4>
						
                    <div id="carousel-example-generic" class="carousel slide carousel2">
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="movieReview.php?id=6" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/TheAgeOfAdaline.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="movieReview.php?id=5" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/FastAndFurious6.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="movieReview.php?id=9" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/TheRing.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="movieReview.php?id=4" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/22JumpStreet.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="movieReview.php?id=7" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/Insurgent.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="movieReview.php?id=16" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/Tomorrowland.jpg"></a>
                            </div>								
                        </div>
                    </div>
                </div>	

                <div class="col-lg-4 text-center">
					
					<h4>forever young</h4>
						
                    <div id="carousel-example-generic" class="carousel slide carousel3">
                        <div class="carousel-inner">
                            <div class="item active">
                               <a href="movieReview.php?id=8" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/TheMatrix.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="movieReview.php?id=9" style="background-color:black;" class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/TheRing.jpg"></a>
                            </div>
                            <div class="item">
                                <a href="movieReview.php?id=2" style="background-color:black;"  class="btn btn-default btn-lg"><img class="img-responsive" style="height:350px; margin:auto;" src="img/WhiteChicks.jpg"></a>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">What is
                        <strong>Movie Filter?</strong>
                    </h2>
                    <hr>
                    <img class="img-responsive img-left" src="img/logo_v3.png" style="width:200px;">
                    <hr class="visible-xs">
                    <p>This is a system that gives you the opportunity to select movies by your desires. It is a creative and fast filter for movies. If you have a register, you can also personalize your profile. This can help the system analyze your preferences about movies that you would like. You can filter items not only by age of their creation, gеnre, title, actors, producer, but also by your mood and your skin. The color of the skin that you select has a strong connection to your preferences about the movies for this day. Your mood also has an impact on your choice of movies.</p>
                </div>
            </div>
        </div>
				
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Our
                        <strong>Team</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" style="width:200px; margin:auto;" src="img/svetoslava.jpg" alt="">
                    <h3>Svetoslava Slavova
                        <small>Administrator</small>
						<br>
                        <small>svetoslava_s@gmail.com</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" style="width:200px; margin:auto;" src="img/gratziela.jpg">
                    <h3>Gratziela Georgieva
                        <small>Administrator</small>
						<br>
                        <small>gratziela_g@gmail.com</small>						
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" style="width:200px; margin:auto;" src="img/georgi.jpg">
                    <h3>Georgi Ivanov
                        <small>Administrator</small>
						<br>
                        <small>georgi_i@gmail.com</small>						
                    </h3>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>	

    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel1').carousel({
        interval: 2500 //changes the speed
    })
	
	$('.carousel2').carousel({
        interval: 3000 //changes the speed
    })

    $('.carousel3').carousel({
        interval: 2000 //changes the speed
    })	
    </script>
	<script>
		$(document).ready(function() {
			$('img.img-responsive').click(function() {
				window.location.href = this.id + '.html';
			});
		});
	</script>

</body>

</html>
