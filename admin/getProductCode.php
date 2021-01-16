<?php 
$q = $_GET['q'];
function randomName() {
    return chr(rand ( 97 , 122)).chr(rand ( 97 , 122)).chr(rand ( 97 , 122)).chr(rand ( 97 , 122)).chr(rand ( 97 , 122)).chr(rand ( 97 , 122)).chr(rand ( 97 , 122)).chr(rand ( 97 , 122)).chr(rand ( 97 , 122));
}
$catCode=strtoupper($q[0].$q[1].$q[2]);
echo '<input type="text" class="form-control" name="productid" value="'.$catCode.":".randomName().'" required>';
 ?>