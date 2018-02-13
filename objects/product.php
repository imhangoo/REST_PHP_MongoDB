<?php
class Product {
	//db 
	private $db;
	private $collection_name = 'products';

	//object properties
	public $id;
	public $name;
	public $description;
	public $price;
	public $category_id;
	public $category_name;
	public $created;

	// constructor with $db as database connection
	public function __construct($db) {
		$this->db = $db;
	}

	// read products
    function read() {
    	//select all query
    	$collection = $this->db->{$this->collection_name};

    	$cursor = null;

		try{
			$cursor = $collection->find();
		}catch(MongoDB\Driver\Exception\ConnectionTimeoutException $exception){
            echo "Connection error: ".$exception->getMessage();
        }

    	return $cursor->toArray();
    }

    function create() {
    	//insert one product
    	$collection = $this->db->{$this->collection_name};
    	$insertOneResult = $collection->insertOne([
    		'name' => $this->name,
    		'price' => $this->price,
    ]);
    	return $insertOneResult->getInsertedCount() == 1;
    }


}

?>