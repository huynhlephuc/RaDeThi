<?php

    class KhoaModel extends Db {

        public function getAll(){
            $qr = "SELECT * FROM tbl_khoa";
            return mysqli_query($this-> conn, $qr);
        }
        
    }
?>