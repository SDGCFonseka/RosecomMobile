<?php
session_start();
// incude sql model
include_once '../model/userModel.php';
$userObj = new user();
$userRoleResult = $userObj->getAllUserRole(); // get user role info
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
    <div class="modal-title modal-form-msg pt-2" id="userFormResponse"></div>
    <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
        <span>&times;</span>
    </a>
</div>

<div class="modal-body">
    <div class="container">
        <div class="col-md-12">
            <!------------------------------------------------------------ Userform start --------------------------------------------------------------->
            <form name="userForm" id="userForm" enctype="multipart/form-data">
                <!--action="../controller/userController.php?status=addUser" method="post"-->
                <div class="form-row">
                    <div class="form-group text-center col-md">
                        <h2>Add User</h2>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" oninput="firstNameValidate()" maxlength="20">
                        <span id="firstNameIcon"></span>
                        <span class="text-danger error-msg" id="firstNamErr"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" oninput="lastNameValidate()" maxlength="20">
                        <span id="lastNameIcon"></span>
                        <span class="text-danger error-msg" id="lastNamErr"></span>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" max="<?php //echo $max;?>" min="<?php //echo $min; ?>" placeholder="Date of Birth" oninput="dobValidate(),dobNicValidate()">
                        <span class="text-danger error-msg" id="dobErr"></span>
                        <span class="text-danger error-msg" id="dobErr2"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Gender</label>
                        <div class="form-row-6">
                            <div class="form-check form-check-inline">
                                <!---------- Female ------------>
                                <label class="form-check-label form-radio-lb"><i class="fas fa-female"></i> Female</label>
                                <input class="form-check-input" type="radio" id="gender" name="gender" value="0" onclick="genderValidate()">
                                <!---------- Male ------------->
                                <label class="form-check-label form-radio-lb"><i class="fas fa-male"></i> Male</label>
                                <input class="form-check-input" type="radio" id="gender" name="gender" value="1" onclick="genderValidate()">
                            </div>
                        </div>
                        <span class="text-danger error-msg" id="genderErr"></span>
                        <span id="genderIcon"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>NIC No.</label>
                        <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC" oninput="nicValidate(),dobNicValidate()">
                        <span id="nicIcon"></span>
                        <span class="text-danger error-msg" id="nicErr"></span>
                        <span class="text-danger error-msg" id="nicErr2"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input type="text" class="form-control" id="emailAddress" name="emailAddress" placeholder="example@gmail.com" oninput="emailValidate()">
                        <span id="emailIcon"></span>
                        <span class="text-danger error-msg" id="emailAddErr"></span>
                        <span class="text-danger error-msg" id="emailAddErr2"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Landline No.</label>
                        <input type="tel" class="form-control" id="landlineNo" name="landlineNo" placeholder="Landline Number" oninput="contactValidate(),landlineValidate()">
                        <span id="landlineIcon"></span>
                        <span class="text-danger error-msg" id="contactErr1"></span>
                        <span class="text-danger error-msg" id="contactErr3"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Mobile No.</label>
                        <input type="tel" class="form-control" id="mobileNo" name="mobileNo" placeholder="Mobile Number" oninput="contactValidate(),mobileValidate()">
                        <span id="mobileIcon"></span>
                        <span class="text-danger error-msg" id="contactErr4"></span>
                        <span class="text-danger error-msg" id="contactErr2"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Home Address</label>
                        <input type="text" class="form-control address-field" id="address1" name="address1" placeholder="Address Line 1" oninput="addressValidate()">
                        <span id="addressIcon"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Profile Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profileImg" name="profileImg" accept="image/*" oninput="proImgValidate()">
                            <label class="custom-file-label" id="proImgInput">Choose file</label>
                            <span id="profileIcon"></span>
                        </div>
                        <span class="text-danger error-msg" id="profileImgErr"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Address Line 2" oninput="addressValidate()">
                        <span id="addressIcon2"></span>
                        <span class="text-danger error-msg" id="addressErr"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <img id="prev_profileImg" width="auto" height="110px" src="../../img/interface_images/formDefaultImg.jpg" style="border-radius:5%;" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Ex: Wattala" oninput="cityValidate()">
                        <span id="cityIcon"></span>
                        <span class="text-danger error-msg" id="cityErr"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" name="username" oninput="usernameValidate()" placeholder="Please type your username !">
                        <span id="userNmIcon"></span>
                        <span class="text-danger error-msg" id="usernameErr"></span>
                        <span class="text-danger error-msg" id="usernameErr2"></span>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input class="form-control" type="password" id="password" name="password" oninput="passwordValidate(),confirmPswdValid()" placeholder="Please type your password !">
                            <div id="pw_append" class="input-group-append">
                                <span class="input-group-text">
                                    <i id="pw_icon" class="fas fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                            <span id="passIcon"></span>
                        </div>
                        <span class="text-danger error-msg" id="passwordEr"></span>
                        <!-------------------------- Progress bar start ------------------------>
                        <div class="progress">
                            <div id="progressBar" class="progress-bar"></div>
                        </div>
                        <!-------------------------- Progress bar end -------------------------->
                    </div>
                    <div class="form-group col-md-6">
                        <label>Confirm password</label>
                        <div class="input-group" id="show_hide_password">
                            <input class="form-control" type="password" id="re_password" oninput="passwordValidate(),confirmPswdValid()" placeholder="Please re-type your password !">
                            <div id="cpw_append" class="input-group-append">
                                <span class="input-group-text">
                                    <i id="cpw_icon" class="fas fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                            <span id="passIcon2"></span>
                        </div>

                        <span class="text-danger error-msg" id="passwordEr2"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>User Role</label>
                        <select class="form-control" name="uRoleId" id="uRoleId" oninput="userRoleValidate(),showFunction(this.value)">
                            <option value="">Select a Role</option>
                            <?php
                            while ($roleRow = $userRoleResult->fetch_assoc()) {
                                echo "<option value=" . $roleRow['role_id'] . ">" . $roleRow['role_name'] ."</option>";
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
                    <div class="col-md-12" id="showFunc"></div>
                </div>
                <!-------------------------------- Function Displaying end ----------------------------------->
                
                <input type="hidden" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="regDate" name="regDate" readonly>
                <div class="form-row">
                    <div class="form-group col-md-12 text-right">
                        <button type="button" class="btn btn-outline-primary userform-button" id="user-form-submit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
                        <button type="button" class="btn btn-outline-secondary userform-button" id="user-form-reset"><i class="fas fa-undo"></i>&nbsp;Clear</button>
                    </div>
                </div>
            </form>
            <!------------------------------------------------------------ Userform start --------------------------------------------------------------->

        </div>
    </div>
</div>

<script type="text/javascript" src="../../js/validation.js"></script>
<script type="text/javascript" src="../../js/validation2.js"></script>