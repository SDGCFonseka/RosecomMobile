<?php
session_start();
// incude sql model
include_once '../model/stockModel.php';
$stockObj = new stock();
$modelId = base64_decode($_REQUEST['mid']);
$productId = base64_decode($_REQUEST['pid']);
print_r($modelId); 
print_r($productId);
?>

<div class="modal-header">
    <div class="modal-title modal-form-msg pt-2" id="stockFormResponse"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">
    <div class="container">
        <div class="col-md-12">
            <!------------------------------------------------------------ Stock form start --------------------------------------------------------------->
            <form name="stockForm" id="stockForm" enctype="multipart/form-data">
                <!--action="../controller/userController.php?status=addUser" method="post"-->
                <div class="form-row">
                    <div class="form-group text-center col-md">
                        <h2>Add Stock</h2>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>GRN ID</label>
                        <input type="text" class="form-control" id="stockBrand" name="stockBrand" placeholder="First Name" oninput="">
                        <span id="firstNameIcon"></span>
                        <span class="text-danger error-msg" id="firstNamErr"></span>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Brand Name</label>
                        <input type="text" class="form-control" id="stockBrand" name="stockBrand" placeholder="First Name" oninput="">
                        <span id="firstNameIcon"></span>
                        <span class="text-danger error-msg" id="firstNamErr"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Product Name</label>
                        <input type="text" class="form-control" id="stockProd" name="stockProd" placeholder="Last Name" >
                        <span id="lastNameIcon"></span>
                        <span class="text-danger error-msg" id="lastNamErr"></span>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Model Name</label>
                        <input type="text" class="form-control" id="stockBrand" name="stockBrand" placeholder="First Name" oninput="">
                        <span id="firstNameIcon"></span>
                        <span class="text-danger error-msg" id="firstNamErr"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stock Date</label>
                        <input type="text" class="form-control" id="stockDate" name="stockDate" placeholder="Last Name" >
                        <span id="lastNameIcon"></span>
                        <span class="text-danger error-msg" id="lastNamErr"></span>

                    </div>
                </div>
               
                <div class="form-row">
                    <div class="form-group col-md-12 text-right">
                        <button type="button" class="btn btn-outline-primary userform-button" id="stock-form-submit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
                        <button type="button" class="btn btn-outline-secondary userform-button" id="stock-form-reset"><i class="fas fa-undo"></i>&nbsp;Clear</button>
                    </div>
                </div>
            </form>
            <!------------------------------------------------------------Stock form end --------------------------------------------------------------->

        </div>
    </div>
</div>

<script type="text/javascript" src="../../js/validation.js"></script>
<script type="text/javascript" src="../../js/validation2.js"></script>