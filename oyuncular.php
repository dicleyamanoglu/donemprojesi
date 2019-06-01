<!DOCTYPE html>
<html lang="tr">
<head>
<title>İZMİR DEVLET TİYATROLARI</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="oyunoyuncu.css" rel="stylesheet">
</head>
<body>

<div class="sidenav">
  <a href="sidenav.html">Anasayfa</a>
  <a href="admin.php">Yönetici Paneli</a>
  <a href="oyuncular.php">Oyuncular</a>
  <a href="oyunlar.php">Oyunlar</a>
</div>

<div class="content">
<?php
require ("connection.php");
$sorgula=mysqli_query($baglan,"SELECT * FROM oyuncular");
echo "<table border='1'>";
echo "<tr>";
echo "<th>Ad Soyad</th>";
echo "<th>E-mail</th>";
echo "</tr>";
echo "<tr>";
while ($row=mysqli_fetch_array($sorgula)){
echo "<td>".$row["ad_soyad"]."</td>";
echo "<td>".$row["email"]."</td>";
echo "</tr>";
}
?>
</div>

<div class="dropdown">
    <button class="dropbtn">Dicle Yamanoğlu</button>
    <div class="dropdown-content">
        <a href="#">Ayarlar</a>
        <a href="login.html">Çıkış Yap</a>
    </div>
</div>
</body>
</html>