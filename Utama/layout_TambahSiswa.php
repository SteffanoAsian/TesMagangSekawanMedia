<?php
session_start();
require_once("../Connect.php");
if(!isset($_SESSION['username'])){
    header("location:../Login/login.php");
}else{
    $username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="layout.css">
  </head>
  <body>

    <input type="checkbox" id="check">
    <header>
      <div class="left_area">
        <h3>Aplikasi Data <span>Siswa</span></h3>
      </div>
      <div class="right_area">
        <a href="../Login/logout.php" class="logout_btn">Logout</a>
      </div>
    </header>
     
    </div>
    <div class="content">
    <?php
    include("tambah_siswa.php");
    ?>
    </div>
  </body>
</html>
      