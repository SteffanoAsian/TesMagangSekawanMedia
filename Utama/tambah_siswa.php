<?php
include("../Connect.php");
if(!isset($_SESSION['username'])){
    header("location:../Login/login.php");
}else{
    $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>     
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_tambah.css">
    <title>Data Siswa</title>
</head>
<body>
<center>
    <?php include("header.php"); ?>
    <h3>Data Siswa</h3>
    <form action="" method="POST">
        <table>
            <tr>
                <td>NISN</td>
                <td align="center">:</td>
                <td><input type="text" name="nisn" class="sub" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td align="center">:</td>
                <td><input type="text" name="Nama" class="sub" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td align="center">:</td>
                <td><select name="Jenis_kelamin">
	<option value="">--- Pilih Jenis Kelamin ---</option>
	<option value="0">Laki-Laki</option>
	<option value="1">Perempuan</option>
</select></td>  
            </tr>
            <tr>
                <td>Kelas</td>
                <td align="center">:</td>
                <td><select name="kelas">
	<option value="">--- Pilih Kelas ---</option>
	<option value="0">XI RPL</option>
	<option value="1">XI TKJ</option>
	<option value="2">XI Multimedia</option>
</select></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td align="center">:</td>
                <td><input type="text" name="Alamat" class="sub" autocomplete="off"></td>
            </tr>
                <td colspan="3"><button type="submit" name="simpan" class="button">Simpan</button></td>
            </tr>
        </table>
    </form>
    </center>
<hr />
            
    <?php include("footer.php"); ?>
</body>
</html>
<?php
// Proses Simpan
if(isset($_POST['simpan'])){
    $nisn = $_POST['nisn'];
    $nama = $_POST['Nama'];
    $jenis_kelamin = $_POST['Jenis_kelamin'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['Alamat'];
    $simpan = mysqli_query($connect, "INSERT INTO siswa VALUES
    (null,'$nisn', '$nama', '$jenis_kelamin', '$kelas', '$alamat')");
        if($simpan){
            ?>
            <script>
            alert("Data Berhasil Disimpan");
            document.location.href="main_layout.php";
            </script>
        <?php
        }else{
            $error = mysqli_error($connect);
            echo "<p>alert('Gagal Menambahkan Data : $error');</p>";
        }
}
?>