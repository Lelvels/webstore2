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
    <link rel="stylesheet" href="../CSS/category.css">
	<link rel="stylesheet" href="slider/slide-show.css">
	<link rel="stylesheet" href="slider/assets/owl.theme.default.css">
	<link rel="stylesheet" href="slider/assets/owl.carousel.min.css">
	<!-- My js -->
	<script src="slider/jquery.mousewheel.min.js"></script>
	<script src="slider/owl.carousel.min.js"></script>
	<title>Category page</title>
</head>
<body>

<style>
	.album .card{
		width: 15.8rem;
	}

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
		margin-top: 5rem;
		margin-left: auto;
		width: 83%;
		margin-right: auto;
	}
</style>

<!-- Connect database -->
<?php
	$connect_mysql = get_connect();
?>

<?php
	$brand_ids = array();
	$cat_ids = array();
	$str = "";

	if(isset($_GET['search'])){
		$str=$_GET['search'];
	} else {
		if(isset($_GET['brands'])){
			if(is_array($_GET['brands'])){
				$brand_ids = $_GET['brands'];		
			} else {
				$value = $_GET['brands'];
			}
		}
	
		if(isset($_GET['categories'])){
			if(is_array($_GET['categories'])){
				$cat_ids = $_GET['categories'];
			} else {
				$value = $_GET['categories'];
			}
		}
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

<!-- Phần bộ lọc -->
<?php
$brand_names = select_brands_names($connect_mysql);
$brand_size = sizeof($brand_names);
$cat_names = select_categories_names($connect_mysql);
$cat_size = sizeof($cat_names);

echo "<div class='container-fluid padding' style='padding-top: 90px'>";
echo "<div class='row'>";
    echo "<div class='col-12 col-sm-12 col-xl-12 align-middle' style='background-color: #d5d5d5; color: black'>";
        echo "<span class='mt-4 filter-text'>Filter</span>";

        //Nút filter
        echo "<button type='button' class='mr-2 btn btn-sm btn-outline-dark filter-button' data-toggle='modal' data-target='#exampleModal'>";
            echo "<span class='mr-3 fas fa-filter'></span>";
        echo "</button>"; 
        
    echo "</div>";
echo "</div>";
echo "</div>";
?>

<!-- Modal -->
<?php
//Phần Modal
echo "<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
echo "<div class='modal-dialog modal-lg modal-dialog-centered' role='document'>";
	echo "<div class='modal-content'>";

		//header
		echo "<div class='modal-header'>";
			echo "<h5 class='modal-title' id='exampleModalLabel'>Sort</h5>
			<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
			</button>";
		echo "</div>";

		//body
		echo "<div class='modal-boby container'>";
			echo "<form id='sortForm' role='form' method='GET'>";
				echo "<span>Brands</span>"."<br>";

				echo "<div class='form-group mt-3'>";
					for($i=0; $i<$brand_size; $i++){
						$brand_id = $brand_names[$i]['brand_id'];
						$brand_name = $brand_names[$i]['brand_name'];

						echo "<div class='form-check form-check-inline'>";
						echo "<input class='form-check-input' name='brands[]' value='$brand_id' type='checkbox' id='brand$brand_id'>
								<label class='form-check-label' for='brand$brand_id'>$brand_name</label>";
						echo "</div>";
					}
				echo "</div>";

				echo "<span>Categories</span>"."<br>";

				echo "<div class='form-group mt-3'>";
					for($i=0; $i<$cat_size; $i++){
						$cat_id = $cat_names[$i]['cat_id'];
						$cat_name = $cat_names[$i]['cat_name'];

						echo "<div class='form-check form-check-inline'>";
						echo "<input class='form-check-input' name='categories[]' value='$cat_id' type='checkbox' id='category$cat_id'>
							<label class='form-check-label' for='category$cat_id'>$cat_name</label>";
						echo "</div>";
					}
				echo "</div>";


			echo "</form>";
		echo "</div>";

		//footer
		echo "<div class='modal-footer'>
			<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
			<button type='submit' class='btn btn-primary' form='sortForm'>Submit</button>
		</div>";
		

	echo "</div>";
echo "</div>";
echo "</div>";
?>

<!-- Phần tags -->
<?php
	echo "<div class='text-left inline-flex pl-3' style='background-color: #fff;'>";
	echo "<span class='display-1'>Sort by:</span>";
	if(isset($_GET['search'])){
		$str=$_GET['search'];
		echo "<span>&nbsp;&nbsp;</span>";
		echo "<a class='tag-links' href='Category.php?search=$str'><span>$str</span></a>";
	} else {
		foreach($brand_ids as $id){
			$brand_name = select_brand_name_by_brand_id($connect_mysql, $id);
			echo "<span>&nbsp;&nbsp;</span>";
			echo "<a class='tag-links' href='Category.php?brands%5B%5D=$id'><span>$brand_name</span></a>";
		}
	
		foreach($cat_ids as $cat_id){
			$cat_name = select_cat_name_by_cat_id($connect_mysql, $cat_id);
			echo "<span>&nbsp;&nbsp;</span>";
			echo "<a class='tag-links' href='Category.php?categories%5B%5D=$cat_id'><span>$cat_name</span></a>";
		}
	}
	
	echo "</div>";
?>

<!-- Phần album hiện sản phẩm -->
<?php
	$arr = array();
	if(isset($_GET['search'])){
		$arr = select_brand_id_arr_by_str($connect_mysql, $str);
		$arr_len = sizeof($arr);
	} else {
		$arr = select_product_by_filter($connect_mysql, $brand_ids, $cat_ids);
		$arr_len = sizeof($arr);
	}

	echo "<div class='album py-5 bg-light'>";
	echo "<div class='container'>";
		echo "<div class='row'>";

		if($arr[0]['product_id'] == NULL){
			echo "<p class='text-center'>No product here!</p>";
		}

		for( $i=0 ; $i<$arr_len ; $i++){
			$product_id = $arr[$i]['product_id'];
			$product_name = $arr[$i]['product_name'];
			$price_value = $arr[$i]['price_value'];
			$path = $arr[$i]['img_path'];

			echo "<div class='col-sm-12 col-md-3 col-lg-3 col-xl-3'>
			<div class='card mb-3 shadow-sm'>
			<img src='../Data/img/small-img/$path' alt='' class='card-img-top owl-lazy'>
			<div class='card-body'>
				<a href='../ProductPage/productPage.php?product_id=$product_id'><p class='card-title'>$product_name</p></a>
				<p></p>
				<span class='card-text'>Price:&nbsp;</span><span class='price-text'>$price_value$</span>
				<p></p>
				<div class='d-flex justify-content-between align-items-center'>
				<div class='btn-group'>
					<a href='#' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-cart-plus'></span></a>
					<a href='../ProductPage/productPage.php?product_id=$product_id' role='button' class='btn btn-sm btn-outline-secondary'><span class='fas fa-eye'></span><span>View</span></a>
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