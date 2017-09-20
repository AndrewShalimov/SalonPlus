<?php

require_once 'g_API.php';

$action = $_REQUEST["action"];
$result = null;

if ($action == "products_by_category") {
    $categoryId = $_REQUEST["catID"];
    $products = getProducts_cached($categoryId);
    $result = $products;
}

if ($action == "random_products") {
    $count = $_REQUEST["count"];
    $products = getRandomProducts_cached($count);
    $result = $products;
}

if ($action == "shares") {
    $products = getShares();
    $result = $products;
}

header('Content-type: application/json');
echo json_encode($result);

?>