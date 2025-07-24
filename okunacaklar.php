<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Kütüphane Okunacak Kitaplar</title>
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  
    <?php
    include("navbar.php");
    ?>
    
  <main>
    
    <section id="okunacaklar">
      <h2>Okunacak Kitaplar</h2>
      <div class="book-list">
        <?php
        // Database connection
        include("baglanti.php");
        session_start();

        $user_id = $_SESSION['user_id'];

        // Fetch read books
        $query = "SELECT books.title, books.author, books.cover_image 
                  FROM okunacaklar 
                  JOIN books ON okunacaklar.book_id = books.book_id 
                  WHERE okunacaklar.user_id = '$user_id'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="book">';
                echo '<img src="' . $row['cover_image'] . '" alt="' . $row['title'] . '">';
                echo '<h3>' . $row['title'] . '</h3>';
                echo '<p>Yazar: ' . $row['author'] . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>Henüz okunacak kitap yok.</p>";
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
