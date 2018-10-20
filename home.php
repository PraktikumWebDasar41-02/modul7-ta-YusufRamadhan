<?php 
	$db = mysqli_connect('localhost','root','','mahasiswa');
	$query = "SELECT NIM, Nama, Program_Studi FROM data"; 
	$view = mysqli_query($db,$query);

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>home</title>
</head>
<body>
	<center>
		<br><br><h1>homepage</h1>	
			<table border="2">
				<form method="POST">
					<tr>
						<td><center><input type="submit" name="Input" value="Input"></center></td>
						<td colspan="2"><input type="text" name="NIM" size="50" placeholder="Search NIM Here"></td>
						<td colspan="2"><center><input type="submit" name="Search" value="Search"></center></td>
						
						<?php
							$view; 
							if (isset($_POST['Search'])) {
								$nim = $_POST['NIM'];
								$search = "SELECT NIM, Nama, Program_Studi FROM data WHERE NIM = '$nim'";
								$view = mysqli_query($db,$search);
							}
						?>
					</tr>
					<tr bgcolor="gray">
						<td><center>NIM</center></td>
						<td><center>Nama</center></td>
						<td><center>Prodi</center></td>
						<td colspan="2"><center>Action</center></td>
					</tr>
					<?php while ($data = mysqli_fetch_array($view)){?>
					<tr>
						<td><?php echo $data['NIM'];?></td>
						<td><?php echo $data['Nama'];?></td>
						<td><?php echo $data['Program_Studi'];?></td>
						<td><?php echo "<a href=home.php?nim=".$data['NIM'].">Delete</a>"; $NIM = $data['NIM'];?></a></td>
						<td><?php echo "<a href=home.php?idx=".$data['NIM'].">Update</a>"; $NIM = $data['NIM'];?></a></td>
					</tr>
				<?php } ?>
					<tr>
						<td colspan="5"><center><input type="submit" name="back" value="back"></center></td>
					</tr>
				</form>
			</table>
	</center>
</body>
</html>

<?php 
	session_start();
	if (isset($_POST['Input'])) {
		header("Location: Input.php");
	}

	if (isset($_GET['nim'])) {
		$nim = $_GET['nim'];
		$delete = "DELETE FROM data where NIM = '$nim'";
		$query = mysqli_query($db,$delete);
		if ($query) {
		header("Location:home.php");
		}
	}	
	 
	if (isset($_GET['idx'])) {
		$NIM = $_GET['idx'];
		$_SESSION['NIM'] = $NIM;
		header("Location:Edit.php");
	}
					
	if (isset($_POST['back'])) {
		header("Location:home.php");
	}
?>