<?php include "../PHP/anything.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ProductPage</title>
	<!-- Font -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
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
</head>
<body>

<style>
	.compare-link a{
		color: blue;
	}

	.price-text{
	color: red;
	font-weight: bold;
	font-size: 15px;
	}

	.container-fluid{
		position: relative;
		z-index: 0;
	}

	#livesearch{
		position: fixed;
		padding-left: 26%;
		z-index: 10;
		margin-top: 4rem;
		margin-left: auto;
		width: 83%;
		margin-right: auto;
}
</style>

<!-- connect database -->
<?php
	$connect_mysql = get_connect();
	if(isset($_GET['product_id'])){
		$product_id = $_GET['product_id']; 
	} else {
		header('Location: ../Home/Home.php');
	}
?>

<!-- Navigation -->
<?php
	echo "<nav class='navbar navbar-light bg-light fixed-top'>";
	echo "<div class='container-fluid'>";
		//nút burger
		echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExample01' aria-controls='#navbarsExample01' aria-expanded='false' aria-label='Toggle navigation'>
				<span class='navbar-toggler-icon'></span>
			</button>";

		//Logo
		echo "<a href='../Home/Home.php' class='brand'><img src='../Data/logo/logo.png' alt='brand'></a>";

		//Thanh search bar to
		echo "<div class='justify-nav'>";
			echo "<form class='form-inline' id='big-search-bar' action='../CategoryPage/Category.php' method='GET'>
					<input class='form-control' name='search' type='text' placeholder='Search' aria-label='Search' onkeyup='showResult(this.value)'>
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

<div class="container"  id="livesearch">
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

<!-- Page path -->
<hr class="my-4">
<?php
	$product_name = select_product_name_by_id($connect_mysql, $product_id);
	$cat_name = select_product_category_by_id($connect_mysql, $product_id);
	$cat_id = select_product_cat_id_by_id($connect_mysql, $product_id);

	echo "<div class='container-fluid mb-0' style='padding-top: 35px;'>";
		echo "<div class='row text-left'>";
			echo "<div class='col-12'>";
				echo "<a href='../Home/Home.php' class='mr-1'><span class='path-text'>Home</span></a>";
				echo "<span class='fas fa-chevron-right mr-1'></span>";
				echo "<a href='../CategoryPage/Category.php?categories%5B%5D=$cat_id' class='mr-1'><span class='path-text'>$cat_name</span></a>";
				echo "<span class='fas fa-chevron-right mr-1'></span>";
				echo "<span class='path-text' class='mr-1'>$product_name</span>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
?>

<hr class="hr-path">

<!-- Phần chi tiết sản phẩm -->
<?php
$big_img_path = select_big_img_by_id($connect_mysql, $product_id);
$cat_name = select_product_category_by_id($connect_mysql, $product_id);
$brand = select_brand_name_by_id($connect_mysql, $product_id);
$origin = select_origin_by_id($connect_mysql, $product_id);
$small_description = select_small_description_by_id($connect_mysql, $product_id);
$price = select_price_by_id($connect_mysql, $product_id);

echo "<div class='container-fluid mt-3' style='background-color: white;'>";
	echo "<div class='row'>";
		//Phần ảnh
		echo "<div class='col-12 col-sm-12 col-md-5 justify-content-center'>";
			echo "<img class='product-img' src='../Data/img/big-img/$big_img_path' alt='$product_name'>";
		echo "</div>";

		//Phần chỉ tiết sản phẩm
		echo "<div class='col-12 col-sm-12 col-md-7'>";
			echo "<p class='h4'>$product_name</p>";

			echo "<ul class='list-inline'>";
				echo "<li class='list-inline-item'>Category: $cat_name</li>";
				echo "<li class='list-inline-item'>Brand: $brand</li>";
				echo "<li class='list-inline-item'>Origin: $origin</li>";
			echo "</ul>";

			echo "<ul class='list-inline product-rate'>";
				echo "<li class='list-inline-item'>4.6 sao</li>";
				echo "<li class='list-inline-item'>Status: in stoking</li>";
			echo "</ul>";

			//small-description
			echo "<fieldset class='product_detail_module mt-3'>";
				echo "<legend class='legend'>SpecialOffer</legend>";
				echo "<div class='rte description product_detail___module-content'>";
					echo "<em>$small_description</em>";
				echo "</div>";
			echo "</fieldset>";

			//Product price
			echo "<div class='product-price-box'>";

				echo "<div class='product-price-box price-box'>";
					echo "<span class='special-price'>$price $</span>";
					echo "<meta itemprop='price' content=''>
					<meta itemprop='priceCurrency' content='USD'>";
				echo "</div>";

				echo "<span class='old-price'>
						<span class='text-muted'>2200.00 $</span>
						<meta itemprop='price' content='9.999.000'>
						<meta itemprop='priceCurrency' content='USD'>
					</span>";

				echo "<em class='vat-include'>
						*Chưa bao gồm thuế VAT*
					</em>";

			echo "</div>";

		echo "</div>";

	echo "</div>";
echo "</div>";
?>

<!-- Phần description lớn -->
<?php
$big_description = select_big_description_by_id($connect_mysql, $product_id);
echo "<div class='container-fluid mt-4 mb-4' style='background-color: white;'>
		<button class='fun' data-toggle='collapse' data-target='#productDescription' aria-expanded='true'>
			Description
		</button>
	</div>";

echo "<div class='container-fluid collapse bg-light mb-4' id='productDescription'>";
	echo "<div>";
		echo "<div class='row'>";
			echo "<div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>";
				echo "<div class='product-description'>";
					echo "<p>$big_description</p>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
echo "</div>";
?>

<!-- Phần thông số kỹ thuật -->
<?php
	$word_path = select_word_path_by_id($connect_mysql, $product_id);
    $arr_tech = select_technical_information_by_id($connect_mysql, $product_id);
    $arr_len = sizeof($arr_tech);

	echo "<div class='container-fluid mt-4 mb-4' style='background-color: white;'>
		<button class='fun' data-toggle='collapse' data-target='#productTechInfo'>
			Technical specifications
		</button>
	</div>";

	// kẻ bảng đoạn này cho đẹp
	echo "<div class='container-fluid collapse bg-light mb-4' id='productTechInfo'>";
		echo "<div>";
			echo "<div class='row'>";
				echo "<div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>";
					echo "<div class='product-description'>";
					for( $i=0 ; $i<$arr_len ; $i++){
						$spec_name = $arr_tech[$i]['spec_name'];
						$spec_value = $arr_tech[$i]['spec_value'];
						echo "<p>$spec_name: $spec_value";
					}
					echo "<p></p>";
					echo "<span>For further information: </span>";
					echo "<a href='../Data/words/$word_path'><span>Click here</span></a>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
?>


<div class="container-fluid bg-light mb-4">
	<div class="w-100">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="product-description ">
					<p class="h5">Similar Products:</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- similar products -->

<?php
	$cat_id = select_product_cat_id_by_id($connect_mysql, $product_id);
	$brand_ids = array();
	$cat_ids = array($cat_id);				
	$arr = select_product_by_filter($connect_mysql, $brand_ids, $cat_ids);
	$arr_len = sizeof($arr);

	// Phan card slider
	echo "<div class='container mt-5 mb-5'>";
	echo "<div class='owl-carousel owl-theme'>";
		for( $i=0 ; $i<$arr_len ; $i++){
			$product_id_local = $arr[$i]['product_id'];

			//kiem tra lap lai
			if ($product_id_local != $product_id){
				$name = $arr[$i]['product_name'];
				$price = $arr[$i]['price_value'];
				$path = $arr[$i]['img_path'];
				echo "
				<div class='card h-100'>

				<img src='../Data/img/small-img/$path' alt='' class='card-img-top'>

				<div class='card-body h-100'>
					<a href='productPage.php?product_id=$product_id_local'><h5 class='card-title'>$name</h5></a>
					<p></p>
					<span class='card-text'>Price:&nbsp;</span><span class='price-text'>$price$</span>
					<p></p>
					<div class='d-flex justify-content-between align-items-center'>
						<div class='btn-group'>
							<a href='#' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-cart-plus'></span></a>
							<a href='../ProductPage/productPage.php?product_id=$product_id_local' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-eye'></span></a>
							<a href='../ComparePage/ComparePage.php?product_id_1=$product_id&product_id_2=$product_id_local' role='button' class='btn btn-sm btn-outline-secondary'><span>Compare</span></a>
						</div>
					</div>
				</div>
				</div> ";
			}
		}
	echo "</div>";
	echo "</div>";

	// Phan javascript
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
						dots: false,
						loop: false
					},
					728: {
						items: 3,
						dots: false,
						loop: false
					},
					960: {
						items: 4,
						dots: false,
						loop: false
					},
					1200: {
						items: 5,
						dots: false,
						loop: false
					}, 
					1500: {
						items: 5,
						dots: false,
						loop: false
					}
				}
			});
		</script>";
?>


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