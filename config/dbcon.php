<?php
class dbcon{
    //create db connection
    private $servername = "localhost"; 
    private $username = "root"; 
    private $password = ""; 
    private $dbname = "rosecom_db"; 

    private $handler;
    private $conn; 

    public function __construct() {
        $this->handler = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname
        );

        if ($this->handler->connect_error) {
           $this->conn = $this->handler;

        }else{
            $this->conn = $this->handler;
        }
    }

    public function conn()
    {
        $result = $this->conn;
        return $result;
    }
}