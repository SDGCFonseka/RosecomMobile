<?php
session_start();
// incude sql model
include_once '../model/supplierModel.php';
$suppObj = new supplier();
$suppId = base64_decode($_REQUEST['id']);
$suppEditResult = $suppObj->getSupplierBy_id_fromSupplier($suppId);
/*=============== set date max and min START ==============*/
// $ctid = time();
// $sec18 = (60 * 60 * 24 * 365 * 18) + 60 * 60 * 24 * 4;
// $ptid = $ctid - $sec18;
// $max = date("Y-m-d", $ptid);
// $sec60 = (60 * 60 * 24 * 365 * 60) + 60 * 60 * 24 * 15;
// $pptid = $ctid - $sec60;
// $min = Date("Y-m-d", $pptid);
/*=============== set date max and min END ==============*/
?>

<div class="modal-header">
    <div class="modal-title modal-form-msg pt-2" id="eSuppFormResponse"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">
    <div class="container">
        <div class="col-md-12">
            <?php
            while ($editRow = $suppEditResult->fetch_assoc()) {
            ?>
                <!------------------------------------------------------------ SupplierForm start --------------------------------------------------------------->
                <form name="editSuppForm" id="editSuppForm" enctype="multipart/form-data">
                    <!--action="../controller/supplierController.php?status=addUser" method="post"-->
                    <div class="form-row">
                        <div class="form-group text-center col-md">
                            <h2>Edit Supplier</h2>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" id="suppId" name="suppId" value="<?php echo $editRow['supplier_id'];  ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Company Name</label>
                            <input type="text" class="form-control" id="compName" name="compName" value="<?php echo $editRow['company_name']; ?>" placeholder="Company Name" oninput="validateCompName()" maxlength="30">
                            <span id="compNmIcon"></span>
                            <span class="text-danger error-msg" id="compNmError"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Company E-mail</label>
                            <input type="text" class="form-control" id="compEmail" name="compEmail" value="<?php echo $editRow['company_email']; ?>" placeholder="Example@hotmail.com" oninput="validateCompEmail()" maxlength="40">
                            <span id="compEmIcon"></span>
                            <span class="text-danger error-msg" id="compEmErr"></span>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Company Address</label>
                            <input type="text" class="form-control" id="compAddr1" name="compAddr1" value="<?php echo $editRow['company_address1']; ?>" placeholder="Address Line 1" oninput="validateCompAddress()">
                            <span id="compAddrIcon1"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Company Contact</label>
                            <input type="tel" class="form-control" id="compContact1" name="compContact1" value="<?php echo $editRow['company_contact1']; ?>" placeholder="Contact Line 1" oninput="validateCompContact(),validateContact1()">
                            <span id="contactIcon1"></span>
                            <span class="text-danger error-msg" id="contactErr1"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="compAddr2" name="compAddr2" value="<?php echo $editRow['company_address2']; ?>" placeholder="Address Line 2" oninput="validateCompAddress()">
                            <span id="compAddrIcon2"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="tel" class="form-control" id="compContact2" name="compContact2" value="<?php echo $editRow['company_contact2']; ?>" placeholder="Contact Line 2" oninput="validateCompContact(),validateContact2()">
                            <span id="contactIcon2"></span>
                            <span class="text-danger error-msg" id="contactErr"></span>
                            <span class="text-danger error-msg" id="contactErr2"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="compAddr3" name="compAddr3" value="<?php echo $editRow['company_address3']; ?>" placeholder="Address Line 3" oninput="validateCompAddress()">
                            <span id="compAddrIcon3"></span>
                            <span class="text-danger error-msg" id="compAddrErr"></span>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Supplier Name</label>
                            <input type="text" class="form-control" id="suppName" name="suppName" value="<?php echo $editRow['supplier_name']; ?>" placeholder="Supplier Name" oninput="validateSuppName()" maxlength="40">
                            <span id="sNameIcon"></span>
                            <span class="text-danger error-msg" id="sNameErr"></span>

                        </div>
                        <div class="form-group col-md-6">
                            <label>Supplier Age</label>
                            <input type="date" class="form-control" id="suppAge" name="suppAge" value="<?php echo $editRow['supplier_age']; ?>" oninput="validateSuppAge()">
                            <span class="text-danger error-msg" id="suppAgeErr"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Supplier Email</label>
                            <input type="text" class="form-control" id="suppEmail" name="suppEmail" value="<?php echo $editRow['supplier_email']; ?>" placeholder="john@gmail.com" oninput="validateSuppEmail()">
                            <span id="suppEmIcon"></span>
                            <span class="text-danger error-msg" id="suppEmErr"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Supplier Contact</label>
                            <input type="tel" class="form-control" id="suppContact" name="suppContact" value="<?php echo $editRow['supplier_contact']; ?>" placeholder="+9475638456" oninput="validateSuppContact()">
                            <span id="suppContIcon"></span>
                            <span class="text-danger error-msg" id="suppContErr"></span>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="regDate" name="regDate" readonly>
                    <div class="form-row">
                        <div class="form-group col-md-12 text-right">
                            <button type="button" class="btn btn-outline-primary userform-button" id="supp-form-edit"><i class="far fa-edit"></i>&nbsp;Update</button>
                            <button type="button" class="btn btn-outline-secondary userform-button" id="supp-form-reset2"><i class="fas fa-undo"></i>&nbsp;Reset</button>
                          
                        </div>
                    </div>
                </form>
                <!------------------------------------------------------------ Supplierform start --------------------------------------------------------------->
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../js/validation.js"></script>
<script type="text/javascript" src="../../js/validation2.js"></script>