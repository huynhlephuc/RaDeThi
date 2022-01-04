<?php

    class BoMonModel extends Db {


        public function getByIDKhoa($idKhoa) {
            $qr = "SELECT * FROM tbl_bomon
            JOIN tbl_khoa
            ON tbl_bomon.id_khoa = tbl_khoa.id_khoa
            WHERE tbl_bomon.id_khoa = '$idKhoa'";
            return mysqli_query($this->conn, $qr);
        }

        public function getNameByIDAccount($id){
            $qr = "SELECT * FROM tbl_bomon
            JOIN tbl_taikhoan ON tbl_bomon.id_bomon = tbl_taiKhoan.id_boMon
            WHERE tbl_taikhoan.id_taiKhoan = '$id'";
            return mysqli_query($this->conn, $qr);
        }

        public function getAll(){
            $qr = "SELECT * FROM tbl_boMon";
            return mysqli_query($this-> conn, $qr);
        }
    }
?>