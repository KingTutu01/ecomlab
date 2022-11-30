<?php
require("../controllers/cartcontroller.php");

    //grab get data from links
    $pid = $_GET['pid'];
    $ipadd = $_GET['ipadd'];
    $cid = $_GET['cid'];
    $qty = $_GET['qty'];


        //check for log in
    if (empty($cid)){
        //check for duplicates

        $IsDuplicate = CheckDuplicatesNull($pid, $ipadd);
        if ($IsDuplicate){
        ?>
        <script type="text/javascript">
        alert("Product is already in cart. Consider increasing qty in your cart");
        window.location.href = "../view/index.php";
        </script>
        <?php
        }else{
            $InsertIntoCart = InsertProductIntoCartNull_fxn($pid, $ipadd, $qty);
            if ($InsertIntoCart){
                header("location: ../view/index.php");
            }else{
                echo "something went wrong";
            }
        }
    }else{
        $IsDuplicate = CheckDuplicates($pid, $cid);
        if ($IsDuplicate){
            ?>
            <script type="text/javascript">
            alert("Product is already in cart. Consider increasing qty in your cart");
            window.location.href = "../view/index.php";
            </script>
            <?php
        }else{
            $InsertIntoCart = InsertProductIntoCart_fxn($pid, $ipadd, $cid, $qty);

            if ($InsertIntoCart){
                header("location: ../view/index.php");
            }else{
                echo "something went wrong";
            }
         }
    }

?>
