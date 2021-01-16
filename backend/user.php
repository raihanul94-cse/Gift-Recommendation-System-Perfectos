<?php 
session_start();
 IF(ISSET($_SESSION['name'])){
 	$user=$_SESSION['cust_id'];
  echo '
  <input type="hidden" id="userid" value="'.$user.'">
  <input type="hidden" id="userstat" value="reguser">
  <a href="backend/logout.php?destroy">LOGOUT</a>
  <a href="profile.php">'.$_SESSION['name'].'</a>
  ';
}else{
  echo '<a href="#login" type="button" data-toggle="modal" data-target="#loginModal">LOGIN</a><input type="hidden" id="userid" value="'.uniqid().'">
  <input type="hidden" id="userstat" value="unreguser">';
}
 ?>