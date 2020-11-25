<?php

session_start();
#eğer kullanıcı giriş yapmamış ise index.html sayfasına yönlendirir.
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Salihli Meslek Yüksekokulu</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Salihli Meslek Yüksekokulu</h1>
				<?php
				#TSid si 1 olan kişide sadece ders ekleme menüsü gözükecek
				if($_SESSION['TSid']== 1){
					echo "<a href = 'ekle.php'><i class='fas fa-address-book'></i>Ders Ekle</a>";
				}
				?>
				<a href="lectures.php"><i class="fas fa-book-reader"></i>Derslerim</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Hesap Bilgileri</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Çıkış</a>
			</div>
		</nav>
		<div class="content">
			<h2>Anasayfa</h2>
			<p>Hoşgeldin, <?=$_SESSION['TSname']?>!</p>
		</div>
	</body>
</html>