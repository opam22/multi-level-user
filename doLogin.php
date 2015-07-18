<?php
//koneksi ke database
include 'core/config.php';

//ambil value dari inputan
$username = $_POST['username'];
$password = md5($_POST['password']);

//gunakan mysqli_real_escape_string untuk mencegah sql injection
$username = mysqli_real_escape_string($config, $username);
$password = mysqli_real_escape_string($config, $password);

//cek di database apakah user yang dimasukan ada atau tidak
$query = "SELECT * FROM user WHERE username = '$username' && password = '$password'";
$queryLogin = mysqli_query($config, $query);

//ambil data
$data = mysqli_fetch_array($queryLogin);

//jika query yang dimasukan benar/user ada
if(mysqli_num_rows($queryLogin) == 1){
	
	//lakukan pengecekan, user yang login ini memiliki level apa
	if ($data['level'] == 1) {
		//ini berarti user yang login memiliki level admin, lalu arahkan user ini ke halaman admin(folder admin)
		//buat sessionnya terlebih dahulu

		session_start();

		//session untuk usernamenya
		$_SESSION['username'] = $data['username'];
		//session untuk levelnya, digunakan untuk pengecekan di halaman-halaman aplikasi selanjutnya
		$_SESSION['level'] = $data['level'];

		//redirect ke halaman admin(folder admin)
 		header('location:admin/index.php');

	}
	else{
		//ini berarti user yang login memiliki level 2 atau seterusnya, yang berarti user biasa yang tidak memiliki akses admin
		//buat sessionnya terlebih dahulu

		session_start();

		//session untuk usernamenya
		$_SESSION['username'] = $data['username'];
		//session untuk levelnya, digunakan untuk pengecekan di halaman-halaman aplikasi selanjutnya
		$_SESSION['level'] = $data['level'];

		//redirect ke halaman user(biasa), disini kita arahkan ke home.php
 		header('location:home.php');		
	}

}
else{
	//kalau inputan username dan password salah atau user tidak tersedia, redirect balik ke halaman login dengan message error/gagal(dengan get)

	header('location:index.php?message=gagal');

}


?>