
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Kütüphane Anasayfa</title>
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/styles.css">
  <style>
    /* CSS still the same */
  </style>
</head>
<body>
  <?php 
  session_start();
  include("navbar.php"); 
  include("listbook.php"); 
  include("baglanti.php") ?>
  <main>
    <?php
    // Her bir tür için fonksiyonu çağırarak HTML bloğunu oluştur
    
        listBooksByGenre('Biyografi&Otobiyografi');
    
    ?>
  </main>
  <?php
    include("footer.php");
  ?>
</body>
</html>