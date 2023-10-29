<?php
include_once __DIR__.'../../../config/dbcon.php';

class user
{

	private $db;

	public function __construct()
	{
		$this->db = new dbcon;
	}

	public function addUser($firstName, $lastName, $dob, $gender, $nic, $landlineNo, $mobileNo, $address1, $address2, $emailAddress, $city, $proImage, $roleId, $reg_date) //insert user 
	{
		$sql = "INSERT INTO `user`(`user_first_name`,`user_last_name`,`user_dob`,`user_gender`,`user_nic`,`user_landline_no`,`user_mobile_no`,`user_address1`,`user_address2`,`user_email_address`,`user_city`,`user_profile_image`,`role_role_id`,`user_reg_date`) VALUES ('$firstName','$lastName','$dob','$gender','$nic','$landlineNo','$mobileNo','$address1','$address2','$emailAddress','$city','$proImage','$roleId','$reg_date')";
		$stmt = $this->db->conn();
		$stmt->query($sql);
		$userId = $stmt->insert_id; //calling last inserted user_id
		return $userId;
	}

	public function addUserlogin($username, $password, $userId) //add user Login with the last called user_id
	{
		$sql = "INSERT INTO `login`(`login_username`,`login_password`,`user_user_id`) VALUES ('$username','$password','$userId')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getUserBy_id_fromUser($userId) //get user info by user's id
	{
		$sql = "SELECT * FROM `user` WHERE `user_id` = '$userId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllUser() // get all users from user table
	{
		$sql = "SELECT * FROM `user`";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function editUser($userId, $firstName, $lastName, $dob, $gender, $nic, $landlineNo, $mobileNo, $address1, $address2, $emailAddress, $city, $proImage, $roleId) //edit a user by user's id
	{
		$sql = "UPDATE `user` SET `user_first_name` = '$firstName',`user_last_name` = '$lastName',`user_dob` = '$dob',`user_gender` = '$gender',`user_nic` = '$nic',`user_landline_no` = '$landlineNo',`user_mobile_no` = '$mobileNo',`user_address1` = '$address1',`user_address2` = '$address2',`user_email_address` = '$emailAddress',`user_city` = '$city',`user_profile_image` = '$proImage',`role_role_id`='$roleId' WHERE `user_id` = '$userId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getUserInfo_ByUserName($username) //get user info by username
	{  
		$sql = "SELECT * FROM `login` WHERE `login_username` = '$username'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	
	}

	public function getUserInfo_ByNic($nic) //get user info by nic
	{
		$sql = "SELECT * FROM `user` WHERE `user_nic` = '$nic'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	//=================================EMAIL EXISTANCE IN DRIVER AND USER TABLE // START //=========================

	public function getUserInfo_ByEmail($email) // check user email
	{
		$sql = "SELECT * FROM `user` WHERE `user_email_address` = '$email'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getDriverInfo_ByEmail($email) // check driver email
	{
		$sql = "SELECT * FROM `driver` WHERE `driver_email_address` = '$email'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	//=================================EMAIL EXISTANCE IN DRIVER AND USER TABLE // END //=========================

	public function updateUser_Status($userId, $userLogStatus) //update status in user table
	{
		$sql = "UPDATE `user` SET `user_status` = '$userLogStatus' WHERE `user_id` = '$userId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function updateLogin_Status($userId, $userLogStatus) //update status in login table
	{
		$sql = "UPDATE `login` SET `login_status` = '$userLogStatus' WHERE `user_user_id` = '$userId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getAllUserRole() // get all user role info
	{
		$sql = "SELECT * FROM `role`";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getUserRole_ById($roleId) // get all user role info by Id
	{
		$sql = "SELECT * FROM `role` WHERE `role_id`='$roleId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getModule_RoleByRole_Id($roleId) // get id by module_role
	{
		$sql = "SELECT * FROM `module_has_role` WHERE `role_role_id`='$roleId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getModuleBy_Id($moduleId) // get id by module
	{
		$sql = "SELECT * FROM `module` WHERE `module_id` = '$moduleId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function getFunctionBy_ModuleId($moduleId) // get function by module id
	{
		$sql = "SELECT * FROM `function` WHERE `module_module_id` = '$moduleId'";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;
	}

	public function addUserPrivilages($e,$userId) // add privilages of the current user
	{
		$sql = "INSERT INTO `user_privilages`(`function_function_id`,`user_user_id`) VALUES ('$e','$userId')";
		$stmt = $this->db->conn();
		$result = $stmt->query($sql);
		return $result;	
	}
}
