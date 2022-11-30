<?php
require("../controllers/productcontroller.php");

//get item to delete
$DelItem = $_GET['bid'];

//delete item
$delete = DeleteBrandName_($DelItem);

if ($delete){
    header("location: ../view/brand.php");
}else{
    echo "Delete failed";
}
?>
