<?php
session_start();
include_once '../model/supplierModel.php';
$suppObj = new supplier();
$suppId = base64_decode($_REQUEST['id']);
$suppViewResult = $suppObj->getSupplierBy_id_fromSupplier($suppId);
?>


<!-- Modal window start -->
<?php

while ($viewInfo = $suppViewResult->fetch_assoc()) {

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
                <th class="col-sm-6">Company Name :</th>
                <td class="col-sm-6"><?php echo $viewInfo['company_name'];?></td>
            </tr>
            <tr>
                <th scope="col">Company E-mail :</th>
                <td scope="row"><?php echo $viewInfo['company_email']; ?></td>
            </tr>
            <tr>
                <th scope="col">Company Address :</th>
                <td scope="row"><?php echo $viewInfo['company_address1'] . '<br>' .$viewInfo['company_address2']. '<br>' .$viewInfo['company_address3']; ?></td>
            </tr>
            <tr>
                <th scope="col">Company Contact :</th>
                <td scope="row"><?php echo $viewInfo['company_contact1'] . '<br>' . $viewInfo['company_contact2']; ?></td>
            </tr>
            <tr>
                <th scope="col">Supplier Name :</th>
                <td scope="row"><?php echo $viewInfo['supplier_name']; ?></td>
            </tr>
            <tr>
                <th scope="col">Supplier DOB. :</th>
                <td scope="row"><?php echo $viewInfo['supplier_age']; ?></td>
            </tr>
            <tr>
                <th scope="col">Supplier E-mail :</th>
                <td scope="row"><?php echo $viewInfo['supplier_email']; ?></td>
            </tr>
            <tr>
                <th scope="col">Supplier Contact :</th>
                <td scope="row"><?php echo $viewInfo['supplier_contact']; ?></td>
            </tr>
           
        </table>
    </div>
<?php
}
?>
<!-- Modal window end -->