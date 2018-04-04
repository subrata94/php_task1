<?php
//namespace db;

class Database{
    private $servername;
    private $user;
    private $pass;
    private $database;
    private $conn;
    function __construct(){
        $this->servername = "localhost";
        $this->user = "root";
        $this->database = "php_task";
        $this->pass = "****";
        $this->conn = new mysqli($this->servername,$this->user, $this->pass, $this->database);
        if ($this->conn->connect_error) {
            die ("Connection failed: ".$this->conn->connect_error);
        }
    }

    function insert($sql){

        try{
            $e = $this->conn->query($sql);
            if($e == TRUE){ 
                echo "<script>alert('uploaded to database');</script>";
                $this->conn->close(); 
                
            }
            else echo "<script>alert('unable to upload in database');</script>";
            $this->conn->close();
            

        }catch(Exception $e){
            //return $e->errorMessage();
        }
    }

    /**
     * Get the value of conn
     */ 
    public function getConn(){
        return $this->conn;
    }

    /**
     * Set the value of conn
     *
     * @return  self
     */ 
    public function setConn($conn){
        $this->conn = $conn;
        return $this;
    }
}