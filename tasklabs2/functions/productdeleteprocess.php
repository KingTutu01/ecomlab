<?php
require_once("../controllers/productcontroller.php");
//get item to delete
$deleteItem = $_GET['id'];

//delete item
$delete = DeleteProduct($deleteItem);

if ($delete){
    header("location: ../view/listproducts.php");
}else{
    echo "Delete failed";
}
?>
