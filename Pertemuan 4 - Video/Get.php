<?php
//------------------
//---GET DAN POST---

if 	(	isset($_GET['submit'])){
	echo $_GET ['password'];
}

?>

<form action="get.php" method="get">
	<input type="text" name="nama">
	<input type="password" name="password">
	<input type="submit" name="submit">
</form>
