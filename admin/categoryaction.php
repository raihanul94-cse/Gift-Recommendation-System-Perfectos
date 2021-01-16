<?php 
include 'db-con.php';
if(isset($_GET['addnew'])){
  $newCategory=$_GET['newCategory'];
  $categoryid=uniqid();

  if(mysqli_query($connect,"INSERT INTO `CATEGORY`(`category_id`, `category_name`) VALUES ('$categoryid','$newCategory')")){
    header("location:category.php");
  }
}
if(isset($_GET['delete'])){
	$categoryid=$_GET['delete'];
	if (mysqli_query($connect,"DELETE FROM `CATEGORY` WHERE `category_id`='$categoryid'")) {
		header("location:category.php");
	}
}
 ?>
