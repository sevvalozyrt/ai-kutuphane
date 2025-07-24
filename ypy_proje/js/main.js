/* Kayıt Sayfası Şifre Kontrol */
function sifreKontrol() {
    var sifre = document.getElementById("sifre").value;
    var sifre_tekrar = document.getElementById("sifre_tekrar").value;

    if (sifre !== sifre_tekrar) {
        alert("Şifreler eşleşmiyor.");
        return false;
    }
    return true;
}

/* Favorile */
var fav = document.getElementById("favorile");
var kirmizi = false;
var etiket = document.getElementById("fav_etiket");

fav.addEventListener("click", function () {
    if (kirmizi) {
        document.getElementById("kalp").src = "sources/empty_heart.jpg";
    } else {
    document.getElementById("kalp").src = "sources/full_heart.jpg";
    }
    kirmizi = !kirmizi;
});

function yildizla (i) {
    var dolu = "sources/star_full.png";
    var bos = "sources/star_empty.png";
    if (i < 5) {
        var x = 5;
        while (x > i) {
            var kimlik = "star" + x.toString();
            document.getElementById(kimlik).src = bos;
            x--;
        }
    }
    while (i > 0) {
        var kimlik = "star" + i.toString();
        document.getElementById(kimlik).src = dolu;
        i--;
    }
}

var y1 = document.getElementById("yildiz1");
var y2 = document.getElementById("yildiz2");
var y3 = document.getElementById("yildiz3");
var y4 = document.getElementById("yildiz4");
var y5 = document.getElementById("yildiz5");

y1.addEventListener("click", function () {
    yildizla(1);
});
y2.addEventListener("click", function () {
    yildizla(2);
});
y3.addEventListener("click", function () {
    yildizla(3);
});
y4.addEventListener("click", function () {
    yildizla(4);
});
y5.addEventListener("click", function () {
    yildizla(5);
});

/*
function yildizla (yildiz) {
    var resim = "sources/star_full.png"
    document.getElementById("star1").src = resim;
    if (yildiz == "yildiz2") {
        document.getElementById("star2").src = resim;
    }
    else if (yildiz === "yildiz3") {
        document.getElementById("star2").src = resim;
        document.getElementById("star3").src = resim;
    }
    else if (yildiz === "yildiz4") {
        document.getElementById("star2").src = resim;
        document.getElementById("star3").src = resim;
        document.getElementById("star4").src = resim;
    }
    else if (yildiz === "yildiz5") {
        document.getElementById("star2").src = resim;
        document.getElementById("star3").src = resim;
        document.getElementById("star4").src = resim;
        document.getElementById("star5").src = resim;
    }
}
*/