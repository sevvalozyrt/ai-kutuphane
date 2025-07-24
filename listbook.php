<?php
// Database connection
include("baglanti.php");
session_start();


// Okunanlar listesine kitap ekleme işlevi
if(isset($_POST["okunanlara_ekle"])) {
    $book_id = $_POST["book_id"];
    $user_id = $_SESSION['user_id'];
    
    // Okunanlar tablosunda bu kitap ve kullanıcı var mı kontrol et
    $check_query = "SELECT * FROM okunanlar WHERE user_id = '$user_id' AND book_id = '$book_id'";
    $check_result = $conn->query($check_query);
    
    if($check_result->num_rows == 0) { // Eğer kullanıcı bu kitabı okumamışsa
        // Okunanlar tablosuna kitabı ekle
        $add_query = "INSERT INTO okunanlar (user_id, book_id) VALUES ('$user_id', '$book_id')";
        if($conn->query($add_query) === TRUE) {
            echo "<script>alert('Kitap okundu olarak işaretlendi.');</script>";
        } else {
            echo "Hata: " . $conn->error;
        }
    } else {
        echo "<script>alert('Bu kitap zaten okundu olarak işaretlenmiş.');</script>";
    }
}

// Okunacaklara kitap ekleme işlevi
if(isset($_POST["okunacaklara_ekle"])) {
    $book_id = $_POST["book_id"];
    $user_id = $_SESSION['user_id'];
    
    // Okunacaklar tablosuna bu kitabı ve kullanıcıyı ekle
    $add_query = "INSERT INTO okunacaklar (user_id, book_id) VALUES ('$user_id', '$book_id')";
    if($conn->query($add_query) === TRUE) {
        echo "<script>alert('Kitap okunacaklar listesine eklendi.');</script>";
    } else {
        echo "Hata: " . $conn->error;
    }
}

// Favorilere kitap ekleme işlevi
if(isset($_POST["favorilere_ekle"])) {
    $book_id = $_POST["book_id"];
    $user_id = $_SESSION['user_id'];
    
    // Favoriler tablosuna bu kitabı ve kullanıcıyı ekle
    $add_query = "INSERT INTO fav (user_id, book_id) VALUES ('$user_id', '$book_id')";
    if($conn->query($add_query) === TRUE) {
        echo "<script>alert('Kitap favorilere eklendi.');</script>";
    } else {
        echo "Hata: " . $conn->error;
    }
}


// Fonksiyon tanımı
function listBooksByGenre($genre)
{
    global $conn; // Veritabanı bağlantısını fonksiyon içinde kullanabilmek için global anahtar kelimesiyle tanımlıyoruz.

    // Her bir tür için aynı yapıdaki HTML bloğunu oluştur
    echo '<section id="' . strtolower($genre) . '">';
    echo '<h2>' . $genre . '</h2>';
    echo '<div class="book-list">';
    
    // Her bir tür için ilgili kitapları çek
    $book_query = "SELECT * FROM books WHERE categories = '$genre'";
    $book_result = $conn->query($book_query);
    if ($book_result->num_rows > 0) {
        while ($book_row = $book_result->fetch_assoc()) {
            $book_id = $book_row['id'];
            echo '<div class="book">';
            echo '<img src="' . $book_row['cover_image'] . '" alt="' . $book_row['title'] . '">';
            echo '<h3>' . $book_row['title'] . '</h3>';
            echo '<p>Yazar: ' . $book_row['author'] . '</p>';
            // Okunanlar listesinde kitap kontrolü
            if (checkBookInReadList($book_id)) {
                echo '<button disabled>Okunanlara Ekle</button>'; // Eğer okunanlar listesindeyse butonu devre dışı bırak
                echo '<button type="submit" name="okunacaklara_ekle">Okunacaklara Ekle</button>';
            } else {
                echo '<form action="#" method="post">';
                echo '<input type="hidden" name="book_id" value="' . $book_id . '">';
                echo '<button type="submit" name="okunanlara_ekle">Okunanlara Ekle</button>';
                echo '<button type="submit" name="okunacaklara_ekle">Okunacaklara Ekle</button>';
            }
            echo '<button type="submit" name="favorilere_ekle">Favorilere Ekle</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo "<p>Bu tür için kitap bulunamadı.</p>";
    }
    
    echo '</div>';
    echo '</section>';
}

// Okunanlar listesinde kitap kontrolü
function checkBookInReadList($book_id) {
    global $conn;
    $user_id = $_SESSION['user_id'];
    
    $query = "SELECT * FROM okunanlar WHERE user_id = '$user_id' AND book_id = '$book_id'";
    $result = $conn->query($query);
    
    return ($result->num_rows > 0) ? true : false;
}


?>



