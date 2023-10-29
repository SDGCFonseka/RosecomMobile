<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$catResult = $productObj->getAllCategory();
$brandResult = $productObj->getAllBrand();
$productId = base64_decode($_REQUEST['id']);

// print_r($productId);
?>

<div class="modal-header">
    <div class="modal-title modal-form-msg pt-2"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">
    <div class="container">
        <div class="col-md-12">
            <!------------------------------------------------------------ Productform start --------------------------------------------------------------->

            <!--action="../controller/productController.php?status=addProduct" method="post"-->
            <div class="form-row">
                <div class="form-group text-center col-md">
                    <h2>View Product</h2>
                </div>
            </div>
            <table width="100%" id="viewProdTable" class="display nowrap modelTb table-striped table-dark">
                <?php
                $productEditRes = $productObj->getProductBy_id_fromProduct($productId);
                while ($viewRow = $productEditRes->fetch_assoc()) {
                    $brandId = $viewRow['brand_brand_id'];
                    $productViewResult5 = $productObj->getBrandBy_id_fromBrand($brandId);
                    $viewRow2 = $productViewResult5->fetch_assoc();
                    $categoryId = $viewRow['category_category_id'];
                    $productViewResult6 = $productObj->getCategoryBy_id_fromCategory($categoryId);
                    $viewRow3 = $productViewResult6->fetch_assoc();
                ?>

                    <tr>
                        <td width="5%"></td>
                        <td>Product Name</td>
                        <td><?php echo $viewRow['product_name']; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Product Brand</td>
                        <?php $brandImg = $viewRow2['brand_image']; ?>
                        <td><?php echo '<img style="width:auto;height:30px;" src="../../img/brand_images/' . $brandImg . ' ">' ?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Product Category</td>
                        <?php $categoryImg = $viewRow3['category_image']; ?>
                        <td><?php echo '<img style="width:auto;height:30px;" src="../../img/category_images/' . $categoryImg . ' ">' . '&nbsp;&nbsp;' . $viewRow3['category_name']; ?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Operating System(If Applicable)</td>
                        <td><?php echo $viewRow['product_os']; ?></td>
                    </tr>

            </table>





        </div>
        <div class="col-md-12 p-3"></div>
        <div class="col-md-12">
            <div class="form-row" id="textView">
                <div class="form-group col-md-12">
                    <textarea class="form-control" id="vwProdDescription" name="vwProdDescription" disabled><?php echo $viewRow['product_description']; ?></textarea>
                    <span id="hdModDesIcon"></span>
                    <span class="text-danger error-msg" id="contactErr1"></span>

                </div>
            </div>
        </div>
    <?php
                }
    ?>
    </div>
</div>

<script>
    CKEDITOR.replace('vwProdDescription');
    
</script>