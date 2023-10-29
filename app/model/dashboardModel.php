<?php
include_once '../../config/dbcon.php';

class dashboard
{

	private $db;

	public function __construct()
	{
		$this->db = new dbcon;
	}
	/*===================================================================================================================================================================
																						USER
	===================================================================================================================================================================*/
    
	public function countTotalUsers() // get total users
	{
		$sql = "SELECT * FROM `user`";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function countActiveUsers() // get active users
	{
		$sql = "SELECT * FROM `user` WHERE `user_status`= 1";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}
	public function countDeactiveUsers() // get deactive users
	{
		$sql = "SELECT * FROM `user` WHERE `user_status`= 0";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	/*===================================================================================================================================================================
																						PRODUCT
	===================================================================================================================================================================*/

	public function countTotalProducts()
	{
		$sql = "SELECT * FROM `product`";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function countVisibleProducts()
	{
		$sql = "SELECT * FROM `product` WHERE `product_status`= 1";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function countHiddenProducts()
	{
		$sql = "SELECT * FROM `product` WHERE `product_status`= 0";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}
}