<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Kayıt Ol</title>
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php include("navbar2.php"); ?>
<section>
  <div class="container">
    <h2>Kayıt ol</h2>
    <form method="post" onsubmit="return sifreKontrol()">
      <input type="text" id="kullanici_adi" name="kullanici_adi" class="bilgi_gir_kayit" placeholder="Kullanıcı Adı">
      <input type="email" id="email" name="email" class="bilgi_gir_kayit" placeholder="Email">
      <input type="password" id="sifre" name="sifre" class="bilgi_gir_kayit" placeholder="Şifre">
      <br>    
      <small class="kucuk">
        8-20 karakter uzunluğunda olmalıdır.
      </small>
      <input type="password" id="sifre_tekrar" class="bilgi_gir_kayit" placeholder="Şifre Tekrar">
      <br>
      <small class="kucuk">
        8-20 karakter uzunluğunda olmalıdır.
      </small>
      <br>
      <input type="submit" class="buton" value="Kayıt Ol">
    </form>
  </div>
</section>
  <script src="js/main.js"></script>
  <?php include("footer.php"); ?>
</body>
<?php
include("baglanti.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["kullanici_adi"];
    $email = $_POST["email"];
    $password = $_POST["sifre"];

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameters to the placeholders
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Kayıt Başarılı');</script>";
            $redirect_url = "ilgi_alanlari.html";
            header("Location: " . $redirect_url);
            exit;
        } else {
            echo "Hata: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Hata: " . $conn->error;
    }

    $conn->close();
}
?>

</html>

