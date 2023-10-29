<?php
include_once '../../config/dbcon.php';

class login
{

	private $db;

	public function __construct()
	{
		$this->db = new dbcon;
	}

	public function getUserBy_username($username)
	{
		$sql = "SELECT * FROM `login` WHERE `login_username` = '$username'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getUser_ByUserID_FromUser($getUserId)//get userinfo from login database table
	{
		$sql = "SELECT * FROM `user` WHERE `user_id` = '$getUserId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}
}