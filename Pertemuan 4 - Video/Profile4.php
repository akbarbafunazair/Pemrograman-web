<?php
	session_start();

	//echo
	if(isset($_SESSION['nama_user'])	){
		echo 'ini halaman profile' . $_SESSION['nama_user'];
	}else{
		echo 'login dulu gan';
	}
?>

<br>
<a href="logout.php">Logout</a>