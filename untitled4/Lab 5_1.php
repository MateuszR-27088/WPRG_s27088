<!DOCTYPE html>
<html>
<head>
    <title>Formularz z wyborem pliku</title>
</head>
<body>
<h1>Formularz z wyborem pliku</h1>
<form action="odbierz_plik.php" method="POST" enctype="multipart/form-data">
    <label for="plik">Wybierz plik:</label>
    <input type="file" name="plik" id="plik"><br>
    <input type="submit" value="Wyślij">
</form>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plik = $_FILES["plik"]["tmp_name"];

    if (is_uploaded_file($plik)) {
        $handle = fopen($plik, "r");
        $lines = file($plik);
        $lines = array_reverse($lines);
        fclose($handle);
        $handle = fopen($plik, "w");
        fwrite($handle, implode("", $lines));
        fclose($handle);
        echo "Kolejność wierszy w pliku została odwrócona.";
    } else {
        echo "Nie udało się przesłać pliku.";
    }
}

?>

