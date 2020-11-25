<?php

session_start();
// eğer kullanıcı giriş yapmamışsa index sayfasına yönlendirilecek
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
// giriş için gerekli connnection bilgileri ve komutları
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = '190716041';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// database üzerinde dil utf8_general ayarlanacak ve aşağıdaki kod ile türkçe karakter sorunu ortadan kalacak.
mysqli_set_charset ( $con, "utf8" );

if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
 //Session bilgileri // Bind parametreleri (s = string, i = int, b = blob, vb.), bizim aşağıdaki cümlemizde TSid int olduğu için i harfi kullanılacak
$stmt = $con->prepare('SELECT password, email FROM teachingstafs WHERE TSid = ?');
$stmt->bind_param('i', $_SESSION['TSid']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
$TSid=$_SESSION['TSid'];






?>
<!DOCTYPE html>
<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Derslerim</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Salihli Meslek Yüksekokulu</h1>
				<a href="home.php"><i class="fas fa-home"></i>Anasayfa</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Hesap Bilgileri</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Çıkış</a>
			</div>
		</nav>
		<div class="content">
			<h2>Ders Bilgileri</h2>
			<div>
				<p>Dersleriniz ve Sınav Şekliniz aşağıdaki gibidir</p>
								


								<?php
									
							
										/* komut cümlemize göre aşşağıda select nesnelerinin içine ders kodumuz
										ve ders adımızı çektik aynı zamanda dersid değerimizi veri tabanına yolladık */
										$sonuc = mysqli_query($con,'SELECT Lid,Pid,Lname,Lcode FROM lectures where TSid='.$TSid);    
										
									 
										?> 
										<!--formlardan aldığımız verileri post metodu ile dersver.php ye gönderiyoruz. -->
										<form action="dersver.php" method="post">
														
											
											
											
										<select name="exams" id="exams">
										<option >Lütfen bir ders seçiniz</option>
										<?PHP 
										while( $row = mysqli_fetch_array( $sonuc ) ){ ?> 
										<option value="<?php echo $row[0] ?>" ><?PHP echo $row['Lcode']." - ".$row['Lname']  ; ?></option>

										
										<?PHP } ?> 
										  </select>
															<br>
											
											
											<br>
											
											<!-- komut cümlemize göre aşşağıda select nesnelerinin içine programid yi
										çektik aynı zamanda programid değerimizi veri tabanına yolladık -->
											
											<select name="pid">
         							<option >Bölüm Seçiniz</option>
        
                					<?PHP $sonuc = mysqli_query($con,'SELECT Pid,Pname FROM programs');
                                        while( $row = mysqli_fetch_array( $sonuc ) ){ ?> 
                                        <option value="<?php echo $row[0] ?>" ><?PHP echo ($row["Pname"]) ; ?></option> 
                                  <?PHP } ?>
                
      </select><br><br>
											
											
											
											
											<!-- komut cümlemize göre aşşağıda radio button nesnelerinin içine sınav
										tipini çektik aynı zamanda sınavtipid değerimizi veri tabanına yolladık -->
															
																<?php 
																$komut = mysqli_query($con,"SELECT ETypeid,type FROM examtypes");
																
															
										while( $row = mysqli_fetch_array( $komut ) ){ ?> 
										
															<input type='radio' name='etype' value='<?php echo $row[0] ?>'/><?php echo $row['type'] ?>
															<br>
																
															
																<?PHP } ?> 
																
																
																
																
															
															<br>
															<input type="submit" name="gonder" value="Kaydet"/><br/>
															</form>
														
											


			</div>
		</div>
	</body>
</html>