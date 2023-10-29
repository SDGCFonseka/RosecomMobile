<?php
session_start();
include_once '../model/customerModel.php'; // incude sql model
$customerObj = new customer(); 
$customerId = base64_decode($_REQUEST['id']);
$custEditResult = $customerObj->getCustomerBy_id_fromCustomer($customerId);
/*=============== set date max and min START ==============*/
$ctid = time();
$sec18 = (60 * 60 * 24 * 365 * 18) + 60 * 60 * 24 * 4;
$ptid = $ctid - $sec18;
$max = date("Y-m-d", $ptid);
$sec60 = (60 * 60 * 24 * 365 * 60) + 60 * 60 * 24 * 15;
$pptid = $ctid - $sec60;
$min = Date("Y-m-d", $pptid);
/*=============== set date max and min END ==============*/
?>

<div class="modal-header">
    <div class="modal-title modal-form-msg pt-2" id="eCustFormResponse"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">
    <div class="container">
        <div class="col-md-12">
        <?php
            while ($editRow = $custEditResult->fetch_assoc()) {
            ?>
            <!------------------------------------------------------------ Customerform start --------------------------------------------------------------->
            <form name="editCustomerForm" id="editCustomerForm" enctype="multipart/form-data">
                <!--action="../controller/userController.php?status=addUser" -->
                <div class="form-row">
                    <div class="form-group text-center col-md">
                        <h2>Edit Customer</h2>
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" id="cid" name="cid" value="<?php echo $editRow['customer_id'];  ?>" class="form-control" readonly>
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $editRow['customer_first_name'];  ?>" oninput="firstNameValidateC()" maxlength="20">
                        <span id="firstNameIcon"></span>
                        <span class="text-danger error-msg" id="firstNamErr"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $editRow['customer_last_name'];  ?>" oninput="lastNameValidateC()" maxlength="20">
                        <span id="lastNameIcon"></span>
                        <span class="text-danger error-msg" id="lastNamErr"></span>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" max="<?php //echo $max;?>" min="<?php //echo $min; ?>" value="<?php echo $editRow['customer_dob'];  ?>" placeholder="Date of Birth" oninput="dobValidateC(),dobNicValidateC()">
                        <span class="text-danger error-msg" id="dobErr"></span>
                        <span class="text-danger error-msg" id="dobErr2"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Gender</label>
                        <div class="form-row-6">
                            <div class="form-check form-check-inline">
                                <!---------- Female ------------>
                                <label class="form-check-label form-radio-lb"><i class="fas fa-female"></i> Female</label>
                                <input class="form-check-input" type="radio" id="gender" name="gender" value="0" onclick="genderValidateC()" <?php if ($editRow['customer_gender'] == 0) { ?> checked <?php } ?>>
                                <!---------- Male ------------->
                                <label class="form-check-label form-radio-lb"><i class="fas fa-male"></i> Male</label>
                                <input class="form-check-input" type="radio" id="gender" name="gender" value="1" onclick="genderValidateC()" <?php if ($editRow['customer_gender'] == 1) { ?> checked <?php } ?>>
                            </div>
                        </div>
                        <span class="text-danger error-msg" id="genderErr"></span>
                        <span id="genderIcon"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>NIC No.</label>
                        <input type="text" class="form-control" id="cNic" name="cNic" placeholder="NIC" value="<?php echo $editRow['customer_nic'];  ?>" oninput="dobNicValidateC()" readonly>
                        <span id="nicIcon"></span>
                        <span class="text-danger error-msg" id="nicErr"></span>
                        <span class="text-danger error-msg" id="nicErr2"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input type="text" class="form-control" id="cEmailAddress" name="cEmailAddress" value="<?php echo $editRow['customer_email'];  ?>" placeholder="example@gmail.com" oninput="emailValidateC()">
                        <span id="emailIcon"></span>
                        <span class="text-danger error-msg" id="emailAddErr"></span>
                        <span class="text-danger error-msg" id="emailAddErr2"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Landline No.</label>
                        <input type="tel" class="form-control" id="landlineNo" name="landlineNo" placeholder="Landline Number" value="<?php echo $editRow['customer_landline_no'];  ?>" oninput="contactValidateC(),landlineValidateC()">
                        <span id="landlineIcon"></span>
                        <span class="text-danger error-msg" id="contactErr1"></span>
                        <span class="text-danger error-msg" id="contactErr3"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Mobile No.</label>
                        <input type="tel" class="form-control" id="mobileNo" name="mobileNo" placeholder="Mobile Number" value="<?php echo $editRow['customer_mobile_no'];  ?>"  oninput="contactValidateC(),mobileValidateC()">
                        <span id="mobileIcon"></span>
                        <span class="text-danger error-msg" id="contactErr4"></span>
                        <span class="text-danger error-msg" id="contactErr2"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Home Address</label>
                        <input type="text" class="form-control address-field" id="address1" name="address1" value="<?php echo $editRow['customer_address1'];  ?>" placeholder="Address Line 1" oninput="addressValidateC()">
                        <span id="addressIcon"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Profile Image</label>
                        <input type="hidden" name="defaultCproImg" value="<?php echo $editRow['customer_profile_image']; ?>" />
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="cProfileImg" name="cProfileImg" oninput="proImgValidateC()">
                            <label class="custom-file-label" id="proImgInput"><?php echo $editRow['customer_profile_image']; ?></label>
                            <span id="profileIcon"></span>
                        </div>
                        <span class="text-danger error-msg" id="profileImgErr"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $editRow['customer_address2'];  ?>" placeholder="Address Line 2" oninput="addressValidateC()">
                        <span id="addressIcon2"></span>
                        <span class="text-danger error-msg" id="addressErr"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <img id="prev_cProfileImg" width="auto" height="110px" src="../../img/customer_profile_images/<?php echo $editRow['customer_profile_image']; ?>" style="border-radius:2px;" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $editRow['customer_city'];  ?>" placeholder="Ex: Wattala" oninput="cityValidateC()">
                        <span id="cityIcon"></span>
                        <span class="text-danger error-msg" id="cityErr"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Postal Code</label>
                        <input type="text" class="form-control" id="postCode" name="postCode" value="<?php echo $editRow['customer_postal_code'];  ?>" placeholder="Ex: 11300" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, ''),postalCodeC()">
                        <span id="pCodeIcon"></span>
                        <span class="text-danger error-msg" id="pCodeErr"></span>
                    </div>
                </div>
                
              
                <input type="hidden" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="regDate" name="regDate" readonly>
                <div class="form-row">
                    <div class="form-group col-md-12 text-right">
                        <button type="button" class="btn btn-outline-primary userform-button" id="customer-form-edit"><i class="far fa-edit"></i>&nbsp;Update</button>
                        
                    </div>
                </div>
            </form>
            <!------------------------------------------------------------ Customerform end --------------------------------------------------------------->
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../js/validation.js"></script>
<script type="text/javascript" src="../../js/validation2.js"></script>