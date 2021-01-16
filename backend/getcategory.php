<?php 
include "../database/db_con.php";
$getCat=mysqli_query($con,'SELECT * FROM `category`');
if(mysqli_num_rows($getCat)>0){
	while($row=mysqli_fetch_array($getCat)){
		?>
		<a class="dropdown-item" href="category.php?cat=<?=$row['category_name'];?>"><?=$row['category_name'];?></a>
		<?php
	}
}else{
	?>
<a class="dropdown-item" href="#">NO CATEGORY FOUND</a>
<?php
}
 ?>