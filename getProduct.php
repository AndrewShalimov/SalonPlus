<?php

require_once 'g_API.php';

header('Content-type: application/json');
$categoryId = $_REQUEST["catID"];
$productId = $_REQUEST["productID"];

$product = getProduct_cached($categoryId, $productId);

echo json_encode($product);
?>