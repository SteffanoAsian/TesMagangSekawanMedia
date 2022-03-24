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
    <title> Data Siswa</title>
</head>
<body>
    <center>
    <?php include("header.php");?>
    <link rel="stylesheet" href="style_body.css">
    <h3>Halaman Data Siswa</h3>
    <p align="left"><a href="layout_TambahSiswa.php">Tambah Data</a></p>
    <table>
        <tr>
            <td>No. </td>
            <td>NISN</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>Kelas</td>
            <td>Alamat</td>
            <td>Aksi</td>
        </tr>
<?php

$totalDataHalaman = 5;
$data = mysqli_query($connect, "SELECT * FROM siswa");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;

$query ="SELECT * FROM siswa";
$result = mysqli_query($connect, $query);
$no = 1;

while($r = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nisn']; ?></td>
            <td><?= $r['Nama']; ?></td>
            <td><?php if($r['Jenis_kelamin']=="0"){
                echo "Laki-Laki";
            }else{
                echo"Perempuan";
            } ?></td>
            <td><?php if($r['kelas']=="0"){
                echo "XI RPL";
            }elseif($r['kelas']=="1"){
                echo"XI TKJ";
            }else{
                echo "XI Multimedia";
            }?></td>
            <td><?= $r['Alamat']; ?></td>
            <td><a href="?hapus&nisn=<?= $r['nisn']; ?>">Hapus</a>
                <a href="layout_EditSiswa.php?nisn=<?= $r['nisn']; ?>">Edit</a</td>
        </tr>
<?php $no++; } ?>
    </table>

<?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?>

    <hr />
    <?php include("footer.php"); ?>
    </center>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $nisn = $_GET['nisn'];
    $hapus = mysqli_query($connect, "DELETE FROM siswa WHERE nisn='$nisn'");
    if($hapus){
        ?>
            <script>
            alert("Data Berhasil Dihapus");
            document.location.href="main_layout.php";
            </script>
        <?php
    }else{
        echo "<script>alert('Maaf, Data GAGAL Dihapus');
        </script>";
    }
}
?>