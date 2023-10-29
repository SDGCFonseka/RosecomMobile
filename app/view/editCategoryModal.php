<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$categoryId = base64_decode($_REQUEST['id']);
$categoryEditResult = $productObj->getCategoryBy_id_fromCategory($categoryId);
?>

<div class="modal-header">
    <div class="modal-title modal-form-msg mt-2" id="eCatFormResponse"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">
    <div class="container">
        <div class="col-md-12">
            <?php
            while ($editRow = $categoryEditResult->fetch_assoc()) {
            ?>
                <!------------------------------------------------------- Category form start --------------------------------------------------------->
                <form name="editCategoryForm" id="editCategoryForm" enctype="multipart/form-data">

                    <div class="form-row">
                        <div class="form-group text-center col-md">
                            <h2>Edit Category</h2>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" id="catId" name="catId" value="<?php echo $editRow['category_id']; ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6 col-sm-6">
                            <label>Category Name</label>
                            <input type="text" class="form-control" id="catName" name="catName" value="<?php echo $editRow['category_name']; ?>" placeholder="Category Name" oninput="catNameValidate()">
                            <span id="catNmIcon"></span>
                            <span class="text-danger error-msg" id="catNamErr"></span>
                            <span class="text-danger error-msg" id="catNamErr3"></span>
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label>Category Image</label>
                            <div class="custom-file">
                                <input type="hidden" name="defaultCatImg" value="<?php echo $editRow['category_image']; ?>" />
                                <input type="file" class="custom-file-input" id="catImg" name="catImg" oninput="catImgValidate()">
                                <label class="custom-file-label" id="catImgInput"><?php echo $editRow['category_image']; ?></label>
                                <span id="catImgIcon"></span>
                            </div>
                            <span class="text-danger error-msg" id="catImgErr"></span>
                           
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6 col-sm-6"></div>
                    <div class="form-group col-md-6 col-sm-6">
                    <div class="ml-1">
                                <img id="prev_catImg" width="auto" height="100px" src="../../img/category_images/<?php echo $editRow['category_image']; ?>" style="border-radius:5%;" />
                            </div>
                    </div>
                    </div>

                    <div class="form-group col-md-12 text-right">
                        <button type="button" class="btn btn-outline-primary userform-button" id="cat-form-edit"><i class="far fa-edit"></i>&nbsp;Update</button>

                    </div>
                </form>
                <!------------------------------------------------------- Category form end --------------------------------------------------------->
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript"  src="../../js/validation.js"></script>
<script type="text/javascript" src="../../js/validation2.js"></script>