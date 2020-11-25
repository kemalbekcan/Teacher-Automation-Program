<?php

// veri tabanına bağlanması için gerekli bilgileri bir değişken içinde tuttuk
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = '190716041';
// veri tabanı bağlantımızı çalıştırdık
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// database üzerinde dil utf8_general ayarlanacak ve aşağıdaki kod ile türkçe karakter sorunu ortadan kalacak.
mysqli_set_charset ( $con, "utf8" );

if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


?>
