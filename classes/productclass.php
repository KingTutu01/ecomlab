<?php
//connect to database class
require_once("../settings/db_class.php");



class ProductClass extends db_connection
{
   /**
	*method to insert new brand
	*takes brand name
	*/

    public function AddNewBrand_($BrandName){
        //sql query
        $sql = "INSERT INTO `brands`(`brand_name`) VALUES ('$BrandName')";

        //run the sql query
        return $this->db_query($sql);
    }

    public function DisplayBrands_(){
        //sql query
        $sql = "SELECT `brand_id`, `brand_name` FROM `brands`";

        //run the sql query
        return $this->db_query($sql);
    }

    public function UpdateBrand_($BrandID, $BrandName){
        //sql query
        $sql = "UPDATE `brands` SET `brand_name`='$BrandName' WHERE `brand_id` = '$BrandID'";

        return $this->db_query($sql);
    }

    public function DeleteBrand_($BrandID){
        //sql query
        $sql = "DELETE FROM `brands` WHERE `brand_id` = '$BrandID'";

        return $this->db_query($sql);
    }

    /**
	*methods to insert, edit, show and delete new categories
	*/

    //add new category
    public function AddCategory_($name){
        //sql query

        $sql = "INSERT INTO `categories`(`cat_name`) VALUES ('$name')";
        return $this->db_query($sql);

    }

    //view all categories
    public function DisplayCategories_(){

        //sql query
        $sql = "SELECT * FROM `categories`";
        return $this->db_query($sql);
    }

    //update category
    public function UpdateCategory_($id, $name){
        //sql query
        $sql = "UPDATE `categories` SET `cat_name`='$name' WHERE `cat_id`='$id'";
        return $this->db_query($sql);
    }

    //delete category
    public function DeleteCategory_($id){
        //sql query
        $sql = "DELETE FROM `categories` WHERE `cat_id` = '$id'";
        return $this->db_query($sql);
    }

    /*
    *methods to insert, edit, select and delete all products
    */

    public function AddProduct_($cat, $brand, $title, $price, $desc, $img, $keywords){

        //sql query
        $sql = "INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES ('$cat','$brand','$title','$price','$desc','$img','$keywords')";

        return $this->db_query($sql);

    }

    //method to list all products for updating or editing
    public function ListProductsID_(){
        $sql = "SELECT `product_id`, `product_title` FROM `products`";
        return $this->db_query($sql);
    }

    //method to update product
    public function UpdateProduct_($id, $cat, $brand, $title, $price, $desc, $img, $keywords){
        $sql = "UPDATE `products` SET `product_cat`='$cat',`product_brand`='$brand',`product_title`='$title',`product_price`='$price',`product_desc`='$desc',`product_image`='$img',`product_keywords`='$keywords' WHERE `product_id` = '$id'";
        return $this->db_query($sql);
    }

    //method to return the product
    public function ReturnProduct_($id){
        $sql = "SELECT brands.brand_name, brands.brand_id, categories.cat_name, categories.cat_id,
products.product_title, products.product_price, products.product_desc, products.product_image, product_keywords
FROM `products`
JOIN brands ON (products.product_brand = brands.brand_id)
JOIN categories ON (products.product_cat = categories.cat_id)
WHERE products.product_id = '$id'";
        return $this->db_query($sql);
    }

    //method to delete product
    public function DeleteProduct_($id){
        $sql = "DELETE FROM `products` WHERE `product_id` = '$id'";
        return $this->db_query($sql);
    }

   //method to display products
    public function DisplayProducts_($start, $limit){
        $sql = "SELECT brands.brand_name, categories.cat_name, products.product_id,
        products.product_title, products.product_price, products.product_desc, products.product_image, product_keywords
        FROM `products`
        JOIN brands ON (products.product_brand = brands.brand_id)
        JOIN categories ON (products.product_cat = categories.cat_id)
        LIMIT $start, $limit
        ";
        return $this->db_query($sql);
    }

    //method to count how many products are in the database
    //to for estimating how many pages
    public function CountRows_(){
        $sql = "SELECT count(`product_id`) AS id FROM `products`";
        return $this->db_query($sql);
    }

    //method to search for products
    public function SearchProduct_($SearchTerm){
        $sql = "SELECT * FROM `products` WHERE `product_title` LIKE '$SearchTerm'";
        return $this->db_query($sql);
    }
}

?>
