<?php 
if (isset($_POST['signup'])) {
	include "../database/db_con.php";
    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $contact=$_POST['contact'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $address2="";
    if (isset($_POST['address2'])) {
			$address2=$_POST['address2'];
		}
    $address=$_POST['address']." ".$address2;
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $state=$_POST['state'];

    $cust_address=$address.", ".$city.", ".$state."-".$zip;
  
    $cust_id=uniqid();
    $username=strtolower($firstname);

    // $insertIntoSignup="INSERT INTO `SIGNUP`(`cust_id`, `first_name`, `middle_name`, `last_name`, `email`, `gender`, `contact`, `address`, `password`) VALUES ('$signupId','$firstname','$middlename','$lastname','$email','$gender','$contact','$cust_address','$password')";

    $insertIntoSignup="INSERT INTO `CUSTOMER`(`cust_id`, `first_name`, `middle_name`, `last_name`, `email`, `gender`, `contact`, `address`) VALUES ('$cust_id','$firstname','$middlename','$lastname','$email','$gender','$contact','$address')";
    $login="INSERT INTO `LOGIN`(`cust_id`,`username`, `password`, `access`) VALUES ('$cust_id','$username','$password','1')";
    if (mysqli_query($con,$insertIntoSignup)) {
        if(mysqli_query($con,$login)){
            echo json_encode(array("statusCode"=>200));
        }
    }else{
    	echo json_encode(array("statusCode"=>201)); 
    }
}
 ?>