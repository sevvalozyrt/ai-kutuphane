<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Kütüphane Öneriler</title>
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/styles.css">
  <style>
    .book {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
      width: calc(25% - 20px);
      box-sizing: border-box;
      transition: transform 0.2s, box-shadow 0.2s;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .book:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .book img {
      height: 270px;
      width: auto;
    }
  </style>
</head>
<body>
    <?php
    include("navbar.php");
    ?>
    <main>
    <section id="oneriler">
        <h2>Sizin İçin Önerilen Kitaplar</h2>
        <div class="book-list">

        <?php
  include("baglanti.php");
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Verileri döngüyle alıp HTML çıktısı oluştur
  while($row = $result->fetch_assoc()) { 
    echo '<div class="book">';
    echo "<img src='" . $row["cover_image"] . "' alt='" . $row["title"] . "'>";
    echo "<h3>" . $row["title"] . "</h3>";
    echo "<p>Yazar: " . $row["author"] . "</p>";
    echo '</div>';
  }
} else {
  echo "Hiç kitap bulunamadı.";
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