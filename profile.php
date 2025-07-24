<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Kütüphane Profil</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/navbar.css">
  <style>
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropbtn {
      background-color: #4CAF50;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
    }

    .dropbtn:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
  <?php include("navbar.php"); ?>
  <main>
    <section id="profil">
      <h2>Profil Bilgileri</h2>
      <div class="profile-info">
        <?php
        // Database connection
        include("baglanti.php");
        session_start();

        $user_id = $_SESSION['user_id'];

        // Kullanıcı bilgilerini al
        $user_query = "SELECT * FROM users WHERE user_id = '$user_id'";
        $user_result = $conn->query($user_query);

        if ($user_result->num_rows > 0) {
            $user_row = $user_result->fetch_assoc();
            echo "<p><strong>Kullanıcı Adı:</strong> " . $user_row['username'] . "</p>";
            echo "<p><strong>E-posta:</strong> " . $user_row['email'] . "</p>";
            // Diğer kullanıcı bilgilerini buraya ekleyebilirsiniz
        } else {
            echo "<p>Kullanıcı bulunamadı.</p>";
        }

        $conn->close();
        ?>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Ayarlar</button>
        <div class="dropdown-content">
          <a href="chpassw.php">Şifre Değiştir</a>
          <a href="logout.php">Çıkış Yap</a>
        </div>
      </div>
    </section>
  </main>
  <?php include("footer.php"); ?>
</body>
</html>
