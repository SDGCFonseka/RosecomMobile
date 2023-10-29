<?php
session_start();
// incude sql model
include_once '../model/userModel.php';
$userObj = new user();
$userId = base64_decode($_REQUEST['id']);
$userEditResult = $userObj->getUserBy_id_fromUser($userId);
$userRoleResult = $userObj->getAllUserRole();
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
<div class="modal-title modal-form-msg pt-2" id="eUserFormResponse"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">

    <div class="container">
        <div class="col-md-12">
            <?php
            while ($editRow = $userEditResult->fetch_assoc()) {
            ?>
                <form id="editUserForm" name="editUserForm" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group text-center col-md">
                            <h2>Edit User</h2>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" id="uid" name="uid" value="<?php echo $editRow['user_id'];  ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $editRow['user_first_name']; ?>" placeholder="First Name" oninput="firstNameValidate()" maxlength="20">
                            <span id="firstNameIcon"></span>
                            <span class="text-danger error-msg" id="firstNamErr"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $editRow['user_last_name']; ?>" placeholder="Last Name" oninput="lastNameValidate()" maxlength="20">
                            <span id="lastNameIcon"></span>
                            <span class="text-danger error-msg" id="lastNamErr"></span>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" min="<?php //echo $min; 
                                                                                                ?>" max="<?php //echo $max; 
                                                                                                                            ?>" value="<?php echo $editRow['user_dob']; ?>" placeholder="Date of Birth" oninput="dobValidate(),dobNicValidate()">
                            <span class="text-danger error-msg" id="dobErr"></span>
                            <span class="text-danger error-msg" id="dobErr2"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gender</label>
                            <div class="form-row-6">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label form-radio-lb"><i class="fas fa-female"></i> Female</label>
                                    <input class="form-check-input" type="radio" id="gender" name="gender" value="0" onclick="genderValidate()" <?php if ($editRow['user_gender'] == 0) { ?> checked <?php } ?>>
                                    <!---------- Female ------------>
                                    <label class="form-check-label form-radio-lb"><i class="fas fa-male"></i> Male</label>
                                    <input class="form-check-input" type="radio" id="gender" name="gender" value="1" onclick="genderValidate()" <?php if ($editRow['user_gender'] == 1) { ?> checked <?php } ?>>
                                    <!---------- Male ------------>
                                </div>
                            </div>
                            <span class="text-danger error-msg" id="genderErr"></span>
                            <span id="genderIcon"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>NIC No.</label>
                            <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC" value="<?php echo $editRow['user_nic']; ?>" oninput="dobNicValidate()" readonly>
                            <span id="nicIcon"></span>
                            <span class="text-danger error-msg" id="nicErr"></span>
                            <span class="text-danger error-msg" id="nicErr2"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email Address</label>
                            <input type="text" class="form-control" id="emailAddress" name="emailAddress" value="<?php echo $editRow['user_email_address']; ?>" placeholder="example@gmail.com" oninput="emailValidate()">
                            <span id="emailIcon"></span>
                            <span class="text-danger error-msg" id="emailAddErr"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Landline No.</label>
                            <input type="tel" class="form-control" id="landlineNo" name="landlineNo" value="<?php echo $editRow['user_landline_no']; ?>" placeholder="Landline Number" oninput="contactValidate(),landlineValidate()">
                            <span id="landlineIcon"></span>
                            <span class="text-danger error-msg" id="contactErr1"></span>
                            <span class="text-danger error-msg" id="contactErr3"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Mobile No.</label>
                            <input type="tel" class="form-control" id="mobileNo" name="mobileNo" value="<?php echo $editRow['user_mobile_no']; ?>" placeholder="Mobile Number" oninput="contactValidate(),mobileValidate()">
                            <span id="mobileIcon"></span>
                            <span class="text-danger error-msg" id="contactErr4"></span>
                            <span class="text-danger error-msg" id="contactErr2"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Home Address</label>
                            <input type="text" class="form-control address-field" id="address1" name="address1" value="<?php echo $editRow['user_address1']; ?>" placeholder="Address Line 1" oninput="addressValidate()">
                            <span id="addressIcon"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Profile Image</label>
                            <input type="hidden" name="defaultProImg" value="<?php echo $editRow['user_profile_image']; ?>" />
                           <div class="custom-file">
                                <input type="file" class="custom-file-input" id="profileImg" name="profileImg" oninput="proImgValidate()">
                                <label class="custom-file-label" id="proImgInput"><?php echo $editRow['user_profile_image']; ?></label>
                                <span id="profileIcon"></span>
                            </div>
                            <span class="text-danger error-msg" id="profileImgErr"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $editRow['user_address2']; ?>" placeholder="Address Line 2" oninput="addressValidate()">
                            <span id="addressIcon2"></span>
                            <span class="text-danger error-msg" id="addressErr"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <img id="prev_profileImg" width="auto" height="100px" src="../../img/user_profile_images/<?php echo $editRow['user_profile_image']; ?>" style="border-radius:2px;" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $editRow['user_city']; ?>" placeholder="Ex: Wattala" oninput="cityValidate()">
                            <span id="cityIcon"></span>
                            <span class="text-danger error-msg" id="cityErr"></span>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>User Role</label>
                        <select class="form-control" name="uRoleId" id="uRoleId" oninput="showFunction(this.value),userRoleValidate()">
                            <option value="">Select a Role</option>
                            <?php
                           while ($roleRow = $userRoleResult->fetch_assoc()) {
                              ?>
                            <option value="<?php echo $roleRow['role_id']?>"<?php if($editRow['role_role_id']==$roleRow['role_id']) echo "SELECTED" ?>><?php echo $roleRow['role_name']?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <span id="roleIcon"></span>
                        <span class="text-danger error-msg" id="roleEr"></span>
                    </div>
                    </div>
                <div class="row">
                    <div class="col-md-12"><br/></div>
                </div>
                <!-------------------------------- Function Displaying start --------------------------------->
                <div class="row">
                <div class="col-md-12" id="showFunc">
                    <div class="row">
                        <?php
                        $roleId = $editRow['role_role_id'];
                    $userResult = $userObj->getModule_RoleByRole_Id($roleId);
					while ($row = $userResult->fetch_assoc()) {
						$moduleId = $row['module_module_id'];
						$userResult2 = $userObj->getModuleBy_Id($moduleId);
						$row2 = $userResult2->fetch_assoc();
                        ?>
                        <div class="col-md-4" style="min-height: 150px">
						<h5><?php echo $row2['module_name']; ?></h5>
                        <?php 
                        $userResult3 = $userObj->getFunctionBy_ModuleId($moduleId);
						while ($row3 = $userResult3->fetch_assoc()) {
                        ?>
                        <div class="custom-control custom-switch">
                    		   <input type="checkbox" class="custom-control-input" id="<?php echo $row3['function_id']; ?>" name="fun[]" value="<?php echo $row3['function_id']; ?>" checked />
                   			   <label class="custom-control-label" for="<?php echo $row3['function_id']; ?>"><?php echo $row3['function_name']; ?></label>
                		</div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    }
                    ?>
                    </div>
                    </div>
                </div>
                <!-------------------------------- Function Displaying end ----------------------------------->

                    <div class="form-row">
                        <div class="form-group col-md-12 text-right">
                            <button type="button" class="btn-outline-primary btn" id="user-form-edit" class="form-control userform-button"><i class="far fa-edit"></i>&nbsp;Update</button>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../js/validation.js"></script>
<script type="text/javascript" src="../../js/validation2.js"></script>