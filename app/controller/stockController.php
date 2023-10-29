<?php
session_start();
if (isset($_REQUEST['status'])) {

	include_once '../model/stockModel.php'; //including user from userModel

	$stockObj = new stock(); // make user object from user class

	$status = $_REQUEST['status'];

	switch ($status) {


			/*===================================================================================================================================================================
																			GET BRAND FOR CATEGORY
		===================================================================================================================================================================*/

		case 'allBrandsSel':

			try {

				$productCatId = $_POST['productCatId'];

				if ($productCatId != '') {

					$result = '';
					$result .= '<select class="form-control stockBrand2" name="stockBrand2" id="stockBrand2" onchange="showSelection4(stockCat2.value,this.value),brandValid()">
							   <option value="">Please Select a Product Brand</option>';
					$productBrandRes = $stockObj->getBrandfor_CategoryFromProduct($productCatId);
					while ($row = $productBrandRes->fetch_assoc()) {
						$brandId = $row['brand_brand_id'];
						$productBrandRes2 = $stockObj->getBrandBy_id_fromBrand($brandId);
						if ($row2 = $productBrandRes2->fetch_assoc()) {
							$brandImg = $row2['brand_image'];
							$result .= '<option data-left="../../img/brand_images/' . $brandImg . '" value="' . $row2['brand_id'] . '">' . "&nbsp;&nbsp;&nbsp;" . $row2['brand_name'] . '</option>';
						}
					}
					$result .= '</select>
								<span class="text-danger error-msg" id="brandErr"></span>';
					$result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';

					$msg = 1;
				} else {
					throw new Exception("No Product Category value passed !");
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
																			GET PRODUCT FOR BRAND & CATEGORY
			===================================================================================================================================================================*/

		case 'allProductSel':

			try {
				$productCatId = $_POST['productCatId'];
				$productBrandId = $_POST['productBrandId'];

				if ($productBrandId != "" & $productCatId != "") {
					$result = '';
					$result .= '<select class="form-control stockNm2" name="stockNm2" id="stockNm2" onchange="showSelection5(stockCat2.value,this.value),productValid()">
								<option value="">Please Select a Product </option>';
					$productRes = $stockObj->getProducts_fromCategory_Brand($productCatId, $productBrandId);
					while ($row = $productRes->fetch_assoc()) {
						$productId = $row['product_id'];
						$productRes2 = $stockObj->getProductImages_ById($productId); // get product images for the product
						if ($row2 = $productRes2->fetch_assoc()) {
							$productImg = $row2['product_image_name'];
							$result .= '<option data-left="../../img/product_images/products/' . $productImg . '" value="' . $row['product_id'] . '">' . "&nbsp;&nbsp;&nbsp;" . $row['product_name'] . '</option>';
						}
					}
					$result .= '</select>
						  		<span class="text-danger error-msg" id="stockNmErr"></span>';
					$result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
				} else {
					throw new Exception("No Product Brand or Product Category value passed !");
				}
				$msg = 1;
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
																			GET TABLE DATA FOR PRODUCT
			===================================================================================================================================================================*/

		case 'allModelSel':

			try {

				$productId = $_POST['productId'];
				$categoryId = $_POST['categoryId'];

				if ($productId != "" & $categoryId != "") {
					$result = '';
					$productModRes = $stockObj->getCategoryBy_id_fromCategory($categoryId);
					if ($row3 = $productModRes->fetch_assoc()) {
						//-----------------------------------------------------------------------------PHONE TABLE----------------------------------------------------------------------------
						if ($row3['category_name'] == "phone" | $row3['category_name'] == "Phone") {

							$result .= '<select class="form-control stockModel2" name="stockModel2" id="stockModel2" onchange="modelValid()">
								<option value="">Please Select a Product Model</option>';
							$productModRes2 = $stockObj->getAllPhoneModelById($productId);
							while ($row = $productModRes2->fetch_assoc()) {
								$modelId = $row['phone_model_a_id'];
								$productModRes3 = $stockObj->getPhoneModelImages_ById($modelId); // get product images for the product
								if ($row2 = $productModRes3->fetch_assoc()) {
									$productModImg = $row2['phone_model_image_name'];
									$result .= '<option data-left="../../img/product_images/product_models/phone_models/' . $productModImg . '" value="' . $row['phone_model_a_id'] . '">' . "&nbsp;&nbsp;&nbsp;" . "<div id='sModelName'>" . $row['phone_model_a_name'] . "</div>" . '</option>';
								}
							}
							$result .= '</select>
							  			<span class="text-danger error-msg" id="stockModErr"></span>';
							$result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
							//-----------------------------------------------------------------------------HEADPHONE TABLE----------------------------------------------------------------------------

						} else if ($row3['category_name'] == "headphone" | $row3['category_name'] == "Headphone") {

							$result .= '<select class="form-control stockModel2" name="stockModel2" id="stockModel2" onchange="modelValid()">
							<option value="">Please Select a Product Model</option>';
							$productModRes2 = $stockObj->getAllHeadphoneModelById($productId);
							while ($row = $productModRes2->fetch_assoc()) {
								$modelId = $row['headphone_model_id'];
								$productModRes3 = $stockObj->getHeadphoneModelImages_ById($modelId); // get product images for the product
								if ($row2 = $productModRes3->fetch_assoc()) {
									$productModImg = $row2['headphone_model_image_name'];
									$result .= '<option data-left="../../img/product_images/product_models/headphone_models/' . $productModImg . '" value="' . $row['headphone_model_id'] . '">' . "&nbsp;&nbsp;&nbsp;" . $row['headphone_model_name'] . '</option>';
								}
							}
							$result .= '</select>
						   				<span class="text-danger error-msg" id="stockModErr"></span>';
							$result .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
						}
					}


					$msg = 1;
				} else {
					throw new Exception("No Product value passed !");
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
																			ADD STOCK FORM DATA TO CART
			===================================================================================================================================================================*/

		case 'addStockGrn_Checkin':

			try {

				$grnId = $_POST['grnId'];
				$refId = $_POST['refId'];
				$resDate = $_POST['resDate'];
				$supId = $_POST['supplierId'];
				$catId = $_POST['stockCat2'];
				$brandId = $_POST['stockBrand2'];
				$stockNm = $_POST['stockNm2'];
				$modelId = $_POST['stockModel2'];
				$stockQty = $_POST['stockQty'];
				$costPunit = $_POST['costPerUnit'];
				$amoPaid = $_POST['amountPaid'];
				$regPrice = $_POST['regPrice'];

				//---------------------STOCK CART SESSION---------------------------------
				if (isset($_SESSION['cart'])) {

					//find the number of elements in the session
					$model_id_list = array_column($_SESSION['cart'], base64_encode('model_id')); // models in array
					$supplier_id_list = array_column($_SESSION['cart'], base64_encode('supplier_id')); //supplier in array
					if (in_array(base64_encode($modelId), $model_id_list)) {

						throw new Exception("Model is already in checkin, You can remove that item from checkin and add it!");
					} else if (!in_array(base64_encode($supId), $supplier_id_list) && !empty($_SESSION['cart'])) { // supplier is not same

						throw new Exception("Supplier have to be same for one GRN !");
					} else {

						///////////////////// IMAGE UPLOAD ////////////////////////

						if (!empty($_FILES['colorImg']['name'])) { //check if colorImg is not empty
							$colorNm = $_FILES['colorImg']['name'];
							$color = time() . "_" . $colorNm; // image with time linked method

							$tmpLocation = $_FILES['colorImg']['tmp_name'];
							$path = "../../img/stock/stock_color_img/$color";

							move_uploaded_file($tmpLocation, $path); // send file to the folder path
						} else {
							$color = $_POST['colorPick'];
						}
						///////////////////// IMAGE UPLOAD ////////////////////////

						$productdetails = array(
							base64_encode('grn_id') =>   base64_encode($grnId),
							base64_encode('ref_id') =>  base64_encode($refId),
							base64_encode('res_date') =>  base64_encode($resDate),
							base64_encode('supplier_id') =>  base64_encode($supId),
							base64_encode('category_id') =>  base64_encode($catId),
							base64_encode('brand_id') =>  base64_encode($brandId),
							base64_encode('product_id') =>  base64_encode($stockNm),
							base64_encode('model_id') =>  base64_encode($modelId),
							base64_encode('color') =>  base64_encode($color),
							base64_encode('stock_qty') =>  base64_encode($stockQty),
							base64_encode('cost_p_unit') =>  base64_encode($costPunit),
							base64_encode('amount_paid') =>  base64_encode($amoPaid),
							base64_encode('reg_price') =>  base64_encode($regPrice)
						);

						array_push($_SESSION['cart'], $productdetails);

						$output = '';
						$final_tot = 0;
						if (!empty($_SESSION['cart'])) {
							$count = 0;
							foreach ($_SESSION['cart'] as $key => $value) {
								$count++;

								$output .= '<tr>
									<td>' . $count . '</td>
									<td><input type="text" name="grnId2[]" id="grnId2" value="' . base64_decode($value[base64_encode('grn_id')]) . '" /></td>
									<td><input type="text" name="refId2" id="refId2" value="' . base64_decode($value[base64_encode('ref_id')]) . '" /></td>
									<td>';
								if (base64_decode($value[base64_encode('category_id')]) == 1) {
									$modelId = base64_decode($value[base64_encode('model_id')]);
									$stockModImgRes = $stockObj->getHeadphoneModelImages_ById($modelId);
									if ($viewRow = $stockModImgRes->fetch_assoc()) {
										$hpImage = $viewRow['headphone_model_image_name'];
										$output .= '<img src="../../img/product_images/product_models/headphone_models/' . $hpImage . '" width="auto" height="60px" />';
									}
								} else if (base64_decode($value[base64_encode('category_id')]) == 2) {
									$modelId = base64_decode($value[base64_encode('model_id')]);
									$stockModImgRes = $stockObj->getPhoneModelImages_ById($modelId);
									if ($viewRow = $stockModImgRes->fetch_assoc()) {
										$phImage = $viewRow['phone_model_image_name'];
										$output .= '<img src="../../img/product_images/product_models/phone_models/' . $phImage . '" width="auto" height="60px" />';
									}
								}
								$output .= '</td>';
								$productId = base64_decode($value[base64_encode('product_id')]);
								$stockProdRes = $stockObj->getProductBy_id_fromProduct($productId);
								if ($viewRow = $stockProdRes->fetch_assoc()) {
									$output .= '<td>
								<input type="hidden" name="productId2[]" id="productId2" value="' . base64_decode($value[base64_encode('product_id')]) . '" />
								<div>' . $viewRow['product_name'] . '</div>
								</td>';
								}
								$output .= '<td>
								<input type="hidden" name="modelId2[]" id="modelId2" value="' . base64_decode($value[base64_encode('model_id')]) . '" />';

								if (base64_decode($value[base64_encode('category_id')]) == 1) {
									$modelId = base64_decode($value[base64_encode('model_id')]);
									$stockModNmRes = $stockObj->getHphoneModBy_id_fromHphoneMod($modelId);
									if ($viewRow = $stockModNmRes->fetch_assoc()) {
										$output .= $viewRow['headphone_model_name'];
									}
								} else if (base64_decode($value[base64_encode('category_id')]) == 2) {
									$modelId = base64_decode($value[base64_encode('model_id')]);
									$stockModNmRes = $stockObj->getPhoneModABy_id_fromgetphoneModA($modelId);
									if ($viewRow = $stockModNmRes->fetch_assoc()) {
										$output .= $viewRow['phone_model_a_name'];
									}
								}
								$output .= '</td>
								<td>
									<input type="text" name="resDate2[]" id="resDate2" value="' . base64_decode($value[base64_encode('res_date')]) . '" />
									<input type="text" name="resDate3" id="resDate3" value="' . base64_decode($value[base64_encode('res_date')]) . '" />
								</td>
								<td><input type="text" name="supplierId2" id="supplierId2" value="' . base64_decode($value[base64_encode('supplier_id')]) . '" /></td>
								<td><input type="text" name="categoryId2[]" id="categoryId2" value="' . base64_decode($value[base64_encode('category_id')]) . '" /></td>
								<td><input type="text" name="brandId2[]" id="brandId2" value="' . base64_decode($value[base64_encode('brand_id')]) . '" /></td>
								<td><input type="text" name="color[]" id="color2" value="' . base64_decode($value[base64_encode('color')]) . '" /></td>
								<td><input type="text" name="costPunit2[]" id="costPunit2" value="' . base64_decode($value[base64_encode('cost_p_unit')]) . '" /></td>
								<td><input type="text" name="regPrice2[]" id="regPrice2" value="' . base64_decode($value[base64_encode('reg_price')]) . '" /></td>
								<td><input type="number" name="stockQty2[]" id="stockQty2" value="' . base64_decode($value[base64_encode('stock_qty')]) . '" /></td>
								<td><input type="text" name="amoPaid2[]" id="amoPaid2" value="' . base64_decode($value[base64_encode('amount_paid')]) . '" readonly /></td>
								<td><button type="button" onclick="removeScrtItem(\'' . base64_encode(base64_decode($value[base64_encode('model_id')])) . '\')" class="btn btn-danger"><i class="fas fa-minus fa-1x"></i></button></td>
							</tr>';
								$final_tot = $final_tot + base64_decode($value[base64_encode('amount_paid')]);
							}
							$output .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
							//active button
							$output2 = '';
							$output2 .= '<button type="button" class="btn btn-outline-primary userform-button" id="stock-cart-paySave" onclick="submitScart()"><i class="fas fa-save"></i>&nbsp;Save & Pay</button>';
							$output2 .= '<button type="button" class="btn btn-outline-danger userform-button" id="stock-cart-clear" onclick="removeAllScrtItem()"><i class="fas fa-undo"></i>&nbsp;Clear</button>';
							$output3 = number_format($final_tot, 2);
						}
						$msg = 1;
					}
				} else {

					///////////////////// IMAGE UPLOAD ////////////////////////

					if (!empty($_FILES['colorImg']['name'])) { //check if colorImg is not empty
						$colorNm = $_FILES['colorImg']['name'];
						$color = time() . "_" . $colorNm; // image with time linked method

						$tmpLocation = $_FILES['colorImg']['tmp_name'];
						$path = "../../img/stock/stock_color_img/$color";

						move_uploaded_file($tmpLocation, $path); // send file to the folder path
					} else {
						$color = $_POST['colorPick'];
					}
					///////////////////// IMAGE UPLOAD ////////////////////////

					$_SESSION['cart'] = array();

					$productdetails = array(
						base64_encode('grn_id') =>   base64_encode($grnId),
						base64_encode('ref_id') =>  base64_encode($refId),
						base64_encode('res_date') =>  base64_encode($resDate),
						base64_encode('supplier_id') =>  base64_encode($supId),
						base64_encode('category_id') =>  base64_encode($catId),
						base64_encode('brand_id') =>  base64_encode($brandId),
						base64_encode('product_id') =>  base64_encode($stockNm),
						base64_encode('model_id') =>  base64_encode($modelId),
						base64_encode('color') =>  base64_encode($color),
						base64_encode('stock_qty') =>  base64_encode($stockQty),
						base64_encode('cost_p_unit') =>  base64_encode($costPunit),
						base64_encode('amount_paid') =>  base64_encode($amoPaid),
						base64_encode('reg_price') =>  base64_encode($regPrice)
					);
					array_push($_SESSION['cart'], $productdetails);

					$output = '';
					$final_tot = 0;
					if (!empty($_SESSION['cart'])) {
						$count = 0;
						foreach ($_SESSION['cart'] as $key => $value) {
							$count++;

							$output .= '<tr>
									<td>' . $count . '</td>
									<td><input type="text" name="grnId2[]" id="grnId2" value="' . base64_decode($value[base64_encode('grn_id')]) . '" /></td>
									<td><input type="text" name="refId2" id="refId2" value="' . base64_decode($value[base64_encode('ref_id')]) . '" /></td>
									<td>';
							if (base64_decode($value[base64_encode('category_id')]) == 1) {
								$modelId = base64_decode($value[base64_encode('model_id')]);
								$stockModImgRes = $stockObj->getHeadphoneModelImages_ById($modelId);
								if ($viewRow = $stockModImgRes->fetch_assoc()) {
									$hpImage = $viewRow['headphone_model_image_name'];
									$output .= '<img src="../../img/product_images/product_models/headphone_models/' . $hpImage . '" width="auto" height="60px" />';
								}
							} else if (base64_decode($value[base64_encode('category_id')]) == 2) {
								$modelId = base64_decode($value[base64_encode('model_id')]);
								$stockModImgRes = $stockObj->getPhoneModelImages_ById($modelId);
								if ($viewRow = $stockModImgRes->fetch_assoc()) {
									$phImage = $viewRow['phone_model_image_name'];
									$output .= '<img src="../../img/product_images/product_models/phone_models/' . $phImage . '" width="auto" height="60px" />';
								}
							}
							$output .= '</td>';
							$productId = base64_decode($value[base64_encode('product_id')]);
							$stockProdRes = $stockObj->getProductBy_id_fromProduct($productId);
							if ($viewRow = $stockProdRes->fetch_assoc()) {
								$output .= '<td>
								<input type="hidden" name="productId2[]" id="productId2" value="' . base64_decode($value[base64_encode('product_id')]) . '" />
								<div>' . $viewRow['product_name'] . '</div>
								</td>';
							}
							$output .= '<td>
								<input type="hidden" name="modelId2[]" id="modelId2" value="' . base64_decode($value[base64_encode('model_id')]) . '" />';

							if (base64_decode($value[base64_encode('category_id')]) == 1) {
								$modelId = base64_decode($value[base64_encode('model_id')]);
								$stockModNmRes = $stockObj->getHphoneModBy_id_fromHphoneMod($modelId);
								if ($viewRow = $stockModNmRes->fetch_assoc()) {
									$output .= $viewRow['headphone_model_name'];
								}
							} else if (base64_decode($value[base64_encode('category_id')]) == 2) {
								$modelId = base64_decode($value[base64_encode('model_id')]);
								$stockModNmRes = $stockObj->getPhoneModABy_id_fromgetphoneModA($modelId);
								if ($viewRow = $stockModNmRes->fetch_assoc()) {
									$output .= $viewRow['phone_model_a_name'];
								}
							}
							$output .= '</td>
								<td>
									<input type="text" name="resDate2[]" id="resDate2" value="' . base64_decode($value[base64_encode('res_date')]) . '" />
									<input type="text" name="resDate3" id="resDate3" value="' . base64_decode($value[base64_encode('res_date')]) . '" />
								</td>
								<td><input type="text" name="supplierId2" id="supplierId2" value="' . base64_decode($value[base64_encode('supplier_id')]) . '" /></td>
								<td><input type="text" name="categoryId2[]" id="categoryId2" value="' . base64_decode($value[base64_encode('category_id')]) . '" /></td>
								<td><input type="text" name="brandId2[]" id="brandId2" value="' . base64_decode($value[base64_encode('brand_id')]) . '" /></td>
								<td><input type="text" name="color[]" id="color2" value="' . base64_decode($value[base64_encode('color')]) . '" /></td>
								<td><input type="text" name="costPunit2[]" id="costPunit2" value="' . base64_decode($value[base64_encode('cost_p_unit')]) . '" /></td>
								<td><input type="text" name="regPrice2[]" id="regPrice2" value="' . base64_decode($value[base64_encode('reg_price')]) . '" /></td>
								<td><input type="number" name="stockQty2[]" id="stockQty2" value="' . base64_decode($value[base64_encode('stock_qty')]) . '" /></td>
								<td><input type="text" name="amoPaid2[]" id="amoPaid2" value="' . base64_decode($value[base64_encode('amount_paid')]) . '" readonly /></td>
								<td><button type="button" onclick="removeScrtItem(\'' . base64_encode(base64_decode($value[base64_encode('model_id')])) . '\')" class="btn btn-danger"><i class="fas fa-minus fa-1x"></i></button></td>
							</tr>';
							$final_tot = $final_tot + base64_decode($value[base64_encode('amount_paid')]);
						}
						$output .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
						//active button
						$output2 = '';
						$output2 .= '<button type="button" class="btn btn-outline-primary userform-button" id="stock-cart-paySave" onclick="submitScart()"><i class="fas fa-save"></i>&nbsp;Save & Pay</button>';
						$output2 .= '<button type="button" class="btn btn-outline-danger userform-button" id="stock-cart-clear" onclick="removeAllScrtItem()"><i class="fas fa-undo"></i>&nbsp;Clear</button>';
						$output3 = number_format($final_tot, 2);
					}
					$msg = 1;
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
				$msg = 2;
				$output = $error;
				$output2 = $error;
				$output3 = $error;
			}
			$data[0] = $msg;
			$data[1] = base64_encode($output);
			$data[2] = base64_encode($output2);
			$data[3] = base64_encode($output3);
			echo json_encode($data);
			break;

			/*===================================================================================================================================================================
																		REMOVE STOCK FORM DATA FROM CART BY MODEL ID	
			===================================================================================================================================================================*/
		case 'removeCheckin':

			try {

				if (!empty($_SESSION['cart'])) {

					foreach ($_SESSION['cart'] as $key => $value2) {
						// $modelId = base64_decode($_POST['id']);

						if (base64_decode($value2[base64_encode('model_id')]) == base64_decode($_POST['modelId'])) {


							///////////////////////////////image///////////////////
							$colorNme = base64_decode($value2[base64_encode('color')]);
							if (!str_starts_with($colorNme, '#')) {

								$colorImg = base64_decode($value2[base64_encode('color')]);
								unlink("../../img/stock/stock_color_img/$colorImg"); // remove image if there is a image 

							}
							///////////////////////////////image///////////////////
							unset($_SESSION['cart'][$key]); // unset session->model_id
						}
					}
				} else {
					throw new Exception('No stock model in session cart');
				}

				$output = '';
				$final_tot = 0;
				//if (!empty($_SESSION['cart'])) {
				$count = 0;
				foreach ($_SESSION['cart'] as $key => $value) {
					$count++;

					$output .= '<tr>
								<td>' . $count . '</td>
								<td><input type="text" name="grnId2[]" id="grnId2" value="' . base64_decode($value[base64_encode('grn_id')]) . '" /></td>
								<td><input type="text" name="refId2" id="refId2" value="' . base64_decode($value[base64_encode('ref_id')]) . '" /></td>
								<td>';
					if (base64_decode($value[base64_encode('category_id')]) == 1) {
						$modelId = base64_decode($value[base64_encode('model_id')]);
						$stockModImgRes = $stockObj->getHeadphoneModelImages_ById($modelId);
						if ($viewRow = $stockModImgRes->fetch_assoc()) {
							$hpImage = $viewRow['headphone_model_image_name'];
							$output .= '<img src="../../img/product_images/product_models/headphone_models/' . $hpImage . '" width="auto" height="60px" />';
						}
					} else if (base64_decode($value[base64_encode('category_id')]) == 2) {
						$modelId = base64_decode($value[base64_encode('model_id')]);
						$stockModImgRes = $stockObj->getPhoneModelImages_ById($modelId);
						if ($viewRow = $stockModImgRes->fetch_assoc()) {
							$phImage = $viewRow['phone_model_image_name'];
							$output .= '<img src="../../img/product_images/product_models/phone_models/' . $phImage . '" width="auto" height="60px" />';
						}
					}
					$output .= '</td>';
					$productId = base64_decode($value[base64_encode('product_id')]);
					$stockProdRes = $stockObj->getProductBy_id_fromProduct($productId);
					if ($viewRow = $stockProdRes->fetch_assoc()) {
						$output .= '<td>
							<input type="hidden" name="productId2[]" id="productId2" value="' . base64_decode($value[base64_encode('product_id')]) . '" />
							<div>' . $viewRow['product_name'] . '</div>
							</td>';
					}
					$output .= '<td>
							<input type="hidden" name="modelId2[]" id="modelId2" value="' . base64_decode($value[base64_encode('model_id')]) . '" />';

					if (base64_decode($value[base64_encode('category_id')]) == 1) {
						$modelId = base64_decode($value[base64_encode('model_id')]);
						$stockModNmRes = $stockObj->getHphoneModBy_id_fromHphoneMod($modelId);
						if ($viewRow = $stockModNmRes->fetch_assoc()) {
							$output .= $viewRow['headphone_model_name'];
						}
					} else if (base64_decode($value[base64_encode('category_id')]) == 2) {
						$modelId = base64_decode($value[base64_encode('model_id')]);
						$stockModNmRes = $stockObj->getPhoneModABy_id_fromgetphoneModA($modelId);
						if ($viewRow = $stockModNmRes->fetch_assoc()) {
							$output .= $viewRow['phone_model_a_name'];
						}
					}
					$output .= '</td>
							<td>
								<input type="text" name="resDate2[]" id="resDate2" value="' . base64_decode($value[base64_encode('res_date')]) . '" />
								<input type="text" name="resDate3" id="resDate3" value="' . base64_decode($value[base64_encode('res_date')]) . '" />
							</td>
							<td><input type="text" name="supplierId2" id="supplierId2" value="' . base64_decode($value[base64_encode('supplier_id')]) . '" /></td>
							<td><input type="text" name="categoryId2[]" id="categoryId2" value="' . base64_decode($value[base64_encode('category_id')]) . '" /></td>
							<td><input type="text" name="brandId2[]" id="brandId2" value="' . base64_decode($value[base64_encode('brand_id')]) . '" /></td>
							<td><input type="text" name="color[]" id="color2" value="' . base64_decode($value[base64_encode('color')]) . '" /></td>
							<td><input type="text" name="costPunit2[]" id="costPunit2" value="' . base64_decode($value[base64_encode('cost_p_unit')]) . '" /></td>
							<td><input type="text" name="regPrice2[]" id="regPrice2" value="' . base64_decode($value[base64_encode('reg_price')]) . '" /></td>
							<td><input type="number" name="stockQty2[]" id="stockQty2" value="' . base64_decode($value[base64_encode('stock_qty')]) . '" /></td>
							<td><input type="text" name="amoPaid2[]" id="amoPaid2" value="' . base64_decode($value[base64_encode('amount_paid')]) . '" readonly /></td>
							<td><button type="button" onclick="removeScrtItem(\'' . base64_encode(base64_decode($value[base64_encode('model_id')])) . '\')" class="btn btn-danger"><i class="fas fa-minus fa-1x"></i></button></td>
						</tr>';
					$final_tot = $final_tot + base64_decode($value[base64_encode('amount_paid')]);
				}
				$output .= '<script type="text/javascript" src="../../js/validation2.js"></script>';

				//active button
				$output2 = '';
				$output2 .= '<button type="button" class="btn btn-outline-primary userform-button" id="stock-cart-paySave" onclick="submitScart()"><i class="fas fa-save"></i>&nbsp;Save & Pay</button>';
				$output2 .= '<button type="button" class="btn btn-outline-danger userform-button" id="stock-cart-clear" onclick="removeAllScrtItem()"><i class="fas fa-undo"></i>&nbsp;Clear</button>';
				$output3 = number_format($final_tot, 2);
				//}
				$msg = 1;
			} catch (Exception $th) {
				$error = $th->getMessage();
				$msg = 2;
				$output = $error;
				$output2 = $error;
				$output3 = $error;
			}
			$data[0] = $msg;
			$data[1] = base64_encode($output);
			$data[2] = base64_encode($output2);
			$data[3] = base64_encode($output3);
			echo json_encode($data);
			break;
			/*===================================================================================================================================================================
															REMOVE All STOCK FORM DATA FROM CART 	
			===================================================================================================================================================================*/

		case 'removeAllStock':

			try {
				if (!empty($_SESSION['cart'])) {

					foreach ($_SESSION['cart'] as $key => $value2) {

						$colorNme = base64_decode($value2[base64_encode('color')]);
						if (!str_starts_with($colorNme, '#')) {
							$colorImg = base64_decode($value2[base64_encode('color')]);
							unlink("../../img/stock/stock_color_img/$colorImg"); // remove image if there is a image 
						}
						unset($_SESSION['cart']); // unset session at once
					}
				} else {

					throw new Exception("stock cart is empty !");
				}

				$output = '';
				$output2 = '';
				$output3 = '0.00';


				$msg = 1;
			} catch (Exception $th) {
				$error = $th->getMessage();
				$msg = 2;
				$output = $error;
				$output2 = $error;
				$output3 = $error;
			}
			$data[0] = $msg;
			$data[1] = base64_encode($output);
			$data[2] = base64_encode($output2);
			$data[3] = base64_encode($output3);
			echo json_encode($data);
			break;

			/*===================================================================================================================================================================
															Submit stock data to grn and stocks
			===================================================================================================================================================================*/

		case 'addStockGrn':

			try {

				$refId = $_POST['refId2'];
				$resDate2 = $_POST['resDate3'];
				$totAmoPaid = $_POST['sTotalPaid'];
				$supplierId = $_POST['supplierId2'];

				if ($refId == "") {
					throw new Exception("Reference Id is required !");
				}

				if ($resDate2 == "") {
					throw new Exception("Received date is required !");
				}


				$result = $stockObj->addGrn($refId, $resDate2, $totAmoPaid, $supplierId);

				if ($result > 0) {

					foreach ($_POST['grnId2'] as $key => $value) {  // multiple values

						$grnId =  $_POST['grnId2'][$key];
						$resDate = $_POST['resDate2'][$key];
						$categoryId = $_POST['categoryId2'][$key];
						$brandId = $_POST['brandId2'][$key];
						$productId = $_POST['productId2'][$key];
						$modelId = $_POST['modelId2'][$key];
						$color = $_POST['color'][$key];
						$stockQty = $_POST['stockQty2'][$key];
						$costPunit = $_POST['costPunit2'][$key];
						$amoPaid = $_POST['amoPaid2'][$key];
						$regPrice = $_POST['regPrice2'][$key];


						$stockObj->addStock($stockQty, $resDate, $color, $costPunit, $regPrice, $amoPaid, $categoryId, $brandId, $productId, $modelId, $grnId);
					}

					unset($_SESSION['cart']);
					header("Location: ../view/addStock.php");
				} else {
					throw new Exception('Every Field is required !');
				}
			} catch (Exception $th) {
				$error = $th->getMessage();
			}
			break;

			/*===================================================================================================================================================================
																			UPDATE GRN STATUS
			===================================================================================================================================================================*/

		case 'setGrnPayStatus':

			try {

				$grnId = base64_decode($_POST['grnId']);
				$grnPayStatus = $_POST['grnPayStatus'];

				$updatePayState = $stockObj->updateGrnPayState($grnId, $grnPayStatus);

				if ($updatePayState == 1) {
					$output = '';
					$output .= '<table id="grnTable" class="table nowrap table-striped text-center" width="100%">
						<thead>
							<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Reference Id</th>
								<th scope="col">Total Paid(Rs.)</th>
								<th scope="col">Payment Status</th>
								<th scope="col">Payment Status</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>';

					$count = 0;
					$grnResult = $stockObj->getAllGrn();
					while ($row = $grnResult->fetch_assoc()) {
						$buttonActive = (($row['grn_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['grn_status'] == 1) ? 'inline' : 'none');
						$count++;

						$output .= '<tr scope="row">
									<td>' . $count . '</td>
									<td>
										' . $row['grn_ref_id'] . '
									</td>
									<td>
										' . number_format($row['grn_price'], 2) . '
									</td>
			
									<td>';

						if ($row['grn_payment_status'] == 1) {


							$output .= '<select id="grnSel" class="form-control" data-style="text-success" onchange="setGrnPaySel(\'' . base64_encode($row['grn_id']) . '\',this.value)">';

							if ($row['grn_payment_status'] == 0) {
								$output .= '<option value="1" class="text-success" data-icon="fas fa-certificate">Paid</option>
										<option value="0" class="text-danger" data-icon="fas fa-times-circle" selected>Not Paid</option>';
							} else {
								$output .= '<option value="1" class="text-success" data-icon="fas fa-certificate" selected>Paid</option>
										<option value="0" class="text-danger" data-icon="fas fa-times-circle">Not Paid</option>';
							}



							$output .= '</select>';
						} else {

							$output .= '<select id="grnSel" class="form-control" data-style="text-danger" onchange="setGrnPaySel(\'' . base64_encode($row['grn_id']) . '\',this.value)">';

							if ($row['grn_payment_status'] == 0) {
								$output .= '<option value="1" class="text-success" data-icon="fas fa-certificate">Paid</option>
										<option value="0" class="text-danger" data-icon="fas fa-times-circle" selected>Not Paid</option>';
							} else {
								$output .= '<option value="1" class="text-success" data-icon="fas fa-certificate" selected>Paid</option>
										<option value="0" class="text-danger" data-icon="fas fa-times-circle">Not Paid</option>';
							}



							$output .= '</select>';
						}

						$output .= '</td><td>';
						if ($row['grn_payment_status'] == 1) {
							$output .= '<div class="text-success"><i class="fas fa-certificate"></i> Paid</div>';
						} else {
							$output .= '<div class="text-danger"><i class="fas fa-times-circle"></i> Unpaid</div>';
						}
						$output .= '</td><td>
			
										<a href="editGrnModal.php?id=' . base64_encode($row['grn_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
			
										<a href="grnViewModal.php?id=' . base64_encode($row['grn_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
			
									</td>
									<td>
										<!-------------Active------------------>
										<button href="javaScript:void(0)" onclick="activeInactiveGrn(\'' . base64_encode($row['grn_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
										<!--------------Inactive------------------->
										<button href="javaScript:void(0)" onclick="activeInactiveGrn(\'' . base64_encode($row['grn_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
									</td>
								</tr>';
					}

					$output .= '</tbody>
									</table>
									</div>';
					$output .= '<script type="text/javascript" src="../../js/validation2.js"></script>';
					$output .= '<script type="text/javascript" src="../../js/grnTbReload.js"></script>';
					$msg = 1;
				} else {
					throw new Exception("Failed to update the payment status !");
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
																			ACTIVE/DEACTIVE GRN 
			===================================================================================================================================================================*/
		case 'setGrnStatus':

			try {

				$grnId = base64_decode($_POST['grnId']);
				$grnStatus = $_POST['grnStatus'];

				$updateState = $stockObj->updateGrnState($grnId, $grnStatus);

				if ($updateState == 1) {

					$output = '';
					$output .= '<table id="grnTable" class="table nowrap table-striped text-center" width="100%">
						<thead>
							<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Reference Id</th>
								<th scope="col">Total Paid(Rs.)</th>
								<th scope="col">Payment Status</th>
								<th scope="col">Payment Status</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>';

					$count = 0;
					$grnResult = $stockObj->getAllGrn();
					while ($row = $grnResult->fetch_assoc()) {
						$buttonActive = (($row['grn_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['grn_status'] == 1) ? 'inline' : 'none');
						$count++;

						$output .= '<tr scope="row">
									<td>' . $count . '</td>
									<td>
										' . $row['grn_ref_id'] . '
									</td>
									<td>
										' . number_format($row['grn_price'], 2) . '
									</td>
			
									<td>';

						if ($row['grn_payment_status'] == 1) {


							$output .= '<select id="grnSel" class="form-control" data-style="text-success" onchange="setGrnPaySel(\'' . base64_encode($row['grn_id']) . '\',this.value)">';

							if ($row['grn_payment_status'] == 0) {
								$output .= '<option value="1" class="text-success" data-icon="fas fa-certificate">Paid</option>
										<option value="0" class="text-danger" data-icon="fas fa-times-circle" selected>Not Paid</option>';
							} else {
								$output .= '<option value="1" class="text-success" data-icon="fas fa-certificate" selected>Paid</option>
										<option value="0" class="text-danger" data-icon="fas fa-times-circle">Not Paid</option>';
							}



							$output .= '</select>';
						} else {

							$output .= '<select id="grnSel" class="form-control" data-style="text-danger" onchange="setGrnPaySel(\'' . base64_encode($row['grn_id']) . '\',this.value)">';

							if ($row['grn_payment_status'] == 0) {
								$output .= '<option value="1" class="text-success" data-icon="fas fa-certificate">Paid</option>
										<option value="0" class="text-danger" data-icon="fas fa-times-circle" selected>Not Paid</option>';
							} else {
								$output .= '<option value="1" class="text-success" data-icon="fas fa-certificate" selected>Paid</option>
										<option value="0" class="text-danger" data-icon="fas fa-times-circle">Not Paid</option>';
							}



							$output .= '</select>';
						}

						$output .= '</td><td>';
						if ($row['grn_payment_status'] == 1) {
							$output .= '<div class="text-success"><i class="fas fa-certificate"></i> Paid</div>';
						} else {
							$output .= '<div class="text-danger"><i class="fas fa-times-circle"></i> Unpaid</div>';
						}
						$output .= '</td>
									<td>
			
										<a href="editGrnModal.php?id=' . base64_encode($row['grn_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
			
										<a href="grnViewModal.php?id=' . base64_encode($row['grn_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
			
									</td>
									<td>
										<!-------------Active------------------>
										<button href="javaScript:void(0)" onclick="activeInactiveGrn(\'' . base64_encode($row['grn_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
										<!--------------Inactive------------------->
										<button href="javaScript:void(0)" onclick="activeInactiveGrn(\'' . base64_encode($row['grn_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
									</td>
								</tr>';
					}

					$output .= '</tbody>
									</table>';
					$output .= '<script>$("#grnSel*").selectpicker();</script>';
					$output .= '<script type="text/javascript" src="../../js/grnTbReload.js"></script>';
					$msg = 1;
				} else {
					throw new Exception("Failed to update the grn status");
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
																			ACTIVE/DEACTIVE INSTOCK
			===================================================================================================================================================================*/

		case 'setStockStatus':

			try {

				$stockId = base64_decode($_POST['stockId']);
				$stockStatus = $_POST['stockStatus'];

				$updateStatus = $stockObj->updateInStockStatus($stockId, $stockStatus);

				if ($updateStatus == 1) {
					$output = '';
					$output .= ' <table id="stockTable" class="table nowrap table-striped text-center" width="100%">
						<thead>
							<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Stock Image</th>
								<th scope="col">stock Name</th>
								<th scope="col">Received Price(Rs.)</th>
								<th scope="col">Selling Price(Rs.)</th>
								<th scope="col">Stock count(Pcs.)</th>
								<th scope="col">Action</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>';
					$count = 0;
					$stockResult = $stockObj->getAllStocksNotNull();
					while ($row = $stockResult->fetch_assoc()) {
						$buttonActive = (($row['stock_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['stock_status'] == 1) ? 'inline' : 'none');
						$count++;
						$output .= '<tr scope="row">
								<td>' . $count . '</td>
								<td>';
						$modelId = $row['product_model_id'];
						if ($row['category_category_id'] == 1) {
							$stockImgResult2 = $stockObj->getHeadphoneModelImages_ById($modelId);
							if ($row2 = $stockImgResult2->fetch_assoc()) {
								$hPhoneModImg = $row2['headphone_model_image_name'];
								$output .= '<img src="../../img/product_images/product_models/headphone_models/' . $hPhoneModImg . '" width="80px" height="80px">';
							}
						} else if ($row['category_category_id'] == 2) {
							$stockImgResult3 = $stockObj->getPhoneModelImages_ById($modelId);
							if ($row2 = $stockImgResult3->fetch_assoc()) {
								$phoneModImg = $row2['phone_model_image_name'];
								$output .= '<img src="../../img/product_images/product_models/phone_models/' . $phoneModImg . '" width="80px" height="80px">';
							}
						}
						$output .= '</td><td>';
						$modelId = $row['product_model_id'];
						if ($row['category_category_id'] == 1) {
							$stockResult2 = $stockObj->getHphoneModBy_id_fromHphoneMod($modelId);
							if ($row2 = $stockResult2->fetch_assoc()) {
								$output .= $row2['headphone_model_name'];
							}
						} else if ($row['category_category_id'] == 2) {
							$stockResult3 = $stockObj->getPhoneModABy_id_fromgetphoneModA($modelId);
							if ($row3 = $stockResult3->fetch_assoc()) {
								$output .= $row3['phone_model_a_name'];
							}
						}
						$output .= ' </td>
								<td>' . number_format($row['stock_cost_per_unit'], 2) . '</td>
								<td>' . number_format($row['stock_product_reg_price'], 2) . '</td>
								<td>' . number_format($row['stock_currentCount']) . '</td>
								<td>

									<a href="editStockModal.php?id=' . base64_encode($row['stock_id']) . '" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>

									<a href="viewStockModal.php?id=' . base64_encode($row['stock_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>

								</td>
								<td>
									<!-------------Active------------------>
									<button href="javaScript:void(0)" onclick="activeInactiveStock(\'' . base64_encode($row['stock_id']) . '\',0)" class="btn btn-outline-success crud-btn" style="display:' . $buttonInActive . ';width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
									<!--------------Inactive------------------->
									<button href="javaScript:void(0)" onclick="activeInactiveStock(\'' . base64_encode($row['stock_id']) . '\',1)" class="btn btn-outline-danger crud-btn" style="display:' . $buttonActive . ';width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
								</td>
									</tr>';
					}

					$output .= '</tbody>
									</table>';
					$output .= '<script type="text/javascript" src="../../js/stockTbReload.js"></script>';
					$msg = 1;
				} else {
					throw new Exception("Failed to update the stock status !");
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
																			DELETE NULL STOCKS
			===================================================================================================================================================================*/

		case 'deleteStockNull':

			try {

				$stockId = base64_decode($_POST['stockId']);

				$deleteState = $stockObj->deleteStockNull($stockId);

				if ($deleteState == 1) {
					$output = '';
					$output.= '<table id="outStockTable" class="table nowrap table-striped text-center" width="100%">
						<thead>
							<tr class="tb-head-style">
								<th scope="col">Id</th>
								<th scope="col">Stock Image</th>
								<th scope="col">Stock Name</th>
								<th scope="col">Received Price(Rs.)</th>
								<th scope="col">Selling Price(Rs.)</th>
								<th scope="col">Stock count(Pcs.)</th>
								<th scope="col">Action</th>
								
							</tr>
						</thead>
						<tbody>';

					$count = 0;
					$stockResult = $stockObj->getAllStocksNull();
					while ($row = $stockResult->fetch_assoc()) {
						$buttonActive = (($row['stock_status'] == 0) ? 'inline' : 'none');
						$buttonInActive = (($row['stock_status'] == 1) ? 'inline' : 'none');
						$count++;

						$output .= '<tr scope="row">
									<td>' . $count . '</td>
									<td>';

						$modelId = $row['product_model_id'];
						if ($row['category_category_id'] == 1) {
							$stockImgResult2 = $stockObj->getHeadphoneModelImages_ById($modelId);
							if ($row2 = $stockImgResult2->fetch_assoc()) {
								$hPhoneModImg = $row2['headphone_model_image_name'];
								$output .= '<img src="../../img/product_images/product_models/headphone_models/' . $hPhoneModImg . '" width="80px" height="80px">';
							}
						} else if ($row['category_category_id'] == 2) {
							$stockImgResult3 = $stockObj->getPhoneModelImages_ById($modelId);
							if ($row2 = $stockImgResult3->fetch_assoc()) {
								$phoneModImg = $row2['phone_model_image_name'];
								$output .= '<img src="../../img/product_images/product_models/phone_models/'.$phoneModImg.'" width="80px" height="80px">';
							}
						}

						$output .= '</td>
									<td>';

						$modelId = $row['product_model_id'];
						if ($row['category_category_id'] == 1) {
							$stockResult2 = $stockObj->getHphoneModBy_id_fromHphoneMod($modelId);
							if ($row2 = $stockResult2->fetch_assoc()) {
						$output .= $row2['headphone_model_name'];
							}
						} else if ($row['category_category_id'] == 2) {
							$stockResult3 = $stockObj->getPhoneModABy_id_fromgetphoneModA($modelId);
							if ($row3 = $stockResult3->fetch_assoc()) {
						$output .= $row3['phone_model_a_name'];
							}
						}
						//-------------------------------------------------

						$output .= '</td>
									<td>' . number_format($row['stock_cost_per_unit'], 2) . '</td>
									<td>' . number_format($row['stock_product_reg_price'], 2) . '</td>
									<td>' . number_format($row['stock_currentCount']) . '</td>
									<td>
										<a href="viewStockModal.php?id=' . base64_encode($row['stock_id']) . '" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
										<button href="javaScript:void(0)" onclick="deleteStock(\'' . base64_encode($row['stock_id']) . '\')" class="btn btn-outline-danger crud-btn"><i class="fas fa-trash-alt"></i>&nbsp;Active</button>
									</td>
								   
								</tr>';
					}

					$output .= '</tbody>
								</table>';
					$output .= '<script type="text/javascript" src="../../js/stockTbNullReload.js"></script>';
					$msg = 1;
				} else {
					throw new Exception("Failed to delete the record");
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
																			GRN REFERANCE EXISTANCE
			===================================================================================================================================================================*/
			
			case 'checkGrnRefExist':

				try {

					$grnRef = $_POST['gRefId'];

					$getGrnRef = $stockObj->getGrnInfo_ByGrnRef($grnRef);

					if($getGrnRef->num_rows > 0){
						$response = "yes";
					}else{
						throw new Exception("This grn reference is already available !");
						
					}
					
				} catch (Exception $th) {
					$error = $th->getMessage();
					$response = "no";
				}
				echo $response;
			break;
	}
}
