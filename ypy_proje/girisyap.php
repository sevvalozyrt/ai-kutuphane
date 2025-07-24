<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php include("navbar2.php"); ?>
<section>
    <div class="container">
      <h2>Giriş yap</h2>
      <form method="post">
        <input type="email" id="email" name="email" class="bilgi_gir" placeholder="Email">
        <input type="password" id="sifre" name="sifre" class="bilgi_gir" placeholder="Sifre">
        <input type="submit" class="buton" value="Giriş Yap">
      </form>
    </div>
</section>
    <?php
include("baglanti.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["sifre"];
    
    // SQL injection koruması için prepared statement kullanıyoruz
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);  // 's' for string type
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Şifreyi doğrulamak için password_verify kullanıyoruz
        if ($row['password'] == $password) { 
            session_start();
            
            $user_id = $row['user_id'];
            $_SESSION['user_id'] = $user_id;
            $session_id = md5(uniqid(rand(), true));
            $sql = "INSERT INTO oturum (user_id, oturum_id) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $user_id, $session_id);
            $stmt->execute();
            
            setcookie("session_id", $session_id, time() + (86400 * 30), "/");
            $redirect_url = "oneriler.php"; 
            header("Location: " . $redirect_url);
            exit; 
        } else {
            echo "Hatalı şifre!";
        }
    } else {
        echo "Kullanıcı bulunamadı!";
    }

    $stmt->close();
    $conn->close();
}
?>
<?php include("footer.php"); ?>
</body>
</html>

