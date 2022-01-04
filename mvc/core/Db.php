<?php
    class Db{
        public $conn;
        protected $svname = "localhost";
        protected $username = "root";
        protected $pass = "";
        protected $dbname = "webrade";

        public function __construct()
        {
            $this->conn=mysqli_connect($this->svname,$this->username,$this->pass, $this->dbname);
            mysqli_select_db($this->conn, $this->dbname);
            mysqli_query($this->conn,"SET NAMES 'utf8'");
        }
    }
