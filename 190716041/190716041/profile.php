<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = '190716041';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('MySQL bağlantı hatası ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT password, email FROM teachingstafs WHERE TSid = ?');
//Session bilgileri // Bind parametreleri (s = string, i = int, b = blob, vb.), bizim aşağıdaki cümlemizde TSid int olduğu için i harfi kullanılacak
$stmt->bind_param('i', $_SESSION['TSid']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Hesap Bilgileri</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Salihli Meslek Yüksekokulu</h1>
				<a href="home.php"><i class="fas fa-home"></i>Anasayfa</a>
				
				
				
				<a href="lectures.php"><i class="fas fa-book-reader"></i>Derslerim</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Hesap Bilgileri</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Çıkış</a>
			</div>
		</nav>
		<div class="content">
			<h2>Kullanıcı Bilgileri</h2>
			<div>
				<p>Hesabınızın Detayları aşağıdaki gibidir</p>
				<table>
					<tr>
						<td>Kullanıcı Adı:</td>
						<td><?=$_SESSION['TSname'] . " " . $_SESSION['TSsurname']?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$_SESSION['email']?></td>
						
					</tr>
					
				</table>
			</div>
		</div>
	</body>
</html>