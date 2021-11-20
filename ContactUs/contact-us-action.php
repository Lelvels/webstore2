<?php include "../PHP/anything.php" ?>
<?php
    $connect_mysql = get_connect();
    $feedback = "";
    $name = "";
    $email = "";
    $gender = "";
    $phone = "";
    $message = "";

    if(isset($_POST['feedback'])){
        $feedback = $_POST['feedback'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
    } else {
        header("location:contact-us.php");
    }

    if($name != null && $name != "") { 
        $result = insert_customer_feedback($connect_mysql, $name, $email, $gender, $phone, $feedback);
        if($result){
            $message .= "Thanks you for your response, we will contact as soon as we can!";
        } else {
            $message .= "Sorry, an error had been occurred, please try again".mysqli_error($connect_mysql);
        }
    } else {
        $message .= "Please fill out the information!";
    }

    
    

    echo "<script>
		alert('$message');
		window.location.href='contact-us.php';
    </script>";

?>