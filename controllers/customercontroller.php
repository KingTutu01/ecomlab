<?php
//connect to the customer class
require_once("../classes/customerclass.php");

//insert customer function
//takes name, email, password, country, city, contact
function InsertCustomer($name, $email, $password, $country, $city, $contact)
{
    //create an instance
    $NewCustomerObject = new customerClass();

    //run the add customer method
    $AddCustomer = $NewCustomerObject->AddNewCustomer_($name, $email, $password, $country, $city, $contact);

    if ($AddCustomer){
        //return the query result
        return $AddCustomer;
    }else{
        return false;
    }
}

//return if email exists
//takes email
function ReturnEmail($email){
    //create an instance
    $NewCustomerObject = new customerClass();

    //run the return email method
    $ReturnEmail = $NewCustomerObject->CheckForExistCustomer_($email);

    if ($ReturnEmail){
        $ExistingEmail = $NewCustomerObject->db_fetch();
        return $ExistingEmail;
    }else{
        return false;
    }
}

//return customer login details
//takes email
function ReturnCustomerLoginInfo_($email){
    //create an instance
    $NewCustomerObject = new customerClass();

    //run the return customer login details method
    $ReturnLogninIn = $NewCustomerObject->ReturnCustomerLgInfo_($email);

    //check if query run successful
    if ($ReturnLogninIn){

        //create an array
        $Credentials = array();
        $Credentials = $NewCustomerObject->db_fetch();

        if (empty($Credentials)){
            return false;
        }else{
            return $Credentials;
        }

    }else{
        return false;
    }
}
?>
