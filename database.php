<?php
// Souvent on identifie cet objet par la variable $conn ou $db

try {
        $db = new PDO('mysql:host=localhost;dbname=basedonnecommerce;charset=utf8', 'MAESTRO', 'MAESTRO//1234');
} catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
}

$productsStatement = $db->prepare('SELECT * FROM products');
$productsStatement->execute();
$products = $productsStatement->fetchAll();


$sqlQuery= "SELECT * FROM `products` WHERE `availability`!=1";
$productQuantityNull = $db->prepare($sqlQuery);
$productQuantityNull->execute();
$productsQuantity = $productQuantityNull->fetchAll();

//fetch veut dire <va chercher>


$sqlQuery5= 
"SELECT  products.productname, products.productprice, order_product.quantity, orders.id 
FROM orders
INNER JOIN order_product ON order_product.orders_id = orders.id
INNER JOIN products ON order_product.products_id = products.id
WHERE orders.id = 1";

$productid1 = $db->prepare($sqlQuery5);
$productid1->execute();
$productid1 = $productid1->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>

<body>
        
        <?php 
        foreach ($productid1 as $key => $productid1){

                echo '<pre>';
                print_r($productid1);
                echo '</pre>';
        }

        ?> 
</html>