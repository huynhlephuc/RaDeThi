<?php

    class TaiKhoanModel extends Db {

        public function getUserName($userName) {
            $qr = "SELECT * FROM tbl_taikhoan WHERE userName = '{$userName}'";
            return mysqli_query($this->conn, $qr);
        }

        public function getAllAccount() {
            $qr = "SELECT * FROM tbl_taikhoan";
            return mysqli_query($this->conn, $qr);
        }
        
        public function getAllIDKhoa() {
            $qr = "SELECT `id_khoa` FROM tbl_taikhoan";
            return mysqli_query($this->conn, $qr);
        }

        public function getAllIDBoMon() {
            $qr = "SELECT `id_boMon` FROM tbl_taikhoan";
            return mysqli_query($this->conn, $qr);
        }

        public function insertNewAccount($us, $pw, $name, $type, $idK, $idBM) {
            $qr = "INSERT INTO `tbl_taikhoan`(`userName`, `passWord`, `tenUser`, `loaiTaiKhoan`, `id_khoa`, `id_boMon`)
             VALUES ('$us','$pw','$name','$type','$idK','$idBM')";
            
            $rs = false;
            if (mysqli_query($this->conn, $qr)) {
                $rs = true;
            }
            return $rs;
        }

        public function getAccountByID($id) {
            $qr = "SELECT * FROM tbl_taikhoan WHERE tbl_taikhoan.id_taiKhoan = '$id'";
            return mysqli_query($this -> conn, $qr);
        }

        public function updateAccountByID($id, $us, $ps, $name, $khoa, $boMon) {
            $qr = "UPDATE `tbl_taikhoan` SET `userName`='$us',`passWord`='$ps',`tenUser`='$name',`id_khoa`='$khoa',`id_boMon`='$boMon'
                WHERE tbl_taikhoan.id_taiKhoan = '$id'
            ";
            $result = false;
            if (mysqli_query($this->conn, $qr)) {
                $result = true;
            }
            return $result;
        }

        public function deleteByID($id){
            $qr = "DELETE FROM `tbl_taikhoan` WHERE tbl_taikhoan.id_taiKhoan = '$id'";
            $result = false;
            if (mysqli_query($this->conn, $qr)) {
                $result = true;
            }
            return $result;
        }

        public function getAccountTotal($from, $numberRows) {
            $qr = "SELECT * FROM tbl_taikhoan";
            $qr.= " ORDER BY tbl_taikhoan.id_taiKhoan ASC LIMIT $from, $numberRows ";
            return mysqli_query($this->conn, $qr);
        }

        public function updateInfoByID($id, $name, $email, $diaChi, $sdt) {
            $qr = "UPDATE `tbl_taikhoan` SET `tenUser`='$name',`email`='$email',`diaChi`='$diaChi',`soDienThoai`='$sdt'
                WHERE tbl_taikhoan.id_taiKhoan = '$id'
            ";
            $result = mysqli_query($this->conn, $qr);
            return $result;
        }

        public function updatePassword($id, $p){
            $qr = "UPDATE `tbl_taikhoan` SET `passWord` = '$p'
            WHERE tbl_taikhoan.id_taiKhoan = '$id'
            ";
            $result = mysqli_query($this->conn, $qr);
            return $result;
        }

        public function Register($us, $pw, $name, $type) {
            $qr = "INSERT INTO `tbl_taikhoan`(`userName`, `passWord`, `tenUser`, `loaiTaiKhoan`)
             VALUES ('$us','$pw','$name','$type')";
            
            $rs = false;
            if (mysqli_query($this->conn, $qr)) {
                $rs = true;
            }
            return $rs;
        }
    }
?>