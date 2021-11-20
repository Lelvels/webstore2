<?php include "../PHP/anything.php" ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Us</title>
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
		<link href="../CSS/contactUs.css" rel="stylesheet">
        <link rel="stylesheet" href="slider/slide-show.css">
        <link rel="stylesheet" href="slider/assets/owl.theme.default.css">
        <link rel="stylesheet" href="slider/assets/owl.carousel.min.css">
        <!-- My js -->
        <script src="slider/jquery.mousewheel.min.js"></script>
        <script src="slider/owl.carousel.min.js"></script>
    </head>
<body>

<style>
	.company-number {
  		font-weight: bold; 
		color: orange;
		font-size: 15px; 
	}

	.copyright{
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
		margin-top: 3.4rem;
		margin-left: auto;
		width: 83%;
		margin-right: auto;
	}
</style>

<!-- connect database -->
<?php
	$connect_mysql = get_connect();
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

<!-- Page path -->
<hr class="my-4">
<div class="container-fluid pl-4 mb-0" style='padding-top: 35px;'>
    <div class="row text-left">
        <div class="col-12">
            <a href="../Home/Home.php"><span class="path-text">Home</span></a>
            <span class="fas fa-chevron-right"></span>
            <span class="path-text">Contact Us</span>
        </div>
    </div>
</div>

<hr class="hr-path">

<div class="container pl-4">
	<p class="h5">Contact us and feedback</p>
</div>

<div class="container pl-4">
	<form class="" method="POST" action="contact-us-action.php">
	<div class="form-group w-75 pt-2">
    	<label for="feedback">Your feedback</label>
    	<textarea style="width: 760px;" name="feedback" class="form-control" placeholder="Please send your feedback here..." id="feedback" rows="3" required></textarea>
  	</div>

  	<div class="form-row w-75">
    	<div class="form-group col-md-5">
      		<label for="inputPassword4">Full name</label>
      		<input style="width: 300px;" name="name" type="text" class="form-control" id="inputPassword4" placeholder="Your name" required>
		</div>
		
		<div class="form-group col-md-5">
      		<label for="inputEmail4">Email</label>
      		<input style="width: 300px;" name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
    	</div>
  	</div>

  	<div class="row pt-0 w-75">
		<div class="col-sm-3 col-md-3">
			<p>Gender</p>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="gender" id="male" value="male">
				<label class="form-check-label" for="male">
					Male
				</label>
			</div>
			
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="gender" id="female" value="female">
				<label class="form-check-label" for="female">
					Female
				</label>
			</div>
		</div>

		<div class="form-group col-md-9">
      		<label class="inline" for="phone">Telephone number</label>
      		<input style="width: 350px;" type="tel" class="form-control inline" id="phone" name="phone" placeholder="Telephone numbers" pattern="[0-9]{9,11}" required>
    	</div>
	</div>

  	<button type="submit" class="btn btn-primary">Send feedback</button>
</form>
</div>


<hr class="my-4">

<div class="container pl-4">
	<p class="h5">Company Information</p>
</div>

<div class="container pl-4">
	<p style="font-weight: bold;" class="company-name h5">Liberty Electronic</p>
</div>

<div class="container pl-4">
	<div class="row">
		<div class="col-7 col-sm-12 col-md-5 col-lg-5">
			<p>Adress: 285 Doi Can, Ba Dinh, Ha Noi.</p>
			<span>Telephone number:</span>&nbsp;<span class="company-number">(028)69 696 969</span><p></p>
			<span>Fax:</span>&nbsp;<span class="company-number">028 89 123 951</span><p></p>
			<span>Hotline:</span>&nbsp;<span class="company-number">1800.1853</span><p></p>
			<span>Email:</span>&nbsp; <a class="company-email" href="mailto:customer-service@libertyelectronic.com"> <span style="font-weight: bold; color: royalblue; font-size: 14px;">customer-service@libertyelectronic.com</span> </a> <p></p>
		</div>

		<div class="col-12 col-sm-12 col-md-7 col-lg-7">
			<div id="map" style="width:300px;height:300px;">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9232490033855!2d105.81679641493274!3d21.035756785994657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab0d127a01e7%3A0xab069cd4eaa76ff2!2zMjg1IMSQ4buZaSBD4bqlbiwgTGnhu4V1IEdpYWksIEJhIMSQw6xuaCwgSMOgIE7hu5lpIDEwMDAwMA!5e0!3m2!1svi!2s!4v1590302262382!5m2!1svi!2s" 
    			width="280" height="280" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>
	</div>
</div>

</body>
</html>
