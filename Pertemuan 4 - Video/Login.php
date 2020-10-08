<?php
//------------------
//---GET DAN POST---

$user = 'akbar';
$password = '123';
if 	(	isset($_POST['submit'])){
	
	if( $_POST['nama'] == $user &&
		$_POST['password'] == $password){

		//memindahkan halaman

		header('Location: profile2.php?nama=' . $user);

	}else{
		echo 'Login Gagal';
}

}

?>

<form action="profile2.php" method="post">
	<input type="text" name="nama">
	<input type="password" name="password">
	<input type="submit" name="submit">
</form>
