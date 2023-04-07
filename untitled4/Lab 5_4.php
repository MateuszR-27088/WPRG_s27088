<?php
$plik_adresow = "adresy.txt";
$adres_uzytkownika = $_SERVER['REMOTE_ADDR'];

// Otwórz plik z adresami IP
if (file_exists($plik_adresow)) {
    $adresy = file($plik_adresow, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
} else {
    die("Nie udało się otworzyć pliku z adresami IP.");
}

// Sprawdź, czy adres IP użytkownika znajduje się na liście
if (in_array($adres_uzytkownika, $adresy)) {
    header("Location: https://innastrona.pl");
    exit;
} else {
    echo "Przepraszamy, ale nie masz dostępu do tej strony.";
}
?>
