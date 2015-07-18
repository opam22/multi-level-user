<?php
session_start();


//lakukan pengecekan apakah user yang mengakses halaman ini memiliki session atau tidak(sudah login atau belum)
if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
	
	//karna ini halaman admin, maka kita harus membuat pengecekan lagi
	//cek session['level'] dari user yang mengakses halaman ini memiliki nilai berapa
	//kalau bukan 1 berarti dia bukan admin, maka redirect ke halaman home(user) degan message kalau dia bukanlah admin
	if ($_SESSION['level'] != 1) {
		
		header('location:../home.php?message=notAdmin');

	}

}
//kalau user yang mengakses halaman ini tidak memiliki session baik username atau level, maka arahkan ke halaman login
else{

	header('location:../index.php');

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>admin</title>
</head>
<body>

	<h1>Ini halaman admin, dimana user biasa tidak bisa mengakses ini, dikarenakan dibaris atas code ini kita membuat
		semacam verifikasi, dimana kalau session['level'] nya bukan bernilai 1, maka kita akan redirect dan tidak akan diperbolehkan
		mengakses halaman ini, walaupun ia sudah login
	</h1>
	<a href="../doLogout.php">LOG OUT</a>
	
</body>
</html>