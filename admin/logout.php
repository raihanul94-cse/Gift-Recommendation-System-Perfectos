<?php 
IF(ISSET($_GET['logout'])){
	session_start();
	session_destroy();
	header('Location:login.php');
}
 ?>