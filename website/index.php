<?php
include_once "header.php";
?>
<!-- Rolling images -->
<div class="panel panel-info">
	<div class="panel-body">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox"
				style="align-content: center">

				<div class="item active">
					<img class="img-responsive center-block"
						src="static/img/Burhani_Banners-01.jpg" alt="Chania">
					<div class="carousel-caption">
						<h3>Guidance</h3>
						<p>Guidance in choosing a career</p>
					</div>
				</div>

				<div class="item">
					<img class="img-responsive center-block"
						src="static/img/Burhani_Banners-02.jpg" alt="Chania">
					<div class="carousel-caption">
						<h3>Assistance</h3>
						<p>Assistance guidance mentorship.</p>
					</div>
				</div>

				<div class="item">
					<img class="img-responsive center-block"
						src="static/img/Burhani_Banners-03.jpg" alt="Flower">
					<div class="carousel-caption">
						<h3>Dreams</h3>
						<p>Turn your dreams into reality.</p>
					</div>
				</div>

				<div class="item">
					<img class="img-responsive center-block"
						src="static/img/Burhani_Banners-04.jpg" alt="Flower">
					<div class="carousel-caption">
						<h3>Talent</h3>
						<p>Unearth that talent in each child.</p>
					</div>
				</div>

				<!-- Carousel nav -->
				<a class="carousel-control left" href="#myCarousel"
					data-slide="prev">&lsaquo;</a> <a class="carousel-control right"
					href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>

			<!-- Left and right controls -->
		</div>
	</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading" align=center>
		<h1>About us</h1>
	</div>
	<div class="panel-body">

		<div class="row">
			<div class="col-md-4">
				<a href="help.php"><img class="img-responsive center-block"
					src="static/img/about-burhani-01.png" alt="Chania"> </a>
			</div>
			<div class="col-md-4">
				<a href="mission.php"><img class="img-responsive center-block"
					src="static/img/about-burhani-02.png" alt="Chania"> </a>

			</div>
			<div class="col-md-4">
				<a href="team.php"><img class="img-responsive center-block"
					src="static/img/about-burhani-03.png" alt="Chania"> </a>
			</div>
		</div>
	</div>
</div>


<div class="panel panel-info">
	<div class="panel-heading">
		<h1 align=center>Donate now !</h1>
	</div>
	<div class="panel-body">

		<a href="help.php"><img class="img-responsive center-block"
			src="static/img/help-burhani-01.jpg"> </a>
	</div>
</div>

<?php
include_once "footer.php";
?>