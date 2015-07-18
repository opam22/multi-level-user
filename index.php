<?php

//Koneksi ke database

include 'core/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Multi Level User</title>
</head>
<body>


	<!-- Form untuk login yang diarahkan ke file action.login.php -->

	<form action="doLogin.php" method="POST">
		
		<table>
				
				<tbody>
					
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="text" name="username" placeholder="Username.."></td>
					</tr>

					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="password"></td>
					</tr>
					
					<tr>
						<td colspan="3"><input type="submit"></td>
					</tr>

				</tbody>			

		</table>
		

	</form>






	<?php
	//kalau ada message
	if (isset($_GET['message'])) {
		
		if ($_GET['message'] == 'gagal') { ?>
				
				<h4 style="color:red;">Username / Password salah</h4>

		<?php
		}

	}

	?>
	
</body>
</html>