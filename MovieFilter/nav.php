<?php
session_start();
?>
<div class="brand"><img src="img/logo_v3.png" style="width:80px; padding-bottom:10px; padding-right:10px;"/>Movie Filter</div>

<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
		<!-- .navbar-collapse -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="movies.php">Movies</a>
				</li>
				<li>
				<?php
					if (isset($_SESSION["uname"])) echo '<a href="registered_user.php">Search</a>';
					else echo '<a href="unregistered_user.php">Search</a>';
				?>
				</li>					
				<?php
					if (isset($_SESSION["uname"])) echo '<li>
															<a href="logout.php">Log Out</a>
														</li>';
					else echo '<li>
								 <a href="login.php">Log In</a>
							   </li> 
							   <li>
								 <a href="registration.php">Registration</a>
							   </li>';
				?>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
</nav>