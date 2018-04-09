<style type="text/css">
.carousel-item {
	height: 100vh;
	min-height: 300px;
	background: no-repeat center center scroll;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
</style>
<header>
	<div id="images" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
		  <li data-target="#images" data-slide-to="0" class="active"></li>
		  <li data-target="#images" data-slide-to="1"></li>
		  <li data-target="#images" data-slide-to="2"></li>
		</ol>

		<div class="carousel-inner" role="listbox">
		  <div class="carousel-item active" style="background-image: url('public/img/WalkingDog.jpg')">
		    <div class="carousel-caption d-none d-md-block">
		      <h3>Peter Finder</h3>
		      <p>A magic website to help you and your pets.</p>
		    </div>
		  </div>
		  <div class="carousel-item" style="background-image: url('public/img/PetOwner.jpg');">
		    <div class="carousel-caption d-none d-md-block">
		      <h3>Become a Pet Owner</h3>
		      <p>Find trusty professional care takers to look after your pets.</p>
		    </div>
		  </div>
		  <div class="carousel-item" style="background-image: url('public/img/CareTaker.jpg')">
		    <div class="carousel-caption d-none d-md-block">
		      <h3>Become a Care Taker</h3>
		      <p>Use your talents to earn money and help others.</p>
		    </div>
		  </div>
		</div>

		<a class="carousel-control-prev" href="#images" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#images" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	</div>
</header>

<script type="text/javascript">
	$("#break-after-navbar").remove();
</script>