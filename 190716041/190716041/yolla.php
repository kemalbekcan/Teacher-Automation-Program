<?php
ob_start();
ob_flush();
/* veri tabanı bağlantı cümlemizi dosyamıza dahil ettik. */
require_once("baglan.php");


/* post edilmiş formlardan aldığımız verileri bir değişken içine aldık*/
$ad = $_POST['lname'];
$kod = $_POST['lcode'];
$tsid = $_POST['tsid'];
$pid = $_POST['pid'];

/* bir değişken içinde mysql komut cümlemiz ile veri tabanına veri eklemesi için kod yazdık */
$ekle="INSERT INTO lectures (Lcode,Lname,TSid,Pid) values ('$kod','$ad',$tsid,$pid)";

/* sorgumuzu çalıştırdığımızda işlem başarılı olur ise veri eklendi yazısı ve bir buton çıkacak
yine aynı şekilde başarısız olursa hata oluştu yazısı çıkacak ve altında buton çıkacak bu
butonlara basıldığın da anasayfaya yönlendirecek
*/
if(mysqli_query($con,$ekle)){
    echo "Veriler Eklendi </br><a href='home.php'>Geri Dön</a>";
}else{
    echo "Bir Hata Oluştu </br><a href='home.php'>Geri Dön</a>";
}


?>
