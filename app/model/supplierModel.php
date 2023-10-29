<?php
include_once __DIR__ . '../../../config/dbcon.php';

class supplier
{

	private $db;

	public function __construct()
	{
		$this->db = new dbcon;
	}

	public function addSupplier($compName, $compEmail, $compAddr1, $compAddr2, $compAddr3, $compContact1, $compContact2, $suppName, $suppAge, $suppEmail, $suppContact) // add supplier
	{
		$sql = "INSERT INTO `supplier`(`company_name`, `company_email`, `company_address1`, `company_address2`, `company_address3`, `company_contact1`, `company_contact2`, `supplier_age`, `supplier_name`, `supplier_email`, `supplier_contact`) VALUES ('$compName','$compEmail','$compAddr1','$compAddr2','$compAddr3','$compContact1','$compContact2','$suppAge','$suppName','$suppEmail','$suppContact')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function editSupplier($suppId,$compName, $compEmail, $compAddr1, $compAddr2, $compAddr3, $compContact1, $compContact2, $suppAge, $suppName,  $suppEmail, $suppContact) // edit supplier
	{
		$sql = "UPDATE `supplier` SET`company_name`='$compName',`company_email`='$compEmail',`company_address1`='$compAddr1',`company_address2`='$compAddr2',`company_address3`='$compAddr3',`company_contact1`='$compContact1',`company_contact2`='$compContact2',`supplier_age`='$suppAge',`supplier_name`='$suppName',`supplier_email`='$suppEmail',`supplier_contact`='$suppContact' WHERE `supplier_id`='$suppId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getSupplierBy_id_fromSupplier($suppId) //get supplier info by Id
	{
		$sql = "SELECT * FROM `supplier` WHERE `supplier_id`='$suppId'";
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

	public function updateSupplier_Status($suppId, $suppLogStatus) // change status of supplier
	{
		$sql = "UPDATE `supplier` SET `supplier_status` = '$suppLogStatus' WHERE `supplier_id` = '$suppId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getSupplierInfo_ByCompName($compName) //get user info by username
	{  
		$sql = "SELECT * FROM `supplier` WHERE `company_name` = '$compName'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	
	}
}
