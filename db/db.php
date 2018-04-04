<?php
require_once 'Database.php';
class db {
    public $conn;
    function __construct(){
        $this->conn = (new Database())->getConn();
    }
    function insert($sql){
        if($this->conn->query($sql) === TRUE){ 
            echo "<script>alert('uploadted to database');</script>";
            $this->conn->close(); 
            return "ok";
        }
        else echo "<script>alert('unable to upload in database');</script>";
        $this->conn->close();
        return "not ok";
    }
}

