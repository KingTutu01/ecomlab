<?php
//connect to the product class
require_once("../classes/productclass.php");

//add new brand function
//takes brand name

function AddNewBrand($BrandName){
    //create an instance
    $NewProductObject = new productClass();

    //run the add new brand method
    $AddBrand = $NewProductObject->AddNewBrand_($BrandName);

    if ($AddBrand){
        //return the query result
        return $AddBrand;
    }else{
        return false;
    }
}

/*
display all Brands
*/
function ReturnBrands(){
    //create an instance
    $NewProductObject = new productClass();

    //run the select all Brands method
    $SelectBrands_ = $NewProductObject->DisplayBrands_();

    //check if select worked
    if ($SelectBrands_){

        $Brands = array();

        while($record = $NewProductObject->db_fetch()){
            $Brands[$record['brand_id']] = $record['brand_name'];
        }

        //return the array
        return $Brands;

    }else{
        return false;
    }

}


//update brand name
function UpdateBrandName_($brandID, $BrandName){
    //create an instance
    $NewProductObject = new productClass();

    //run the update method
    $updateBrand = $NewProductObject->UpdateBrand_($brandID, $BrandName);

    //check if it worked
    if($updateBrand){
        return $updateBrand;
    }else{
        return false;
    }
}

//delete brand name
function DeleteBrandName_($brandID){
    //create an instance
    $NewProductObject = new productClass();

    //run the update method
    $deleteBrand = $NewProductObject->DeleteBrand_($brandID);

    //check if it worked
    if ($deleteBrand){
        return $deleteBrand;
    }else{
        return false;
    }
}

//add a new category
function addCategory($name){
    //create an instance of the class
    $NewProductObject = new productClass();

    //run the add category method
    $addCategory = $NewProductObject->AddCategory_($name);

    //check if it worked
    if($addCategory){
        return $addCategory;
    }else{
        return false;
    }
}

//view all categories
function displayCategories(){
    //create an instance of the class
    $NewProductObject = new productClass();

    //run the display categories method
    $displayCategory = $NewProductObject->DisplayCategories_();

    //check if it worked
    if ($displayCategory){

        $categories = array();

        //loop through the rows
        while($record = $NewProductObject->db_fetch()){
            $categories[$record['cat_id']] = $record['cat_name'];
        }

        //return array
        return $categories;
    }else{
        return false;
    }
}

//update a category
function updateCategory($id, $name){
    //create an instance of the class
    $NewProductObject = new productClass();

    //run the display categories method
    $updateCategory = $NewProductObject->UpdateCategory_($id, $name);

    //check if it worked
    if($updateCategory){
        return $updateCategory;
    }else{
        return false;
    }
}

//delete a category
function deleteCategory($id){
    //create an instance of the class
    $NewProductObject = new productClass();

    //run the display categories method
    $deleteCategory = $NewProductObject->DeleteCategory_($id);

    //check if it worked
    if($deleteCategory){
        return $deleteCategory;
    }else{
        return false;
    }
}

/*
*controller functions to add, edit, delete and view all products
*/

//function to add product
function addProduct($cat, $brand, $title, $price, $desc, $img, $keywords){
    //create an instance of the class
    $NewProductObject = new productClass();

    //add product
    $addProduct = $NewProductObject->AddProduct_($cat, $brand, $title, $price, $desc, $img, $keywords);

    //check if add worked
    if ($addProduct){
        return $addProduct;
    }else{
        return false;
    }
}

//function to list products for editing
function ListProductsID_(){
    //create an instance of the class
    $NewProductObject = new productClass();

    //run the select query
    $runquery = $NewProductObject->ListProductsID_();

    //check the query worked
    if($runquery){
        //create array to store ids
        $ids = array();
        //loop through the select result and store the ids in the array
        while($record = $NewProductObject->db_fetch()){
            $ids[$record['product_id']] = $record['product_title'];
        }

        //return the array
        return $ids;
    }else{
        return false;
    }

}

//function to update product
function UpdateProduct($id, $cat, $brand, $title, $price, $desc, $img, $keywords){
    //create an instance of the class
    $NewProductObject = new ProductClass();

    //run the update method
    $RunQuery = $NewProductObject->UpdateProduct_($id, $cat, $brand, $title, $price, $desc, $img, $keywords);

    //check if it worked
    if($RunQuery){
        return $RunQuery;
    }else{
        return false;
    }
}

//function to return a product's details
function ReturnProduct($id){
    //create an instance of the class
    $NewProductObject = new ProductClass();

    //run the select method
    $RunQuery = $NewProductObject->ReturnProduct_($id);

    //if it worked
    if($RunQuery){
        //create array
        $productArray = array();
        while($record = $NewProductObject->db_fetch()){

            $productArray['cat_name'] = $record['cat_name'];
            $productArray['brand_name'] = $record['brand_name'];
            $productArray['product_title'] = $record['product_title'];
            $productArray['product_price'] = $record['product_price'];
            $productArray['product_desc'] = $record['product_desc'];
            $productArray['product_image'] = $record['product_image'];
            $productArray['product_keywords'] = $record['product_keywords'];
            $productArray['cat_id'] = $record['cat_id'];
            $productArray['brand_id'] = $record['brand_id'];

        }
        return $productArray;
    }else{
        return false;
    }
}

//function to delete product
function DeleteProduct($id){
    //create an instance of the class
    $NewProductObject = new productClass();

    //run the select method
    $RunQuery = $NewProductObject->DeleteProduct_($id);

    //check if it worked
    if($RunQuery){
        return $RunQuery;
    }else{
        return false;
    }
}

//function to display products
function DisplayProducts_($start, $limit){
    //create an instance of the class
    $NewProductObject = new productClass();

    //run the select method
    $RunQuery = $NewProductObject->DisplayProducts_($start, $limit);

    //if it worked
    if($RunQuery){
        //create array
        $productArray = array();
        while($record = $NewProductObject->db_fetch()){

            $productArray[$record['product_id']] = [$record['brand_name'],
                                                    $record['cat_name'],
                                                    $record['product_title'],
                                                    $record['product_desc'],
                                                    $record['product_image'],
                                                    $record['product_keywords'],
                                                    $record['product_price']];



        }
        return $productArray;
    }else{
        return false;
    }
}

//function to count products
function CountRows_(){
    //create an instance of the class
    $NewProductObject = new productClass();

    //run the select method
    $RunQuery = $NewProductObject->CountRows_();

    if($RunQuery){
        $countProducts = $NewProductObject->db_fetch();
        return $countProducts;
    }else{
        return false;
    }
}

//function to search for products
function searchProducts($searchTerm){
    //create an instance of the class
    $NewProductObject = new productClass();

    //run the select method
    $RunQuery = $NewProductObject->SearchProduct_($searchTerm);

    if($RunQuery){
        $SearchArray_ = array();
        while ($record = $NewProductObject->db_fetch()){
            $SearchArray_[$record['product_id']] = [ $record['product_title'],
                                                    $record['product_image'],
                                                    $record['product_price']];
        }
        return $SearchArray_;
    }else{
        return false;
    }
}

?>
