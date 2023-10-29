<?php
session_start();
if (isset($_REQUEST['status'])) {

	include_once '../model/userModel.php'; //including user from userModel

	$userObj = new user(); // make user object from user class

	$status = $_REQUEST['status'];

	switch ($status) {

			/*===================================================================================================================================================================
																			Add User
		===================================================================================================================================================================*/

		case 'addUser':

			try {

				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$dob = $_POST['dob'];
				$gender = $_POST['gender'];
				$nic = $_POST['nic'];
				$landlineNo = $_POST['landlineNo'];
				$mobileNo = $_POST['mobileNo'];
				$address1 = $_POST['address1'];
				$address2 = $_POST['address2'];
				$emailAddress = $_POST['emailAddress'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$password = sha1($password);
				$city = $_POST['city'];
				$roleId = $_POST['uRoleId'];
				$fun = $_POST['fun']; // function to be done by one user
				$reg_date = $_POST['regDate'];



				if ($firstName == "") {
					throw new  Exception("firstname field is required");
				}

				//==================File Upload start======================

				if ($_FILES['profileImg']['name'] != "") {
					$proImage = $_FILES['profileImg']['name'];
					$proImage = time() . "_" . $proImage;
				} else {
					$proImage = ($gender == 0) ? "defaultimageF.jpg" : "defaultimageM.jpg";
				}

				$tmpLocation = $_FILES['profileImg']['tmp_name'];

				$path = "../../img/user_profile_images/$proImage";

				move_uploaded_file($tmpLocation, $path);

				//==================File Upload end======================


				$result = $userObj->addUser($firstName, $lastName, $dob, $gender, $nic, $landlineNo, $mobileNo, $address1, $address2, $emailAddress, $city, $proImage, $roleId, $reg_date);


				if ($result > 0) {
					$userId = $result;
					$userObj->addUserlogin($username, $password, $userId);
					foreach ($fun as $e) {
						$userObj->addUserPrivilages($e, $userId);
					}
					$output = '';
					$output .= '<table id="userTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">NIC No.</th>
								<th scope="col">Position</th>
								<th scope="col">Address</th>
								<th scope="col">E-mail Address</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
								$count = 0;
								$userResult = $userObj->getAllUser();
								while ($row = $userResult->fetch_assoc()) {
									$buttonActive = (($row['user_status'] == 0) ? 'inline' : 'none');
									$buttonInActive = (($row['user_status'] == 1) ? 'inline' : 'none');
									$count++;
					$output .= '<tr scope="row">
								<td>'.$count.'</td>
								<td><img src="../../img/user_profile_images/'.$row['user_profile_image'].'" style="width:50px;height:50px;border-radius:2px;" /></td>
								<td>'.$row['user_first_name'] . ' ' . $row['user_last_name'].'</td>
								<td>'.$row['user_nic'].'</td>
								<td>'; 
								$roleId = $row['role_role_id']; 
								$viewRoleRes = $userObj->getUserRole_ById($roleId);
								while($viewInfo2 = $viewRoleRes -> fetch_assoc()){
					$output .=	$viewInfo2['role_name'];// get role name
								}
					$output .=	'</td>
								<td>'.$row['user_address1'] . ' <br>' . $row['user_address2'] . ' <br>' . $row['user_city'] .'</td>
								<td>'.$row['user_email_address'].'</td>
					<td>

						<a href="editUserModal.php?id='.base64_encode($row['user_id']).'" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>

						<a href="userViewModal.php?id='.base64_encode($row['user_id']).'" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>

					</td>
					<td>
						<!-------------Active------------------>
						<button href="javaScript:void(0)" onclick="activeInactiveUser(\'' . base64_encode($row['user_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
						<!--------------Inactive------------------->
						<button href="javaScript:void(0)" onclick="activeInactiveUser(\'' . base64_encode($row['user_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:'. $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
					</td>
				</tr>';
								}
				$output .='</tbody>
							</table>';
				$output .='<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					
				$msg = 1;

					// header("Location: ../view/userManagement.php?response=$msg");
				} else {

					throw new Exception("Every field is required !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$msg = 2;
				$output = $error;
			}
			$data[0] = $msg;
			$data[1] = base64_encode($output);
			echo json_encode($data);
			break;

			/*===================================================================================================================================================================
																			Edit User
		===================================================================================================================================================================*/

		case 'editUser':

			try {

				$userId = $_POST['uid'];
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$dob = $_POST['dob'];
				$gender = $_POST['gender'];
				$nic = $_POST['nic'];
				$landlineNo =  $_POST['landlineNo'];
				$mobileNo =  $_POST['mobileNo'];
				$address1 = $_POST['address1'];
				$address2 = $_POST['address2'];
				$emailAddress = $_POST['emailAddress'];
				$city = $_POST['city'];
				$roleId = $_POST['uRoleId'];
				$fun = $_POST['fun'];
				$proImage = $_POST['defaultProImg'];
				$oldProImage = $_POST['defaultProImg'];

				if ($firstName == "") {
					throw new  Exception("firstname field is required");
				}

				
				if ($roleId == "") {
					throw new  Exception("user role is required");
				}

				//==================File Upload start======================
				// unlink the old image when new image uploaded


				if ($_FILES['profileImg']['name'] != "") {
					$proImage = $_FILES['profileImg']['name'];
					$proImage = time() . "_" . $_FILES['profileImg']['name'];

					$tmpLocation = $_FILES['profileImg']['tmp_name'];
					$path = "../../img/user_profile_images/$proImage";

					move_uploaded_file($tmpLocation, $path); // send file to the folder path

					// remove old profile image when new image uploads
					if ($oldProImage != "defaultimageM.jpg" && $oldProImage != "defaultimageF.jpg") {
						unlink("../../img/user_profile_images/$oldProImage");
					}
				} else {

					if ($_POST['defaultProImg'] == "defaultimageF.jpg" || $_POST['defaultProImg'] == "defaultimageM.jpg") {
						$proImage = ($gender == 0) ? "defaultimageF.jpg" : "defaultimageM.jpg";
						$tmpLocation = $_FILES['profileImg']['tmp_name'];
						$path = "../../img/user_profile_images/$proImage";

						move_uploaded_file($tmpLocation, $path); // send file to the folder path
					}
				}



				//==================File Upload end======================

				$result = $userObj->editUser($userId, $firstName, $lastName, $dob, $gender, $nic, $landlineNo, $mobileNo, $address1, $address2, $emailAddress, $city, $proImage, $roleId);

				if ($result > 0) {
					foreach ($fun as $e) {
						$userObj->addUserPrivilages($e, $userId);
					}
					$output = '';
					$output .= '<table id="userTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">NIC No.</th>
								<th scope="col">Position</th>
								<th scope="col">Address</th>
								<th scope="col">E-mail Address</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
								$count = 0;
								$userResult = $userObj->getAllUser();
								while ($row = $userResult->fetch_assoc()) {
									$buttonActive = (($row['user_status'] == 0) ? 'inline' : 'none');
									$buttonInActive = (($row['user_status'] == 1) ? 'inline' : 'none');
									$count++;
					$output .= '<tr scope="row">
								<td>'.$count.'</td>
								<td><img src="../../img/user_profile_images/'.$row['user_profile_image'].'" style="width:50px;height:50px;border-radius:2px;" /></td>
								<td>'.$row['user_first_name'] . ' ' . $row['user_last_name'].'</td>
								<td>'.$row['user_nic'].'</td>
								<td>'; 
								$roleId = $row['role_role_id']; 
								$viewRoleRes = $userObj->getUserRole_ById($roleId);
								while($viewInfo2 = $viewRoleRes -> fetch_assoc()){
					$output .=	$viewInfo2['role_name'];// get role name
								}
					$output .=	'</td>
								<td>'.$row['user_address1'] . ' <br>' . $row['user_address2'] . ' <br>' . $row['user_city'] .'</td>
								<td>'.$row['user_email_address'].'</td>
					<td>

						<a href="editUserModal.php?id='.base64_encode($row['user_id']).'" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>

						<a href="userViewModal.php?id='.base64_encode($row['user_id']).'" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>

					</td>
					<td>
						<!-------------Active------------------>
						<button href="javaScript:void(0)" onclick="activeInactiveUser(\'' . base64_encode($row['user_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
						<!--------------Inactive------------------->
						<button href="javaScript:void(0)" onclick="activeInactiveUser(\'' . base64_encode($row['user_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:'. $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
					</td>
				</tr>';
								}
				$output .='</tbody>
							</table>';
				$output .='<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					
				$msg = 1;
					// $msg = "Sucessfully edited User "."' ".$nic. " '"."!";
					// $msg = base64_encode($msg);
					// header("Location: ../view/userManagement.php?response=$msg");
				} else {
					throw new Exception("Failed to edit user !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$msg = 2;
				$output = $error;
			}
			$data[0] = $msg;
			$data[1] = base64_encode($output);
			echo json_encode($data);
			break;



			/*===================================================================================================================================================================
																			Check User Existance
		===================================================================================================================================================================*/

		case 'checkUsernameExistance':

			try {

				$username = $_POST["uname"];

				$getUname = $userObj->getUserInfo_ByUserName($username);

				if ($getUname->num_rows > 0) {
					$response = "yes";
				} else {
					throw new  Exception("failed to find username !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$response = "no";
			}

			echo $response;

			break;

			/*===================================================================================================================================================================
																			Check User NIC Existance
		===================================================================================================================================================================*/

		case 'checkUserNicExistance':

			try {

				$nic = $_POST["nic"];

				$getNic = $userObj->getUserInfo_ByNic($nic);

				if ($getNic->num_rows > 0) {
					$response = "yes";
				} else {
					throw new  Exception("failed to find NIC !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$response = "no";
			}

			echo $response;

			break;

			/*===================================================================================================================================================================
																			Check User & Driver EMAIL Existance
		===================================================================================================================================================================*/

		case 'checkUserEmailExistance':

			try {

				$email = $_POST["email"];

				$getEmail = $userObj->getUserInfo_ByEmail($email);
				$getEmail2 = $userObj->getDriverInfo_ByEmail($email);

				if ($getEmail->num_rows > 0 || $getEmail2->num_rows > 0) {
					$response = "yes";
				} else {
					throw new  Exception("failed to find Email !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$response = "no";
			}

			echo $response;

			break;

			/*===================================================================================================================================================================
																				Activate / Deactivate User
		===================================================================================================================================================================*/

		case 'activeDeactiveUser':

			try {

				$userId = base64_decode($_POST['id']);
				$userLogStatus =  $_POST['userLog_status'];

				$updateStatus = $userObj->updateUser_Status($userId, $userLogStatus);

				if ($updateStatus == 1) {

					$userObj->updateLogin_Status($userId, $userLogStatus);
					$output = '';
					$output .= '<table id="userTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">NIC No.</th>
								<th scope="col">Position</th>
								<th scope="col">Address</th>
								<th scope="col">E-mail Address</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
								$count = 0;
								$userResult = $userObj->getAllUser();
								while ($row = $userResult->fetch_assoc()) {
									$buttonActive = (($row['user_status'] == 0) ? 'inline' : 'none');
									$buttonInActive = (($row['user_status'] == 1) ? 'inline' : 'none');
									$count++;
					$output .= '<tr scope="row">
								<td>'.$count.'</td>
								<td><img src="../../img/user_profile_images/'.$row['user_profile_image'].'" style="width:50px;height:50px;border-radius:2px;" /></td>
								<td>'.$row['user_first_name'] . ' ' . $row['user_last_name'].'</td>
								<td>'.$row['user_nic'].'</td>
								<td>'; 
								$roleId = $row['role_role_id']; 
								$viewRoleRes = $userObj->getUserRole_ById($roleId);
								while($viewInfo2 = $viewRoleRes -> fetch_assoc()){
					$output .=	$viewInfo2['role_name'];// get role name
								}
					$output .=	'</td>
								<td>'.$row['user_address1'] . ' <br>' . $row['user_address2'] . ' <br>' . $row['user_city'] .'</td>
								<td>'.$row['user_email_address'].'</td>
					<td>

						<a href="editUserModal.php?id='.base64_encode($row['user_id']).'" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>

						<a href="userViewModal.php?id='.base64_encode($row['user_id']).'" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>

					</td>
					<td>
						<!-------------Active------------------>
						<button href="javaScript:void(0)" onclick="activeInactiveUser(\'' . base64_encode($row['user_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
						<!--------------Inactive------------------->
						<button href="javaScript:void(0)" onclick="activeInactiveUser(\'' . base64_encode($row['user_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:'. $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
					</td>
				</tr>';
								}
				$output .='</tbody>
							</table>';
				$output .='<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					$msg = 1;
				} else {
					throw new  Exception("Status Updation Failed !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$msg = 2;
				$output = $error;
			}

			$data[0] = $msg;
			$data[1] = base64_encode($output);
			echo json_encode($data);

			break;


		case 'getFunctionSel':

			try {

				$roleId = $_POST['roleId'];

				if ($roleId != '') {
					$result = '';
					$result .= '<div class="row">';
					$userResult = $userObj->getModule_RoleByRole_Id($roleId);
					while ($row = $userResult->fetch_assoc()) {
						$moduleId = $row['module_module_id'];
						$userResult2 = $userObj->getModuleBy_Id($moduleId);
						$row2 = $userResult2->fetch_assoc();
						$result .= '<div class="col-md-4" style="min-height: 150px">
								<h5>' . $row2['module_name'] . '</h5>';
						$userResult3 = $userObj->getFunctionBy_ModuleId($moduleId);
						while ($row3 = $userResult3->fetch_assoc()) {
							$result .= '<div class="custom-control custom-switch">
                    		   <input type="checkbox" class="custom-control-input" id="' . $row3['function_id'] . '" name="fun[]" value="' . $row3['function_id'] . '" checked />
                   			   <label class="custom-control-label" for="' . $row3['function_id'] . '">' . $row3['function_name'] . '</label>
                			   </div>';
						}
						$result .= '</div>';
					}
					$result .= '</div>';
					$msg = 1;
				} else {
					throw new  Exception("Function failed to load !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$msg = 2;
				$result = $error;
			}

			$data[0] = $msg;
			$data[1] = base64_encode($result);
			echo json_encode($data);

			break;
	}
}
