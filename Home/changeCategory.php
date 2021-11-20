<?php include "../PHP/anything.php" ?>
<?php
    $connect_mysql = get_connect();
    if(isset($_GET['cat_id'])){
        $cat_id=$_GET['cat_id'];
    }

    $brand_ids = array();
    $cat_ids = array($cat_id);

    $product_arr = select_product_by_filter($connect_mysql, $brand_ids, $cat_ids);
    $len = sizeof($product_arr);
    
    if($cat_id != 0 && $len > 0){
        $input = "";
        for($i=0; $i < $len; $i++){
            $product_id = $product_arr[$i]['product_id'];
            $product_name = $product_arr[$i]['product_name'];
            $price = $product_arr[$i]['price_value'];
            $img_path = $product_arr[$i]['img_path'];

            if($input == ""){
                $input = "<div class='col-sm-12 col-md-3 col-lg-3 col-xl-3'>
                            <div class='card mb-3 shadow-sm'>
                            <img src='../Data/img/small-img/$img_path' alt='' class='card-img-top img-responsive owl-lazy'>
                            <div class='card-body'>
                                <a href='../ProductPage/productPage.php?product_id=$product_id'><p class='card-title'>$product_name</p></a>
                                <span class='card-text'>Price:&nbsp;</span><span class='price-text'>$price$</span><p></p>
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
            } else {
                $input = $input."<div class='col-sm-12 col-md-3 col-lg-3 col-xl-3'>
                                    <div class='card mb-3 shadow-sm'>
                                    <img src='../Data/img/small-img/$img_path' alt='' class='card-img-top img-responsive owl-lazy'>
                                    <div class='card-body'>
                                        <a href='../ProductPage/productPage.php?product_id=$product_id'><p class='card-title'>$product_name</p></a>
                                        <span class='card-text'>Price:&nbsp;</span><span class='price-text'>$price$</span><p></p>
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
        }
    }

    if ($input == "") {
        $response = "<p class='text-center'>No product here!</p>";
      } else {
        $response = $input;
      }
      
    //output the response
    echo $response;
?>