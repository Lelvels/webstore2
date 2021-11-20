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
	<title>Compare Page</title>
</head>
<body>

<style>
    .border-table{
        border: 0.1px gray solid;
    }

    .table-container{
        width: 90%;
    }

    .price-text{
        color: red;
        font-weight: bold;
        font-size: 16px;
    }

    .card {
        width: 250px;
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 5px;
    }

	.table-big-text{
		font-size: 1rem;
		padding: 6px;
		font-weight: bold;
		color: white;
	}

	.table-header{
		background-color: #1887b5;
	}

	.container-fluid{
		position: relative;
		z-index: 0;
	}

	#livesearch{
		position: fixed;
		padding-left: 26%;
		z-index: 10;
		margin-top: 3.5rem;
		margin-left: auto;
		width: 83%;
		margin-right: auto;
	}
</style>

<!-- Connect database -->
<?php
	$product_id_1 = 0;
	$product_id_2 = 0;

	$connect_mysql = get_connect();
	if(isset($_GET['product_id_1']) && isset($_GET['product_id_2'])){
		$product_id_1 = $_GET['product_id_1'];
		$product_id_2 = $_GET['product_id_2'];
	} else {
		header('location: ../Home/Home.php');
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
					<input class='form-control' type='text'  name='search' placeholder='Search' aria-label='Search' onkeyup='showResult(this.value)'>
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

<!-- Page-path -->
<hr class="my-4">
<?php
	$product_name = select_product_name_by_id($connect_mysql, $product_id_1);
	$cat_name = select_product_category_by_id($connect_mysql, $product_id_1);
	$cat_id = select_product_cat_id_by_id($connect_mysql, $product_id_1);

	echo "<div class='container-fluid mb-0' style='padding-top: 35px;'>";
		echo "<div class='row text-left'>";
			echo "<div class='col-12'>";
				echo "<a href='../Home/Home.php' class='mr-1'><span class='path-text'>Home</span></a>";
				echo "<span class='fas fa-chevron-right mr-1'></span>";
				echo "<a href='../CategoryPage/Category.php?categories%5B%5D=$cat_id' class='mr-1'><span class='path-text'>$cat_name</span></a>";
				echo "<span class='fas fa-chevron-right mr-1'></span>";
				echo "<a href='../ProductPage/productPage.php?product_id=$product_id_1'><span class='path-text' class='mr-1'>$product_name</span></a>";
				echo "&nbsp;&nbsp;<span class='fas fa-chevron-right mr-1'></span>";
				echo "<span class='path-text' class='mr-1'>Compare</span>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
?>

<hr class="hr-path">

<!-- Compare table -->
<?php
	$spec1 = select_technical_information_by_id($connect_mysql, $product_id_1);
	$spec1_len = sizeof($spec1);
	$spec2 = select_technical_information_by_id($connect_mysql, $product_id_2);
	$spec2_len = sizeof($spec2);

	$len = 0;
	$ar_spec_name = array();

	if($spec1_len > $spec2_len){
		$len = $spec1_len;
		$arr_spec_name = $spec1;
	} else {
		// spectify the array
		$len = $spec2_len;
		$arr_spec_name = $spec2;
	}

	$product_name_1 = select_product_name_by_id($connect_mysql, $product_id_1);
	$price_1 = select_price_by_id($connect_mysql, $product_id_1);
	$small_img_1 = select_small_img_by_id($connect_mysql, $product_id_1);

	$product_name_2 = select_product_name_by_id($connect_mysql, $product_id_2);
	$price_2 = select_price_by_id($connect_mysql, $product_id_2);
	$small_img_2 = select_small_img_by_id($connect_mysql, $product_id_2);
	
?>

<?php
echo "<div class='table-container container-fluid'>";
	// thẻ sản phẩm
	echo "<div class='row'>";

		echo "<div class='border-table col-2 col-sm-2 col-md-2 col-lg-2'>";
			echo "<span></span>";
		echo "</div>";

		echo "<div class='border-table col-4 col-sm-4 col-md-4 col-lg-4'>
				<div class='card'>
					<img src='../Data/img/small-img/$small_img_1' alt='' class='card-img-top img-fluid'>
					<div class='card-body'>
						<a href='../ProductPage/productPage.php?product_id=$product_id_1'><h5 class='card-title'>$product_name_1</h5></a>
						<p></p>
						<span class='card-text'>Price:&nbsp;</span><span class='price-text'>$price_1$</span>
						<p></p>
						<div class='btn-group'>
							<a href='#' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-cart-plus'></span></a>
							<a href='../ProductPage/productPage.php?product_id=$product_id_1' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-eye'></span><span>View</span></a>
						</div>
					</div>
				</div> 
			</div>";

		echo "<div class='border-table col-4 col-sm-4 col-md-4 col-lg-4'>
				<div class='card'>
					<img src='../Data/img/small-img/$small_img_2' alt='' class='card-img-top img-fluid'>
					<div class='card-body'>
						<a href='../ProductPage/productPage.php?product_id=$product_id_2'><h5 class='card-title'>$product_name_2</h5></a>
						<p></p>
						<span class='card-text'>Price:&nbsp;</span><span class='price-text'>$price_2$</span>
						<p></p>
						<div class='btn-group'>
							<a href='#' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-cart-plus'></span></a>
							<a href='../ProductPage/productPage.php?product_id=$product_id_2' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-eye'></span><span>View</span></a>
						</div>
					</div>
				</div> 
			</div>";

	echo "</div>";

	//phần thông số kỹ thuật
	echo "<div class='row'>
			<div class='border-table table-header col-10 col-sm-10 col-md-10 col-lg-10'>
				<span class='table-big-text'>Technical Specifications</span>
			</div>
		</div>";

	for($i=0; $i<$len; $i++){
		$spec_name = $arr_spec_name[$i]['spec_name'];
		$spec_value_1 = standard_spec_value($spec1[$i]['spec_value']);
		$spec_value_2 = standard_spec_value($spec2[$i]['spec_value']);

		echo "<div class='row'>";
			echo "<div class='border-table col-2 col-sm-2 col-md-2 col-lg-2'>";
				echo "<span>$spec_name</span>";
			echo "</div>";

			echo "<div class='text-center border-table col-4 col-sm-4 col-md-4 col-lg-4'>
				<span class='table-text'>$spec_value_1</span>
			</div>";

			echo "<div class='text-center border-table col-4 col-sm-4 col-md-4 col-lg-4'>
					<span class='table-text'>$spec_value_2</span>
				</div>";
		echo "</div>";
	}

	echo "<div class='row'>
			<div class='border-table col-3 col-sm-2 col-md-2 col-lg-2' style='vertical-align: center;'>
				<span></span>
			</div>

			<div class='border-table text-center col-4 col-sm-5 col-md-4 col-lg-4'>
				<a href='../ProductPage/productPage.php?product_id=$product_id_1' role='button' class='btn btn-lg btn-primary'><span class='fas fa-eye'></span>&nbsp;<span>View now</span></a>
			</div>

			<div class='border-table text-center col-4 col-sm-5 col-md-4 col-lg-4'>
				<a href='../ProductPage/productPage.php?product_id=$product_id_2' role='button' class='btn btn-lg btn-primary'><span class='fas fa-eye'></span>&nbsp;<span>View now</span></a>
			</div>
	</div>";

echo "</div>";
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