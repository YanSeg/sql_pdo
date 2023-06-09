<?php
// Souvent on identifie cet objet par la variable $conn ou $db

try {
        $db = new PDO('mysql:host=localhost;dbname=basedonnecommerce;charset=utf8', 'MAESTRO', 'MAESTRO//1234');
} catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
}



// _____________________________________________________________________________________ Les fonctions "méthodes"
function QueryTable($db, $sqlQuery)
{
        $fonct = $db->prepare($sqlQuery);
        $fonct->execute();
        $fonct = $fonct->fetchAll();
        return $fonct;
}


function AffichageTables($fonct) {
        foreach ($fonct as $fonct)
       var_dump ($fonct);

}


// _____________________________________________________________________________________ Liste des requêtes 


$sqlQuery1 = "SELECT * FROM products";
$sqlQuery2 = "SELECT * FROM `products` WHERE `availability`=0";

$sqlQuery5 =  "SELECT  products.productname, products.productprice, order_product.quantity, orders.id 
FROM orders
INNER JOIN order_product ON order_product.orders_id = orders.id
INNER JOIN products ON order_product.products_id = products.id
WHERE orders.id = 1";


$sqlQuery6 = "SELECT orders.ordernumber, products.productprice * order_product.quantity AS 'Prix total de la commande'
FROM orders
JOIN order_product ON order_product.orders_id = orders.id
JOIN products ON order_product.products_id = products.id
";


$sqlQuery7 = "INSERT INTO orders (ordernumber, orderdate, total, customers_id) VALUES (7, 2023-06-08,0, 2) ";
$sqlQuery8 = "DELETE FROM orders WHERE ordernumber=7";

// _____________________________________________________________________________________Liste des requêtes êtes 


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


        AffichageTables(QueryTable($db, $sqlQuery1));


        ?>

</html>