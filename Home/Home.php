<?php include "../PHP/anything.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font -->
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<!-- CSS Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<!-- My css -->
	<link rel="stylesheet" href="../CSS/search-bar.css">
	<link href="../CSS/style.css" rel="stylesheet">
	<link rel="stylesheet" href="slider/slide-show.css">
	<link rel="stylesheet" href="slider/assets/owl.theme.default.css">
	<link rel="stylesheet" href="slider/assets/owl.carousel.min.css">
	<!-- My js -->
	<script src="slider/jquery.mousewheel.min.js"></script>
	<script src="slider/owl.carousel.min.js"></script>
	<title>Home page</title>
</head>
<body>

<!-- Connect database -->
<?php
	$connect_mysql = get_connect();
?>

<style>
.price-text{
	color: red;
	font-weight: bold;
	font-size: 15px;
}

#carouselExampleIndicators{
	position: relative;
	z-index: 0;
}

#livesearch{
	position: fixed;
	padding-left: 26%;
	z-index: 10;
  	margin-top: 5rem;
  	margin-left: auto;
  	width: 83%;
  	margin-right: auto;
}

.fa-fire{
	color: red;
	font-size: 50px;
}

</style>

<!-- Navigation -->
<?php
	echo "<nav class='navbar navbar-light bg-light fixed-top'>";
	echo "<div class='container-fluid'>";
		//nút burger
		echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExample01' aria-controls='#navbarsExample01' aria-expanded='false' aria-label='Toggle navigation'>
				<span class='navbar-toggler-icon'></span>
			</button>";

		//Logo
		echo "<a href='Home.php' class='brand'><img src='../Data/logo/logo.png' alt='brand'></a>";

		//Thanh search bar to
		echo "<div class='justify-nav'>";
			echo "<form class='form-inline' id='big-search-bar' action='../CategoryPage/Category.php' method='GET'>
					<input class='form-control' type='text' name='search' placeholder='Search' aria-label='Search' onkeyup='showResult(this.value)'>
					<button type='submit' class='btn'><i class='fa fa-search' aria-hidden='true'></i></button>
				</form>";
		echo "</div>";

		// Phần brand name
		$arr = select_brands_names($connect_mysql);
		$arr_len = sizeof($arr);
		$arr_cat = select_categories_names($connect_mysql);
		$arr_cat_len = sizeof($arr_cat);

		echo "<div class='collapse navbar-collapse' id='navbarsExample01'>";
			echo "<ul class='navbar-nav mr-auto'>";

				echo "<li class='nav-item dropdown active'>";
					echo "<a class='nav-link dropdown-toggle' href='#' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Brands</a>";
					echo "<div class='dropdown-menu' aria-labelledby='dropdown01'>";
						for($i =0; $i<$arr_len; $i++){
							$brand_id = $arr[$i]['brand_id'];
							$brand = $arr[$i]['brand_name'];
							echo "<a class='dropdown-item' href='../CategoryPage/Category.php?brands%5B%5D=$brand_id'>$brand</a>";
						}	
					echo "</div>";
				echo "</li>";

				for($i=0; $i<$arr_cat_len; $i++){
					$cat_id = $arr_cat[$i]['cat_id'];
					$cat_name = $arr_cat[$i]['cat_name']; 
					echo "<li class='nav-item'>
							<a class='nav-link' href='../CategoryPage/Category.php?categories%5B%5D=$cat_id'>$cat_name</a>
						</li>";
				}

			echo "</ul>";
		echo "</div>";
		
	echo "</div>";
	echo "</nav>";
?>

<div class="container"  id="livesearch" class="fixed-top">
	<ul class="suggest-list" id='showResult'>
	</ul>
</div>

<script>
  function showResult(str) {
    if (str.length==0) {
      document.getElementById("showResult").innerHTML="";
      document.getElementById("showResult").style.border="0px";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("showResult").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","../Searchbar/backend-search.php?q="+str,true);
    xmlhttp.send();
  }
</script>

<!-- Hết phần navigation -->

<!--- Ads (chạy quảng cáo)-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
	  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>

	<div class="carousel-inner">
		<div class="carousel-item item active">
			<img class="d-block w-100" src="img/background.png" alt="First slide">
			<div class="carousel-caption">
				<h1 class="display-2">Company information</h1>
				<button type="button" class="btn btn-outline-light btn-ln">
					View
				</button>
				<button type="button" class="btn btn-primary btn-ln">
					Learn more
				</button>
			</div>
		</div>

		<div class="carousel-item item">
			<img class="d-block w-100" src="img/background2.png" alt="Second slide">
		</div>

		<div class="carousel-item item">
			<img class="d-block w-100" src="img/background3.png" alt="Third slide">
		</div>
	</div>

	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>

</div>

<!--- Jumbotron (giới thiệu về shop)-->
<div class="container-fluid">
	<div class="row jumbotron">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
			<p class="lead">Liberty Electronic is one of the world's leading names in the manufacture and sales of electrical and electronic products and systems used
				in a broad range of fields and applications.</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 sol-lg-3 col-xl-2">
			<a href="#"><button type="button" class="btn btn-outline-secondary btn-light btn-lg">Learn more</button></a>
		</div>
	</div>
</div>

<!-- Product slides -->
<!-- Phần chữ header -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<span class="fas fa-fire"></span>
			&nbsp;&nbsp;<span class="display-4">July</span>&nbsp;&nbsp;
			<span class="fas fa-fire"></span>
		</div>
		<hr>
		<div class="col-12">
			<p class="lead">Best Deal of July</p>
		</div>
	</div>
</div>

<!-- Product slide -->
<?php
	$arr = select_product_information($connect_mysql);
	$arr_len = sizeof($arr);

	// Phan card test
	echo "<div class='container mt-5 mb-5'>";
	echo "<div class='owl-carousel owl-theme'>";
	for( $i=0 ; $i<$arr_len ; $i++){
		$product_ID = $arr[$i]['product_ID'];
		$name = $arr[$i]['product_name'];
		$price = $arr[$i]['price_value'];
		$path = $arr[$i]['img_path'];

		echo "
		<div class='card h-100'>

		<img width='220' height='220' src='../Data/img/small-img/$path' alt='' class='card-img-top'>

		<div class='card-body h-100'>
			<a href='../ProductPage/productPage.php?product_id=$product_ID'><h5 class='card-title'>$name</h5></a>
			<span class='card-text'>Price:&nbsp;</span><span class='price-text'>$price$</span><p></p>
			<div class='btn-group'>
				<a href='#' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-cart-plus'></span></a>
				<a href='../ProductPage/productPage.php?product_id=$product_ID' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-eye'></span><span>View</span></a>
			</div>
		</div>
		</div> ";
		}
	echo "</div>";
	echo "</div>";

	echo"<script>
			$('.owl-carousel').owlCarousel({
				nav: true,
				loop: true,
				lazyLoad: true,
				margin: 5,
				statePadding: 5,
				responsive: {
					485: {
						items: 2,
						dots: false
					},
					728: {
						items: 3
					},
					960: {
						items: 4
					},
					1200: {
						items: 5,
						dots: true
					}, 
					1500: {
						items: 5,
						dots: true
					}
				}
			});
		</script>";
?>

<!-- end of product slide -->



<?php
$cat_arr = select_categories_names($connect_mysql);
$cat_arr_len = sizeof($arr_cat);

echo "<div class='container mt-4 mb-4'>";
	echo "<div class='brand-picker owl-carousel owl-theme'>";
	for($i=0; $i<$arr_cat_len; $i++){
		$cat_id = $arr_cat[$i]['cat_id'];
		$cat_name = $arr_cat[$i]['cat_name'];

		echo "<div class='text-center pb-1' style='background-color: #fff;'>
				<h1 class='display-4'>$cat_name</h1>
				<button class='btn btn-outline-secondary' onclick='changeCategory($cat_id)'>Apply</button>
			</div>";
	}
	echo "</div>";
echo "</div>";
?>
<!-- Script để chạy slide -->
<script>
	$('.brand-picker').owlCarousel({
		nav: true,
		loop: true,
		lazyLoad: true,
		margin: 5,
		statePadding: 5,
		items: 1,
		dots: false
	});
</script>

<!-- Script để đổi category cảu sản phẩm -->
<script>
	function changeCategory(cat_id){
		if (cat_id == 0) {
			document.getElementById("CatShow").innerHTML="";
			document.getElementById("CatShow").style.border="0px";
			return;
		}
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
			document.getElementById("CatShow").innerHTML=this.responseText;
		}
		}
		xmlhttp.open("GET","changeCategory.php?cat_id="+cat_id,true);
		xmlhttp.send();
	}
</script>

<!-- Phanf Album - test -->
<?php
echo "<div class='album py-5 bg-light'>";
	echo "<div class='container'>";
		echo "<div class='row' id='CatShow'>";

		for( $i=0 ; $i<$arr_len ; $i++){
			$product_ID = $arr[$i]['product_ID'];
			$name = $arr[$i]['product_name'];
			$price = $arr[$i]['price_value'];
			$path = $arr[$i]['img_path'];

			echo "<div class='col-sm-12 col-md-3 col-lg-3 col-xl-3'>
					<div class='card mb-3 shadow-sm'>
					<img src='../Data/img/small-img/$path' alt='' class='card-img-top img-responsive owl-lazy'>
					<div class='card-body'>
						<a href='../ProductPage/productPage.php?product_id=$product_ID'><p class='card-title'>$name</p></a>
						<span class='card-text'>Price:&nbsp;</span><span class='price-text'>$price$</span><p></p>
						<div class='d-flex justify-content-between align-items-center'>
						<div class='btn-group'>
							<a href='#' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-cart-plus'></span></a>
							<a href='../ProductPage/productPage.php?product_id=$product_ID' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-eye'></span><span>View</span></a>
						</div>
						<small class='text-muted'>New product</small>
						</div>
					</div>
					</div>
				</div>";
		}

		echo "</div>";
	echo "</div>";
echo "</div>";
?>

<!--- Heading báo -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Promotion news</h1>
		</div>
		<hr>
	</div>
</div>

<!--- Cards news (Phần tin tức)-->
<div id="myNews" class="container-fluid padding">
	<div class="row padding">
		<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
			<div class="card">
				<div class="card-body">
					<a href="https://www.qualcomm.com/invention/5g/what-is-5g"><h4 class="card-title">Everything you need to know about 5G.</h4></a>
					<p class="card-text">Here is where you find 5G technology explained—how 5G works, why 5G is important and how it’s changing the way the world connects and communicates. At Qualcomm, we invented the foundational breakthroughs that make 5G possible.</p>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
			<div class="card">
				<div class="card-body">
					<a href="https://foreignpolicy.com/2020/07/24/trump-cant-ban-tiktok-free-chinese-apps/"><h4 class="card-title">Trump Can’t Ban TikTok, but He Can Hurt It</h4></a>
					<p class="card-text">The wild popularity of TikTok, the app best known for videos of lip-syncing teens, is re-igniting the debate among U.S. officials over how the United States should define and defend its national security interests against Chinese companies.</p>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
			<div class="card">
				<div class="card-body">
					<a href="https://www.forbes.com/sites/gordonkelly/2020/07/23/apple-iphone-12-size-display-release-camera-5g-upgrade-iphone-11-pro-max/#5d921e674895"><h4 class="card-title">2020 iPhone Shock As ‘All-New’ Apple iPhone Revealed</h4></a>
					<p class="card-text">Apple’s 2020 iPhones will look very different to their predecessors but one model, in particular, will stand out. And now Apple has just accidentally confirmed it.</p>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
			<div class="card">
				<div class="card-body">
					<a href="#"><h4 class="card-title">League of Legends’ new Champion is Yone</h4></a>
					<p class="card-text">Well, League of Legends fans – it’s true. The next Champion headed to Riot Games’ flagship MOBA game is none other than Yone, Yasuo’s supposedly deceased half-brother...</p>
				</div>
			</div>
		</div>

	</div>
</div>

<hr class="light-100">

<!--- Connect -->
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-12">
			<h2>Conect</h2>
		</div>
		<div class="col-12 social padding">
			<a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
			<a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
			<a href="https://drive.google.com/file/d/1mkF16UgfvWThibe5mgI_7t5qZKJp1cJ2/view"><i class="fab fa-youtube"></i></a>
		</div>
	</div>
</div>

<!--- Footer -->
<footer>
	<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-md-4">
				<img width='150' src="../Data/logo/logo.png" alt="">
				<hr class="light">
				<p>Hotline: 1900 8055</p>
				<p>Email: customer-service@libertyelectronic.com</p>
				<p>Adress: 285 Đội Cấn, Ba Đình, Hà Nội</p>
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h5>Customer Service</h5>
				<hr class="light">
				<a href="#"><span>Guarantee</span></a><p></p>
				<a href="#"><span>Cleaning</span></a><p></p>
				<a href="../ContactUs/contact-us.php"><span style="color: royalblue;">Contact Us</span></a>
			</div>

			<div class="col-md-4">
				<hr class="light">
				<h5>Work time</h5>
				<hr class="light">
				<p>Monday - Friday: 7:30am to 5h30pm</p>
				<p>Saturday: 7:30am to 5h30pm</p>
			</div>
		</div>
	</div>
</footer>

</body>
</html>

