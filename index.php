<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Kütüphane - Kitaplarla Dolu Bir Dünya</title>
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php include("navbar2.php"); ?>
  <section id="hero">
    <div class="container">
      <h2>Kitaplarla Dolu Bir Dünya</h2>
      <p>Binlerce kitabı keşfedin ve okuma deneyiminizi bir üst seviyeye taşıyın.</p>
      <a href="#hakkimizda" class="btn">Daha Fazla Bilgi</a>
    </div>
  </section>

  <section id="hakkimizda">
    <div class="container">
      <h2>Hakkımızda</h2>
      <p>E-Kütüphane, kitap severlere geniş bir kitap yelpazesi sunan bir dijital platformdur. Amacımız, okuma alışkanlıklarını geliştirmek ve herkesin istediği kitaba kolayca ulaşabilmesini sağlamaktır.</p>
    </div>
  </section>

  <section id="iletisim">
    <div class="container">
      <h2>İletişim</h2>
      <p>Bizimle iletişime geçmek için aşağıdaki formu doldurun:</p>
      <form action="send_message.php" method="post">
        <input type="text" name="name" placeholder="Adınız" required>
        <input type="email" name="email" placeholder="E-posta Adresiniz" required>
        <textarea name="message" placeholder="Mesajınız" required></textarea>
        <input type="submit" value="Gönder">
      </form>
    </div>
  </section>

  <!--
  <section id="kayitol">
    <div class="container">
      <h2>Kayıt Ol</h2>
      <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Kullanıcı Adı" required>
        <input type="email" name="email" placeholder="E-posta Adresiniz" required>
        <input type="password" name="password" placeholder="Şifre" required>
        <input type="submit" value="Kayıt Ol">
      </form>
    </div>
  </section>
-->
<?php include("footer.php"); ?>
</body>
</html>
