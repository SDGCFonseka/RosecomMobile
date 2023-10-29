<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$categoryId = base64_decode($_REQUEST['id']);
$categoryViewResult = $productObj->getCategoryBy_id_fromCategory($categoryId);
?>


<!-- Modal window start -->
<?php

while ($viewInfo = $categoryViewResult->fetch_assoc()) {

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
                <th class="col-md-6">Category Image :</th>
                <td class="col-md-6"><img src="../../img/category_images/<?php echo $viewInfo['category_image']; ?>" style="width:auto;height:160px;border-radius:5px;" /></td>
            </tr>
            
         </table>
    </div>
<?php
}
?>
<!-- Modal window end -->