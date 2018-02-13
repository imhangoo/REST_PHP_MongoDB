<?php

// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/product.php';

$db = (new Database())->getDBClient();

$product = new Product($db);

$product->name = 'CD';
$product->price = 12;

if($product->create()) {
    echo '{';
        echo '"message": "Product was created."';
    echo '}';
}
else {
	echo '{';
        echo '"message": "Unable to create product."';
    echo '}';
}

?>