<?php

    class MonHocModel extends Db {

        public function getAll(){
            $qr = "SELECT * FROM tbl_monhoc";
            return mysqli_query($this-> conn, $qr);
        }
        
        public function getSubjectsTotal($from, $numberRows) {
            $qr = "SELECT * FROM tbl_monhoc";
            $qr.= " ORDER BY tbl_monhoc.id_monHoc ASC LIMIT $from, $numberRows ";
            return mysqli_query($this->conn, $qr);
        }

        public function updateSubjectByID($id, $ma, $name, $total, $lt, $th) {
            $qr = "UPDATE `tbl_monhoc` SET `maMonHoc`='$ma',`tenMonHoc`='$name',`tongTC`='$total',`tcLyThuyet`='$lt',`tcThucHanh`='$th'
                WHERE tbl_monhoc.id_monHoc = '$id'
            ";
            $result = false;
            if (mysqli_query($this->conn, $qr)) {
                $result = true;
            }
            return $result;
        }

        public function insertNewSubject($ma, $name, $total, $lt, $th) {
            $qr = "INSERT INTO `tbl_monhoc`( `maMonHoc`, `tenMonHoc`, `tongTC`, `tcLyThuyet`, `tcThucHanh`)
             VALUES ('$ma','$name','$total','$lt','$th')";
            
            $rs = false;
            if (mysqli_query($this->conn, $qr)) {
                $rs = true;
            }
            return $rs;
        }

        public function getSubjectByID($id) {
            $qr = "SELECT * FROM tbl_monhoc WHERE tbl_monhoc.id_monHoc = '$id'";
            return mysqli_query($this -> conn, $qr);
        }

        public function deleteSubjectByID($id){
            $qr = "DELETE FROM `tbl_monhoc` WHERE tbl_monhoc.id_monHoc = '$id'";
            $result = false;
            if (mysqli_query($this->conn, $qr)) {
                $result = true;
            }
            return $result;
        }

        public function getIdOfSubjectByMMH($id) {
            $qr = "SELECT tbl_monhoc.id_monHoc FROM tbl_monhoc WHERE tbl_monhoc.maMonHoc = '$id'";
            return mysqli_query($this -> conn, $qr);
        }
       
        public function getSubjectByIdUser($id){
            $qr = "SELECT DISTINCT tbl_monhoc.id_monHoc, tbl_monhoc.tenMonHoc FROM tbl_monhoc
            JOIN tbl_lophoc ON tbl_lophoc.id_monHoc = tbl_monhoc.id_monHoc
            WHERE tbl_lophoc.id_taiKhoan = '$id'
            ";
            return mysqli_query($this -> conn, $qr);
        }

        public function getNameByIdExam($id){
            $qr = "SELECT tbl_monhoc.tenMonHoc FROM tbl_monhoc
            JOIN tbl_dethi ON tbl_dethi.id_monHoc = tbl_monhoc.id_monHoc
            WHERE tbl_dethi.id_deThi = '$id'
            ";
            return mysqli_query($this -> conn, $qr);
        }

    }
?>