<?php
// 'product' object
class Product{	
 // database connection and table name
 private $conn;
 private $table_name="products";

 // object properties
 public $id;
 public $name;
 public $price;
 public $description;
 public $category_id;
 public $category_name;
 public $timestamp;
 // constructor
 public function __construct($db){
 $this->conn = $db;
 }
 // read all products
  function read($from_record_num, $records_per_page){
 // select all products query
 $query = "SELECT id, name, description, price
 FROM " . $this->table_name . "ORDER BY created DESC LIMIT ?, ?";
 // prepare query statement
 $stmt = $this->conn->prepare( $query );
 // bind limit clause variables
 $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
 $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
 // execute query
 $stmt->execute();
 // return values
 return $stmt;
}
// used for paging products
public function count(){
 // query to count all product records
 $query = "SELECT count(*) FROM " . $this->table_name;
 // prepare query statement
 $stmt = $this->conn->prepare( $query );
 // execute query
 $stmt->execute();
 // get row value
 $rows = $stmt->fetch(PDO::FETCH_NUM);

 // return count
 return $rows[0];
}

}