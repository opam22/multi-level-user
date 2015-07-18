<?php
session_start();
//jika user yang mengakses halaman ini tidak memiliki session(belum login) maka kita redirect sehingga hanya user yang
//sudah login yang bisa mengakses halaman ini
if(empty($_SESSION['username'])){

		header('location:index.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
</head>
<body>
	

	<h1>Ini halaman home untuk user biasa</h1>
	<a href="doLogout.php">LOG OUT</a>





	<?php
	//kalau ada message
	if (isset($_GET['message'])) {
		
		if ($_GET['message'] == 'notAdmin') { ?>
				
				<h4 style="color:red;">Anda bukan admin</h4>

		<?php
		}

	}

	?>
	
</body>
</html>