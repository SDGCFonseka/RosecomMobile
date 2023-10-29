<?php
include_once __DIR__.'../../../config/dbcon.php';

class product
{

	private $db;

	public function __construct()
	{
		$this->db = new dbcon;
	}

	/*====================================================================================================================================================================
																	BRAND SQL QUERY
====================================================================================================================================================================*/

	public function getBrand_id_toDisplay() // display the brand id on brand form
	{
		$sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'rosecom_db' AND TABLE_NAME = 'brand'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function addBrand($brandNm, $brandDes, $brandImage) //insert brand details
	{
		$sql = "INSERT INTO `brand`(`brand_name`,`brand_description`,`brand_image`) VALUES ('$brandNm','$brandDes','$brandImage')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllBrand() //get all brand table info
	{
		$sql = "SELECT * FROM `brand`";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getBrandBy_id_fromBrand($brandId)  //get brand info By Id
	{
		$sql = "SELECT * FROM `brand` WHERE `brand_id` = '$brandId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function editBrand($brandId, $brandNm, $brandDes, $brandImage) //edit brand details
	{
		$sql = "UPDATE `brand` SET `brand_name` = '$brandNm',`brand_description` = '$brandDes',`brand_image` = '$brandImage' WHERE `brand_id` = '$brandId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getBrandInfo_ByBrandName($brandNm)  //get brand name
	{
		$sql = "SELECT * FROM `brand` WHERE `brand_name` = '$brandNm'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updateBrand_Status($brandId, $brandLogStatus) //update status in brand table
	{
		$sql = "UPDATE `brand` SET `brand_status` = '$brandLogStatus' WHERE `brand_id` = '$brandId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	/*====================================================================================================================================================================
																	CATEGORY SQL QUERY
====================================================================================================================================================================*/

	public function getCategory_id_toDisplay() // display the category id on category form
	{
		$sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'rosecom_db' AND TABLE_NAME = 'category'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function addCategory($catName, $catImage) //insert category details
	{
		$sql = "INSERT INTO `category`(`category_name`,`category_image`) VALUES ('$catName','$catImage')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllCategory() //get all category table info
	{
		$sql = "SELECT * FROM `category`";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getCategoryBy_id_fromCategory($categoryId) //get category info By Id
	{
		$sql = "SELECT * FROM `category` WHERE `category_id` = '$categoryId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function editCategory($categoryId, $catName, $catImage) //edit category details
	{
		$sql = "UPDATE `category` SET `category_name` = '$catName', `category_image` = '$catImage' WHERE `category_id` = '$categoryId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getCategoryInfo_ByCategoryName($catName) //get category name
	{
		$sql = "SELECT * FROM `category` WHERE `category_name` = '$catName'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updateCategory_Status($categoryId, $categoryLogStatus) //update status in category table
	{
		$sql = "UPDATE `category` SET `category_status` = '$categoryLogStatus' WHERE `category_id` = '$categoryId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	/*====================================================================================================================================================================
																	PRODUCT SQL QUERY
	====================================================================================================================================================================*/

	public function addProduct($productName, $productCategory, $productBrand, $operatingSys, $productDescription) // add product to the product table
	{
		$sql = "INSERT INTO `product`(`product_name`,`category_category_id`,`brand_brand_id`,`product_os`,`product_description`) VALUES ('$productName','$productCategory','$productBrand','$operatingSys','$productDescription')";
		$stmt = $this->db->conn();
		$stmt->query($sql);
		$productId = $stmt->insert_id; //calling last inserted product_id
		return $productId;
	}

	public function editProduct($productId, $productName, $productCategory, $productBrand, $operatingSys, $productDescription)
	{
		$sql = "UPDATE `product` SET `product_name`='$productName',`category_category_id`='$productCategory',`brand_brand_id`='$productBrand',`product_os`='$operatingSys',`product_description`='$productDescription' WHERE `product_id`='$productId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function addProductImg($finalProdImg,$productId) // insert product images
	{
		 $sql = "INSERT INTO `product_image`(`product_image_name`,`product_product_id`) VALUES ('$finalProdImg','$productId')";
		 $stmt = $this->db->conn();
		 $result = $stmt->query($sql);
		 return $result;
	}

	public function getAllProduct() //get all products info
	{ 
		 $sql = "SELECT * FROM `product`";
		 $stmt = $this->db->conn();
		 $result = $stmt->query($sql);
		 return $result;
	}


	public function getProductImages_ById($productId) //get images by Id
	{ 
		$sql = "SELECT * FROM `product_image` WHERE `product_product_id` = '$productId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getProductBy_id_fromProduct($productId) // get product by id
	{
		$sql = "SELECT * FROM `product` WHERE `product_id` = '$productId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getProductInfo_ByProductName($productName) // get product name
	{
		$sql = "SELECT * FROM `product` WHERE `product_name` = '$productName'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updateProduct_Status($productId, $productLogStatus) //update product status
	{ 
		$sql = "UPDATE `product` SET `product_status` = '$productLogStatus' WHERE `product_id` = '$productId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllProduct_By_State($productState){
		$sql = "SELECT * FROM `product` WHERE `product_status` = '$productState'"; //  AND `category_category_id` IN $productCat
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function deleteProductImage($imgId) // delete product Image By Id
	{
		$sql = "DELETE FROM `product_image` WHERE `product_image_id` = '$imgId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	

	public function getAllProductModel2_ByproId($productId)
	{
		$sql = "SELECT * FROM headphone_model WHERE product_product_id = $productId";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	

	/*====================================================================================================================================================================
												================== PRODUCT MODEL SQL QUERY START ========================
	====================================================================================================================================================================*/

	/*====================================================================================================================================================================
																	PRODUCT MODEL SQL QUERY "PHONE"
	====================================================================================================================================================================*/

	public function addProductPhModel1($productId,$phoneModName,$phoneModPric,$phoneModTech,$phoneModBand2g,$phoneModBand3g,$phoneModBand4g,$phoneModBand5g,$phoneModSpeed,$phoneModAnnounce,$phoneModState,$phoneModDimen,$phoneModWeight,$phoneModSim,$phoneModType,$phoneModSize,$phoneModResu,$phoneModProtect,$phoneModOs,$phoneModChip,$phoneModCpu,$phoneModGpu,$phoneModMem,$phoneModInternal,$phoneModMcamSetup,$phoneModMcamPixel)
	// insert phone model details for table part1
	{
		$sql = "INSERT INTO `phone_model_a`(`product_product_id`, `phone_model_a_name`, `phone_model_a_price`, `phone_model_a_technology`, `phone_model_a_2gbands`, `phone_model_a_3gbands`, `phone_model_a_4gbands`, `phone_model_a_5gbands`, `phone_model_a_speed`, `phone_model_a_announced`, `phone_model_a_state`, `phone_model_a_dimension`, `phone_model_a_weight`, `phone_model_a_sim`, `phone_model_a_type`, `phone_model_a_size`, `phone_model_a_resolution`, `phone_model_a_protection`, `phone_model_a_os`, `phone_model_a_chipset`, `phone_model_a_cpu`, `phone_model_a_gpu`, `phone_model_a_cardslot`, `phone_model_a_internal`, `phone_model_a_m_cam_setup`, `phone_model_a_m_cam_pixel`) VALUES ('$productId','$phoneModName','$phoneModPric','$phoneModTech','$phoneModBand2g','$phoneModBand3g','$phoneModBand4g','$phoneModBand5g','$phoneModSpeed','$phoneModAnnounce','$phoneModState','$phoneModDimen','$phoneModWeight','$phoneModSim','$phoneModType','$phoneModSize','$phoneModResu','$phoneModProtect','$phoneModOs','$phoneModChip','$phoneModCpu','$phoneModGpu','$phoneModMem','$phoneModInternal','$phoneModMcamSetup','$phoneModMcamPixel')";
		$stmt = $this->db->conn();
		$stmt->query($sql);
		$modelId = $stmt->insert_id; // calling last inserted phone_model_a_id
		return $modelId;
	}

	
	public function addProductPhModel2($modelId,$phoneModMcamFeatures,$phoneModMcamVid,$phoneModScamSetup,$phoneModScamPixel,$phoneModScamFeature,$phoneModScamVid,$phoneModLspeaker,$phoneModJack,$phoneModWlan,$phoneModBt,$phoneModGps,$phoneModNfc,$phoneModIr,$phoneModRadio,$phoneModUsb,$phoneModSensor,$phoneModBtype,$phoneModBCharge,$phoneModColor,$phoneModels,$phoneModSar,$phoneModSarEu,$phoneModTdisp,$phoneModTcam,$phoneModLspeakerT,$phoneModTbattery)
	// insert phone model details for table part2
	{
		$sql = "INSERT INTO `phone_model_b`(`phone_model_a_phone_model_a_id`, `phone_model_b_m_cam_feature`, `phone_model_b_m_cam_vid`, `phone_model_b_s_cam_setup`, `phone_model_b_s_cam_pixel`, `phone_model_b_s_cam_feature`, `phone_model_b_s_cam_vid`, `phone_model_b_l_speaker`, `phone_model_b_jack`, `phone_model_b_wlan`, `phone_model_b_bt`, `phone_model_b_gps`, `phone_model_b_nfc`, `phone_model_b_ir`, `phone_model_b_radio`, `phone_model_b_usb`, `phone_model_b_sensor`, `phone_model_b_bat_type`, `phone_model_b_bat_charge`, `phone_model_b_color`, `phone_model_b_models`, `phone_model_b_sar`, `phone_model_b_sar_eu`, `phone_model_b_t_display`, `phone_model_b_t_cam`, `phone_model_b_lspeakert`, `phone_model_b_t_battery`) VALUES ('$modelId','$phoneModMcamFeatures','$phoneModMcamVid','$phoneModScamSetup','$phoneModScamPixel','$phoneModScamFeature','$phoneModScamVid','$phoneModLspeaker','$phoneModJack','$phoneModWlan','$phoneModBt','$phoneModGps','$phoneModNfc','$phoneModIr','$phoneModRadio','$phoneModUsb','$phoneModSensor','$phoneModBtype','$phoneModBCharge','$phoneModColor','$phoneModels','$phoneModSar','$phoneModSarEu','$phoneModTdisp','$phoneModTcam','$phoneModLspeakerT','$phoneModTbattery')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function addPhoneModelImg($finalPhoneModImg, $modelId) // insert phone image
	{
		$sql = "INSERT INTO `phone_model_image`(`phone_model_image_name`,`phone_model_a_phone_model_a_id`) VALUES ('$finalPhoneModImg','$modelId')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllPhoneModelById($productId)
	{
		$sql = "SELECT * FROM `phone_model_a` WHERE `product_product_id` = '$productId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getPhoneModelImages_ById($modelId) //get images by Id
	{ 
		$sql = "SELECT * FROM `phone_model_image` WHERE `phone_model_a_phone_model_a_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updatePhoneMod_A_Status($modelId, $phoneModStatus)
	{
		$sql = "UPDATE `phone_model_a` SET `phone_model_a_status` = '$phoneModStatus' WHERE `phone_model_a_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updatePhoneMod_B_Status($modelId, $phoneModStatus)
	{
		$sql = "UPDATE `phone_model_b` SET `phone_model_b_status` = '$phoneModStatus' WHERE `phone_model_a_phone_model_a_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getPhoneModABy_id_fromgetphoneModA($modelId) // get phoneModel A info by primary id
	{
		$sql = "SELECT * FROM `phone_model_a` WHERE `phone_model_a_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getPhoneModbBy_id_fromgetphoneModB($modelId)
	{
		$sql = "SELECT * FROM `phone_model_b` WHERE `phone_model_a_phone_model_a_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function editProductPhModel1($modelId,$phoneModName,$phoneModPric,$phoneModTech,$phoneModBand2g,$phoneModBand3g,$phoneModBand4g,$phoneModBand5g,$phoneModSpeed,$phoneModAnnounce,$phoneModState,$phoneModDimen,$phoneModWeight,$phoneModSim,$phoneModType,$phoneModSize,$phoneModResu,$phoneModProtect,$phoneModOs,$phoneModChip,$phoneModCpu,$phoneModGpu,$phoneModMem,$phoneModInternal,$phoneModMcamSetup,$phoneModMcamPixel)
	{
		$sql = "UPDATE `phone_model_a` SET `phone_model_a_name`='$phoneModName',`phone_model_a_price`='$phoneModPric',`phone_model_a_technology`='$phoneModTech',`phone_model_a_2gbands`='$phoneModBand2g',`phone_model_a_3gbands`='$phoneModBand3g',`phone_model_a_4gbands`='$phoneModBand4g',`phone_model_a_5gbands`='$phoneModBand5g',`phone_model_a_speed`='$phoneModSpeed',`phone_model_a_announced`='$phoneModAnnounce',`phone_model_a_state`='$phoneModState',`phone_model_a_dimension`='$phoneModDimen',`phone_model_a_weight`='$phoneModWeight',`phone_model_a_sim`='$phoneModSim',`phone_model_a_type`='$phoneModType',`phone_model_a_size`='$phoneModSize',`phone_model_a_resolution`='$phoneModResu',`phone_model_a_protection`='$phoneModProtect',`phone_model_a_os`='$phoneModOs',`phone_model_a_chipset`='$phoneModChip',`phone_model_a_cpu`='$phoneModCpu',`phone_model_a_gpu`='$phoneModGpu',`phone_model_a_cardslot`='$phoneModMem',`phone_model_a_internal`='$phoneModInternal',`phone_model_a_m_cam_setup`='$phoneModMcamSetup',`phone_model_a_m_cam_pixel`='$phoneModMcamPixel' WHERE `phone_model_a_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function editProductPhModel2($modelId,$phoneModMcamFeatures,$phoneModMcamVid,$phoneModScamSetup,$phoneModScamPixel,$phoneModScamFeature,$phoneModScamVid,$phoneModLspeaker,$phoneModJack,$phoneModWlan,$phoneModBt,$phoneModGps,$phoneModNfc,$phoneModIr,$phoneModRadio,$phoneModUsb,$phoneModSensor,$phoneModBtype,$phoneModBCharge,$phoneModColor,$phoneModels,$phoneModSar,$phoneModSarEu,$phoneModTdisp,$phoneModTcam,$phoneModLspeakerT,$phoneModTbattery)
	{
		$sql = "UPDATE `phone_model_b` SET `phone_model_b_m_cam_feature`='$phoneModMcamFeatures',`phone_model_b_m_cam_vid`='$phoneModMcamVid',`phone_model_b_s_cam_setup`='$phoneModScamSetup',`phone_model_b_s_cam_pixel`='$phoneModScamPixel',`phone_model_b_s_cam_feature`='$phoneModScamFeature',`phone_model_b_s_cam_vid`='$phoneModScamVid',`phone_model_b_l_speaker`='$phoneModLspeaker',`phone_model_b_jack`='$phoneModJack',`phone_model_b_wlan`='$phoneModWlan',`phone_model_b_bt`='$phoneModBt',`phone_model_b_gps`='$phoneModGps',`phone_model_b_nfc`='$phoneModNfc',`phone_model_b_ir`='$phoneModIr',`phone_model_b_radio`='$phoneModRadio',`phone_model_b_usb`='$phoneModUsb',`phone_model_b_sensor`='$phoneModSensor',`phone_model_b_bat_type`='$phoneModBtype',`phone_model_b_bat_charge`='$phoneModBCharge',`phone_model_b_color`='$phoneModColor',`phone_model_b_models`='$phoneModels',`phone_model_b_sar`='$phoneModSar',`phone_model_b_sar_eu`='$phoneModSarEu',`phone_model_b_t_display`='$phoneModTdisp',`phone_model_b_t_cam`='$phoneModTcam',`phone_model_b_lspeakert`='$phoneModLspeakerT',`phone_model_b_t_battery`='$phoneModTbattery' WHERE `phone_model_a_phone_model_a_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function deletePhoneModImage($imgId)
	{
		$sql = "DELETE FROM `phone_model_image` WHERE `phone_model_image_id` = '$imgId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	/*====================================================================================================================================================================
																	PRODUCT MODEL SQL QUERY "HEADPHONE"
	====================================================================================================================================================================*/
	//insert headphone details
	public function addProductHdModel($productId,$hdModName,$hdModPric,$hdModType,$hdModColor,$hdModStyle,$hdModDimen,$hdModMater,$hdModFrespon,$hdModFresponA,$hdModFresponBt,$hdModSensivity,$hdModNfc,$hdModBt,$hdModWifi,$hdModDescript)
	{
		$sql = "INSERT INTO `headphone_model`(`product_product_id`, `headphone_model_name`, `headphone_model_price`, `headphone_model_type`, `headphone_model_colors`, `headphone_model_style`, `headphone_model_dimension`, `headphone_model_material`, `headphone_model_fResponse`, `headphone_model_fResponseA`, `headphone_model_fResponseBt`, `headphone_model_sensivity`, `headphone_model_nfc`, `headphone_model_bt`, `headphone_model_wifi`, `headphone_model_descrip`) VALUES ('$productId','$hdModName','$hdModPric','$hdModType','$hdModColor','$hdModStyle','$hdModDimen','$hdModMater','$hdModFrespon','$hdModFresponA','$hdModFresponBt','$hdModSensivity','$hdModNfc','$hdModBt','$hdModWifi','$hdModDescript')";
		$stmt = $this->db->conn();
		$stmt->query($sql);
		$modelId = $stmt->insert_id; // calling last inserted headphoneModel id
		return $modelId;
	}

	public function addHdModelImg($finalHdModImg, $modelId) // insert headphone image
	{
		$sql = "INSERT INTO `headphone_model_image`(`headphone_model_image_name`,`headphone_model_headphone_model_id`) VALUES ('$finalHdModImg','$modelId')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllHeadphoneModelById($productId)
	{
		$sql = "SELECT * FROM `headphone_model` WHERE `product_product_id` = '$productId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getHeadphoneModelImages_ById($modelId)
	{
		$sql = "SELECT * FROM `headphone_model_image` WHERE `headphone_model_headphone_model_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updateHphoneMod_Status($modelId, $hPhoneModStatus)
	{
		$sql = "UPDATE `headphone_model` SET `headphone_model_status` = '$hPhoneModStatus' WHERE `headphone_model_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getHphoneModBy_id_fromHphoneMod($modelId)
	{
		$sql = "SELECT * FROM `headphone_model` WHERE `headphone_model_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function editProductHdModel($modelId, $hdModName, $hdModPric, $hdModType, $hdModColor, $hdModStyle, $hdModDimen, $hdModMater, $hdModFrespon, $hdModFresponA, $hdModFresponBt, $hdModSensivity, $hdModNfc, $hdModBt, $hdModWifi, $hdModDescript)
	{
		$sql = "UPDATE `headphone_model` SET `headphone_model_name`='$hdModName',`headphone_model_price`='$hdModPric',`headphone_model_type`='$hdModType',`headphone_model_colors`='$hdModColor',`headphone_model_style`='$hdModStyle',`headphone_model_dimension`='$hdModDimen',`headphone_model_material`='$hdModMater',`headphone_model_fResponse`='$hdModFrespon',`headphone_model_fResponseA`='$hdModFresponA',`headphone_model_fResponseBt`='$hdModFresponBt',`headphone_model_sensivity`='$hdModSensivity',`headphone_model_nfc`='$hdModNfc',`headphone_model_bt`='$hdModBt',`headphone_model_wifi`='$hdModWifi',`headphone_model_descrip`='$hdModDescript' WHERE `headphone_model_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	
	}

	public function deleteHdPhoneModImage($imgId)
	{
		$sql = "DELETE FROM `headphone_model_image` WHERE `headphone_model_image_id` = '$imgId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	

	/*====================================================================================================================================================================
												================== PRODUCT MODEL SQL QUERY END ========================
	====================================================================================================================================================================*/

	/*====================================================================================================================================================================
																	FEATURE SQL QUERY
	====================================================================================================================================================================*/

	public function addProductFeature($featureName,$featureType,$featureCat) // add features
	{ 
		$sql = "INSERT INTO `feature`(`feature_name`,`feature_type_feature_type_id`,`feature_category_feature_category_id`) VALUES ('$featureName','$featureType','$featureCat')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}


	public function getFeature_Types_By_cat_Id($featureCatId) // get all feature types by id
	{ 
		$sql = "SELECT * FROM `feature_type` WHERE `feature_category_feature_category_id` = '$featureCatId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllFeatures_By_Type_Id($featureTypeId) // get all feature info by feature_type
	{
		$sql = "SELECT * FROM `feature` WHERE `feature_type_feature_type_id` = '$featureTypeId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllFeatures_By_FeatureInfo_FeatureTypeId($featureInfo,$featureTypeId) // get all feature info by feature_name
	{
		$sql = "SELECT * FROM `feature` WHERE (`feature_name` LIKE '%".$featureInfo."%') AND `feature_type_feature_type_id` = '$featureTypeId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllFeatures_By_FeatureState_FeatureTypeId($featureState,$featureTypeId){ // get features via radio buttons via feature state & id
		$sql = "SELECT * FROM `feature` WHERE (`feature_status` LIKE '%".$featureState."%') AND `feature_type_feature_type_id` = '$featureTypeId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updateProduct_Feature_Status($featureId, $featureState) //change feature status
	{
		$sql = "UPDATE `feature` SET `feature_status` = '$featureState' WHERE `feature_id` = '$featureId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllFeatures() // get all features
	{
		$sql = "SELECT * FROM `feature`";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getFeatureInfo_ByFeatureName_ByFeatureTypeId($featureName,$featureTypeId) //get all features by feature name and Id
	{
		$sql = "SELECT * FROM `feature` WHERE `feature_name` = '$featureName' AND `feature_type_feature_type_id` = '$featureTypeId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getFeature_Category_By_product_Cat_Id($productCatId)
	{
		$sql = "SELECT * FROM `feature_category` WHERE `category_category_id` = '$productCatId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	

	

}










	

	