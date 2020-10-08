<?php
//------------------
//---GET DAN POST---

if 	(	isset($_POST['submit'])){
	echo $_POST ['password'];
}

?>

<form action="profile.php" method="get">
	<input type="text" name="nama">
	<input type="password" name="password">
	<input type="submit" name="submit">
</form>
