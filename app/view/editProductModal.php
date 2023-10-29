<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$productId = base64_decode($_REQUEST['id']);
$catResult = $productObj->getAllCategory();
$brandResult = $productObj->getAllBrand();



// print_r($productId);
?>

<div class="modal-header">
    <div class="modal-title modal-form-msg pt-2" id="eProdFormResponse"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">
    <div class="container">
        <div class="col-md-12">
            <!------------------------------------------------------------ Productform start --------------------------------------------------------------->
            <form name="editProdForm" id="editProdForm" enctype="multipart/form-data">
                <!--action="../controller/productController.php?status=addProduct" method="post"-->
                <div class="form-row">
                    <div class="form-group text-center col-md">
                        <h2>Edit Product</h2>
                    </div>
                </div>
                <?php
                $productEditRes = $productObj->getProductBy_id_fromProduct($productId);
                while ($editRow = $productEditRes->fetch_assoc()) {
                    $categoryId = $editRow['category_category_id'];
                    $productEditRes2 = $productObj->getCategoryBy_id_fromCategory($categoryId);
                    $editRow2 = $productEditRes2->fetch_assoc();
                    $categoryImg2 = $editRow2['category_image'];


                ?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Product Name</label>
                            <input type="text" class="form-control" id="prodName" name="prodName" value="<?php echo $editRow['product_name']; ?>" placeholder="Product Name" oninput="prodNameValidate()" maxlength="40">
                            <span id="prodNameIcon"></span>
                            <span class="text-danger error-msg" id="prodNamErr"></span>
                            <span class="text-danger error-msg" id="prodNamErr2"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Product Category</label>
                            <?php
                            $modTbRes1 = $productObj->getAllPhoneModelById($productId);
                            $modTbRes2 = $productObj->getAllHeadphoneModelById($productId);
                            if ($modTbRes1->num_rows > 0 | $modTbRes2->num_rows > 0) {
                            ?>
                                <div>
                                <span class="editProSelImg"><img src="../../img/category_images/<?php echo $categoryImg2; ?>" width="32px" height="32px" /></span>
                                <select class="form-control" name="prodCategory" id="prodCategory" readonly>
                                        <?php
                                        while ($catRow = $catResult->fetch_assoc()) {
                                            if ($catRow['category_status'] == 1) {

                                                $selected = $editRow['category_category_id'] == $catRow['category_id'] ? ' selected' : '';
                                                echo "<option value='" . $catRow['category_id'] . "'" . $selected . " hidden>" . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"  . $catRow['category_name'] . "</option>";
                                            }
                                        }
                                        ?>
                                </select>
                                </div>
                                <span class="text-danger error-msg" id="prodCatErr2"></span>

                            <?php
                            } else {
                            ?>
                                <select class="form-control prodCategory" id="prodCategory" name="prodCategory" onchange="prodCategoryValidate()">
                                    <option value="">Select a Category</option>
                                    <?php
                                    while ($catRow = $catResult->fetch_assoc()) {
                                        if ($catRow['category_status'] == 1) {
                                            $categoryImg = $catRow['category_image'];
                                            $selected = $editRow['category_category_id'] == $catRow['category_id'] ? ' selected' : '';
                                            echo "<option data-left='../../img/category_images/$categoryImg' value=" . $catRow['category_id'] . "" . $selected . ">" . "&nbsp;&nbsp;&nbsp;" . $catRow['category_name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="text-danger error-msg" id="prodCatErr"></span>
                            <?php
                            }
                            ?>
                           
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Product Brand</label>
                            <select class="form-control" name="prodBrand" id="prodBrand" onchange="prodBrandValidate()">
                                <option value="">Select a Brand</option>
                                <?php
                                while ($brandRow = $brandResult->fetch_assoc()) {
                                    if ($brandRow['brand_status'] == 1) {
                                        $brandImg = $brandRow['brand_image'];
                                        $selected = $editRow['brand_brand_id'] == $brandRow['brand_id'] ? ' selected' : '';
                                        echo "<option data-left='../../img/brand_images/$brandImg' value=" . $brandRow['brand_id'] . "" . $selected . ">" . "&nbsp;&nbsp;&nbsp;" . $brandRow['brand_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <span id="prodCatIcon"></span>
                            <span class="text-danger error-msg" id="prodBrandErr"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Operating System</label>
                            <input type="text" class="form-control" id="operatingSys" name="operatingSys" value="<?php echo $editRow['product_os']; ?>" placeholder="Operating System if applicable" maxlength="50">
                            <span id="prodPriceIcon"></span>
                            <span class="text-danger error-msg" id="contactErr1"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input class="form-control" type="text" name="editProdId" id="editProdId" value="<?php echo $productId; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Product Description</label>
                            <textarea class="form-control" id="prodDescription" name="prodDescription"><?php echo $editRow['product_description'] ?></textarea>
                            <span id="productDesIcon"></span>
                            <span class="text-danger error-msg" id="contactErr1"></span>

                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="prod-field-head">Product Images</div>
                    </div>
                </div>

                <div class="form-row" id="prodImgPrevImg">

                    <!-------------Removing Images LOADING------------------>
                    <div class="col-md-12">
                        <h6 class="text-danger mb-4">*You Can Remove Existing Product Images Here</h6>
                    </div>
                    <?php
                    $productImgView = $productObj->getProductImages_ById($productId);
                   
                    while ($imgRow = $productImgView->fetch_assoc()) {
                       
                    ?>

                        <div class="col-md-4">
                            <div class="text-center mb-5">
                                <span title="remove" data-toggle="tooltip" data-placement="right" class="imgBtn delImgBtn2" data-imgId="<?php echo $imgRow["product_image_id"]; ?>" data-imgName="<?php echo $imgRow["product_image_name"]; ?>">
                                    <i class="fas fa-times-circle fa-2x text-danger"></i>
                                </span>
                                <img class="w-75" src="../../img/product_images/products/<?php echo $imgRow["product_image_name"]; ?>" alt="phone_model_image">
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                 
                </div>

                <div class="form-row">
                    <div div class="form-group col-md-12">
                        <h6 class="text-danger mt-4">*Add More Product Images Here</h6>
                    </div>
                </div>

                <div class="form-row">
                    <div class="file-upload">
                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )"><i class="fas fa-plus-circle"></i> Add Images</button>

                        <div class="image-upload-wrap">
                            <input class="file-upload-input" type='file' id="prodImg" name="productImg[]" accept="image/*" oninput="productImgValidate()" multiple />
                            <div class="drag-text">
                                <h3>Drag and drop a file or select add Image</h3>
                                <div class="h4 text-danger font-weight-bold" id="productImgErr"></div>
                            </div>
                        </div>
                        <div class="container">

                            <div class="file-upload-content row">

                            </div>

                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="regDate" name="regDate" readonly>
                <div class="form-row">
                    <div class="form-group col-md-12 text-right">
                        <button type="button" class="btn btn-outline-primary userform-button" id="product-form-edit"><i class="far fa-edit"></i>&nbsp;Update</button>
                        <button type="button" class="btn btn-outline-secondary userform-button" id="product-form-reset2"><i class="fas fa-undo"></i>&nbsp;Reset</button>

                    </div>
                </div>
            </form>
            <!------------------------------------------------------------ Productform end --------------------------------------------------------------->

        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('prodDescription');
    $('[data-toggle="tooltip"]').tooltip();
</script>
<script type="text/javascript" src="../../js/validation.js"></script>
<script type="text/javascript" src="../../js/validation2.js"></script>
