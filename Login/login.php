<?php
session_start();
if(isset($_SESSION['username'])){
    header("location:../Utama/main_layout.php");
}
?>
<html>
    <head>
    <div class="kotak">
        <title>ADMIN LOGIN PAGE</title>
        <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <div class="atas">
    <form action="proseslogin.php" method="POST">
        LOGIN ADMIN
    </div>
    <div id="bawah">
        <input class="masuk" type="text" name = "username" placeholder="Username" id="username" autocomplete="off" required>

        <input class="masuk" type="password" name= "password" placeholder="Password" id="password" autocomplete="off" required>

        <input class="tombol" type="submit" value="LOG IN" id="login" name="login">
    </div>
</div>
    </form>
</body>
</html>