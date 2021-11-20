<?php include "../PHP/anything.php" ?>
<?php
$connect_mysql = get_connect();
if(isset($_GET['q'])){
    $q=$_GET["q"];
}

$product_arr = select_product_information_for_search($connect_mysql);

$len = sizeof($product_arr);
$max_result = 100;

if(strlen($q) > 0 && $i < 5){
    $hint = "";
    for($i = 0; $i < $max_result; $i++){
        $name = $product_arr[$i]['product_name'];
        $id = $product_arr[$i]['product_id'];
        $img_path = select_small_img_by_id($connect_mysql, $id);
        $price = select_price_by_id($connect_mysql, $id);

        if(stristr($name, $q)){
            if($hint == ""){
                $hint = "<li class='suggest-link'>
                            <a href='../ProductPage/productPage.php?product_id=$id'>
                                <div class='row align-items-center'>
                                    <div class='col-1 col-sm-1 col-md-1 col-lg-1'>
                                        <img width='40' height='40' src='../Data/img/small-img/$img_path' alt=''>
                                    </div>
                                    <div class='col-11 col-sm-11 col-md-11 col-lg-11'>
                                        <div>
                                            <span class='login-text'>
                                                $name <br/>
                                                <span class='sign-up-text'>
                                                    $price$
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>	
                        </li>";
            } else {
                $hint = $hint. "<li  class='suggest-link'>
                <a href='../ProductPage/productPage.php?product_id=$id'>
                    <div class='row align-items-center'>
                        <div class='col-1 col-sm-1 col-md-1 col-lg-1'>
                            <img width='40' height='40' src='../Data/img/small-img/$img_path' alt=''>
                        </div>
                        <div class='col-11 col-sm-11 col-md-11 col-lg-11'>
                            <div>
                                <span class='login-text'>
                                    $name <br/>
                                    <span class='sign-up-text'>
                                        $price$
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>	
            </li>";
            }
        }
    }
}

if ($hint=="") {
    $response="<li  class='suggest-link'>
                    <div class='row align-items-center'>
                        <div class='col-12 col-sm-12 col-md-12 col-lg-12'>
                            <div>
                                <span class='login-text'>No suggestion</span>
                            </div>
                        </div>
                    </div>	
                </li>";
  } else {
    $response=$hint;
  }
  
  //output the response
  echo $response;
?>
