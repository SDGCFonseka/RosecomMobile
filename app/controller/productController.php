<?php
session_start();
if (isset($_REQUEST['status'])) {

	include_once '../model/productModel.php'; //including product from productModel

	$productObj = new product(); // make product object from product class

	$status = $_REQUEST['status'];

	switch ($status) {

			/*===================================================================================================================================================================
																				BRAND
		===================================================================================================================================================================*/

			/*===================================================================================================================================================================
																				Add Brand
		===================================================================================================================================================================*/

		case 'addBrand':


			try {

				$brandNm = $_POST['brandName'];
				$brandDes = $_POST['brandDes'];

				if ($brandNm == "") {
					throw new  Exception("brandname field is required");
				}

				//==================File Upload start======================

				if ($_FILES['brandImg']['name'] != "") {
					$brandImage = $_FILES['brandImg']['name'];
					$brandImage = time() . "_" . $brandImage;
				} else {
					$brandImage =  "logo2.png";
				}

				$tmpLocation = $_FILES['brandImg']['tmp_name'];

				$path = "../../img/brand_images/$brandImage";

				move_uploaded_file($tmpLocation, $path);

				//==================File Upload end======================

				$result = $productObj->addBrand($brandNm, $brandDes, $brandImage);

				if ($result > 0) {
					$output = '';
					$output .= '<table id="brandTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Brand Image</th>
								<th scope="col">Brand Name</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$count = 0;
					$brandResult = $productObj->getAllBrand();
					while ($row = $brandResult->fetch_assoc()) {
						$buttonActive = (($row['brand_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['brand_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td>
									<img src="../../img/brand_images/' . $row['brand_image'] . '" style="width:auto;height:60px;border-radius:2px;" />
								</td>
								<td>' . $row['brand_name'] . '</td>
								<td>
						
										<a href="editBrandModal.php?id=' . base64_encode($row['brand_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-backdrop="static" data-toggle="modal" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
										<a href="brandViewModal.php?id=' . base64_encode($row['brand_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
						
								</td>
								<td>
						
										<!-------------Active------------------>
										<button onclick="activeInactiveBrand(\'' . base64_encode($row['brand_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
										<!--------------Inactive------------------->
										<button onclick="activeInactiveBrand(\'' . base64_encode($row['brand_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
					   
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
																				Edit Brand
			===================================================================================================================================================================*/


		case 'editBrand':

			try {

				$brandId = $_POST['brandId'];
				$brandNm = $_POST['brandName'];
				$brandDes = $_POST['brandDes'];
				$brandImage = $_POST['defaultBrandImg'];
				$oldbrandImg = $_POST['defaultBrandImg'];
				if ($brandNm == "") {
					throw new  Exception("brandname field is required");
				}

				//==================File Upload start======================

				if ($_FILES['brandImg']['name'] != "") {
					$brandImage = $_FILES['brandImg']['name'];
					$brandImage = time() . "_" . $brandImage;

					$tmpLocation = $_FILES['brandImg']['tmp_name'];
					$path = "../../img/brand_images/$brandImage";

					move_uploaded_file($tmpLocation, $path);

					if ($oldbrandImg != "logo2.png") {
						unlink("../../img/brand_images/$oldbrandImg");
					}
				}


				//==================File Upload end======================

				$result = $productObj->editBrand($brandId, $brandNm, $brandDes, $brandImage);

				if ($result > 0) {
					$output = '';
					$output .= '<table id="brandTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Brand Image</th>
								<th scope="col">Brand Name</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$count = 0;
					$brandResult = $productObj->getAllBrand();
					while ($row = $brandResult->fetch_assoc()) {
						$buttonActive = (($row['brand_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['brand_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td>
									<img src="../../img/brand_images/' . $row['brand_image'] . '" style="width:auto;height:60px;border-radius:2px;" />
								</td>
								<td>' . $row['brand_name'] . '</td>
								<td>
						
										<a href="editBrandModal.php?id=' . base64_encode($row['brand_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-backdrop="static" data-toggle="modal" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
										<a href="brandViewModal.php?id=' . base64_encode($row['brand_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
						
								</td>
								<td>
						
										<!-------------Active------------------>
										<button onclick="activeInactiveBrand(\'' . base64_encode($row['brand_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
										<!--------------Inactive------------------->
										<button onclick="activeInactiveBrand(\'' . base64_encode($row['brand_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
					   
								</td>
								</tr>';
					}
					$output .= ' </tbody>
								</table>';
					$output .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					$msg = 1;
					// $response = "Sucessfully edited Brand !";
					// $response = base64_encode($response);
					// header("Location: ../view/manageBrand.php?response=$response");
				} else {
					throw new  Exception("Failed to edit brand !");
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
																				Check Brand Existance
			===================================================================================================================================================================*/

		case 'checkBrandExistance':

			try {

				$brandNm = $_POST['brandName'];

				$getBrname = $productObj->getBrandInfo_ByBrandName($brandNm);

				if ($getBrname->num_rows > 0) {
					$response = "yes";
				} else {
					throw new  Exception("failed to find brand name !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$response = "no";
			}
			echo $response;

			break;

			/*===================================================================================================================================================================
																				Active/ Deactive Brand 
			===================================================================================================================================================================*/

		case 'activeDeactiveBrand':

			try {

				$brandId = base64_decode($_POST['id']);
				$brandLogStatus =  $_POST['brandLog_status'];

				$updateStatus = $productObj->updateBrand_Status($brandId, $brandLogStatus);

				if ($updateStatus == 1) {
					$output = '';
					$output .= '<table id="brandTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Brand Image</th>
								<th scope="col">Brand Name</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$count = 0;
					$brandResult = $productObj->getAllBrand();
					while ($row = $brandResult->fetch_assoc()) {
						$buttonActive = (($row['brand_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['brand_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td>
									<img src="../../img/brand_images/' . $row['brand_image'] . '" style="width:auto;height:60px;border-radius:2px;" />
								</td>
								<td>' . $row['brand_name'] . '</td>
								<td>
						
										<a href="editBrandModal.php?id=' . base64_encode($row['brand_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-backdrop="static" data-toggle="modal" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
										<a href="brandViewModal.php?id=' . base64_encode($row['brand_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
						
								</td>
								<td>
						
										<!-------------Active------------------>
										<button onclick="activeInactiveBrand(\'' . base64_encode($row['brand_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
										<!--------------Inactive------------------->
										<button onclick="activeInactiveBrand(\'' . base64_encode($row['brand_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
					   
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
																				CATEGORY
		===================================================================================================================================================================*/

			/*===================================================================================================================================================================
																				Add Category
			===================================================================================================================================================================*/

		case 'addCategory':

			try {

				$catName = $_POST['catName'];

				if ($catName == "") {
					throw new  Exception("Category name field is required");
				}

				//==================File Upload start======================

				if ($_FILES['catImg']['name'] != "") {
					$catImage = $_FILES['catImg']['name'];
					$catImage = time() . "_" . $catImage;
				} else {
					$catImage =  "category.jpg";
				}

				$tmpLocation = $_FILES['catImg']['tmp_name'];

				$path = "../../img/category_images/$catImage";

				move_uploaded_file($tmpLocation, $path);

				//==================File Upload end======================

				$result = $productObj->addCategory($catName, $catImage);

				if ($result > 0) {
					$output = '';
					$output .= '<table id="categoryTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
									<tr class="tb-head-style">
										<th scope="col">Id</th>
										<th scope="col">Category Image</th>
										<th scope="col">Category Name</th>
						   			<th scope="col">Action</th>
										<th scope="col">Status</th>
									</tr>
								</thead>
								<tbody>';
					$count = 0;
					$catResult = $productObj->getAllCategory();
					while ($row = $catResult->fetch_assoc()) {
						$buttonActive = (($row['category_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['category_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td>
									<img src="../../img/category_images/' . $row['category_image'] . '" style="width:auto;height:60px;border-radius:2px;" />
								</td>
				   				<td>' . $row['category_name'] . '</td>
				   
								<td>
					   			<a href="editCategoryModal.php?id=' . base64_encode($row['category_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-backdrop="static" data-toggle="modal" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
									<a href="categoryViewModal.php?id=' . base64_encode($row['category_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
								</td>
								<td>
									<!-------------Active------------------>
									<button onclick="activeInactiveCategory(\'' . base64_encode($row['category_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button onclick="activeInactiveCategory(\'' . base64_encode($row['category_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
								</td>
							</tr>';
					}
					$output .= '</tbody>
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
																				Edit Category
			===================================================================================================================================================================*/

		case 'editCategory':

			try {

				$categoryId = $_POST['catId'];
				$catName = $_POST['catName'];
				$catImage = $_POST['defaultCatImg'];
				$oldCatImg = $_POST['defaultCatImg'];
				if ($catName == "") {
					throw new  Exception("Category name field is required");
				}

				//==================File Upload start======================

				if ($_FILES['catImg']['name'] != "") {
					$catImage = $_FILES['catImg']['name'];
					$catImage = time() . "_" . $catImage;

					$tmpLocation = $_FILES['catImg']['tmp_name'];
					$path = "../../img/category_images/$catImage";

					move_uploaded_file($tmpLocation, $path);

					if ($oldCatImg != "category.jpg") {
						unlink("../../img/category_images/$oldCatImg");
					}
				}

				//==================File Upload end==========================

				$result = $productObj->editCategory($categoryId, $catName, $catImage);

				if ($result > 0) {
					$output = '';
					$output .= '<table id="categoryTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
									<tr class="tb-head-style">
										<th scope="col">Id</th>
										<th scope="col">Category Image</th>
										<th scope="col">Category Name</th>
						   			<th scope="col">Action</th>
										<th scope="col">Status</th>
									</tr>
								</thead>
								<tbody>';
					$count = 0;
					$catResult = $productObj->getAllCategory();
					while ($row = $catResult->fetch_assoc()) {
						$buttonActive = (($row['category_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['category_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td>
									<img src="../../img/category_images/' . $row['category_image'] . '" style="width:auto;height:60px;border-radius:2px;" />
								</td>
				   				<td>' . $row['category_name'] . '</td>
				   
								<td>
					   			<a href="editCategoryModal.php?id=' . base64_encode($row['category_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-backdrop="static" data-toggle="modal" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
									<a href="categoryViewModal.php?id=' . base64_encode($row['category_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
								</td>
								<td>
									<!-------------Active------------------>
									<button onclick="activeInactiveCategory(\'' . base64_encode($row['category_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button onclick="activeInactiveCategory(\'' . base64_encode($row['category_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
								</td>
							</tr>';
					}
					$output .= '</tbody>
							   </table>';
					$output .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					$msg = 1;
					// $response = "Sucessfully edited Category !";
					// $response = base64_encode($response);
					// header("Location: ../view/manageCategory.php?response=$response");
				} else {
					throw new  Exception("Failed to edit Category !");
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
																				Check Brand Existance
			===================================================================================================================================================================*/

		case 'checkCategoryExistance':

			try {

				$catName = $_POST['catName'];

				$getcatname = $productObj->getCategoryInfo_ByCategoryName($catName);

				if ($getcatname->num_rows > 0) {
					$response = "yes";
				} else {
					throw new  Exception("failed to find category name !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$response = "no";
			}
			echo $response;

			break;

			/*===================================================================================================================================================================
																				Active/ Deactive Category 
			===================================================================================================================================================================*/

		case 'activeDeactiveCategory':

			try {

				$categoryId = base64_decode($_POST['id']);
				$categoryLogStatus =  $_POST['categoryLog_status'];

				$updateStatus = $productObj->updateCategory_Status($categoryId, $categoryLogStatus);

				if ($updateStatus == 1) {
					$output = '';
					$output .= '<table id="categoryTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
									<tr class="tb-head-style">
										<th scope="col">Id</th>
										<th scope="col">Category Image</th>
										<th scope="col">Category Name</th>
						   			<th scope="col">Action</th>
										<th scope="col">Status</th>
									</tr>
								</thead>
								<tbody>';
					$count = 0;
					$catResult = $productObj->getAllCategory();
					while ($row = $catResult->fetch_assoc()) {
						$buttonActive = (($row['category_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['category_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td>
									<img src="../../img/category_images/' . $row['category_image'] . '" style="width:auto;height:60px;border-radius:2px;" />
								</td>
				   				<td>' . $row['category_name'] . '</td>
				   
								<td>
					   			<a href="editCategoryModal.php?id=' . base64_encode($row['category_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-backdrop="static" data-toggle="modal" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
									<a href="categoryViewModal.php?id=' . base64_encode($row['category_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
								</td>
								<td>
									<!-------------Active------------------>
									<button onclick="activeInactiveCategory(\'' . base64_encode($row['category_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button onclick="activeInactiveCategory(\'' . base64_encode($row['category_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
								</td>
							</tr>';
					}
					$output .= '</tbody>
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
																						PRODUCT
			===================================================================================================================================================================*/

			/*===================================================================================================================================================================
																						Add Product
			===================================================================================================================================================================*/

		case 'addProduct':

			try {

				$productName = $_POST['prodName'];
				$productCategory = $_POST['prodCategory'];
				$productBrand = $_POST['prodBrand'];
				$operatingSys = $_POST['operatingSys'];
				$productDescription = $_POST['prodDescription'];

				$productRes = $productObj->addProduct($productName, $productCategory, $productBrand, $operatingSys, $productDescription);


				if ($productRes > 0) {

					$productId = $productRes;

					//==================File Upload start======================
					if ($_FILES['productImg']['name'][0] != "") {
						foreach ($_FILES['productImg']['tmp_name'] as $key => $value) {

							$productImg = $_FILES['productImg']['name'][$key];
							$product_tmp = $_FILES['productImg']['tmp_name'][$key];
							$ext = pathinfo($productImg, PATHINFO_EXTENSION); //get file extension


							if ($productImg != "") {
								$finalProdImg = '';

								if (!file_exists('../../img/product_images/products/' . $productImg)) {
									move_uploaded_file($product_tmp, '../../img/product_images/products/' . $productImg);
									$finalProdImg = $productImg;
								} else {
									$productImg = str_replace('.', '-', basename($productImg, $ext));
									$newProductImg = $productImg . time() . "." . $ext;
									move_uploaded_file($product_tmp, '../../img/product_images/products/' . $newProductImg);
									$finalProdImg = $newProductImg;
								}
							}



							$productObj->addProductImg($finalProdImg, $productId); //insert image
						}
					}
					//==================File Upload end==========================
					$output = '';
					$output .= '<table id="productTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
									<tr class="tb-head-style">
										<th scope="col">Id</th>
										<th scope="col" width="10%">Product Images</th>
										<th scope="col">Product Name</th>
										<th class="categories" scope="col">Category</th>
										<th scope="col">Operating System</th>
										<th scope="col">Action</th>
										<th class="state" scope="col">Status</th>
									</tr>
								</thead>
								<tbody>';
					$count = 0;
					$productResult = $productObj->getAllProduct();
					while ($row = $productResult->fetch_assoc()) {
						$productId2  = $row['product_id'];
						$categoryId = $row['category_category_id'];
						$productResult2 = $productObj->getCategoryBy_id_fromCategory($categoryId);
						$productResult3 = $productObj->getProductImages_ById($productId2);
						$row2 = $productResult2->fetch_assoc();

						$buttonActive = (($row['product_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['product_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr>
								<td>' . $count . '</td>
								<td>
								<div class="align-prod-image">';

						if ($row3 = $productResult3->fetch_assoc()) {
							$productImg = $row3['product_image_name'];
							$encodeId = base64_encode($productId2);
							$output .= '<div class="prod-img-container"><img src="../../img/product_images/products/' . $productImg . '" style="width:80px;height:80px;border-radius:2px;"/><div class="prod-img-overlay"><a title="Click to Zoom" href="pImagesPopupModals/productImagesModal.php?id=' . $encodeId . '" class="li-modal prod-Img-Btn" data-toggle="modal" data-backdrop="static" data-target="#myModal2"><i class="fas fa-search-plus"></i></a></div></div>';
						}

						$output .= '</div>
								</td>
								<td>' . $row['product_name'] . '</td>
								<td>' . $row2['category_name'] . '</td>
								<td>' . $row['product_os'] . '</td>
	
								<td>
	
									<a href="editProductModal.php?id=' . base64_encode($row['product_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
	
									<a href="viewProductModal.php?id=' . base64_encode($row['product_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
	
									<a href="manageProductModels.php?id=' . base64_encode($row['product_id']) . '" class="btn btn-outline-primary li-modal crud-btn"><i class="fas fa-tasks"></i>&nbsp;Manage Model</a>
	
								</td>
								<td>
									<div style="display:none;">' . $row['product_status'] . '</div>
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveProduct(\'' . base64_encode($row['product_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveProduct(\'' . base64_encode($row['product_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
								</td>
							</tr>';
					}
					$output .= '</tbody>
								</table>';
					$output .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					$msg = 1;
				} else {
					throw new  Exception("Failed to insert the product !");
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
																						Edit Product
			===================================================================================================================================================================*/

		case 'editProduct':

			try {

				$productId = $_POST['editProdId'];
				$productName = $_POST['prodName'];
				$productCategory = $_POST['prodCategory'];
				$productBrand = $_POST['prodBrand'];
				$operatingSys = $_POST['operatingSys'];
				$productDescription = $_POST['prodDescription'];

				$productRes = $productObj->editProduct($productId, $productName, $productCategory, $productBrand, $operatingSys, $productDescription);


				if ($productRes > 0) {



					//==================File Upload start======================
					if ($_FILES['productImg']['name'][0] != "") {
						foreach ($_FILES['productImg']['tmp_name'] as $key => $value) {

							$productImg = $_FILES['productImg']['name'][$key];
							$product_tmp = $_FILES['productImg']['tmp_name'][$key];
							$ext = pathinfo($productImg, PATHINFO_EXTENSION); //get file extension


							if ($productImg != "") {
								$finalProdImg = '';

								if (!file_exists('../../img/product_images/products/' . $productImg)) {
									move_uploaded_file($product_tmp, '../../img/product_images/products/' . $productImg);
									$finalProdImg = $productImg;
								} else {
									$productImg = str_replace('.', '-', basename($productImg, $ext));
									$newProductImg = $productImg . time() . "." . $ext;
									move_uploaded_file($product_tmp, '../../img/product_images/products/' . $newProductImg);
									$finalProdImg = $newProductImg;
								}
							}

							$productObj->addProductImg($finalProdImg, $productId); //insert image
						}
					}
					//==================File Upload end==========================
					// ================= removing images content =============
					$output = '';
					$output .= '<div class="col-md-12">
							   <h6 class="text-danger mb-4">*You Can Remove Existing Product Images Here</h6>
							   </div>';
					$productImgView = $productObj->getProductImages_ById($productId);
					while ($imgRow = $productImgView->fetch_assoc()) {

						$output .= '<div class="col-md-4">
								<div class="text-center mb-5">
								<span title="remove"  data-toggle="tooltip" data-placement="right" class="imgBtn delImgBtn2" data-imgId="' . $imgRow["product_image_id"] . '" data-imgName="' . $imgRow["product_image_name"] . '">
								<i class="fas fa-times-circle fa-2x text-danger"></i>
								</span>
									<img class="w-75" src="../../img/product_images/products/' . $imgRow["product_image_name"] . '" alt="phone_model_image">
								</div>
								</div>';
					}
					$output .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					$output2 = '';
					$output2 .= '<table id="productTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
									<tr class="tb-head-style">
										<th scope="col">Id</th>
										<th scope="col" width="10%">Product Images</th>
										<th scope="col">Product Name</th>
										<th class="categories" scope="col">Category</th>
										<th scope="col">Operating System</th>
										<th scope="col">Action</th>
										<th class="state" scope="col">Status</th>
									</tr>
								</thead>
								<tbody>';
					$count = 0;
					$productResult = $productObj->getAllProduct();
					while ($row = $productResult->fetch_assoc()) {
						$productId2  = $row['product_id'];
						$categoryId = $row['category_category_id'];
						$productResult2 = $productObj->getCategoryBy_id_fromCategory($categoryId);
						$productResult3 = $productObj->getProductImages_ById($productId2);
						$row2 = $productResult2->fetch_assoc();

						$buttonActive = (($row['product_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['product_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output2 .= '<tr>
								<td>' . $count . '</td>
								<td>
								<div class="align-prod-image">';

						if ($row3 = $productResult3->fetch_assoc()) {
							$productImg = $row3['product_image_name'];
							$encodeId = base64_encode($productId2);
							$output2 .= '<div class="prod-img-container"><img src="../../img/product_images/products/' . $productImg . '" style="width:80px;height:80px;border-radius:2px;"/><div class="prod-img-overlay"><a title="Click to Zoom" href="pImagesPopupModals/productImagesModal.php?id=' . $encodeId . '" class="li-modal prod-Img-Btn" data-toggle="modal" data-backdrop="static" data-target="#myModal2"><i class="fas fa-search-plus"></i></a></div></div>';
						}

						$output2 .= '</div>
								</td>
								<td>' . $row['product_name'] . '</td>
								<td>' . $row2['category_name'] . '</td>
								<td>' . $row['product_os'] . '</td>
	
								<td>
	
									<a href="editProductModal.php?id=' . base64_encode($row['product_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
	
									<a href="viewProductModal.php?id=' . base64_encode($row['product_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
	
									<a href="manageProductModels.php?id=' . base64_encode($row['product_id']) . '" class="btn btn-outline-primary li-modal crud-btn"><i class="fas fa-tasks"></i>&nbsp;Manage Model</a>
	
								</td>
								<td>
									<div style="display:none;">' . $row['product_status'] . '</div>
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveProduct(\'' . base64_encode($row['product_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveProduct(\'' . base64_encode($row['product_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
								</td>
							</tr>';
					}
					$output2 .= '</tbody>
								</table>';
					$output2 .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					$msg = 1;
				} else {
					throw new  Exception("Failed to edit the product !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$msg = 2;
				$output = $error;
			}

			$data[0] = $msg;
			$data[1] = base64_encode($output);
			$data[2] = base64_encode($output2);
			echo json_encode($data);

			break;

			/*===================================================================================================================================================================
																						Remove Product Image
		===================================================================================================================================================================*/

		case 'removeProdImage':

			try {

				$imgId = $_POST["prodImgId"];
				$imgName = $_POST["prodImgNm"];
				$productId = $_POST["productId"];

				$imgresult = $productObj->deleteProductImage($imgId);

				if ($imgresult > 0) {
					$result = '';
					$result .= '<div class="col-md-12">
							   <h6 class="text-danger mb-4">*You Can Remove Existing Product Images Here</h6>
							   </div>';
					$productImgView = $productObj->getProductImages_ById($productId);
					while ($imgRow = $productImgView->fetch_assoc()) {

						$result .= '<div class="col-md-4">
								<div class="text-center mb-5">
								<span title="remove"  data-toggle="tooltip" data-placement="right" class="imgBtn delImgBtn2" data-imgId="' . $imgRow["product_image_id"] . '" data-imgName="' . $imgRow["product_image_name"] . '">
								<i class="fas fa-times-circle fa-2x text-danger"></i>
								</span>
									<img class="w-75" src="../../img/product_images/products/' . $imgRow["product_image_name"] . '" alt="phone_model_image">
								</div>
								</div>';
					}

					$result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					unlink("../../img/product_images/products/$imgName");
					$msg = 1;
				} else {
					throw new  Exception("Failed to remove the phone model image !");
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

			/*===================================================================================================================================================================
																				Active/ Deactive Product 
			===================================================================================================================================================================*/

		case 'activeDeactiveProduct':

			try {

				$productId = base64_decode($_POST['id']);
				$productLogStatus =  $_POST['productLog_status'];

				$updateStatus = $productObj->updateProduct_Status($productId, $productLogStatus);

				if ($updateStatus == 1) {
					$output = '';
					$output .= '<table id="productTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
									<tr class="tb-head-style">
										<th scope="col">Id</th>
										<th scope="col" width="10%">Product Images</th>
										<th scope="col">Product Name</th>
										<th class="categories" scope="col">Category</th>
										<th scope="col">Operating System</th>
										<th scope="col">Action</th>
										<th class="state" scope="col">Status</th>
									</tr>
								</thead>
								<tbody>';
					$count = 0;
					$productResult = $productObj->getAllProduct();
					while ($row = $productResult->fetch_assoc()) {
						$productId2  = $row['product_id'];
						$categoryId = $row['category_category_id'];
						$productResult2 = $productObj->getCategoryBy_id_fromCategory($categoryId);
						$productResult3 = $productObj->getProductImages_ById($productId2);
						$row2 = $productResult2->fetch_assoc();

						$buttonActive = (($row['product_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['product_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr>
								<td>' . $count . '</td>
								<td>
								<div class="align-prod-image">';

						if ($row3 = $productResult3->fetch_assoc()) {
							$productImg = $row3['product_image_name'];
							$encodeId = base64_encode($productId2);
							$output .= '<div class="prod-img-container"><img src="../../img/product_images/products/' . $productImg . '" style="width:80px;height:80px;border-radius:2px;"/><div class="prod-img-overlay"><a title="Click to Zoom" href="pImagesPopupModals/productImagesModal.php?id=' . $encodeId . '" class="li-modal prod-Img-Btn" data-toggle="modal" data-backdrop="static" data-target="#myModal2"><i class="fas fa-search-plus"></i></a></div></div>';
						}

						$output .= '</div>
								</td>
								<td>' . $row['product_name'] . '</td>
								<td>' . $row2['category_name'] . '</td>
								<td>' . $row['product_os'] . '</td>
	
								<td>
	
									<a href="editProductModal.php?id=' . base64_encode($row['product_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
	
									<a href="viewProductModal.php?id=' . base64_encode($row['product_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
	
									<a href="manageProductModels.php?id=' . base64_encode($row['product_id']) . '" class="btn btn-outline-primary li-modal crud-btn"><i class="fas fa-tasks"></i>&nbsp;Manage Model</a>
	
								</td>
								<td>
									<div style="display:none;">' . $row['product_status'] . '</div>
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveProduct(\'' . base64_encode($row['product_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveProduct(\'' . base64_encode($row['product_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
								</td>
							</tr>';
					}
					$output .= '</tbody>
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
																				Check Product Existance
		===================================================================================================================================================================*/

		case 'checkProductExistance':


			try {

				$productName = $_POST['prodName'];

				$getCatNmRes = $productObj->getProductInfo_ByProductName($productName);

				if ($getCatNmRes->num_rows > 0) {
					$response = "yes";
				} else {
					throw new  Exception("failed to find Product name !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$response = "no";
			}
			echo $response;


			break;


			/*===================================================================================================================================================================
																						PRODUCT FEATURE
			===================================================================================================================================================================*/
			//=============================================================GET FEATURE CATEGORY SELECT========================================================================================
		case 'getFcategorySel':

			try {
				$productCatId = $_POST['pCategory'];

				if ($productCatId != '') {
					$result = '';
					$result .= '<label>Feature Category</label>
							<select class="form-control" name="featureCat" id="featureCat" oninput="showSelection2(this.value),featureCatValidate()">
							<option value="">Please Select a Feature Category</option>';
					$featureCatResult = $productObj->getFeature_Category_By_product_Cat_Id($productCatId);
					while ($row = $featureCatResult->fetch_assoc()) {
						$result .= '<option value=' . $row['feature_category_id'] . '>' . $row['feature_category_name'] . '</option>';
					}
					$result .= '</select>
							<span id="featureCatIcon"></span>
							<span class="text-danger error-msg" id="featureCatErr"></span>';
					$msg = 1;
				} else {
					throw new Exception("No Pcategory value passed!");
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

			//=============================================================GET FEATURE KIND SELECT========================================================================================

		case 'getFspecific':

			try {

				$featureCatId = $_POST['fSpecified'];

				if ($featureCatId != '') {
					$result = '';
					$result .= '<label>Feature Kind</label>
								<select class="form-control" name="featureType" id="featureType" oninput="showFeatures(this.value),featureTypeValidate()">
								<option value="">Please Select a Specification</option>';
					$featureTypeResult = $productObj->getFeature_Types_By_cat_Id($featureCatId);
					while ($row2 = $featureTypeResult->fetch_assoc()) {
						$result .= '<option value=' . $row2['feature_type_id'] . '>' . $row2['feature_type_name'] . '</option>';
					}
					$result .= '</select>
								<span id="featureTypeIcon"></span>
								<span class="text-danger error-msg" id="featureTypeErr"></span>';
					$msg = 1;
				} else {
					throw new Exception("No Fspecified value passed!");
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

			//========================================================================RETREIVE FEATURE TABLE VALUES==========================================================================================


		case 'showFeaturesTb':

			try {

				$featureTypeId = $_POST['featureTypeId'];

				if ($featureTypeId  != '') {
					$result = '';

					$result .= '<table id="featureTable" class="table nowrap table-striped text-center" width="100%">
									<thead>
									<tr class="tb-head-style">
										
										<th scope="col">Id</th>
										<th scope="col">Feature Name</th>
										<th scope="col">Status</th>
										
									</tr>
									</thead>
									<tbody>';
					$featureResult = $productObj->getAllFeatures_By_Type_Id($featureTypeId);
					$count = 0;
					while ($row = $featureResult->fetch_assoc()) {

						$buttonActive = (($row['feature_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['feature_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result .= '<tr scope="row">
									
									<td>' . $count . '</td>
									<td>' . $row['feature_name'] . '</td>
									<td>
									
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveFeature(\'' . base64_encode($row['feature_id']) . '\',0,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Show</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveFeature(\'' . base64_encode($row['feature_id']) . '\',1,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Hide</button>
									
									</td>
									
									</tr>';
					}
					$result .= '</tbody></table>';
					// $result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					$result .= '<script>$("#featureTable").DataTable({ searching:false });</script>';

					$msg = 1;
				} else {
					throw new Exception("No Feature Type value passed !");
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

			//=============================================================FILTER FEATURE STATUS [ACTIVE & INACTIVE]========================================================================================

		case 'getAllStatus':

			try {


				$featureTypeId = $_POST['featureTypeId'];

				if ($featureTypeId  != '') {
					$result = '';

					$result .= '<table id="featureTable" class="table nowrap table-striped text-center" width="100%">
									<thead>
									<tr class="tb-head-style">
										
										<th scope="col">Id</th>
										<th scope="col">Feature Name</th>
										<th scope="col">Status</th>
										
									</tr>
									</thead>
									<tbody>';
					$featureResult = $productObj->getAllFeatures_By_Type_Id($featureTypeId);
					$count = 0;
					while ($row = $featureResult->fetch_assoc()) {

						$buttonActive = (($row['feature_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['feature_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result .= '<tr scope="row">
									
									<td>' . $count . '</td>
									<td>' . $row['feature_name'] . '</td>
									<td>
									
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveFeature(\'' . base64_encode($row['feature_id']) . '\',0,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Show</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveFeature(\'' . base64_encode($row['feature_id']) . '\',1,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Hide</button>
									
									</td>
									
									</tr>';
					}
					$result .= '</tbody></table>';
					// $result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					$result .= '<script>$("#featureTable").DataTable({ searching:false });</script>';

					$msg = 1;
				} else {
					throw new Exception("No Feature Type value passed !");
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

			//=============================================================FILTER FEATURES BY STATES[ACTIVE OR INACTIVE]========================================================================================

		case 'getFcatStatus':

			try {

				$featureState = $_POST['featureStatus'];
				$featureTypeId = $_POST['featureTypeId'];


				if ($featureState != "" | $featureTypeId != "") {

					$result = '';

					$result .= '<table id="featureTable" class="table nowrap table-striped text-center" width="100%">
									<thead>
									<tr class="tb-head-style">
										
										<th scope="col">Id</th>
										<th scope="col">Feature Name</th>
										<th scope="col">Status</th>
										
									</tr>
									</thead>
									<tbody>';
					$featureResult3 = $productObj->getAllFeatures_By_FeatureState_FeatureTypeId($featureState, $featureTypeId);
					$count = 0;
					while ($row = $featureResult3->fetch_assoc()) {

						$buttonActive = (($row['feature_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['feature_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result .= '<tr scope="row">
									
									<td>' . $count . '</td>
									<td>' . $row['feature_name'] . '</td>
									<td>
									
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveFeature2(\'' . base64_encode($row['feature_id']) . '\',0,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Show</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveFeature2(\'' . base64_encode($row['feature_id']) . '\',1,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Hide</button>
									
									</td>
									
									</tr>';
					}
					$result .= '</tbody></table>';
					// $result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					$result .= '<script>$("#featureTable").DataTable({ searching:false });</script>';

					$msg = 1;
				} else {
					throw new Exception("Feature State or feature type id not passed!");
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

			//=============================================================SEARCH FEATURE VALUES========================================================================================

		case 'showFsearch':


			try {

				$featureInfo = $_POST['featureInfo'];
				$featureTypeId = $_POST['featureTypeId'];

				if ($featureInfo > 0 | $featureTypeId > 0) {

					$result = '';

					$result .= '<table id="featureTable" class="table nowrap table-striped text-center" width="100%">
										<thead>
										<tr class="tb-head-style">
											
											<th scope="col">Id</th>
											<th scope="col">Feature Name</th>
											<th scope="col">Status</th>
											
										</tr>
										</thead>
										<tbody>';
					$featureResult2 = $productObj->getAllFeatures_By_FeatureInfo_FeatureTypeId($featureInfo, $featureTypeId);
					$count = 0;
					while ($row = $featureResult2->fetch_assoc()) {

						$buttonActive = (($row['feature_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['feature_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result .= '<tr scope="row">
										
										<td>' . $count . '</td>
										<td>' . $row['feature_name'] . '</td>
										<td>
										
										<!-------------Active------------------>
										<button href="javaScript:void(0)" onclick="activeInactiveFeature(\'' . base64_encode($row['feature_id']) . '\',0,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Show</button>
										<!--------------Inactive------------------->
										<button href="javaScript:void(0)" onclick="activeInactiveFeature(\'' . base64_encode($row['feature_id']) . '\',1,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Hide</button>
										
										</td>
										
										</tr>';
					}
					$result .= '</tbody></table>';
					// $result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					$result .= '<script>$("#featureTable").DataTable({ searching:false });</script>';

					$msg = 1;
				} else {
					throw new Exception("Feature State or feature type id not passed!");
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




			/*===================================================================================================================================================================
																				Active/ Deactive Product Feature
	===================================================================================================================================================================*/

		case 'activeDeactiveProductFeature':

			try {

				$featureId = base64_decode($_POST['id']);
				$featureState =  $_POST['featureLog_status'];
				$featureTypeId = base64_decode($_POST['featureTypeId']);

				$updateStatus = $productObj->updateProduct_Feature_Status($featureId, $featureState);

				if ($updateStatus == 1) {
					$result = '';
					$result .= '<table id="featureTable" class="table nowrap table-striped text-center" width="100%">
									<thead>
									<tr class="tb-head-style">
										
										<th scope="col">Id</th>
										<th scope="col">Feature Name</th>
										<th scope="col">Status</th>
										
									</tr>
									</thead>
									<tbody>';
					$featureResult = $productObj->getAllFeatures_By_Type_Id($featureTypeId);
					$count = 0;
					while ($row = $featureResult->fetch_assoc()) {

						$buttonActive = (($row['feature_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['feature_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result .= '<tr scope="row">
									
									<td>' . $count . '</td>
									<td>' . $row['feature_name'] . '</td>
									<td>
									
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveFeature(\'' . base64_encode($row['feature_id']) . '\',0,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Show</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveFeature(\'' . base64_encode($row['feature_id']) . '\',1,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Hide</button>
									
									</td>
									
									</tr>';
					}
					$result .= '</tbody></table>';
					// $result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					$result .= '<script>$("#featureTable").DataTable({ searching:false });</script>';
					$msg = 1;
				} else {
					throw new  Exception("Status Updation Failed !");
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

			/*===================================================================================================================================================================
																				Active/ Deactive Product Feature BY Status
	===================================================================================================================================================================*/

		case 'activeDeactiveFeatureByState':

			try {

				$featureId = base64_decode($_POST['id']);
				$featureState = $_POST['featureLog_status'];
				$featureTypeId = base64_decode($_POST['featureTypeId']);




				$updateStatus = $productObj->updateProduct_Feature_Status($featureId, $featureState);

				if ($updateStatus == 1) {
					$result = '';
					$result .= '<table id="featureTable" class="table nowrap table-striped text-center" width="100%">
										<thead>
										<tr class="tb-head-style">
											
											<th scope="col">Id</th>
											<th scope="col">Feature Name</th>
											<th scope="col">Status</th>
											
										</tr>
										</thead>
										<tbody>';
					if ($_POST['featureLog_status'] == 1) { // checking whether the state is 0 or 1 if feature state is 1 should pass 
						// feature state as 0
						$featureState = 0;
					} else {
						$featureState = 1;
					}
					$featureResult3 = $productObj->getAllFeatures_By_FeatureState_FeatureTypeId($featureState, $featureTypeId);
					$count = 0;
					while ($row = $featureResult3->fetch_assoc()) {

						$buttonActive = (($row['feature_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['feature_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result .= '<tr scope="row">
										
										<td>' . $count . '</td>
										<td>' . $row['feature_name'] . '</td>
										<td>
										<!-------------Active------------------>
										<button href="javaScript:void(0)" onclick="activeInactiveFeature2(\'' . base64_encode($row['feature_id']) . '\',0,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Show</button>
										<!--------------Inactive------------------->
										<button href="javaScript:void(0)" onclick="activeInactiveFeature2(\'' . base64_encode($row['feature_id']) . '\',1,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Hide</button>
										
										</td>
										
										</tr>';
					}
					$result .= '</tbody></table>';
					// $result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					$result .= '<script>$("#featureTable").DataTable({ searching:false });</script>';
					$msg = 1;
				} else {
					throw new  Exception("Status Updation Failed !");
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

			/*===================================================================================================================================================================
																						Add Product Feature
			===================================================================================================================================================================*/

		case 'addProductFeature':

			try {

				$featureName = $_POST['featureName'];
				$featureType = $_POST['featureType'];
				$featureCat = $_POST['featureCat'];

				$featureResult = $productObj->addProductFeature($featureName, $featureType, $featureCat);

				if ($featureResult > 0) {

					$result = '';

					$result .= '<table id="featureTable" class="table nowrap table-striped text-center" width="100%">
									<thead>
									<tr class="tb-head-style">
										
										<th scope="col">Id</th>
										<th scope="col">Feature Name</th>
										<th scope="col">Status</th>
										
									</tr>
									</thead>
									<tbody>';
					$featureTypeId = $featureType; // passing feature type value as featureTypeId
					$featureResult2 = $productObj->getAllFeatures_By_Type_Id($featureTypeId);
					$count = 0;
					while ($row = $featureResult2->fetch_assoc()) {

						$buttonActive = (($row['feature_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['feature_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result .= '<tr scope="row">
									
									<td>' . $count . '</td>
									<td>' . $row['feature_name'] . '</td>
									<td>
									
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveFeature(\'' . base64_encode($row['feature_id']) . '\',0,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Show</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveFeature(\'' . base64_encode($row['feature_id']) . '\',1,\'' . base64_encode($featureTypeId) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Hide</button>
									
									</td>
									
									</tr>';
					}
					$result .= '</tbody></table>';
					// $result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					$result .= '<script>$("#featureTable").DataTable({ searching:false });</script>';


					$msg = 1;
				} else {
					throw new Exception("Every field is required !");
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



			/*===================================================================================================================================================================
																				Product Feature Existance According to Feature Type
	===================================================================================================================================================================*/

		case 'checkFeatureExistance':

			try {

				$featureName = $_POST['featureName'];
				$featureTypeId = $_POST['featureTypeId'];

				$getFeatRes = $productObj->getFeatureInfo_ByFeatureName_ByFeatureTypeId($featureName, $featureTypeId);


				if ($getFeatRes->num_rows > 0) {
					$response = "yes";
				} else {
					throw new  Exception("failed to find Feature name !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$response = "no";
			}
			echo $response;


			break;


			/*===================================================================================================================================================================
																						PRODUCT MODEL
	===================================================================================================================================================================*/

			/*===================================================================================================================================================================
																			Add Product Models ""PHONE"" 
			===================================================================================================================================================================*/

		case 'addPhoneModel':

			try {

				$productId = $_POST['productId'];
				$phoneModName = $_POST['phoneModelName'];
				$phoneModPric = $_POST['phoneModPrice'];
				$phoneModTech = $_POST['phoneModTech'];
				$phoneModBand2g = $_POST['band2g'];
				$phoneModBand3g = $_POST['band3g'];
				$phoneModBand4g = $_POST['band4g'];
				$phoneModBand5g = $_POST['band5g'];
				$phoneModSpeed = $_POST['phoneModSpeed'];
				$phoneModAnnounce = $_POST['phoneModAnnounce'];
				$phoneModState = $_POST['phoneModState'];
				$phoneModDimen = $_POST['phoneModDimen'];
				$phoneModWeight = $_POST['phoneModWeight'];
				$phoneModSim = $_POST['phoneModSim'];
				$phoneModType = $_POST['phoneModType'];
				$phoneModSize = $_POST['phoneModSize'];
				$phoneModResu = $_POST['phoneModResolution'];
				$phoneModProtect = $_POST['phoneModProtect'];
				$phoneModOs = $_POST['phoneModOs'];
				$phoneModChip = $_POST['phoneModChip'];
				$phoneModCpu = $_POST['phoneModCpu'];
				$phoneModGpu = $_POST['phoneModGpu'];
				$phoneModMem = $_POST['phoneModMem'];
				$phoneModInternal = $_POST['phoneModInternal'];
				$phoneModMcamSetup = $_POST['phoneModMcamSetup'];
				$phoneModMcamPixel = $_POST['phoneModMcamPixel'];
				$phoneModMcamFeatures = $_POST['phoneModMcamFeatures'];
				$phoneModMcamVid = $_POST['phoneModMcamVid'];
				$phoneModScamSetup = $_POST['phoneModScamSetup'];
				$phoneModScamPixel = $_POST['phoneModScamPixel'];
				$phoneModScamFeature = $_POST['phoneModScamFeature'];
				$phoneModScamVid = $_POST['phoneModScamVid'];
				$phoneModLspeaker = $_POST['phoneModLspeaker'];
				$phoneModJack = $_POST['phoneModJack'];
				$phoneModWlan = $_POST['phoneModWlan'];
				$phoneModBt = $_POST['phoneModBt'];
				$phoneModGps = $_POST['phoneModGps'];
				$phoneModNfc = $_POST['phoneModNfc'];
				$phoneModIr = $_POST['phoneModIr'];
				$phoneModRadio = $_POST['phoneModRadio'];
				$phoneModUsb  = $_POST['phoneModUsb'];
				$phoneModSensor = $_POST['phoneModSensor'];
				$phoneModBtype = $_POST['phoneModBtype'];
				$phoneModBCharge = $_POST['phoneModBCharge'];
				$phoneModColor = $_POST['phoneModColor'];
				$phoneModels = $_POST['phoneModels'];
				$phoneModSar = $_POST['phoneModSar'];
				$phoneModSarEu = $_POST['phoneModSarEu'];
				$phoneModTdisp = $_POST['phoneModTdisp'];
				$phoneModTcam = $_POST['phoneModTcam'];
				$phoneModLspeakerT = $_POST['phoneModLspeakerT'];
				$phoneModTbattery = $_POST['phoneModTbattery'];

				$phoneModResult = $productObj->addProductPhModel1($productId, $phoneModName, $phoneModPric, $phoneModTech, $phoneModBand2g, $phoneModBand3g, $phoneModBand4g, $phoneModBand5g, $phoneModSpeed, $phoneModAnnounce, $phoneModState, $phoneModDimen, $phoneModWeight, $phoneModSim, $phoneModType, $phoneModSize, $phoneModResu, $phoneModProtect, $phoneModOs, $phoneModChip, $phoneModCpu, $phoneModGpu, $phoneModMem, $phoneModInternal, $phoneModMcamSetup, $phoneModMcamPixel);


				if ($phoneModResult > 0) {

					$modelId = $phoneModResult;


					//==================File Upload start======================
					if ($_FILES['phoneModelImg']['name'][0] != "") {
						foreach ($_FILES['phoneModelImg']['tmp_name'] as $key => $value) {

							$phoneModImg = $_FILES['phoneModelImg']['name'][$key];
							$phoneMod_tmp = $_FILES['phoneModelImg']['tmp_name'][$key];
							$ext2 = pathinfo($phoneModImg, PATHINFO_EXTENSION); //get file extension


							if ($phoneModImg != "") {
								$finalPhoneModImg = '';

								if (!file_exists('../../img/product_images/product_models/phone_models/' . $phoneModImg)) {
									move_uploaded_file($phoneMod_tmp, '../../img/product_images/product_models/phone_models/' . $phoneModImg);
									$finalPhoneModImg = $phoneModImg;
								} else {
									$phoneModImg = str_replace('.', '-', basename($phoneModImg, $ext2));
									$newPhoneModImg = $phoneModImg . time() . "." . $ext2;
									move_uploaded_file($phoneMod_tmp, '../../img/product_images/product_models/phone_models/' . $newPhoneModImg);
									$finalPhoneModImg = $newPhoneModImg;
								}
							}

							// add data to product model part 2

							$productObj->addPhoneModelImg($finalPhoneModImg, $modelId); //insert image

						}
					}
					//==================File Upload end==========================
					$productObj->addProductPhModel2($modelId, $phoneModMcamFeatures, $phoneModMcamVid, $phoneModScamSetup, $phoneModScamPixel, $phoneModScamFeature, $phoneModScamVid, $phoneModLspeaker, $phoneModJack, $phoneModWlan, $phoneModBt, $phoneModGps, $phoneModNfc, $phoneModIr, $phoneModRadio, $phoneModUsb, $phoneModSensor, $phoneModBtype, $phoneModBCharge, $phoneModColor, $phoneModels, $phoneModSar, $phoneModSarEu, $phoneModTdisp, $phoneModTcam, $phoneModLspeakerT, $phoneModTbattery);

					$result = '';
					$result .= '<table id="phoneModelTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
									<th scope="col">Id</th>
									<th scope="col" width="10%">Model Image</th>
									<th scope="col">Model Name / Number</th>
									<th scope="col">Price(Rs.)</th>
									<th scope="col">Action</th>
									<th class="state" scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$productModRes = $productObj->getAllPhoneModelById($productId);
					$count = 0;
					while ($row = $productModRes->fetch_assoc()) {
						$modelId  = $row['phone_model_a_id']; // phone model Id
						//     // $categoryId = $row['category_category_id'];
						//     // $productResult2 = $productObj->getCategoryBy_id_fromCategory($categoryId);
						$phoneModResult = $productObj->getPhoneModelImages_ById($modelId);
						//     // $row2 = $productResult2->fetch_assoc();

						$buttonActive = (($row['phone_model_a_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['phone_model_a_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result .= ' <tr>
					<td>' . $count . '</td>
					<td>
						<div class="align-prod-image">';

						if ($row3 = $phoneModResult->fetch_assoc()) {
							$phoneModImg = $row3['phone_model_image_name'];
							$encodeId = base64_encode($modelId);
							$result .= '<div class="prod-img-container"><img src="../../img/product_images/product_models/phone_models/' . $phoneModImg . '" style="width:80px;height:80px;border-radius:5px;"/><div class="prod-img-overlay"><a title="Click to Zoom" href="pImagesPopupModals/phoneModelImagesModal.php?id=' . $encodeId . '" class="li-modal prod-Img-Btn" data-toggle="modal" data-backdrop="static" data-target="#myModal2"><i class="fas fa-search-plus"></i></a></div></div>';
						}

						$result .= '</div>
								</td>
								<td>' . $row['phone_model_a_name'] . '</td>
								<td>' . number_format($row['phone_model_a_price'],2) . '</td>
								<td>
						
								<a href="editProductModelModal.php?mid=' . base64_encode($row['phone_model_a_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
	
								<a href="ViewProductModelModal.php?mid=' . base64_encode($row['phone_model_a_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
					   
							</td>
							<td>
						
							<div style="display:none;">' . $row['phone_model_a_status'] . '</div>
							<!-------------Active------------------>
							<button href="javaScript:void(0)" onclick="activeInactivePhoneMod(\'' . base64_encode($row['phone_model_a_id']) . '\',0,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
							<!--------------Inactive------------------->
							<button href="javaScript:void(0)" onclick="activeInactivePhoneMod(\'' . base64_encode($row['phone_model_a_id']) . '\',1,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
							</td>
							</tr>';
					}
					$result .= '</tbody></table>';
					$result .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';

					$msg = 1;
				} else {
					throw new  Exception("Failed to insert the product model !");
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

			/*===================================================================================================================================================================
																			Edit Product Models ""PHONE"" 
			===================================================================================================================================================================*/
		case 'editPhoneModel':

			try {

				$productId = $_POST['productId'];
				$modelId = $_POST['phoneModAid'];
				$phoneModName = $_POST['phoneModelName'];
				$phoneModPric = $_POST['phoneModPrice'];
				$phoneModTech = $_POST['phoneModTech'];
				$phoneModBand2g = $_POST['band2g'];
				$phoneModBand3g = $_POST['band3g'];
				$phoneModBand4g = $_POST['band4g'];
				$phoneModBand5g = $_POST['band5g'];
				$phoneModSpeed = $_POST['phoneModSpeed'];
				$phoneModAnnounce = $_POST['phoneModAnnounce'];
				$phoneModState = $_POST['phoneModState'];
				$phoneModDimen = $_POST['phoneModDimen'];
				$phoneModWeight = $_POST['phoneModWeight'];
				$phoneModSim = $_POST['phoneModSim'];
				$phoneModType = $_POST['phoneModType'];
				$phoneModSize = $_POST['phoneModSize'];
				$phoneModResu = $_POST['phoneModResolution'];
				$phoneModProtect = $_POST['phoneModProtect'];
				$phoneModOs = $_POST['phoneModOs'];
				$phoneModChip = $_POST['phoneModChip'];
				$phoneModCpu = $_POST['phoneModCpu'];
				$phoneModGpu = $_POST['phoneModGpu'];
				$phoneModMem = $_POST['phoneModMem'];
				$phoneModInternal = $_POST['phoneModInternal'];
				$phoneModMcamSetup = $_POST['phoneModMcamSetup'];
				$phoneModMcamPixel = $_POST['phoneModMcamPixel'];
				$phoneModMcamFeatures = $_POST['phoneModMcamFeatures'];
				$phoneModMcamVid = $_POST['phoneModMcamVid'];
				$phoneModScamSetup = $_POST['phoneModScamSetup'];
				$phoneModScamPixel = $_POST['phoneModScamPixel'];
				$phoneModScamFeature = $_POST['phoneModScamFeature'];
				$phoneModScamVid = $_POST['phoneModScamVid'];
				$phoneModLspeaker = $_POST['phoneModLspeaker'];
				$phoneModJack = $_POST['phoneModJack'];
				$phoneModWlan = $_POST['phoneModWlan'];
				$phoneModBt = $_POST['phoneModBt'];
				$phoneModGps = $_POST['phoneModGps'];
				$phoneModNfc = $_POST['phoneModNfc'];
				$phoneModIr = $_POST['phoneModIr'];
				$phoneModRadio = $_POST['phoneModRadio'];
				$phoneModUsb  = $_POST['phoneModUsb'];
				$phoneModSensor = $_POST['phoneModSensor'];
				$phoneModBtype = $_POST['phoneModBtype'];
				$phoneModBCharge = $_POST['phoneModBCharge'];
				$phoneModColor = $_POST['phoneModColor'];
				$phoneModels = $_POST['phoneModels'];
				$phoneModSar = $_POST['phoneModSar'];
				$phoneModSarEu = $_POST['phoneModSarEu'];
				$phoneModTdisp = $_POST['phoneModTdisp'];
				$phoneModTcam = $_POST['phoneModTcam'];
				$phoneModLspeakerT = $_POST['phoneModLspeakerT'];
				$phoneModTbattery = $_POST['phoneModTbattery'];

				$phoneModResult = $productObj->editProductPhModel1($modelId, $phoneModName, $phoneModPric, $phoneModTech, $phoneModBand2g, $phoneModBand3g, $phoneModBand4g, $phoneModBand5g, $phoneModSpeed, $phoneModAnnounce, $phoneModState, $phoneModDimen, $phoneModWeight, $phoneModSim, $phoneModType, $phoneModSize, $phoneModResu, $phoneModProtect, $phoneModOs, $phoneModChip, $phoneModCpu, $phoneModGpu, $phoneModMem, $phoneModInternal, $phoneModMcamSetup, $phoneModMcamPixel);


				if ($phoneModResult > 0) {




					//==================File Upload start======================
					if ($_FILES['phoneModelImg']['name'][0] != "") {
						foreach ($_FILES['phoneModelImg']['tmp_name'] as $key => $value) {

							$phoneModImg = $_FILES['phoneModelImg']['name'][$key];
							$phoneMod_tmp = $_FILES['phoneModelImg']['tmp_name'][$key];
							$ext2 = pathinfo($phoneModImg, PATHINFO_EXTENSION); //get file extension


							if ($phoneModImg != "") {
								$finalPhoneModImg = '';

								if (!file_exists('../../img/product_images/product_models/phone_models/' . $phoneModImg)) {
									move_uploaded_file($phoneMod_tmp, '../../img/product_images/product_models/phone_models/' . $phoneModImg);
									$finalPhoneModImg = $phoneModImg;
								} else {
									$phoneModImg = str_replace('.', '-', basename($phoneModImg, $ext2));
									$newPhoneModImg = $phoneModImg . time() . "." . $ext2;
									move_uploaded_file($phoneMod_tmp, '../../img/product_images/product_models/phone_models/' . $newPhoneModImg);
									$finalPhoneModImg = $newPhoneModImg;
								}
							}



							$productObj->addPhoneModelImg($finalPhoneModImg, $modelId); //insert image

						}
					}
					// }
					// //==================File Upload end==========================

					// edit data to product model part 2
					$productObj->editProductPhModel2($modelId, $phoneModMcamFeatures, $phoneModMcamVid, $phoneModScamSetup, $phoneModScamPixel, $phoneModScamFeature, $phoneModScamVid, $phoneModLspeaker, $phoneModJack, $phoneModWlan, $phoneModBt, $phoneModGps, $phoneModNfc, $phoneModIr, $phoneModRadio, $phoneModUsb, $phoneModSensor, $phoneModBtype, $phoneModBCharge, $phoneModColor, $phoneModels, $phoneModSar, $phoneModSarEu, $phoneModTdisp, $phoneModTcam, $phoneModLspeakerT, $phoneModTbattery);
					//-----------------------Used For normal submission-------------
					// $msg = "Sucessfully edited Phone Model !";
					// $msg = base64_encode($msg);
					// $encodePid = base64_encode($productId);
					// header("Location: ../view/manageProductModels.php?id=$encodePid&response=$msg");
					//-----------------------Used For ajax submission-------------
					$result = '';
					$result .= '<div class="col-md-12">
								<h6 class="text-danger mb-4">*You Can Remove Existing Phone Model Images Here</h6>
								</div>';
					$phoneModEditImgView = $productObj->getPhoneModelImages_ById($modelId);
					while ($imgRow = $phoneModEditImgView->fetch_assoc()) {
						$result .= '<div class="col-md-4">
								<div class="text-center mb-5">
								<span title="remove" data-toggle="tooltip" data-placement="right" class="imgBtn delImgBtn1" data-imgId="' . $imgRow["phone_model_image_id"] . '" data-imgName="' . $imgRow["phone_model_image_name"] . '">
								<i class="fas fa-times-circle fa-2x text-danger"></i>
								</span>
								<img class="w-75" src="../../img/product_images/product_models/phone_models/' . $imgRow["phone_model_image_name"] . '" alt="phone_model_image">
								</div>
								</div>';
					}
					$result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					//-------------------------------------------------------------------------- Table OUTPUT-----------------------------------------------------------------------------------------
					$result2 = '';
					$result2 .= '<table id="phoneModelTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
									<th scope="col">Id</th>
									<th scope="col" width="10%">Model Image</th>
									<th scope="col">Model Name / Number</th>
									<th scope="col">Price(Rs.)</th>
									<th scope="col">Action</th>
									<th class="state" scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$productModRes = $productObj->getAllPhoneModelById($productId);
					$count = 0;
					while ($row = $productModRes->fetch_assoc()) {
						$modelId  = $row['phone_model_a_id']; // phone model Id
						//     // $categoryId = $row['category_category_id'];
						//     // $productResult2 = $productObj->getCategoryBy_id_fromCategory($categoryId);
						$phoneModResult = $productObj->getPhoneModelImages_ById($modelId);
						//     // $row2 = $productResult2->fetch_assoc();

						$buttonActive = (($row['phone_model_a_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['phone_model_a_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result2 .= ' <tr>
					<td>' . $count . '</td>
					<td>
						<div class="align-prod-image">';

						if ($row3 = $phoneModResult->fetch_assoc()) {
							$phoneModImg = $row3['phone_model_image_name'];
							$encodeId = base64_encode($modelId);
							$result2 .= '<div class="prod-img-container"><img src="../../img/product_images/product_models/phone_models/' . $phoneModImg . '" style="width:80px;height:80px;border-radius:5px;"/><div class="prod-img-overlay"><a title="Click to Zoom" href="pImagesPopupModals/phoneModelImagesModal.php?id=' . $encodeId . '" class="li-modal prod-Img-Btn" data-toggle="modal" data-backdrop="static" data-target="#myModal2"><i class="fas fa-search-plus"></i></a></div></div>';
						}

						$result2 .= '</div>
								</td>
								<td>' . $row['phone_model_a_name'] . '</td>
								<td>' . number_format($row['phone_model_a_price'],2) . '</td>
								<td>
						
								<a href="editProductModelModal.php?mid=' . base64_encode($row['phone_model_a_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
	
								<a href="ViewProductModelModal.php?mid=' . base64_encode($row['phone_model_a_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
					   
							</td>
							<td>
						
							<div style="display:none;">' . $row['phone_model_a_status'] . '</div>
							<!-------------Active------------------>
							<button href="javaScript:void(0)" onclick="activeInactivePhoneMod(\'' . base64_encode($row['phone_model_a_id']) . '\',0,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
							<!--------------Inactive------------------->
							<button href="javaScript:void(0)" onclick="activeInactivePhoneMod(\'' . base64_encode($row['phone_model_a_id']) . '\',1,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
							</td>
							</tr>';
					}
					$result2 .= '</tbody></table>';
					$result2 .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					$msg = 1;
				} else {
					// header("Location: ../view/productManagement.php?response=$msg");
					throw new  Exception("Failed to update the product model !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$msg = 2;
				$result = $error;
				$result2 = $error;
			}

			$data[0] = $msg;
			$data[1] = base64_encode($result);
			$data[2] = base64_encode($result2);
			echo json_encode($data);

			break;

			/*===================================================================================================================================================================
																			Active/Deactive Product Models ""PHONE"" 
			===================================================================================================================================================================*/

		case 'activeDeactivePhoneMod':

			try {

				$productId = base64_decode($_POST['productId']);
				$modelId = base64_decode($_POST['id']);
				$phoneModStatus =  $_POST['phoneMod_status'];

				$updateStatus = $productObj->updatePhoneMod_A_Status($modelId, $phoneModStatus);

				if ($updateStatus == 1) {
					$productObj->updatePhoneMod_B_Status($modelId, $phoneModStatus);

					$result = '';
					$result .= '<table id="phoneModelTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
									<th scope="col">Id</th>
									<th scope="col" width="10%">Model Image</th>
									<th scope="col">Model Name / Number</th>
									<th scope="col">Price(Rs.)</th>
									<th scope="col">Action</th>
									<th class="state" scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$productModRes = $productObj->getAllPhoneModelById($productId);
					$count = 0;
					while ($row = $productModRes->fetch_assoc()) {
						$modelId  = $row['phone_model_a_id']; // phone model Id
						//     // $categoryId = $row['category_category_id'];
						//     // $productResult2 = $productObj->getCategoryBy_id_fromCategory($categoryId);
						$phoneModResult = $productObj->getPhoneModelImages_ById($modelId);
						//     // $row2 = $productResult2->fetch_assoc();

						$buttonActive = (($row['phone_model_a_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['phone_model_a_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result .= ' <tr>
					<td>' . $count . '</td>
					<td>
						<div class="align-prod-image">';

						if ($row3 = $phoneModResult->fetch_assoc()) {
							$phoneModImg = $row3['phone_model_image_name'];
							$encodeId = base64_encode($modelId);
							$result .= '<div class="prod-img-container"><img src="../../img/product_images/product_models/phone_models/' . $phoneModImg . '" style="width:80px;height:80px;border-radius:5px;"/><div class="prod-img-overlay"><a title="Click to Zoom" href="pImagesPopupModals/phoneModelImagesModal.php?id=' . $encodeId . '" class="li-modal prod-Img-Btn" data-toggle="modal" data-backdrop="static" data-target="#myModal2"><i class="fas fa-search-plus"></i></a></div></div>';
						}

						$result .= '</div>
								</td>
								<td>' . $row['phone_model_a_name'] . '</td>
								<td>' . number_format($row['phone_model_a_price'],2) . '</td>
								<td>
						
								<a href="editProductModelModal.php?mid=' . base64_encode($row['phone_model_a_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
	
								<a href="ViewProductModelModal.php?mid=' . base64_encode($row['phone_model_a_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
					   
							</td>
							<td>
						
							<div style="display:none;">' . $row['phone_model_a_status'] . '</div>
							<!-------------Active------------------>
							<button href="javaScript:void(0)" onclick="activeInactivePhoneMod(\'' . base64_encode($row['phone_model_a_id']) . '\',0,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
							<!--------------Inactive------------------->
							<button href="javaScript:void(0)" onclick="activeInactivePhoneMod(\'' . base64_encode($row['phone_model_a_id']) . '\',1,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
							</td>
							</tr>';
					}
					$result .= '</tbody></table>';
					$result .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';

					$msg = 1;
				} else {
					throw new  Exception("Status Updation Failed !");
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



			/*===================================================================================================================================================================
																			Remove Product Models Images ""PHONE"" 
			===================================================================================================================================================================*/


		case 'removePhoneModImage':

			try {

				$modelId = $_POST['phoneModAid'];
				$imgId = $_POST['phoneMid'];
				$pImgName = $_POST['phoneMname'];

				$phoneImgRes = $productObj->deletePhoneModImage($imgId);

				if ($phoneImgRes > 0) {
					$result = '';
					$result .= '<div class="col-md-12">
								<h6 class="text-danger mb-4">*You Can Remove Existing Phone Model Images Here</h6>
								</div>';
					$phoneModEditImgView = $productObj->getPhoneModelImages_ById($modelId);
					while ($imgRow = $phoneModEditImgView->fetch_assoc()) {
						$result .= '<div class="col-md-4">
								<div class="text-center mb-5">
								<span title="remove" data-toggle="tooltip" data-placement="right" class="imgBtn delImgBtn1" data-imgId="' . $imgRow["phone_model_image_id"] . '" data-imgName="' . $imgRow["phone_model_image_name"] . '">
								<i class="fas fa-times-circle fa-2x text-danger"></i>
								</span>
								<img class="w-75" src="../../img/product_images/product_models/phone_models/' . $imgRow["phone_model_image_name"] . '" alt="phone_model_image">
								</div>
								</div>';
					}
					$result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					unlink("../../img/product_images/product_models/phone_models/$pImgName");
					$msg = 1;
				} else {
					throw new  Exception("Failed to remove the phone model image !");
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

			/*===================================================================================================================================================================
																			Add Product Models ""HEADPHONE"" 
	===================================================================================================================================================================*/

		case 'addHeadphoneModel':

			try {

				$productId = $_POST['hdProdId'];
				$hdModName = $_POST['hdModelName'];
				$hdModPric = $_POST['hdModPrice'];
				$hdModType = $_POST['headphType'];
				$hdModColor = $_POST['headphColor'];
				$hdModStyle = $_POST['headphStyle'];
				$hdModDimen = $_POST['headphDimen'];
				$hdModMater = $_POST['headphMaterial'];
				$hdModFrespon = $_POST['headphFresponse'];
				$hdModFresponA = $_POST['headphFresponseA'];
				$hdModFresponBt = $_POST['headphFresponseBt'];
				$hdModSensivity = $_POST['headphSensivity'];
				$hdModNfc = $_POST['headphNfc'];
				$hdModBt = $_POST['headphBt'];
				$hdModWifi = $_POST['headphWifi'];
				$hdModDescript = $_POST['hdModDescrip'];



				$hdModResult = $productObj->addProductHdModel($productId, $hdModName, $hdModPric, $hdModType, $hdModColor, $hdModStyle, $hdModDimen, $hdModMater, $hdModFrespon, $hdModFresponA, $hdModFresponBt, $hdModSensivity, $hdModNfc, $hdModBt, $hdModWifi, $hdModDescript);


				if ($hdModResult > 0) {

					$modelId = $hdModResult;
					//==================File Upload start======================
					if ($_FILES['hdModelImg']['name'][0] != "") {
						foreach ($_FILES['hdModelImg']['tmp_name'] as $key => $value) {

							$hdModImg = $_FILES['hdModelImg']['name'][$key];
							$hdMod_temp = $_FILES['hdModelImg']['tmp_name'][$key];
							$ext2 = pathinfo($hdModImg, PATHINFO_EXTENSION); //get file extension


							if ($hdModImg != "") {
								$finalHdModImg = '';

								if (!file_exists('../../img/product_images/product_models/headphone_models/' . $hdModImg)) {
									move_uploaded_file($hdMod_temp, '../../img/product_images/product_models/headphone_models/' . $hdModImg);
									$finalHdModImg = $hdModImg;
								} else {
									$hdModImg = str_replace('.', '-', basename($hdModImg, $ext2));
									$newHdModImg = $hdModImg . time() . "." . $ext2;
									move_uploaded_file($hdMod_temp, '../../img/product_images/product_models/headphone_models/' . $newHdModImg);
									$finalHdModImg = $newHdModImg;
								}
							}



							$productObj->addHdModelImg($finalHdModImg, $modelId); //insert image for Headphone

						}
					}

					// //==================File Upload end==========================
					$result = '';
					$result .= '<table id="hdModelTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
									<th scope="col">Id</th>
									<th scope="col" width="10%">Model Image</th>
									<th scope="col">Model Name / Number</th>
									<th scope="col">Price(Rs.)</th>
									<th scope="col">Action</th>
									<th class="state" scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$productModRes3 = $productObj->getAllHeadphoneModelById($productId);
					$count = 0;
					while ($row = $productModRes3->fetch_assoc()) {
						$modelId  = $row['headphone_model_id']; // headphone model Id
						//     // $categoryId = $row['category_category_id'];
						//     // $productResult2 = $productObj->getCategoryBy_id_fromCategory($categoryId);
						$hPhoneModResult = $productObj->getHeadphoneModelImages_ById($modelId);
						//     // $row2 = $productResult2->fetch_assoc();

						$buttonActive = (($row['headphone_model_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['headphone_model_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result .= '<tr>
								<td>' . $count . '</td>
								<td>
									<div class="align-prod-image">';

						if ($row3 = $hPhoneModResult->fetch_assoc()) {
							$hPhoneModImg = $row3['headphone_model_image_name'];
							$encodeId = base64_encode($modelId);
							$result .= '<div class="prod-img-container"><img src="../../img/product_images/product_models/headphone_models/' . $hPhoneModImg . '" style="width:80px;height:80px;border-radius:5px;"/><div class="prod-img-overlay"><a title="Click to Zoom" href="pImagesPopupModals/headphoneModelImagesModal.php?id=' . $encodeId . '" class="li-modal prod-Img-Btn" data-toggle="modal" data-backdrop="static" data-target="#myModal2"><i class="fas fa-search-plus"></i></a></div></div>';
						}

						$result .= '</div>
								</td>
								<td>' . $row['headphone_model_name'] . '</td>
								<td>' . number_format($row['headphone_model_price'],2) . '</td>
								<td>
									<a href="editProductModelModal.php?mid=' . base64_encode($row['headphone_model_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
	
									<a href="ViewProductModelModal.php?mid=' . base64_encode($row['headphone_model_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
								</td>
								<td>
						
									<div style="display:none;">' . $row['headphone_model_status'] . '</div>
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveHphoneMod(\'' . base64_encode($row['headphone_model_id']) . '\',0,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveHphoneMod(\'' . base64_encode($row['headphone_model_id']) . '\',1,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
	
								</td>
							</tr>';
					}
					$result .= '</tbody></table>';
					$result .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					$msg = 1;
				} else {
					throw new  Exception("Failed to insert the Headphone model !");
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

			/*===================================================================================================================================================================
																			Edit Product Models ""HEADPHONE"" 
	===================================================================================================================================================================*/

		case 'editHeadphoneModel':

			try {

				$productId = $_POST['hdProdId'];
				$modelId = $_POST['hPhoneModId'];
				$hdModName = $_POST['hdModelName'];
				$hdModPric = $_POST['hdModPrice'];
				$hdModType = $_POST['headphType'];
				$hdModColor = $_POST['headphColor'];
				$hdModStyle = $_POST['headphStyle'];
				$hdModDimen = $_POST['headphDimen'];
				$hdModMater = $_POST['headphMaterial'];
				$hdModFrespon = $_POST['headphFresponse'];
				$hdModFresponA = $_POST['headphFresponseA'];
				$hdModFresponBt = $_POST['headphFresponseBt'];
				$hdModSensivity = $_POST['headphSensivity'];
				$hdModNfc = $_POST['headphNfc'];
				$hdModBt = $_POST['headphBt'];
				$hdModWifi = $_POST['headphWifi'];
				$hdModDescript = $_POST['hdModDescrip'];



				$hdModResult = $productObj->editProductHdModel($modelId, $hdModName, $hdModPric, $hdModType, $hdModColor, $hdModStyle, $hdModDimen, $hdModMater, $hdModFrespon, $hdModFresponA, $hdModFresponBt, $hdModSensivity, $hdModNfc, $hdModBt, $hdModWifi, $hdModDescript);


				if ($hdModResult > 0) {

					//==================File Upload start======================
					if ($_FILES['hdModelImg']['name'][0] != "") {
						foreach ($_FILES['hdModelImg']['tmp_name'] as $key => $value) {

							$hdModImg = $_FILES['hdModelImg']['name'][$key];
							$hdMod_temp = $_FILES['hdModelImg']['tmp_name'][$key];
							$ext2 = pathinfo($hdModImg, PATHINFO_EXTENSION); //get file extension


							if ($hdModImg != "") {
								$finalHdModImg = '';

								if (!file_exists('../../img/product_images/product_models/headphone_models/' . $hdModImg)) {
									move_uploaded_file($hdMod_temp, '../../img/product_images/product_models/headphone_models/' . $hdModImg);
									$finalHdModImg = $hdModImg;
								} else {
									$hdModImg = str_replace('.', '-', basename($hdModImg, $ext2));
									$newHdModImg = $hdModImg . time() . "." . $ext2;
									move_uploaded_file($hdMod_temp, '../../img/product_images/product_models/headphone_models/' . $newHdModImg);
									$finalHdModImg = $newHdModImg;
								}
							}
							$productObj->addHdModelImg($finalHdModImg, $modelId); //insert image for Headphone

						}
					}

					// //==================File Upload end==========================
					$result = '';
					$result .= '<div class="col-md-12">
								<h6 class="text-danger mb-4">*You Can Remove Existing Headphone Model Images Here</h6>
								</div>';
					$hPhoneModEditImgView = $productObj->getHeadphoneModelImages_ById($modelId);
					while ($imgRow = $hPhoneModEditImgView->fetch_assoc()) {
						$result .= '<div class="col-md-4">
								<div class="text-center mb-5">
								<span title="remove" data-toggle="tooltip" data-placement="right" class="imgBtn delImgBtn3" data-imgId="' . $imgRow["headphone_model_image_id"] . '" data-imgName="' . $imgRow["headphone_model_image_name"] . '">
								<i class="fas fa-times-circle fa-2x text-danger"></i>
								</span>
								<img class="w-75" src="../../img/product_images/product_models/headphone_models/' . $imgRow["headphone_model_image_name"] . '" alt="headphone_model_image">
								</div>
								</div>';
					}
					$result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					//-------------------------------------------------------------------------- Table OUTPUT-----------------------------------------------------------------------------------------

					$result2 = '';
					$result2 .= '<table id="hdModelTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
									<th scope="col">Id</th>
									<th scope="col" width="10%">Model Image</th>
									<th scope="col">Model Name / Number</th>
									<th scope="col">Price(Rs.)</th>
									<th scope="col">Action</th>
									<th class="state" scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$productModRes3 = $productObj->getAllHeadphoneModelById($productId);
					$count = 0;
					while ($row = $productModRes3->fetch_assoc()) {
						$modelId  = $row['headphone_model_id']; // headphone model Id
						//     // $categoryId = $row['category_category_id'];
						//     // $productResult2 = $productObj->getCategoryBy_id_fromCategory($categoryId);
						$hPhoneModResult = $productObj->getHeadphoneModelImages_ById($modelId);
						//     // $row2 = $productResult2->fetch_assoc();

						$buttonActive = (($row['headphone_model_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['headphone_model_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result2 .= '<tr>
								<td>' . $count . '</td>
								<td>
									<div class="align-prod-image">';

						if ($row3 = $hPhoneModResult->fetch_assoc()) {
							$hPhoneModImg = $row3['headphone_model_image_name'];
							$encodeId = base64_encode($modelId);
							$result2 .= '<div class="prod-img-container"><img src="../../img/product_images/product_models/headphone_models/' . $hPhoneModImg . '" style="width:80px;height:80px;border-radius:5px;"/><div class="prod-img-overlay"><a title="Click to Zoom" href="pImagesPopupModals/headphoneModelImagesModal.php?id=' . $encodeId . '" class="li-modal prod-Img-Btn" data-toggle="modal" data-backdrop="static" data-target="#myModal2"><i class="fas fa-search-plus"></i></a></div></div>';
						}

						$result2 .= '</div>
								</td>
								<td>' . $row['headphone_model_name'] . '</td>
								<td>' . number_format($row['headphone_model_price'],2) . '</td>
								<td>
									<a href="editProductModelModal.php?mid=' . base64_encode($row['headphone_model_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
	
									<a href="ViewProductModelModal.php?mid=' . base64_encode($row['headphone_model_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
								</td>
								<td>
						
									<div style="display:none;">' . $row['headphone_model_status'] . '</div>
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveHphoneMod(\'' . base64_encode($row['headphone_model_id']) . '\',0,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveHphoneMod(\'' . base64_encode($row['headphone_model_id']) . '\',1,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
	
								</td>
							</tr>';
					}
					$result2 .= '</tbody></table>';
					$result2 .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';

					$msg = 1;
				} else {
					throw new  Exception("Failed to edit the Headphone model !");
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$msg = 2;
				$result = $error;
				$result2 = $error;
			}

			$data[0] = $msg;
			$data[1] = base64_encode($result);
			$data[2] = base64_encode($result2);
			echo json_encode($data);

			break;


			/*===================================================================================================================================================================
																			Remove Product Models Images ""HEADPHONE"" 
			===================================================================================================================================================================*/


		case 'removeHphoneModImage':

			try {

				$imgId = $_POST['hdPhoneMid'];
				$imgName = $_POST['hdphoneMname'];
				$modelId = $_POST['hphoneModId'];

				$hPhoneImgRes = $productObj->deleteHdPhoneModImage($imgId);

				if ($hPhoneImgRes > 0) {
					$result = '';
					$result .= '<div class="col-md-12">
								<h6 class="text-danger mb-4">*You Can Remove Existing Headphone Model Images Here</h6>
								</div>';
					$hPhoneModEditImgView = $productObj->getHeadphoneModelImages_ById($modelId);
					while ($imgRow = $hPhoneModEditImgView->fetch_assoc()) {
						$result .= '<div class="col-md-4">
								<div class="text-center mb-5">
								<span title="remove" data-toggle="tooltip" data-placement="right" class="imgBtn delImgBtn3" data-imgId="' . $imgRow["headphone_model_image_id"] . '" data-imgName="' . $imgRow["headphone_model_image_name"] . '">
								<i class="fas fa-times-circle fa-2x text-danger"></i>
								</span>
								<img class="w-75" src="../../img/product_images/product_models/headphone_models/' . $imgRow["headphone_model_image_name"] . '" alt="headphone_model_image">
								</div>
								</div>';
					}
					$result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';

					unlink("../../img/product_images/product_models/headphone_models/$imgName");
					$msg = 1;
				} else {
					throw new  Exception("Failed to remove the phone model image !");
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

			/*===================================================================================================================================================================
																			Active/Deactive Product Model "HEADPHONE" 
			===================================================================================================================================================================*/



		case 'activeDeactiveHphoneMod':

			try {

				$productId = base64_decode($_POST['productId']);
				$modelId = base64_decode($_POST['id']);
				$hPhoneModStatus =  $_POST['hPhoneMod_status'];

				$updateStatus = $productObj->updateHphoneMod_Status($modelId, $hPhoneModStatus);

				if ($updateStatus == 1) {

					$result = '';
					$result .= '<table id="hdModelTable" class="table nowrap table-striped text-center" width="100%">
								<thead>
								<tr class="tb-head-style">
									<th scope="col">Id</th>
									<th scope="col" width="10%">Model Image</th>
									<th scope="col">Model Name / Number</th>
									<th scope="col">Price(Rs.)</th>
									<th scope="col">Action</th>
									<th class="state" scope="col">Status</th>
								</tr>
								</thead>
								<tbody>';
					$productModRes3 = $productObj->getAllHeadphoneModelById($productId);
					$count = 0;
					while ($row = $productModRes3->fetch_assoc()) {
						$modelId  = $row['headphone_model_id']; // headphone model Id
						//     // $categoryId = $row['category_category_id'];
						//     // $productResult2 = $productObj->getCategoryBy_id_fromCategory($categoryId);
						$hPhoneModResult = $productObj->getHeadphoneModelImages_ById($modelId);
						//     // $row2 = $productResult2->fetch_assoc();

						$buttonActive = (($row['headphone_model_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['headphone_model_status'] == 1) ? 'inline' : 'none');
						$count++;
						$result .= '<tr>
								<td>' . $count . '</td>
								<td>
									<div class="align-prod-image">';

						if ($row3 = $hPhoneModResult->fetch_assoc()) {
							$hPhoneModImg = $row3['headphone_model_image_name'];
							$encodeId = base64_encode($modelId);
							$result .= '<div class="prod-img-container"><img src="../../img/product_images/product_models/headphone_models/' . $hPhoneModImg . '" style="width:80px;height:80px;border-radius:5px;"/><div class="prod-img-overlay"><a title="Click to Zoom" href="pImagesPopupModals/headphoneModelImagesModal.php?id=' . $encodeId . '" class="li-modal prod-Img-Btn" data-toggle="modal" data-backdrop="static" data-target="#myModal2"><i class="fas fa-search-plus"></i></a></div></div>';
						}

						$result .= '</div>
								</td>
								<td>' . $row['headphone_model_name'] . '</td>
								<td>' . number_format($row['headphone_model_price'],2) . '</td>
								<td>
									<a href="editProductModelModal.php?mid=' . base64_encode($row['headphone_model_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
	
									<a href="ViewProductModelModal.php?mid=' . base64_encode($row['headphone_model_id']) . '&pid=' . base64_encode($productId) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
								</td>
								<td>
						
									<div style="display:none;">' . $row['headphone_model_status'] . '</div>
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveHphoneMod(\'' . base64_encode($row['headphone_model_id']) . '\',0,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveHphoneMod(\'' . base64_encode($row['headphone_model_id']) . '\',1,\'' . base64_encode($row['product_product_id']) . '\')" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
	
								</td>
							</tr>';
					}
					$result .= '</tbody></table>';
					$result .= '<script type="text/javascript" src="../../js/dataTablesLoad.js"></script>';
					$msg = 1;
				} else {
					throw new  Exception("Status Updation Failed !");
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
