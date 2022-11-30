<?php
require("../controllers/productcontroller.php");
$BrandErrors = array();

//check if add brand button is clicked
if (isset($_POST['addBrand'])){

    //grab data
    $BrandName = $_POST['brandName'];

    //validate form
    if (empty($BrandName)){
        array_push($BrandErrors, "Brand Name is required");
    }

    if (strlen($BrandName) > 100){
        array_push($BrandErrors, "Brand Name is too long");
    }

    //add brand
    if (count($BrandErrors) == 0){
        //insert new brand
        $AddBrand = addNewBrand($BrandName);

        if ($AddBrand){
            $AddSuccess = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  Brand Added Successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }else{
            $AddFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Brand Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }
    }


};


$BrandIDs = array();
$BrandIDs = ReturnBrands();

?>
