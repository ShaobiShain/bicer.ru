<?php
$db = new PDO('sqlite:../db/moto_sell_db.db');
if ($db === false) {
    die('Error: Could not connect to the database.');
}


$id = isset($_GET['id']) ? $_GET['id'] : 1;

$stmt = $db->prepare('SELECT * FROM moto WHERE ID = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="./assets/styles/product.css">
</head>
<body>
    <div class="container">
        <div class="product-images">
            <img src="<?php echo $product['photo1']; ?>" alt="Product Image 1">
            <img src="<?php echo $product['photo2']; ?>" alt="Product Image 2">
        </div>
        <div class="product-info">
            <h1 class="product-name"><?php echo $product['name']; ?></h1>
            <p class="product-description"><?php echo $product['description']; ?></p>
            <p class="product-price"><?php echo $product['price']; ?></p>
            <button class="add-to-cart-button">Add to Cart</button>
        </div>
    </div>

</body>
</html>

