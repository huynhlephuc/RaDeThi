<?php

    class ChiTietDeThiModel extends Db {

        public function setNew($dt, $ch){
            $qr = "INSERT INTO `tbl_chitietdethi`(`id_deThi`, `id_cauHoi`)
            VALUES ('$dt','$ch')";
            $rs = mysqli_query($this-> conn, $qr); 
            return $rs;
        }

        public function deleteExam($id){
            $qr = "DELETE FROM `tbl_chitietdethi` WHERE tbl_chitietdethi.id_deThi = '$id'";
            $result = mysqli_query($this -> conn, $qr);
            return $result;
        }

        public function getByIdExam($id){
            $qr = "SELECT tbl_chitietdethi.id_cauHoi FROM tbl_chitietdethi
            JOIN tbl_dethi ON tbl_dethi.id_deThi = tbl_chitietdethi.id_deThi
            WHERE tbl_dethi.id_deThi = '$id'
            ";
            return mysqli_query($this -> conn, $qr);
        }

    }
?>