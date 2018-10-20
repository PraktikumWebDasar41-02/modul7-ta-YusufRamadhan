<?php 
	session_start();
	$db = mysqli_connect('localhost','root','','mahasiswa');
	$NIM = $_SESSION['NIM'];
	$query = "SELECT * FROM data WHERE NIM = $NIM";
 	$view = mysqli_query($db,$query);
?>

<center>
		<br><br>
		<h3>Input Data</h3>
		<table>
			<form method="POST">
				<?php 	while ($data = mysqli_fetch_array($view)) { ?>
				<tr>
					<td>NIM</td>
					<td>:</td>
					<td><?php echo $data['NIM'];?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="Nama" size="25" value="<?php echo $data['Nama'];?>"></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td><input type="date" name="Tanggal" value="<?php echo $data['Tanggal_Lahir'];?>"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td>
						<select name ="JK">
							<option value="Laki-Laki" <?php if ($data['Jenis_Kelamin'] == 'Laki-Laki') {
							echo "checked";
						}?>>Laki - Laki</option>
							<option value="Perempuan"<?php if ($data['Jenis_Kelamin'] == 'Perempuan') {
							echo "checked";
						}?>>Perempuan</option>
							<option value="Lainnya"<?php if ($data['Jenis_Kelamin'] == 'Lainnya') {
							echo "checked";
						}?>>Lainnya</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Program Studi</td>
					<td>:</td>
					<td>
						<select name ="Prodi">
							<option value = "D3 Manajemen Informatika" <?php if ($data['Program_Studi'] == 'D3 Manajemen Informatika') {
								echo "selected";
							}?>>D3 Manajemen Informatika</option>
							<option value = "S1 MBTI" <?php if ($data['Program_Studi'] == 'S1 MBTI') {
								echo "selected";
							}?>>S1 MBTI</option>
							<option value = "S1 Sistem Informasi" <?php if ($data['Program_Studi'] == 'S1 Sistem Informasi') {
								echo "selected";
							}?>>S1 Sistem Informasi</option>
							<option value = "S1 DKV" <?php if ($data['Program_Studi'] == 'S1 DKV') {
								echo "selected";
							}?>>S1 DKV</option>
						</select>
					</td>
				</tr>
				<tr>
					<td valign="top">Fakultas</td>
					<td valign="top">:</td>
					<td>
						<input type="Radio" name="Fakultas" value="Fakultas Ilmu Terapan" <?php if ($data['Fakultas'] == 'Fakultas Ilmu Terapan') {
							echo "checked";
						}?>>Fakultas Ilmu Terapan<br>
						<input type="Radio" name="Fakultas" value="Fakultas Ekonomi Bisnis" <?php if ($data['Fakultas'] == 'Fakultas Ekonomi Bisnis') {
							echo "checked";
						}?>>Fakultas Ekonomi Bisnis<br>
						<input type="Radio" name="Fakultas" value="Fakultas Rekayasa Industri" <?php if ($data['Fakultas'] == 'Fakultas Rekayasa Industri') {
							echo "checked";
						}?>>Fakultas Rekayasa Industri<br>
						<input type="Radio" name="Fakultas" value="Fakultas Industri Kreatif" <?php if ($data['Fakultas'] == 'Fakultas Industri Kreatif') {
							echo "checked";
						}?>>Fakultas Industri Kreatif
					</td>
				</tr>
				<tr>
					<td>Asal</td>
					<td>:</td>
					<td><input type="text" name="Asal" value=<?php echo $data['Asal'];?>></td>
				</tr>
				<tr>
					<td>Motto Hidup</td>
					<td>:</td>
					<td><textarea name ="Motto" value = ><?php echo $data['Moto_Hidup']; ?></textarea></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="back" value="back"></center></td>
					<?php 
						if (isset($_POST['back'])) {
							header("Location:home.php");
						}
					?>
					<td><center><input type="submit" name="submit"></center></td>
				</tr>
			<?php }?>
			</form>
		</table>
	</center>
</body>
</html>

<?php 
	if (isset($_POST['submit'])) {
		$Nama = $_POST['Nama'];
		$TGL = $_POST['Tanggal'];
		$JK = $_POST['JK'];
		$Prodi = $_POST['Prodi'];
		$Fakultas = $_POST['Fakultas'];
		$Asal = $_POST['Asal'];
		$Motto = $_POST['Motto'];
		$update = "UPDATE data SET Nama = '$Nama', Tanggal_Lahir = 'TGL', Jenis_Kelamin = '$JK', Program_Studi = '$Prodi', Fakultas = '$Fakultas', Asal = '$Asal', Moto_Hidup = '$Motto' WHERE NIM = '$NIM'";
		if (mysqli_query($db,$update)) {
			echo "<script language = 'javascript'>alert('Update Success');
			document.location=('edit.php');</script>";
		}else{
			echo "<script language = 'javascript'>alert('Update Success');
			document.location=('edit.php');</script>";
		}
	}
?>