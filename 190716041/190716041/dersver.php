<?php 

#kullanıcının giriş özelliklerinin bu sayfada devam etmesini sağladık eğer giriş yapmamışsa index sayfasına yönlendirilecek
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
ob_start();


ob_flush();
/* veri tabanı bağlantı cümlemizi dosyamıza dahil ettik. */
require_once("baglan.php");

/* post edilmiş formlardan aldığımız verileri bir değişken içine aldık*/
$tsid = $_SESSION["TSid"];
$lid = $_POST["exams"];
$pid = $_POST["pid"];
$gonder = $_POST["gonder"];
$ETypeid = $_POST["etype"];


/* bir değişken içinde mysql komut cümlemiz ile veri tabanına veri eklemesi için kod yazdık */
$komut = "INSERT INTO exams (TSid, Lid, Pid, ETypeid) VALUES ($tsid,$lid,$pid,$ETypeid)";

/* sorgumuzu çalıştırdığımızda işlem başarılı olur ise veri eklendi yazısı ve bir buton çıkacak
yine aynı şekilde başarısız olursa hata oluştu yazısı çıkacak ve altında buton çıkacak bu
butonlara basıldığın da anasayfaya yönlendirecek
*/
if(mysqli_query($con,$komut)){
    echo "Veriler Eklendi </br><a href='home.php'>Geri Dön</a>";
}else{
    echo "Bir Hata Oluştu </br><a href='home.php'>Geri Dön</a>";
}




?>
