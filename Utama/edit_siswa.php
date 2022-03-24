<?php
require_once("../Connect.php");
if(!isset($_SESSION['username'])){
    header("location: Login/login.php");
}else{
    $username = $_SESSION['username'];
}
$nisnSiswa = $_GET['nisn'];
$siswa = mysqli_query($connect, "SELECT * FROM siswa WHERE nisn='$nisnSiswa'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_tambah.css">
</head>
<body>
<center>
    <?php require("header.php"); ?>
    <h3>Edit data Siswa</h3>
<?php
while($row = mysqli_fetch_assoc($siswa)){?>
    <form action="" method="POST">
        <table cellpadding="5">
            <input type="hidden" name="nisn" value="<?= $row['nisn']; ?>">
            <tr>
                <td>Nama</td>
                <td align="center">:</td>
                <td><input type="text" autocomplete="off" class ="sub "name="Nama" value="<?= $row['Nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><select name="kelas" value="<?= $row['kelas']; ?>>
	<option value="">--- Pilih Kelas ---</option>
	<option value="0">XI RPL</option>
	<option value="1">XI TKJ</option>
	<option value="2">XI Multimedia</option>
</select></td>
            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td>:</td>
                <td><select name="Jenis_kelamin" value="<?= $row['Jenis_kelamin']; ?>>
	<option value="">--- Pilih Jenis Kelamin ---</option>
	<option value="0">Laki-Laki</option>
	<option value="1">Perempuan</option>
</select></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" autocomplete="off" class="sub" name="Alamat" value="<?= $row['Alamat']; ?>" required></td>
            </tr>
            <tr>
                <td colspan="3"><button class="button" type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>
</center>
<?php } ?>
<hr />
    <?php require("footer.php"); ?>
</body>
</html>
<?php
// Proses update
if(isset($_POST['simpan'])){
    $nisn = $_POST['nisn'];
    $nama = $_POST['Nama'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['Jenis_kelamin'];
    $alamat = $_POST['Alamat'];
    $query =  "UPDATE siswa SET Nama='$nama',
                                 kelas='$kelas', Jenis_kelamin='$jenis_kelamin', Alamat='$alamat'
                                 WHERE siswa.nisn='$nisn'";
    $update = mysqli_query($connect, $query);
        if($update){
            ?>
            <script>
            alert("Data Berhasil Disimpan");
            document.location.href="main_layout.php";
            </script>
        <?php
        }else{
            echo "<script>alert('Gagal'); </script>";
        }     
}
?>