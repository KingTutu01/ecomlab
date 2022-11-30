<?php
require_once("../controllers/productcontroller.php");
$Categories = array();
$Categories = DisplayCategories();
$Errors = array();

$Brands = array();
$Brands = ReturnBrands();
if (isset($_GET['id'])){
    $id = $_GET['id'];

    //create array to store product details
    $ProductDetails = array();
    $ProductDetails = ReturnProduct($id);


//if form has been submitted
if (isset($_POST['submit'])){
    //grab form inputs
    $cname = $_POST['cname'];
    $cprice = $_POST['cprice'];
    $ccat = $_POST['ccat'];
    $cbrand = $_POST['cbrand'];
    $cdesc = $_POST['cdesc'];
    $ckeyword = $_POST['ckeyword'];

    //check if fields aren't empty
    if (empty($cname)){array_push($errors, "Name is required");}
    if (empty($cprice)){array_push($errors, "Price is required");}
    if (empty($ccat)){array_push($errors, "Category is required");}
    if (empty($cbrand)){array_push($errors, "Brand is required");}

    //check if fields are of appropriate length
    if (strlen($cname) > 200){array_push($errors, "Name is too long");}
    if (strlen($cdesc) > 500){array_push($errors, "Description is too long");}
    if (strlen($ckeyword) > 100){array_push($errors, "Keyword is too long");}





    //checking to see if picture is to be updated
    //check if a new file name is set
    if (!empty($_FILES["pimg"]["name"])){
            //image validation
    $Target_dir = "../images/product/";
    $Target_File = $target_dir . basename($_FILES["pimg"]["name"]);
    $ImageFileType = strtolower(pathinfo($Target_file, PATHINFO_EXTENSION));


    //check if image has been uploaded
    if (empty($_FILES["pimg"]["name"])){
        array_push($errors, "File cannot be empty");
    }else{
        //check if its an actual image
        $check = getimagesize($_FILES["pimg"]["tmp_name"]);
    if ($check == false){
        array_push($errors, "File is not an image");
    }
    //check if file already exists
    if (file_exists($target_file)){
        array_push($errors, "File already exists");
    }

    //limit file size
    if ($_FILES["pimg"]["size"] > 5000000){
        array_push($errors, "File is too large");
    }

    //limit file type
    if ($ImageFileType != "jpg" && $ImageFileType != "png" && $ImageFileType != "jpeg" && $ImageFileType != "gif"){
        array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }
    }



    //if form is fine
    if (count($errors) == 0){
        $Upload = move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file);
        if ($Upload){
            $UploadProduct = UpdateProduct($id, $pcat, $pbrand, $pname, $pprice, $pdesc, $target_file, $pkeyword);

            if ($UploadProduct){
                header("location: ../view/listproducts.php");
            }else{
                $addFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Product Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
            }
        }else{
            $imgfail = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Image Failed to Upload
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }
    }
    }
    //if user isnt uploading new image
    else{
    if (count($errors) == 0){


            $UploadProduct = UpdateProduct($id, $pcat, $pbrand, $pname, $pprice, $pdesc, $productDetails['product_image'], $pkeyword);

            if ($UploadProduct){
                header("location: ../view/listproducts.php");
            }else{
                $addFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Product Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
            }

    }
    }

}
}

?>
