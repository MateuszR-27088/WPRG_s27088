<?php
session_start();

// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION['user'])) {
    header('Location: Login.php');
    exit;
}

// Pobranie zawartości koszyka z sesji
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Wyświetlenie zawartości koszyka
?>
<!DOCTYPE html>
<html>
<head>
    <title>Koszyk</title>
</head>
<body>
<h1>Koszyk</h1>

<?php if (!empty($cart)) { ?>
    <ul>
        <?php foreach ($cart as $item) {
            echo "<li>" . $item['name'] . " - " . $item['quantity'] . " szt. - Cena: " . $item['totalPrice'] . "</li>";
        } ?>
    </ul>

    <h2>Całkowita cena: <?php echo $cart['totalPrice']; ?></h2>

    <p><a href="MainPage.php">Powrót do strony głównej</a></p>
<?php } else { ?>
    <p>Koszyk jest pusty.</p>
    <p><a href="MainPage.php">Powrót do strony głównej</a></p>
<?php } ?>
</body>
</html>

