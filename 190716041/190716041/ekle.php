<?php require_once('baglan.php'); 
session_start();
// eğer kullanıcı giriş yapmamışsa index sayfasına yönlendirilecek
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ders Ekle</title>
		<link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <style>
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 300px;
            background-color: #4a536e;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #4a535f;
            width: 100%;
            transition: width 2s;
        }
        .content h2 {
	        margin: 0;
	        padding: 25px 0;
	        font-size: 22px;
	        border-bottom: 1px solid #e0e0e3;
	        color: #4a536e;
        }
        .content h3 {
	        margin: 0;
	        padding: 25px 0;
	        font-size: 22px;
	        border-bottom: 0px solid #e0e0e3;
	        color: #4a536e;
        }
        .content form fieldset legend h2{
	        margin: 0;
	        padding: 25px 0;
	        font-size: 22px;
	        border-bottom: 0px solid #e0e0e3;
	        color: #4a536e;
        }
        form{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 100%;
        }
        form:hover{
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.5);
        }
        </style>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Salihli Meslek Yüksekokulu</h1>
				<a href="home.php"><i class="fas fa-home"></i>Anasayfa</a>
				<a href="lectures.php"><i class="fas fa-user-circle"></i>Derslerim</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Hesap Bilgileri</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Çıkış</a>
			</div>
		</nav>
		<div class="content">
			<h2>Program Bilgileri</h2>
			<div class="form">
                <!--formlardan aldığımız verileri post metodu ile yolla php ye gönderiyoruz. -->
                <form method="POST" action="yolla.php">
                    <fieldset>
                        <legend><h2 class="nonebottom">Ders Ekle:</h2></legend>

                

                <label>
                    <h3>Ders Adı</h3>
                </label>
                <!--Veri tabanından ders adı alıp ve select nesnesin de ders adı ile
                 seçilen değeri veri tabanına gönderen kod-->
                <select name="lname">
                <option>--Lütfen Ders Seçiniz--</option>
                <?PHP 
               $sonuc = mysqli_query($con,'SELECT Lname FROM dersadi');
										while( $row = mysqli_fetch_array( $sonuc ) ){ ?> 
										<option value="<?php echo $row[0] ?>" ><?PHP echo $row['Lname'] ; ?></option>
                                            
										
										<?PHP } ?>
                
</select>

                <label>
                    <h3>Ders Kodu</h3>
                </label>
                <!--Veri tabanından derskodu alıp ve select nesnesin de derskodu ile
                 seçilen değeri veri tabanına gönderen kod-->
                <select name="lcode">
                <option>--Lütfen Ders Kodu Seçiniz--</option>
                <?PHP 
               $sonuc = mysqli_query($con,'SELECT Lcode FROM lecturescode');
										while( $row = mysqli_fetch_array( $sonuc ) ){ ?> 
										<option value="<?php echo $row[0] ?>" ><?PHP echo $row['Lcode'] ; ?></option>
                                            
										
										<?PHP } ?>
                
</select>
           
                
             

                            <label>
                    <h3>Öğretim Görevlisi</h3>
                </label>

          <!--Veri tabanından öğretmenid ve öğretmen adlarını alıp select nesnesin de öğretmen 
             adlarını gösteren kod ve seçilen değeri veri tabanına gönderen kod-->
                <select name="tsid">
                <option>--Lütfen Öğretim Üyesi Seçiniz--</option>
               <?PHP 
               $sonuc = mysqli_query($con,'SELECT TSid,TSname FROM teachingstafs');
										while( $row = mysqli_fetch_array( $sonuc ) ){ ?> 
										<option value="<?php echo $row[0] ?>" ><?PHP echo $row['TSname'] ; ?></option>
                                            
										
										<?PHP } ?>
                </select>
                <label>
                    <h3>Program Adı</h3>
                </label>

             <!--Veri tabanından programid ve program adlarını alıp select nesnesin de program 
             adlarını gösteren kod ve seçilen değeri veri tabanına gönderen kod-->
                <select name="pid">

                <option>--Lütfen Program Seçiniz--</option>
                  <?php 
                $sonuc = mysqli_query($con,'SELECT Pid,Pname FROM programs');
										while( $row = mysqli_fetch_array( $sonuc ) ){ ?> 
										<option value="<?php echo $row[0] ?>" ><?PHP echo $row['Pname'] ; ?></option>

										<?PHP } ?>
                </select>
                <br>
                <br>
                <input type = "submit" value = "Kayıt Et">
                </fieldset>
                </form>
			</div>
		</div>
	</body>
</html>