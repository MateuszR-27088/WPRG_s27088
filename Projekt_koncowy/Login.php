<?php
// Logika logowania użytkownika

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobranie danych z formularza logowania
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sprawdzenie poprawności danych logowania (np. w bazie danych)

    // Ustawienie informacji o zalogowanym użytkowniku w sesji
    session_start();
    $_SESSION['user'] = $username;

    // Przekierowanie na stronę główną
    header('Location: MainPage.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logowanie</title>
</head>
<body>
<h1>Logowanie</h1>

<form method="POST" action="">
    <label for="username">Login:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Hasło:</label>
    <input type="password" name="password" id="password" required><br>

    <input type="submit" value="Zaloguj">
</form>

<p><a href="MainPage.php">Powrót do strony głównej</a></p>
</body>
</html>
