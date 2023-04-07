<?php
$licznik_pliku = "licznik.txt";

// Jeśli plik nie istnieje, utwórz go i ustaw liczbę odwiedzin na 1
if (!file_exists($licznik_pliku)) {
    $licznik = 1;
    file_put_contents($licznik_pliku, $licznik);
} else {
    // Otwórz plik i zwiększ licznik o 1
    $licznik = intval(file_get_contents($licznik_pliku)) + 1;
    file_put_contents($licznik_pliku, $licznik);
}

// Wyświetl liczbę odwiedzin na stronie
echo "Liczba odwiedzin: " . $licznik;
?>
