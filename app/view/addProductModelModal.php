<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$productId = base64_decode($_REQUEST['id']);
$productViewResult = $productObj->getProductBy_id_fromProduct($productId);
// print_r($productId);

?>

<div class="modal-header">
    <div class="modal-title modal-form-msg pt-2" id="prodModelFormResponse"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">
    <div class="container">
        <!------------------------------------------------------------ Productform Start == Phone --------------------------------------------------------------->
        <?php
        while ($viewRow = $productViewResult->fetch_assoc()) {
            $categoryId = $viewRow['category_category_id'];
            $productViewResult3 = $productObj->getCategoryBy_id_fromCategory($categoryId);
            $viewRow3 = $productViewResult3->fetch_assoc();

            if ($viewRow3['category_name'] == "phone" | $viewRow3['category_name'] == "Phone") {

                include('pModel_forms/phoneModel.php'); // phone adding form

            }else if($viewRow3['category_name'] == "headphone" | $viewRow3['category_name'] == "Headphone"){

                include('pModel_forms/headphoneModel.php'); //headphone adding form
            }else{
                echo "No form for this category still!";
            }
        }

        

        
          
        ?>

        <!------------------------------------------------------------ Productform End == HeadPhone --------------------------------------------------------------->

    </div>
</div>

<script type="text/javascript" src="../../js/validation.js"></script>
<script type="text/javascript" src="../../js/validation2.js"></script>