<!DOCTYPE html>
<html lang="tr">
<head>
<title>İZMİR DEVLET TİYATROLARI</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="admincss.css" rel="stylesheet">
</head>
<body>



<div class="sidenav">
  <a href="sidenav.html">Anasayfa</a>
  <a href="admin.php">Yönetici Paneli</a>
  <a href="oyuncular.php">Oyuncular</a>
  <a href="oyunlar.php">Oyunlar</a>
</div>

<div class="content">
<h1>Grafikler</h1>

<form name="forumadi">
  <p>
  <select style=" width: 180px; position:absolute;right:680px;top:120px;" onchange="javascript:document.location=document.forumadi.kategori.options[document.forumadi.kategori.selectedIndex].value" name="kategori">
  <option class="option" value selected>» Seçin</option>
  <option class="option" value="grafik4.php">2017-2018</option>
  <option class="option" value="grafik3.php">2018-2019</option>
  </select></p>
</form>



</div>
<div class="dropdown">
    <button class="dropbtn">Dicle Yamanoğlu</button>
    <div class="dropdown-content">
        <a href="#">Ayarlar</a>
        <a href="login.html">Çıkış Yap</a>
    </div>
</div>

<div class="dropdown1">
    <button class="dropbtn" style="position:absolute; left:225px;"><a href="grafik.php">Sezon İzlenme</button>
	<button class="dropbtn"style="position:absolute; left:365px;"><a href="grafik1.php">Bilet Satış</button>
	<button class="dropbtn"style="position:absolute; left:465px;"><a href="grafik2.php">Oyuna Göre Satış</button>
	<button class="dropbtn"style="position:absolute; left:625px;"><a href="grafik3.php">Katılım Oranları</button>

</div>


<?php
	$baglanti=mysqli_connect("localhost","root","","tiyatro");
	$sorgu=mysqli_query($baglanti,"SELECT ilceler.ilce_ad,ilceler.katilim FROM ilceler WHERE ilceler.katilim>ilceler.ortalama");
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ilce_ad', 'katilim '],
             <?php
			foreach($sorgu as $row){
			echo "['".$row["ilce_ad"]."',".$row["katilim"]."],";
			}
			?>
        ]);

        var options = {
          title: 'İlçelere Göre Ortalamanın Üstündeki Katılım Oranları 2018',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

<div id="donutchart" style="width: 450px; height: 400px; position:absolute;left:250px;top:150px; "></div>


</body>