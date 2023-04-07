<?php
$plik_adresow = "adresy.txt";

// Otwórz plik z adresami
if (file_exists($plik_adresow)) {
    $adresy = file($plik_adresow, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
} else {
    die("Nie udało się otworzyć pliku z adresami.");
}

// Utwórz listę odnośników w postaci HTML
echo "<ul>";
foreach ($adresy as $adres) {
    list($url, $opis) = explode(";", $adres);
    echo "<li><a href=\"$url\">$opis</a></li>";
}
echo "</ul>";
?>
