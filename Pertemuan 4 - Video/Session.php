<?php
//------------------
//---GET DAN POST---

$user = 'akbar';
$password = '123';
if 	(	isset($_POST['submit'])){
	
	if( $_POST['nama'] == $user &&
		$_POST['password'] == $password){

		//cookie
		setcookie('nama_user', $_POST['nama'], time()+120);


		//session
		$_SESSION['nama_user'] = $_POST['nama'];

		//memindahkan halaman
		header('Location: profile3.php');

		

	}else{
		echo 'Login Gagal';
}

}

?>

<form action="session.php" method="post">
	<input type="text" name="nama">
	<input type="password" name="password">
	<input type="submit" name="submit">
</form>
