<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';

// instantiate database and product object
$database = new Database();
$db = $database->getDBClient();

// initialize object
$product = new Product($db);

// read all products
$products = $product->read();

$num = count($products);

if($num > 0) {
	for($x = 0; $x < $num; $x++) {
		echo $products[$x]->name . ' ' . $products[$x]->price;
	}
} else {
	echo 'No products found!';
}

?>