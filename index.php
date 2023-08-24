<?php
error_reporting(0);
include('includes/config.php');
?>
<!doctype html>
<html lang="en">
  <head>
	<title>Elderly Chronic Disease Information System | Home Page</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  </head>
  <body>
  <?php include('includes/header.php');?>

	  
	<!-- ccarousel -->
	<div id="carouselId" class="carousel slide" data-ride="carousel" style="height: 80vh; overflow: hidden;">
		<ol class="carousel-indicators">
			<li data-target="#carouselId" data-slide-to="0" class="active"></li>
			<li data-target="#carouselId" data-slide-to="1"></li>
			<li data-target="#carouselId" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img src="images/banner1.jpg" alt="">
			</div>
			<div class="carousel-item">
				<img src="images/banner22.jpg" alt="">
			</div>
			<div class="carousel-item">
				<img src="images/banner3.jpg" alt="">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- ccarousel -->
	<!-- banner bottom -->
	<div class="banner-bottom py-5">
		<div class="d-flex container py-xl-3 py-lg-3">
			<div class="banner-left-bottom-w3ls offset-lg-2 offset-md-1">
				<h3 class="text-white my-3">High professional volunteers</h3>
				<p>all specialists have extensive practical experience and regularly training courses in educational centers of the
					world</p>
			</div>
			<div class="button">
				<a href="about.php" class="w3ls-button-agile">Read More
					<i class="fas fa-hand-point-right"></i>
				</a>
			</div>
		</div>
	</div>
	<!-- //banner bottom -->
	<!-- blog -->
	<div class="blog-w3ls py-5" id="blog">
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title text-white">Some of the Volunteers</h3>
				<span>
					<i class="fas fa-user-md text-white"></i>
				</span>
			</div>
			<div class="row package-grids mt-5">
				<?php 
					$status=1;
					$sql = "SELECT * from tblblooddonars where status=:status order by rand() limit 6";
					$query = $dbh -> prepare($sql);
					$query->bindParam(':status',$status,PDO::PARAM_STR);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1;
					if($query->rowCount() > 0)
					{
					foreach($results as $result)
					{ ?>
				<div class="col-md-4 pricing" style="margin-top:2%;">
					
					<div class="price-top">
					
							<img src="images/blood-donor.jpg" alt="" class="img-fluid" />
					
						<h3><?php echo htmlentities($result->FullName);?>
						</h3>
					</div>
					<div class="price-bottom p-4">
						<h4 class="text-dark mb-3">Gender: <?php echo htmlentities($result->Gender);?></h4>
						<!-- <p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->BloodGroup);?></p> -->
						
						<a class="btn btn-primary" style="color:#fff" href="contact-blood.php?cid=<?php echo $result->id;?>">volunteer</a>
					</div>
				</div><?php }} ?>
			
			
			</div>
		</div>
	</div>
	<!-- //blog -->
	<!-- treatments -->
	<div class="screen-w3ls py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">CHRONIC DISEASES</h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
				<p class="mt-2">most elderly human beings suffer from the following chronic diseases..</p>
			</div>
			<div class="row">
            <div class="col-lg-6">
               
                <ul>
					<li>diabetes</li>
					<li>stroke</li>
					<li>autism</li>
					<li>hypertension.</li>
                </ul>
                <p>A monthly body check up is a healthy practice for every human being!</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="images/heart.jpg" alt="">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-8">
           		<h4 style="padding-top: 30px;">HYPERTENSION</h4>
                <p>
					The most common disease is diabates, stroke followed by high blood pressure.

					High blood pressure is often called "hypertension". However if it is left untreated, it could lead to various health complications such as heart disease, kidney disease, stroke.</p>
            </div>
            <div class="col-md-4" style="padding-top: 30px;"> 
    
                <a class="btn btn-lg btn-secondary btn-block login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" data-toggle="modal" data-target="#exampleModalCenter1" href="#" data-toggle="modal" data-target="#exampleModalCenter1"> Become a Volunteer</a>
            </div>
        </div>
		</div>
	</div> 
	<!-- //treatments -->

	<!-- footer -->
	<?php include('includes/footer.php');?>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>