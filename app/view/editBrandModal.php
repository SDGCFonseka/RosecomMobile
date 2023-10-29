<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$brandId = base64_decode($_REQUEST['id']);
$brandEditResult = $productObj->getBrandBy_id_fromBrand($brandId);
?>

<div class="modal-header">
    <div class="modal-title modal-form-msg mt-2" id="eBrandFormResponse"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">
    <div class="container">
        <div class="col-md-12">
            <?php
            while ($editRow = $brandEditResult->fetch_assoc()) {
            ?>
                <!-------------------------------------------------- brand form start ------------------------------------------------------------->
                <form id="editBrandForm" name="editBrandForm" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group text-center col-md">
                            <h2>Edit Brand</h2>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" id="brandId" name="brandId" value="<?php echo $editRow['brand_id']; ?>" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6 col-sm-6">
                            <label>Brand Name</label>
                            <input type="text" class="form-control" id="brandName" name="brandName" value="<?php echo $editRow['brand_name']; ?>" placeholder="Brand Name" oninput="brandNameValidate()">
                            <span id="brandNmIcon"></span>
                            <span class="text-danger error-msg" id="brandNamErr"></span>
                            <span class="text-danger error-msg" id="brandNamErr3"></span>
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label>Brand Image</label>
                            <div class="custom-file">
                                <input type="hidden" name="defaultBrandImg" value="<?php echo $editRow['brand_image']; ?>" />
                                <input type="file" class="custom-file-input" id="brandImg" name="brandImg" oninput="brandImgValidate()">
                                <label class="custom-file-label" id="brandImgInput"><?php echo $editRow['brand_image']; ?></label>
                                <span id="brandImgIcon"></span>
                            </div>
                            <span class="text-danger error-msg" id="brandImgErr"></span>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Brand Description</label>
                            <textarea class="form-control brandDes-textbox" id="brandDes" name="brandDes" placeholder="Brand Description" oninput="brandDesValidate()" rows="4"><?php echo $editRow['brand_description']; ?></textarea>
                            <span id="brandDesIcon"></span>
                            <span class="text-danger error-msg" id="brandDesErr"></span>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Image Preview</label>
                            <div class="ml-1">
                                <img id="prev_brandImg" width="auto" height="100px" src="../../img/brand_images/<?php echo $editRow['brand_image']; ?>" style="border-radius:5%;" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 text-right">
                            <button type="button" class="btn btn-outline-primary userform-button" id="brand-form-edit"><i class="far fa-edit"></i>&nbsp;Update</button>
                        </div>
                    </div>
                </form>
                <!-------------------------------------------------- brand form end ------------------------------------------------------------->
            <?php
            }
            ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../js/validation.js"></script>
<script type="text/javascript" src="../../js/validation2.js"></script>