<?php
require_once("../controllers/cartcontroller.php");
session_start();
//check for status
if(isset($_GET['status'])){
    $status = $_GET['status'];

    if($status == 'completed'){
        // ..code
        $cid = $_SESSION['customer_id'];
        $inv_no = mt_rand(11,6000);
        $ord_date = date("Y/m/d");
        $ord_stat = 'unfulfilled';
        $AddOrder = AddOrder_fxn($cid, $inv_no, $ord_date, $ord_stat);
        if($AddOrder){
            $recent = RecentOrder_fxn();
            $cart = DisplayCart_fxn($cid);
            foreach($cart as $key => $value){

                $addDetails = addOrderDetails_fxn($recent['recent'], $key, $value[1]);
            }

            $amt = cartValue_fn($cid);
            $currencu = "USD";
            $AddPayment = addPayment_fxn($amt['Result'], $cid, $recent['recent'], "USD", $ord_date);

            if($AddPayment){
                $delete = DeleteWleCart_fn($cid);
                if($delete){
                    header("location: ../view/payment_success.php?ord_id=" .$recent['recent']);
                }
            }else{
                echo "payment failed";
            }


        }else{
            echo "order went wrong";
        }

    }else if ($status == 'failed'){
        echo "failed";
    }
}else{
    echo "payment cancelled";
}

?>
