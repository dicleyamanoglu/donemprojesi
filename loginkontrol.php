<?php
require("connection.php");
$sorgula=mysqli_query($baglan,"SELECT email,sifre FROM uyelik 
WHERE email='".$_POST["email"]."' AND sifre='".$_POST["sifre"]."'");
if(mysqli_num_rows($sorgula)>0){
	header("Location:sidenav.html");
}else{
echo "Kullanıcı Adı ve Parola Yanlış";
}

?>
