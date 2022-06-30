<?php 
$sunucu = "localhost";
$kullanici = "root";
$sifre = "";
$veritabani = "bitirme";
$sunucuya_baglan = @mysqli_connect($sunucu, $kullanici, $sifre, $veritabani) or die ("sunucuya bağlanılamadı");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.roww {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.containerr {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-containerr {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
  .roww {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<h2>Bağış talebinde bulunmak için bilgilerinizi giriniz</h2>
<div class="roww">
  <div class="col-75">
    <div class="containerr">
      <form action="" method="POST">
      
        <div class="roww">
          <div class="col-50">
            <h3>İletişim Bilgileri</h3>
            <label for="fname"><i class="fa fa-user"></i> Ad Soyad</label>
            <input type="text" id="fname" name="firstname" placeholder="Ad soyad giriniz...">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="ornek@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Adres</label>
            <input type="text" id="adr" name="address" placeholder="Adresinizi giriniz...">
            <label for="city"><i class="fa fa-institution"></i> Tel No</label>
            <input type="text" id="city" name="phone" placeholder="Telefon numaranızı giriniz...">
            <label for="cvv">Rahatsızlığınız</label>
            <input type="text" id="cvv" name="cvv" placeholder="Rahatsızlığınız...">
            <label for="expyear">Bulunduğunuz Hastane</label>
              <input type="text" id="expyear" name="expyear" placeholder="Hastane isim, adres">
            
          </div>

          <div class="col-50">
            <h3>Kart Bilgileri</h3>
            <label for="fname">Lütfen Kart Seçiniz</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Kartta Bulunan İsim</label>
            <input type="text" id="cname" name="cardname" placeholder="Kartta bulunan ismi giriniz...">
            <label for="ccnum">IBAN Numarası</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <div class="roww">
              </div>
        <input type="submit" value="Ekle" class="btn">
        </div>

      </form>
                  
            </div>
          </div>
<?php

  if ($_POST){
?>
      <div>
        <?php
        $firstname = $_POST["firstname"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $cvv = $_POST["cvv"];
        $expyear = $_POST["expyear"];
        $cardname = $_POST["cardname"];
        $cardnumber = $_POST["cardnumber"];

        if ($firstname=="" and $phone==""){
          echo "Ad Soyad ve Numara gerekli";
        }else{
          $sql= "insert into kisiler set
                              firstname = '$firstname',
                              email = '$email',
                              address = '$address',
                              phone = '$phone',
                              cvv = '$cvv',
                              expyear = '$expyear',
                              cardname = '$cardname',
                              cardnumber = '$cardnumber'";
              
          $ekle = mysqli_query($sunucuya_baglan, $sql);
          if($ekle) {
            echo "Bilgiler Eklendi";
          }else{
            echo "Bilgiler Eklenemedi <br> ";
            echo "Hata:  " . mysqli_error($sunucuya_baglan);
          }
                              
        }
        ?>
      </div>
<?php
 }
 ?>
          
        

</body>
</html>