<?php
include_once __DIR__.'../../../config/dbcon.php';

class customer
{

	private $db;

	public function __construct()
	{
		$this->db = new dbcon;
	}

    public function addCustomer($firstName,$lastName,$dob,$gender,$nic,$mobileNo,$landlineNo,$emailAddress,$address1,$address2,$city,$postCode,$proImage,$reg_date) // add customer
    {
		$sql = "INSERT INTO `customer`(`customer_first_name`, `customer_last_name`, `customer_dob`, `customer_gender`, `customer_nic`, `customer_mobile_no`, `customer_landline_no`, `customer_email`, `customer_address1`, `customer_address2`, `customer_city`, `customer_postal_code`, `customer_profile_image`, `customer_reg_date`) VALUES ('$firstName','$lastName','$dob','$gender','$nic','$mobileNo','$landlineNo','$emailAddress','$address1','$address2','$city','$postCode','$proImage','$reg_date')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result; 
    }

	public function editCustomer($customerId,$firstName,$lastName,$dob,$gender,$nic,$mobileNo,$landlineNo,$emailAddress,$address1,$address2,$city,$postCode,$proImage) // edit customer
	{
		$sql = "UPDATE `customer` SET `customer_first_name` = '$firstName',`customer_last_name` = '$lastName',`customer_dob` = '$dob',`customer_gender` = '$gender',`customer_nic` = '$nic',`customer_mobile_no` = '$mobileNo',`customer_landline_no` = '$landlineNo',`customer_address1` = '$address1',`customer_address2` = '$address2',`customer_email` = '$emailAddress',`customer_city` = '$city',`customer_postal_code` = '$postCode',`customer_profile_image` = '$proImage' WHERE `customer_id` = '$customerId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllCustomer() // get all customer
	{ 
		$sql = "SELECT * FROM `customer`";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result; 
	}

	public function getCustomerBy_id_fromCustomer($customerId) // get customer by Id
	{ 
		$sql = "SELECT * FROM `customer` WHERE `customer_id` = '$customerId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updateCustomer_Status($customerId,$customerLogStatus)
	{
		$sql = "UPDATE `customer` SET `customer_status` = '$customerLogStatus' WHERE `customer_id` = '$customerId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getCustomerInfo_ByNic($nic) // get sutomer Info by Nic
	{
		$sql = "SELECT * FROM `customer` WHERE `customer_nic` = '$nic'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getCustomerInfo_ByEmail($email)
	{
		$sql = "SELECT * FROM `customer` WHERE `customer_email` = '$email'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}
	
}