<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$catIdDisplay = $productObj->getCategory_id_toDisplay();
?>

<div class="modal-header">
    <div class="modal-title modal-form-msg mt-2" id="catFormResponse"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">
    <div class="container">
        <div class="col-md-12">

            <!------------------------------------------------------- Category form start --------------------------------------------------------->
            <form name="categoryForm" id="categoryForm" enctype="multipart/form-data">

                <div class="form-row">
                    <div class="form-group text-center col-md">
                        <h2>Add Category</h2>
                    </div>
                </div>
                <div class="form-row">
                    <?php

                    while ($catIdView = $catIdDisplay->fetch_assoc()) {

                    ?>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Category Id</label>
                            <input type="text" class="form-control" value="<?php echo $catIdView['AUTO_INCREMENT']; ?>" id="catId" name="catId" readonly>
                        </div>
                    <?php

                    }

                    ?>
                    <div class="form-group col-md-6 col-sm-6">
                        <label>Category Name</label>
                        <input type="text" class="form-control" id="catName" name="catName" placeholder="Category Name" oninput="catNameValidate()">
                        <span id="catNmIcon"></span>
                        <span class="text-danger error-msg" id="catNamErr"></span>
                        <span class="text-danger error-msg" id="catNamErr3"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-6">
                        <label>Category Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="catImg" name="catImg" oninput="catImgValidate()">
                            <label class="custom-file-label" id="catImgInput">Choose file</label>
                            <span id="catImgIcon"></span>
                        </div>
                        <span class="text-danger error-msg" id="catImgErr"></span>
                        <div class="mt-3 ml-1">
                            <img id="prev_catImg" width="auto" height="100px" src="../../img/interface_images/formDefaultImg.jpg" style="border-radius:5%;" />
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 text-right">
                        <button type="button" class="btn btn-outline-primary userform-button" id="cat-form-submit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
                        <button type="button" class="btn btn-outline-secondary userform-button" id="cat-form-reset"><i class="fas fa-undo"></i>&nbsp;Clear</button>
                    </div>
                </div>
            </form>
            <!------------------------------------------------------- Category form end --------------------------------------------------------->

        </div>
    </div>
</div>

<script type="text/javascript" src="../../js/validation.js"></script>
<script type="text/javascript" src="../../js/validation2.js"></script>