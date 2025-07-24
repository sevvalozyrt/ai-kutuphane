<?php
include("baglanti.php");
session_start();
$user_id = $_SESSION['user_id'];                                           
$sql = "SELECT yorums.metin, users.username, rating.puan FROM yorums  JOIN users ON yorums.user_id = users.user_id 
 JOIN rating ON yorums.user_id = rating.user_id "; 
    $result = $conn->query($sql); 
            
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo  "
        <div class='yorum'>   
             <p> <label id='yorum_isim'>".$row["username"]."</label> </p>
             <p>  <img id='yorum_puan' src='sources/rating".$row["puan"].".png'></p>
             <label>   ".$row["metin"]." </label> 
         
        <div>"; 
        }
    }
 else {
    echo "";
    
}
$conn->close();

?>