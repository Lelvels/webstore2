<?php
    error_reporting(0);
    define("SERVER", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "liberty_electronic");

    function get_connect(){
        $connect_mysql = mysqli_connect(SERVER, USERNAME, PASSWORD);
        if(!$connect_mysql){
            die("Unable to connect<br>");
        } else {
            // echo "<script>
            //     alert('connect db thanh cong');
            // </script>";
            $db = mysqli_select_db($connect_mysql, DATABASE);
            return $connect_mysql;
        }
    }

    function select_all_product_name($connect_mysql){
        $sql_select = "SELECT product_name FROM products;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        while($row = mysqli_fetch_array($result)){
	        $arr[] = $row['product_name'];
        }
        return $arr;

        // cách kiểm tra
            // $connect_mysql = get_connect();
            // $arr = select_all_info($connect_mysql);

            // foreach($arr as $key => $product_name){
                //loops here
            // }

    }

    function select_product_information($connect_mysql){
        $sql_select = "SELECT  a.product_ID, a.product_name, c.price_value, d.img_path from products a
        INNER JOIN prices_mapping b on b.Product_ID = a.Product_ID
        INNER JOIN prices c on c.Price_ID = b.Price_ID
        INNER JOIN product_images d on d.Product_ID = a.Product_ID
        where d.Img_spec_ID = 2;";

        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        while($row = mysqli_fetch_array($result)){
            $arr[] = array('product_ID' => $row['product_ID'], 'product_name' => $row['product_name'],'price_value' => $row['price_value'], 'img_path' => $row['img_path']);
        }
        return $arr;

        // Để kiểm tra 
            // $connect_mysql = get_connect();
            // $arr = select_product_information($connect_mysql);
            // $arr_len = sizeof($arr);

            // for( $i=0 ; $i<$arr_len ; $i++){
            //     echo $arr[$i]['product_name']."<br>";
            //     echo $arr[$i]['price_value']."<br>";
            //     echo $arr[$i]['img_path']."<br><br>";
            // }
    }

    function select_product_information_for_search($connect_mysql){
        $sql_select = "SELECT product_id, product_name from products;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        while($row = mysqli_fetch_array($result)){
            $arr[] = array('product_id' => $row['product_id'], 'product_name' => $row['product_name']);
        }
        return $arr;
    }

    function select_categories_names($connect_mysql){
        $sql_select = "SELECT cat_id, cat_name from categories;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        while($row = mysqli_fetch_array($result)){
            $arr[] = array('cat_id' =>$row['cat_id'] ,'cat_name' => $row['cat_name']);
        }
        return $arr;
        //test
        /*
        $connect_mysql = get_connect();
        $arr_cat = select_categories_names($connect_mysql);
        $arr_cat_len = sizeof($arr_cat);

        for($i=0; $i<$arr_cat_len; $i++){
            echo $arr_cat[$i]['cat_id']."<br>";
            echo $arr_cat[$i]['cat_name']."<br>";
        }
        */
    }

    function select_brands_names($connect_mysql){
        $sql_select = "SELECT brand_id, brand_name from brands;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        while($row = mysqli_fetch_array($result)){
            $arr[] = array('brand_id' => $row['brand_id'] ,'brand_name' => $row['brand_name']);
        }
        return $arr;

        /*
        $connect_mysql = get_connect();
        $arr = select_brands_names($connect_mysql);
        $arr_len = sizeof($arr);
        for($i=0; $i<$arr_len; $i++){
            echo $arr[$i]['brand_name']."<br>";
        }
        */
    }

    function select_brand_name_by_brand_id($connect_mysql, $brand_id){
        $sql_select = "SELECT brand_name from brands where brand_id = $brand_id;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }
        $brand_name = $arr[0];
        return $brand_name;
    }

    function select_cat_name_by_cat_id($connect_mysql, $cat_id){
        $sql_select = "SELECT cat_name from categories where cat_id = $cat_id;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }
        $cat_name = $arr[0];
        return $cat_name;
    }

    // Select by id

    function select_product_name_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT product_name from products where product_id = $product_id limit 1;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }
        $product_name = $arr[0];
        return $product_name;
    }

    function select_product_category_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT a.cat_name from categories a 
        INNER JOIN products b on a.Cat_ID = b.Cat_ID
        where b.product_id = $product_id limit 1;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }
        $cat_name = $arr[0];
        return $cat_name;
    }

    function select_product_cat_id_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT a.cat_id from categories a 
        INNER JOIN products b on a.Cat_ID = b.Cat_ID
        where b.product_id = $product_id limit 1;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }
        $cat_id = $arr[0];
        return $cat_id;
    }

    function select_price_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT a.price_value from prices a
        INNER JOIN prices_mapping b on b.Price_ID = a.Price_ID
        INNER JOIN products c on b.Product_ID = c.Product_ID
        where c.Product_ID = $product_id;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }
        $price = $arr[0];
        return $price;
    }

    function select_origin_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT a.spec_value from technical_specifications a
        INNER JOIN products b on b.Product_ID = a.Product_ID
        INNER JOIN technical_specification_details c on a.Spec_ID = c.Spec_ID
        where c.Spec_Name like 'Origin%' and b.Product_ID = $product_id;";

        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }
        $origin = $arr[0];
        return $origin;
    }

    function select_small_description_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT small_description from product_descriptions
        where product_id = $product_id;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }
        $small_description = $arr[0];
        return $small_description;
    }
    
    function select_big_description_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT big_description from product_descriptions
        where product_id = $product_id;";
        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }
        $big_description = $arr[0];
        return $big_description;
    }

    function select_big_img_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT a.img_path FROM product_images a
        INNER JOIN products b on b.Product_ID = a.Product_ID
        INNER JOIN image_specification c on a.Img_spec_ID = c.img_spec_id
        where b.Product_ID = $product_id AND c.Img_spec_name LIKE '%big-img%';";

        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }
        $big_img_path = $arr[0];
        return $big_img_path;
    }

    function select_small_img_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT a.img_path FROM product_images a
        INNER JOIN products b on b.Product_ID = a.Product_ID
        INNER JOIN image_specification c on a.Img_spec_ID = c.img_spec_id
        where b.Product_ID = $product_id AND c.Img_spec_name LIKE '%small-img%';";

        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }
        $small_img_path = $arr[0];
        return $small_img_path;
    }

    function select_brand_name_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT brand_name from brands a
        INNER JOIN products b on a.Brand_ID = b.Brand_ID
        where b.Product_ID = $product_id;";

        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }

        $brand_name = $arr[0];
        return $brand_name;
    }

    function select_word_path_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT word_path from product_descriptions a
        INNER JOIN products b on a.Product_ID = b.Product_ID
        where a.Product_ID = $product_id;";

        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        $arr = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $arr[] = array($row);
        }

        $word_path = $arr[0];
        return $word_path;
    }

    function select_technical_information_by_id($connect_mysql, $product_id){
        $sql_select = "SELECT b.spec_name, a.spec_value FROM technical_specifications a
        INNER JOIN technical_specification_details b on a.Spec_ID = b.Spec_ID
        where a.Product_ID = $product_id;";

        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        while($row = mysqli_fetch_array($result)){
            $arr[] = array('spec_name' => $row['spec_name'],'spec_value' => $row['spec_value']);
        }
        return $arr;
    }

    //select product for filter
    function select_product_by_filter($connect_mysql, $brand_ids, $cat_ids){
        $brand_ids_string = "";
        $cat_ids_string = "";
        $len1 = sizeof($brand_ids);
        $len2 = sizeof($cat_ids);
        
        if($brand_ids[0] != NULL && $brand_ids[0] != ""){
            $brand_ids_string .= "and a.Brand_ID in (";

            if($len1 > 1){
                for($i=0; $i < $len1-1; $i++){
                    $brand_id = $brand_ids[$i];
                    $brand_ids_string .= "$brand_id, ";
                } 

                $brand_id = $brand_ids[$len1 - 1];
                $brand_ids_string .= "$brand_id";
                
            } else{
                $brand_ids_string .= "$brand_ids[0]";
            }

            $brand_ids_string .= ")";
        }

        if($cat_ids[0] != NULL && $cat_ids[0] != ""){
            $cat_ids_string .= "and a.cat_ID in (";

            if($len2 > 1){
                for($i=0; $i < $len2-1; $i++){
                    $cat_id = $cat_ids[$i];
                    $cat_ids_string .= "$cat_id, ";
                } 

                $cat_id = $cat_ids[$len2 - 1];
                $cat_ids_string .= "$cat_id";
            } else{
                $cat_ids_string .= "$cat_ids[0]";
            }

            $cat_ids_string .= ")";
        }

        $sql_select = "SELECT a.product_ID, a.product_name, c.price_value, d.img_path from products a 
        INNER JOIN prices_mapping b on b.Product_ID = a.Product_ID 
        INNER JOIN prices c on c.Price_ID = b.Price_ID 
        INNER JOIN product_images d on d.Product_ID = a.Product_ID
        where d.Img_spec_ID = 2 $brand_ids_string $cat_ids_string limit 16;";

        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        while($row = mysqli_fetch_array($result)){
            $arr[] = array('product_id' => $row['product_ID'], 'product_name' => $row['product_name'],'price_value' => $row['price_value'], 'img_path' => $row['img_path']);
        }
        return $arr;

        // for debug
        // return $sql_select;
    }

    //insert customer feedback
    function insert_customer_feedback($connect_mysql, $name, $email, $gender, $phone, $feedback){
        $sql_insert = "INSERT INTO customer_feedback(Customer_name, Customer_email, Customer_gender, Customer_phone, customer_feedback)
            VALUES ('$name', '$email', '$gender', '$phone', '$feedback');";
        $result = mysqli_query($connect_mysql, $sql_insert);
        return $result;
    }

    //Standard technical value
    function standard_spec_value($str){
        if($str != NULL){
            return $str;
        } else {
            return '-';
        }
    }

    function close_connect($connect_mysql){
        mysqli_close($connect_mysql);
    }

    // for search bar
    function select_brand_id_arr_by_str($connect_mysql, $str){
        $sql_select = "SELECT a.product_ID, a.product_name, c.price_value, d.img_path from products a 
        INNER JOIN prices_mapping b on b.Product_ID = a.Product_ID 
        INNER JOIN prices c on c.Price_ID = b.Price_ID 
        INNER JOIN product_images d on d.Product_ID = a.Product_ID
        where d.Img_spec_ID = 2 AND a.Product_Name LIKE '%$str%';";

        $result = mysqli_query($connect_mysql, $sql_select);
        $arr = array();
        while($row = mysqli_fetch_array($result)){
            $arr[] = array('product_id' => $row['product_ID'], 'product_name' => $row['product_name'],'price_value' => $row['price_value'], 'img_path' => $row['img_path']);
        }
        return $arr;
    }
?>
