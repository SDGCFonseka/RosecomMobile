<?php
session_start();
if (isset($_REQUEST['status'])) {

	include_once '../model/supplierModel.php'; //including user from supplierModel

	$suppObj = new supplier(); // make supplier object from supplier class

	$status = $_REQUEST['status'];

	switch ($status) {

			/*===================================================================================================================================================================
																			Add Supplier
	===================================================================================================================================================================*/

		case 'addSupplier':

			try {

				$compName = $_POST['compName'];
				$compEmail = $_POST['compEmail'];
				$compAddr1 = $_POST['compAddr1'];
				$compAddr2 = $_POST['compAddr2'];
				$compAddr3 = $_POST['compAddr3'];
				$compContact1 = $_POST['compContact1'];
				$compContact2 = $_POST['compContact2'];
				$suppName = $_POST['suppName'];
				$suppAge = $_POST['suppAge'];
				$suppEmail = $_POST['suppEmail'];
				$suppContact = $_POST['suppContact'];

				if ($compName == "") {
					throw new  Exception("Company Name field is required");
				}

				if ($suppName == "") {
					throw new  Exception("Supplier Name field is required");
				}

				$result = $suppObj->addSupplier($compName, $compEmail, $compAddr1, $compAddr2, $compAddr3, $compContact1, $compContact2, $suppName, $suppAge, $suppEmail, $suppContact);

				if ($result > 0) {
					$output = '';
					$output .= '<table id="supplierTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Company Name</th>
								<th scope="col">Company Address</th>
								<th scope="col">Supplier Name</th>
								<th scope="col">Supplier E-mail</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$count = 0;
					$suppResult = $suppObj->getAllSupplier();
					while ($row = $suppResult->fetch_assoc()) {
						$buttonActive = (($row['supplier_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['supplier_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td>' . $row['company_name'] . '</td>
								<td>' . $row['company_address1'] . ' <br>' . $row['company_address2'] . ' <br>' .  $row['company_address2'] . '</td>
								<td>' . $row['supplier_name'] . '</td>
								<td>' . $row['supplier_email'] . '</td>
								<td>
						
									<a href="editSupplierModal.php?id=' . base64_encode($row['supplier_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
									<a href="supplierViewModal.php?id=' . base64_encode($row['supplier_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
						
								</td>
								<td>
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveSupplier(\'' . base64_encode($row['supplier_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveSupplier(\'' . base64_encode($row['supplier_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
								</td>
								</tr>';
					}
					$output .= ' </tbody>
								</table>';
					$output .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';

					$msg = 1;
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
																			Edit Supplier
	===================================================================================================================================================================*/
		case 'editSupplier':

			try {

				$suppId = $_POST['suppId'];
				$compName = $_POST['compName'];
				$compEmail = $_POST['compEmail'];
				$compAddr1 = $_POST['compAddr1'];
				$compAddr2 = $_POST['compAddr2'];
				$compAddr3 = $_POST['compAddr3'];
				$compContact1 = $_POST['compContact1'];
				$compContact2 = $_POST['compContact2'];
				$suppName = $_POST['suppName'];
				$suppAge = $_POST['suppAge'];
				$suppEmail = $_POST['suppEmail'];
				$suppContact = $_POST['suppContact'];

				if ($compName == "") {
					throw new  Exception("Company Name field is required");
				}

				if ($suppName == "") {
					throw new  Exception("Supplier Name field is required");
				}

				$result = $suppObj->editSupplier($suppId, $compName, $compEmail, $compAddr1, $compAddr2, $compAddr3, $compContact1, $compContact2, $suppAge, $suppName,  $suppEmail, $suppContact);

				if ($result > 0) {
					$output = '';
					$output .= '<table id="supplierTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Company Name</th>
								<th scope="col">Company Address</th>
								<th scope="col">Supplier Name</th>
								<th scope="col">Supplier E-mail</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$count = 0;
					$suppResult = $suppObj->getAllSupplier();
					while ($row = $suppResult->fetch_assoc()) {
						$buttonActive = (($row['supplier_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['supplier_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td>' . $row['company_name'] . '</td>
								<td>' . $row['company_address1'] . ' <br>' . $row['company_address2'] . ' <br>' .  $row['company_address2'] . '</td>
								<td>' . $row['supplier_name'] . '</td>
								<td>' . $row['supplier_email'] . '</td>
								<td>
						
									<a href="editSupplierModal.php?id=' . base64_encode($row['supplier_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
									<a href="supplierViewModal.php?id=' . base64_encode($row['supplier_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
						
								</td>
								<td>
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveSupplier(\'' . base64_encode($row['supplier_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveSupplier(\'' . base64_encode($row['supplier_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
								</td>
								</tr>';
					}
					$output .= ' </tbody>
								</table>';
					$output .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					$msg = 1;
					// $msg = "Sucessfully edited Supplier !";
					// $msg = base64_encode($msg);
					// header("Location: ../view/supplierManagement.php?response=$msg");
				} else {
					throw new  Exception("Failed to edit Supplier !");
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
																			Active/Deactive Supplier
	===================================================================================================================================================================*/

		case 'activeDeactiveSupplier':

			try {

				$suppId = base64_decode($_POST['id']);
				$suppLogStatus =  $_POST['suppLog_status'];

				$updateStatus = $suppObj->updateSupplier_Status($suppId, $suppLogStatus);

				if ($updateStatus == 1) {
					$output = '';
					$output .= '<table id="supplierTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Company Name</th>
								<th scope="col">Company Address</th>
								<th scope="col">Supplier Name</th>
								<th scope="col">Supplier E-mail</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$count = 0;
					$suppResult = $suppObj->getAllSupplier();
					while ($row = $suppResult->fetch_assoc()) {
						$buttonActive = (($row['supplier_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['supplier_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td>' . $row['company_name'] . '</td>
								<td>' . $row['company_address1'] . ' <br>' . $row['company_address2'] . ' <br>' .  $row['company_address2'] . '</td>
								<td>' . $row['supplier_name'] . '</td>
								<td>' . $row['supplier_email'] . '</td>
								<td>
						
									<a href="editSupplierModal.php?id=' . base64_encode($row['supplier_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
									<a href="supplierViewModal.php?id=' . base64_encode($row['supplier_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
						
								</td>
								<td>
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveSupplier(\'' . base64_encode($row['supplier_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveSupplier(\'' . base64_encode($row['supplier_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
								</td>
								</tr>';
					}
					$output .= ' </tbody>
								</table>';
					$output .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
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
																			Company Name Exitance
	===================================================================================================================================================================*/
		case 'compNameExistance':
			try {

				$compName = $_POST["compName"];

				$getComName = $suppObj->getSupplierInfo_ByCompName($compName);

				if ($getComName->num_rows > 0) {
					$response = "yes";
				} else {
					throw new  Exception("failed to find Company Name !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$response = "no";
			}

			echo $response;

			break;
	}
}
