<?php 
$server="localhost";
$username="root";
$password="";
$dbname="project_database";
$dbname2="recommender";
$connect=mysqli_connect($server,$username,$password,$dbname);

$connect2=mysqli_connect($server,$username,$password,$dbname2);

if(!$connect){
	die("Connection error on Database 1!".mysqli_connect_error());
}
if(!$connect2){
	die("Connection error on Database 2!".mysqli_connect_error());
}

 ?>