<?php
session_start();
if (isset($_REQUEST['status'])) {

	include_once '../model/customerModel.php'; //including login from loginModel

	$customerObj = new customer(); // make login object from login class

	$status = $_REQUEST['status'];

	switch ($status) {

			/*===================================================================================================================================================================
																			Add Customer
		===================================================================================================================================================================*/

		case 'addCustomer':

			try {

				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$dob = $_POST['dob'];
				$gender = $_POST['gender'];
				$nic = $_POST['cNic'];
				$landlineNo = $_POST['landlineNo'];
				$mobileNo = $_POST['mobileNo'];
				$address1 = $_POST['address1'];
				$address2 = $_POST['address2'];
				$emailAddress = $_POST['cEmailAddress'];
				$postCode = $_POST['postCode'];
				$city = $_POST['city'];
				$reg_date = $_POST['regDate'];

				if ($firstName == "") {
					throw new  Exception("firstname field is required");
				}

				//==================File Upload start======================

				if ($_FILES['cProfileImg']['name'] != "") {
					$proImage = $_FILES['cProfileImg']['name'];
					$proImage = time() . "_" . $proImage;
				} else {
					$proImage = ($gender == 0) ? "defaultimageF.jpg" : "defaultimageM.jpg";
				}

				$tmpLocation = $_FILES['cProfileImg']['tmp_name'];

				$path = "../../img/customer_profile_images/$proImage";

				move_uploaded_file($tmpLocation, $path);

				//==================File Upload end======================
				$result = $customerObj->addCustomer($firstName, $lastName, $dob, $gender, $nic, $mobileNo, $landlineNo, $emailAddress, $address1, $address2, $city, $postCode, $proImage, $reg_date);

				if ($result > 0) {
					$output = '';
					$output .= '<table id="customerTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">NIC No.</th>
								<th scope="col">Address</th>
								<th scope="col">E-mail Address</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$count = 0;
					$custResult = $customerObj->getAllCustomer();
					while ($row = $custResult->fetch_assoc()) {
						$buttonActive = (($row['customer_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['customer_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td><img src="../../img/customer_profile_images/' . $row['customer_profile_image'] . '" style="width:50px;height:50px;border-radius:2px;" /></td>
								<td>' . $row['customer_first_name'] . ' ' . $row['customer_last_name'] . '</td>
								<td>' . $row['customer_nic'] . '</td>
								<td>' . $row['customer_address1'] . ' <br>' . $row['customer_address2'] . ' <br>' . $row['customer_city'] . '</td>
								<td>' . $row['customer_email'] . '</td>
								<td>
									<a href="editCustomerModal.php?id=' . base64_encode($row['customer_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
									<a href="customerViewModal.php?id=' . base64_encode($row['customer_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
								</td>
								<td>
								<!-------------Active------------------>
								<button href="javaScript:void(0)" onclick="activeInactiveCustomer(\'' . base64_encode($row['customer_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
								<!--------------Inactive------------------->
								<button href="javaScript:void(0)" onclick="activeInactiveCustomer(\'' . base64_encode($row['customer_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
					</td>
				</tr>';
					}
					$output .=	'</tbody>
								</table>';
					$output .=	'<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
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
																			Edit Customer
		===================================================================================================================================================================*/

		case 'editCustomer':


			try {

				$customerId = $_POST['cid'];
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$dob = $_POST['dob'];
				$gender = $_POST['gender'];
				$nic = $_POST['cNic'];
				$landlineNo = $_POST['landlineNo'];
				$mobileNo = $_POST['mobileNo'];
				$address1 = $_POST['address1'];
				$address2 = $_POST['address2'];
				$emailAddress = $_POST['cEmailAddress'];
				$postCode = $_POST['postCode'];
				$city = $_POST['city'];
				$proImage = $_POST['defaultCproImg'];
				$oldProImage = $_POST['defaultCproImg'];

				if ($firstName == "") {
					throw new  Exception("firstname field is required");
				}

				//==================File Upload start======================

				if ($_FILES['cProfileImg']['name'] != "") {
					$proImage = $_FILES['cProfileImg']['name'];
					$proImage = time() . "_" . $_FILES['cProfileImg']['name'];

					$tmpLocation = $_FILES['cProfileImg']['tmp_name'];
					$path = "../../img/customer_profile_images/$proImage";

					move_uploaded_file($tmpLocation, $path); // send file to the folder path

					// remove old profile image when new image uploads
					if ($oldProImage != "defaultimageM.jpg" && $oldProImage != "defaultimageF.jpg") {
						unlink("../../img/customer_profile_images/$oldProImage");
					}
				} else {

					if ($_POST['defaultCproImg'] == "defaultimageF.jpg" || $_POST['defaultCproImg'] == "defaultimageM.jpg") {
						$proImage = ($gender == 0) ? "defaultimageF.jpg" : "defaultimageM.jpg";
						$tmpLocation = $_FILES['cProfileImg']['tmp_name'];
						$path = "../../img/customer_profile_images/$proImage";

						move_uploaded_file($tmpLocation, $path); // send file to the folder path
					}
				}


				//==================File Upload end======================
				$result = $customerObj->editCustomer($customerId, $firstName, $lastName, $dob, $gender, $nic, $mobileNo, $landlineNo, $emailAddress, $address1, $address2, $city, $postCode, $proImage);

				if ($result > 0) {
					$output = '';
					$output .= '<table id="customerTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">NIC No.</th>
								<th scope="col">Address</th>
								<th scope="col">E-mail Address</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$count = 0;
					$custResult = $customerObj->getAllCustomer();
					while ($row = $custResult->fetch_assoc()) {
						$buttonActive = (($row['customer_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['customer_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td><img src="../../img/customer_profile_images/' . $row['customer_profile_image'] . '" style="width:50px;height:50px;border-radius:2px;" /></td>
								<td>' . $row['customer_first_name'] . ' ' . $row['customer_last_name'] . '</td>
								<td>' . $row['customer_nic'] . '</td>
								<td>' . $row['customer_address1'] . ' <br>' . $row['customer_address2'] . ' <br>' . $row['customer_city'] . '</td>
								<td>' . $row['customer_email'] . '</td>
								<td>
									<a href="editCustomerModal.php?id=' . base64_encode($row['customer_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
									<a href="customerViewModal.php?id=' . base64_encode($row['customer_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
								</td>
								<td>
								<!-------------Active------------------>
								<button href="javaScript:void(0)" onclick="activeInactiveCustomer(\'' . base64_encode($row['customer_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
								<!--------------Inactive------------------->
								<button href="javaScript:void(0)" onclick="activeInactiveCustomer(\'' . base64_encode($row['customer_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
					</td>
				</tr>';
					}
					$output .=	'</tbody>
								</table>';
					$output .=	'<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					$msg = 1;
					// $msg = "Sucessfully edited Customer !";
					// $msg = base64_encode($msg);
					// header("Location: ../view/customerManagement.php?response=$msg");
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
																			Active/Deactive Customer
		===================================================================================================================================================================*/

		case 'activeDeactiveCustomer':

			try {

				$customerId = base64_decode($_POST['id']);
				$customerLogStatus =  $_POST['customerLog_status'];

				$updateStatus = $customerObj->updateCustomer_Status($customerId, $customerLogStatus);

				if ($updateStatus == 1) {

					$output = '';
					$output .= '<table id="customerTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">NIC No.</th>
								<th scope="col">Address</th>
								<th scope="col">E-mail Address</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$count = 0;
					$custResult = $customerObj->getAllCustomer();
					while ($row = $custResult->fetch_assoc()) {
						$buttonActive = (($row['customer_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['customer_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td><img src="../../img/customer_profile_images/' . $row['customer_profile_image'] . '" style="width:50px;height:50px;border-radius:2px;" /></td>
								<td>' . $row['customer_first_name'] . ' ' . $row['customer_last_name'] . '</td>
								<td>' . $row['customer_nic'] . '</td>
								<td>' . $row['customer_address1'] . ' <br>' . $row['customer_address2'] . ' <br>' . $row['customer_city'] . '</td>
								<td>' . $row['customer_email'] . '</td>
								<td>
									<a href="editCustomerModal.php?id=' . base64_encode($row['customer_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
									<a href="customerViewModal.php?id=' . base64_encode($row['customer_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
								</td>
								<td>
								<!-------------Active------------------>
								<button href="javaScript:void(0)" onclick="activeInactiveCustomer(\'' . base64_encode($row['customer_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
								<!--------------Inactive------------------->
								<button href="javaScript:void(0)" onclick="activeInactiveCustomer(\'' . base64_encode($row['customer_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
					</td>
				</tr>';
					}
					$output .=	'</tbody>
								</table>';
					$output .=	'<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';

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

			/*===================================================================================================================================================================
																			check NIC Existance
		===================================================================================================================================================================*/

		case 'cNicExistance':

			try {

				$nic = $_POST["cNic"];

				$getNic = $customerObj->getCustomerInfo_ByNic($nic);

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



		case 'cEmailExistance':

			try {

				$email = $_POST["cEmail"];

				$getEmail = $customerObj->getCustomerInfo_ByEmail($email);


				if ($getEmail->num_rows > 0) {
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
	}
}
