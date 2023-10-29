<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$catResult = $productObj->getAllCategory();
$brandResult = $productObj->getAllBrand();
?>

<div class="modal-header">
    <div class="modal-title modal-form-msg pt-2" id="productFormResponse"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">
    <div class="container">
        <div class="col-md-12">
            <!------------------------------------------------------------ Productform start --------------------------------------------------------------->
            <form name="productForm" id="productForm" enctype="multipart/form-data">
                <!--action="../controller/productController.php?status=addProduct" method="post"-->
                <div class="form-row">
                    <div class="form-group text-center col-md">
                        <h2>Add Product</h2>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Product Name</label>
                        <input type="text" class="form-control" id="prodName" name="prodName" placeholder="Product Name" oninput="prodNameValidate()" maxlength="40">
                        <span id="prodNameIcon"></span>
                        <span class="text-danger error-msg" id="prodNamErr"></span>
                        <span class="text-danger error-msg" id="prodNamErr2"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Product Category</label>
                        <select class="form-control prodCategory" name="prodCategory" id="prodCategory" onchange="prodCategoryValidate()">
                            <option value="">Select a Category</option>
                            <?php
                            while ($catRow = $catResult->fetch_assoc()) {
                                if ($catRow['category_status'] == 1) {
                                    $categoryImg = $catRow['category_image'];
                                    echo "<option data-left='../../img/category_images/$categoryImg' value=" . $catRow['category_id'] . ">" . "&nbsp;&nbsp;&nbsp;" . $catRow['category_name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <span class="text-danger error-msg" id="prodCatErr"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Product Brand</label>
                        <select class="form-control" id="prodBrand" name="prodBrand"  onchange="prodBrandValidate()">
                            <option value="">Select a Brand</option>
                            <?php
                            while ($brandRow = $brandResult->fetch_assoc()) {
                                if ($brandRow['brand_status'] == 1) {
                                    $brandImg = $brandRow['brand_image'];
                                    echo "<option data-left='../../img/brand_images/$brandImg' value=" . $brandRow['brand_id'] . ">" . "&nbsp;&nbsp;&nbsp;" . $brandRow['brand_name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <span class="text-danger error-msg" id="prodBrandErr"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Operating System</label>
                        <input type="text" class="form-control" id="operatingSys" name="operatingSys" placeholder="Product Price" maxlength="50">
                        <span id="prodPriceIcon"></span>
                        <span class="text-danger error-msg" id="contactErr1"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Product Description</label>
                        <textarea class="form-control" id="prodDescription" name="prodDescription"></textarea>
                        <span id="productDesIcon"></span>
                        <span class="text-danger error-msg" id="contactErr1"></span>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="prod-field-head">Product Images</div>
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
                        <button type="button" class="btn btn-outline-primary userform-button" id="product-form-submit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
                        <button type="button" class="btn btn-outline-secondary userform-button" id="product-form-reset"><i class="fas fa-undo"></i>&nbsp;Clear</button>
                    </div>
                </div>
            </form>
            <!------------------------------------------------------------ Productform end --------------------------------------------------------------->

        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('prodDescription');
</script>
<script type="text/javascript" src="../../js/validation.js"></script>
<script type="text/javascript" src="../../js/validation2.js"></script>