<?php
session_start();

// Sprawdzenie, czy użytkownik jest zalogowany
$isLoggedIn = isset($_SESSION['user']);

// Funkcja dodająca produkt do koszyka
function addToCart($productId)
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!in_array($productId, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $productId;
    }
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

// Sprawdzenie parametru ID
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Znalezienie produktu o podanym ID
    $product = array_filter($products, function ($item) use ($productId) {
        return $item['id'] == $productId;
    });

    // Wyświetlenie informacji o produkcie i przycisku "Dodaj do koszyka"
    if (!empty($product)) {
        $product = reset($product);
        $name = $product['name'];
        $description = $product['description'];
        $price = $product['price'];

        echo "<h1>$name</h1>";
        echo "<p>Opis: $description</p>";
        echo "<p>Cena: $price PLN</p>";

        // Dodawanie do koszyka tylko dla zalogowanych użytkowników
        if ($isLoggedIn) {
            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='productId' value='$productId'>";
            echo "<input type='submit' value='Dodaj do koszyka'>";
            echo "</form>";

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $selectedProductId = $_POST['productId'];
                addToCart($selectedProductId);
                echo "<p>Produkt został dodany do koszyka.</p>";
            }
        } else {
            echo "<p>Aby dodać produkt do koszyka, zaloguj się.</p>";
        }
    } else {
        echo "<p>Produkt o podanym ID nie istnieje.</p>";
    }
} else {
    echo "<p>Nieprawidłowy parametr ID.</p>";
}
?>
