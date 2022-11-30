<?php

require_once("../classes/cart_cls.php");


function InsertProductIntoCart_fxn($pid, $ipadd, $cid, $qty){
    $newCartObject = new Cart_cls();
    $runQuery = $newCartObject->InsertProduct_($pid, $ipadd, $cid, $qty);
    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function InsertProductIntoCartNull_fxn($pid, $ipadd, $qty){
    $newCartObject = new Cart_cls();
    $runQuery = $newCartObject->InsertNull_($pid, $ipadd, $qty);
    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function CheckDuplicates($pid, $cid){
    $newCartObject = new Cart_cls();
    $runQuery = $newCartObject->CheckD_($pid, $cid);
    if ($runQuery){
        $record = $newCartObject->db_fetch();
        if (!empty($record['p_id']) && !empty($record['c_id'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }

}

function CheckDuplicatesNull($pid, $ipadd){
    $newCartObject = new Cart_cls();
    $runQuery = $newCartObject->CheckDnull_($pid, $ipadd);
    if ($runQuery){
        $record = $newCartObject->db_fetch();
        if (!empty($record['p_id']) && !empty($record['ip_add'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function DisplayCrt_fxn($cid){
    $newCartObject = new Cart_cls();
    $runQuery = $newCartObject->DisplayCart_($cid);
    if ($runQuery){
        $prodArray = array();
        while ($record = $newCartObject->db_fetch()){
            $prodArray[$record['p_id']] = [
                $record['c_id'],
                $record['qty'],
                $record['product_title'],
                $record['product_price'],
                $record['product_image']
            ];
        }
        return $prodArray;
    }else{
        return false;
    }
}

function DisplayCrtNull_fxn($ipadd){
    $newCartObject = new Cart_cls();
    $runQuery = $newCartObject->DisplayCartNull_($ipadd);
    if ($runQuery){
        $prodArray = array();
        while ($record = $newCartObject->db_fetch()){
            $prodArray[$record['p_id']] = [
                $record['ip_add'],
                $record['qty'],
                $record['product_title'],
                $record['product_price'],
                $record['product_image']
            ];
        }

        return $prodArray;
    }else{
        return false;
    }
}

function cartTotal_fxn($cid){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->CartTotal_($cid);

    //check if query run
    if($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

function cartTotalNull_fxn($ipadd){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->carttotalN_($ipadd);

    //check if query run
    if($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

//update cart functions
//logged in customers
function updateCart_fxn($cid, $pid, $qty){
    //create a new object
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->UpdateCart_($cid, $pid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

//not logged in customers
function updateCartNull_fxn($ipadd, $pid, $qty){
    //create a new object
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->updateCartNull($ipadd, $pid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

//delete from cart functions
//logged in customer
function deleteCart_fxn($cid,$pid){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->DeleteCart_($cid,$pid);

    //if query run successfully
    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

//not logged in customers
function deleteCartNull_fxn($ipadd,$pid){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->DeleteCartNull_($ipadd,$pid);

    //if query run successfully
    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

//cart value functions
//logged in customer
function cartValue_fxn($cid){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->CartValue_($cid);

    if ($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

function cartValueNull_fxn($ipadd){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->cartValueNull($ipadd);

    if ($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

function updateCartWithCID_fxn($cid, $ip_add){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->UpdateCartWCID_($cid, $ip_add);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function AddOrder_fxn($cid, $inv_no, $ord_date, $ord_stat){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->AddOrder_($cid, $inv_no, $ord_date, $ord_stat);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function AddOrderDetails_fxn($ord_id, $prod_id, $qty){
    $NewCartObject = new Cart_cls();

    $RunQuery = $NewCartObject->AddOrderDls($ord_id, $prod_id, $qty);

    if ($RunQuery){
        return $RunQuery;
    }else{
        return false;
    }
}

function AddPayment_fxn($amt, $cid, $ord_id, $currency, $pay_date){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->AddPayment($amt, $cid, $ord_id, $currency, $pay_date);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function RecentOrder_fxn(){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->RecentOrder_();
    if($runQuery){
        $recent = $newCartObject->db_fetch();
        return $recent;
    }else{
        return false;
    }
}

function DeleteWCart_fxn($cid){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->DeleteWhCrt($cid);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function GetOrder_fxn($ord_id){
    $newCartObject = new Cart_cls();

    $runQuery = $newCartObject->GetOrder_($ord_id);
    if($runQuery){
        $ord_arr = $newCartObject->db_fetch();
        return $ord_arr;
    }else{
        return false;
    }
}

function GetOrderDtls_fxn($ord_id){
    $NewCartObject = new Cart_cls();

    $RunQuery = $NewCartObject->GetOrderDls($ord_id);
    if($RunQuery){
        while($record = $NewCartObject->db_fetch()){
            $ord_arr[] = $record;
        }
        return $ord_arr;
    }else{
        return false;
    }
}

?>
