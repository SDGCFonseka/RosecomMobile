<?php
include_once __DIR__ . '../../../config/dbcon.php';

class stock
{

	private $db;

	public function __construct()
	{
		$this->db = new dbcon;
	}

	public function getBrandfor_CategoryFromProduct($productCatId)
	{
		$sql = "SELECT brand_brand_id FROM product WHERE category_category_id = '$productCatId' GROUP BY brand_brand_id";
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

	public function getBrandBy_id_fromBrand($brandId)  //get brand info By Id
	{
		$sql = "SELECT * FROM `brand` WHERE `brand_id` = '$brandId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getProducts_fromCategory_Brand($productCatId,$productBrandId){
		$sql = "SELECT * FROM `product` WHERE `category_category_id` = '$productCatId' AND `brand_brand_id` = '$productBrandId'";
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

	public function getAllPhoneModelById($productId){
		$sql = "SELECT * FROM `phone_model_a` WHERE `product_product_id` = '$productId'";
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

	public function getAllHeadphoneModelById($productId)
	{
		$sql = "SELECT * FROM `headphone_model` WHERE `product_product_id` = '$productId'";
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

	public function getPhoneModelImages_ById($modelId) //get images by Id
	{ 
		$sql = "SELECT * FROM `phone_model_image` WHERE `phone_model_a_phone_model_a_id` = '$modelId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getGrn_id_toDisplay() // display the brand id on brand form
	{
		$sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'rosecom_db' AND TABLE_NAME = 'grn'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllSupplier() // get all suupplier info
	{
		$sql = "SELECT * FROM `supplier`";
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

	public function getHphoneModBy_id_fromHphoneMod($modelId)
	{
		$sql = "SELECT * FROM `headphone_model` WHERE `headphone_model_id` = '$modelId'";
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

public function addStock($stockQty, $resDate, $color, $costPunit, $regPrice, $amoPaid, $categoryId, $brandId, $productId, $modelId, $grnId) //add stock
	{
		$sql = "INSERT INTO `stock`(`stock_count`, `stock_currentCount`, `stock_res_date`, `stock_color`, `stock_cost_per_unit`, `stock_product_reg_price`, `stock_amount_paid`, `category_category_id`, `brand_brand_id`, `product_product_id`, `product_model_id`, `grn_grn_id`) VALUES ('$stockQty','$stockQty','$resDate','$color','$costPunit','$regPrice','$amoPaid','$categoryId','$brandId','$productId','$modelId','$grnId')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function addGrn($refId, $resDate2, $totAmoPaid, $supplierId) // add grn
	{
		$sql = "INSERT INTO `grn`(`grn_ref_id`, `grn_received_date`, `grn_price`, `supplier_supplier_id`) VALUES ('$refId','$resDate2','$totAmoPaid','$supplierId')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllStocks() //get stocks info
	{
		$sql = "SELECT * FROM `stock`";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getStocksById($stockId) // get stock by id
	{
		$sql = "SELECT * FROM `stock` WHERE `stock_id` = '$stockId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllStocksNotNull() //get not null stocks
	{
		$sql = "SELECT * FROM `stock` WHERE `stock_currentCount` > 0";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllStocksNull() //get null stocks
	{
		$sql = "SELECT * FROM `stock` WHERE `stock_currentCount` = 0";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllGrn() // get grn
	{
		$sql = "SELECT * FROM `grn`";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getGrnInfo_by_grnId($grnId){ // get grn info by id
		$sql = "SELECT * FROM `grn` WHERE `grn_id` = '$grnId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updateGrnPayState($grnId,$grnPayStatus) // update payment paid or not
	{
		$sql = "UPDATE `grn` SET `grn_payment_status` = '$grnPayStatus' WHERE `grn_id` = '$grnId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updateGrnState($grnId, $grnStatus) // update grn active deactive
	{
		$sql = "UPDATE `grn` SET `grn_status` = '$grnStatus' WHERE `grn_id` = '$grnId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updateInStockStatus($stockId,$stockStatus) //update not null status(active/deactive)
	{
		$sql = "UPDATE `stock` SET `stock_status` = '$stockStatus' WHERE `stock_id` = '$stockId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function deleteStockNull($stockId){ // delete null stocks
		$sql = "DELETE FROM `stock` WHERE `stock_id` = '$stockId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getGrnInfo_ByGrnRef($grnRef) // get grn info by reference id
	{
		$sql = "SELECT * FROM `grn` WHERE `grn_ref_id` = '$grnRef'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getStocks_ByGrnId($grnId)
	{
		$sql = "SELECT * FROM `stock` WHERE `grn_grn_id` = '$grnId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}
	
}
