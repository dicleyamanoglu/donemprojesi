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


</div>
<div class="dropdown">
    <button class="dropbtn">Dicle Yamanoğlu</button>
    <div class="dropdown-content">
        <a href="#">Ayarlar</a>
        <a href="login.html">Çıkış Yap</a>
    </div>
</div>

<div class="dropdown1">
    <button class="dropbtn" style="position:absolute; left:225px; "><a href="grafik.php">Sezon İzlenme</button>
	<button class="dropbtn"style="position:absolute; left:365px;"><a href="grafik1.php">Bilet Satış</button>
	<button class="dropbtn"style="position:absolute; left:465px;"><a href="grafik2.php">Oyuna Göre Satış</button>
	<button class="dropbtn"style="position:absolute; left:625px;"><a href="grafik3.php">Katılım Oranları</button>
</div>


<?php
	$baglanti=mysqli_connect("localhost","root","","tiyatro");
	$sorgu=mysqli_query($baglanti,"SELECT oyun_adi,tam_satis,ogrenci_satis from oyun_izleyici");
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Oyunlar', 'Tam Satış', 'Öğrenci Satış'],
           <?php
			foreach($sorgu as $row){
			echo "['".$row["oyun_adi"]."',".$row["tam_satis"].",".$row["ogrenci_satis"]."],";
			}
?>
        ]);

        var options = {
          chart: {
          title: 'Bilet Satış',
            
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#FFA500', '#8B0000', '#7570b3']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
	  
	  
	  
	  
	  
 </script>

</div>

<div id="chart_div" style= "width:55%; height:50%;left:210px; position:absolute; top:150px;"></div>
</body>


