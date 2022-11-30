<?php
require_once("../controllers/productcontroller.php");


$limit = 15;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$product = array();
$product = DisplayProducts_($start, $limit);
$ProductCount = CountRows_();
$pages = ceil($ProductCount['id']/$limit);


?>
