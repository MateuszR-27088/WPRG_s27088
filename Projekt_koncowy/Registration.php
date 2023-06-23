<?php
// Logika rejestracji użytkownika

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobranie danych z formularza rejestracji
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Zapisanie danych użytkownika (np. do bazy danych)

    // Przekierowanie na stronę logowania
    header('Location: Login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rejestracja</title>
</head>
<body>
<h1>Rejestracja</h1>

<form method="POST" action="">
    <label for="username">Login:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Hasło:</label>
    <input type="password" name="password" id="password" required><br>

    <input type="submit" value="Zarejestruj">
</form>

<p><a href="MainPage.php">Powrót do strony głównej</a></p>
</body>
</html>
