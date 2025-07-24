<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Kütüphane Okunan Kitaplar</title>
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  
    <?php
    include("navbar.php");
    ?>
    
  <main>
    
    <section id="okunanlar">
      <h2>Okunan Kitaplar</h2>
      <div class="book-list">
        <?php
        // Database connection
        include("baglanti.php");
        session_start();

        $user_id = $_SESSION['user_id'];

        // Fetch read books
        $query = "SELECT books.book_id, books.title, books.author, books.cover_image 
                  FROM okunanlar 
                  JOIN books ON okunanlar.book_id = books.book_id 
                  WHERE okunanlar.user_id = '$user_id'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="book">';
                echo '<img src="' . $row['cover_image'] . '" alt="' . $row['title'] . '">';
                echo '<h3>' . $row['title'] . '</h3>';
                echo '<p>Yazar: ' . $row['author'] . '</p>';
                // Okunanlardan çıkar butonu
                echo '<form action="#" method="post">';
                echo '<input type="hidden" name="book_id" value="' . $row['id'] . '">';
                echo '<button type="submit" name="okunanlardan_cikar">Okunanlardan Çıkar</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "<p>Henüz okunan kitap yok.</p>";
        }
        if (isset($_POST['okunanlardan_cikar'])) {
          $book_id = $_POST['book_id'];
      
          // Okunanlardan kitabı çıkar
          $delete_query = "DELETE FROM okunanlar WHERE user_id = '$user_id' AND book_id = '$book_id'";
          if ($conn->query($delete_query) === TRUE) {
              // Başarıyla çıkarıldıktan sonra sayfayı yeniden yükle
              echo '<script>window.location.href = window.location.href;</script>';
          } else {
              echo "Error: " . $delete_query . "<br>" . $conn->error;
              // Hata durumunda kullanıcıya uyarı verilebilir
              echo "<script>alert('Kitap okunanlar listesinden çıkarılamadı.');</script>";
          }
      }
      

        $conn->close();
        ?>
      </div>
    </section>
    
  </main>
  <?php
    include("footer.php");
    ?>
</body>
</html>
