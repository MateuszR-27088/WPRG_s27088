<?php
session_start();

// Sprawdzenie, czy użytkownik jest zalogowany
$isLoggedIn = isset($_SESSION['user']);

// Ustalenie wartości ciasteczek
$visitCount = isset($_COOKIE['visit_count']) ? $_COOKIE['visit_count'] : 0;
$lastVisitedPage = isset($_COOKIE['last_visited_page']) ? $_COOKIE['last_visited_page'] : '';
$visitTime = isset($_COOKIE['visit_time']) ? $_COOKIE['visit_time'] : '';

// Aktualizacja wartości ciasteczek
$visitCount++;
setcookie('visit_count', $visitCount, time() + 14 * 24 * 3600); // Ciasteczko wygasa po 2 tygodniach

$lastVisitedPage = basename($_SERVER['PHP_SELF']);
setcookie('last_visited_page', $lastVisitedPage, time() + 14 * 24 * 3600);

if (empty($visitTime)) {
    $visitTime = time();
    setcookie('visit_time', $visitTime, time() + 14 * 24 * 3600);
} else {
    $currentTime = time();
    $visitDuration = $currentTime - $visitTime;
    $visitTime = $currentTime;
    setcookie('visit_time', $visitTime, time() + 14 * 24 * 3600);
}

// Produkty
$products = [
    [
        'id' => 1,
        'name' => 'Product 1',
        'description' => 'Opis produktu 1',
        'price' => 10.99
    ],
    [
        'id' => 2,
        'name' => 'Product 2',
        'description' => 'Opis produktu 2',
        'price' => 19.99
    ]
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sklep internetowy</title>
</head>
<body>
<h1>Sklep internetowy</h1>

<?php if ($isLoggedIn) { ?>
    <h2>Witaj, <?php echo $_SESSION['user']; ?>!</h2>
    <p><a href="logout.php">Wyloguj się</a></p>
<?php } else { ?>
    <h2>Zaloguj się lub załóż konto:</h2>
    <p><a href="Login.php">Logowanie</a> | <a href="Registration.php">Rejestracja</a></p>
<?php } ?>

<h2>Koszyk:</h2>
<p><a href="cart.php">Zobacz zawartość koszyka</a></p>

<h2>Produkty:</h2>
<ul>
    <?php foreach ($products as $product) { ?>
        <li><a href="product.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></li>
    <?php } ?>
</ul>

<?php if (!$isLoggedIn) { ?>
    <h2>Dołącz do naszego sklepu:</h2>
    <p><a href="Registration.php">Rejestracja</a></p>
    <p><a href="Login.php">Logowanie</a></p>
<?php } ?>

<h2>Informacje o odwiedzinach:</h2>
<ul>
    <li>Liczba odwiedzin: <?php echo $visitCount; ?></li>
    <li>Ostatnio odwiedzona strona: <?php echo $lastVisitedPage; ?></li>
    <li>Czas spędzony na stronie: <?php echo $visitDuration; ?> sekund</li>
</ul>
</body>
</html>
