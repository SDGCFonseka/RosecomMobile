<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$brandId = base64_decode($_REQUEST['id']);
$brandViewResult = $productObj->getBrandBy_id_fromBrand($brandId);
?>


<!-- Modal window start -->
<?php

while ($viewInfo = $brandViewResult->fetch_assoc()) {

?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
            <span>&times;</span>
        </a>
    </div>
   <div class="modal-body">
        <table class="table table-borderless table-reponsive-*">

            <tr>

                <th class="col-sm-4">Brand Image :</th>
                <td class="col-sm-8"><img src="../../img/brand_images/<?php echo $viewInfo['brand_image']; ?>" style="width:auto;height:160px;border-radius:5px;" /></td>
            </tr>
            <tr>
                <th scope="col">Brand Name :</th>
                <td scope="row"><?php echo $viewInfo['brand_name']; ?></td>
            </tr>
            <tr>
                <th scope="col">Brand Description :</th>
                <td scope="row"><?php echo $viewInfo['brand_description']; ?></td>
            </tr>
         </table>
    </div>
<?php
}
?>
<!-- Modal window end -->