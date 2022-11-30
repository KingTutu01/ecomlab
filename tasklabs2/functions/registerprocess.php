<?php
//connect to the controller
require("../controllers/customercontroller.php");
$errors = array();

//check if submit button was clicked
if(isset($_POST['customerAdd'])){
    //get user form data
    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $cpass = $_POST['cpass'];
    $cconpass = $_POST['cconpass'];
    $ccountry = $_POST['ccountry'];
    $ccity = $_POST['ccity'];
    $ccontact = $_POST['ccontact'];

    //check if fields are empty
    if (empty($cname)){
        array_push($errors, "Full Name is Required");
    }
    if (empty($cemail)){
        array_push($errors, "Email is Required");
    }
    if (empty($cpass)){
        array_push($errors, "Password is Required");
    }
    if (empty($cconpass)){
        array_push($errors, "Confirm Password is Required");
    }
    if (empty($ccountry)){
        array_push($errors, "Country is Required");
    }
    if (empty($ccity)){
        array_push($errors, "City is Required");
    }
    if (empty($ccontact)){
        array_push($errors, "Phone Number is Required");
    }

    //check if the lengths are fine
    if (strlen($cname) > 100){
        array_push($errors, "Full Name is Too Long");
    }
    if (strlen($cemail) > 50){
        array_push($errors, "Email is Too Long");
    }
    if (strlen($ccountry) > 30){
        array_push($errors, "Country is Too Long");
    }
    if (strlen($ccity) > 30){
        array_push($errors, "City is Too Long");
    }
    if (strlen($ccontact) > 15){
        array_push($errors, "Phone number is Too Long");
    }

    //check if passwords match
    if ($cpass != $cconpass){
        array_push($errors, "Passwords do not match");
    }

    //check if email is valid
    if (!filter_var($cemail, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Email is invalid");
    }

    //check if email exists
    $ExistingEmail = ReturnEmail($cemail);
    if (!empty($ExistingEmail)){
        array_push($errors, "User already exists");
    }

    // if there are no errors in form
    if (count($errors) == 0){
        $cpass = md5($cpass);

        //insert new customer
            $InsertCustomer = InsertCustomer($cname,$cemail,$cpass,$ccountry,$ccity,$ccontact);
            if ($InsertCustomer){
                header("location: ../login/login.php");
            }else{
                array_push($errors, "An Error occured please try again later");
            }

    }

}
?>
