<?php

    class DeThiModel extends Db {

        public function insertExam($tk, $mh, $lh, $md, $nt){
            $qr = "INSERT INTO `tbl_dethi`(`id_taiKhoan`, `id_monHoc`, `id_lopHoc`, `maDe`, `ngayThi`)
             VALUES ('$tk','$mh','$lh','$md','$nt')";

            $rs = mysqli_query($this-> conn, $qr);
            return $rs;
        }

        public function selectNew(){
            $qr = "SELECT MAX(id_deThi) as id FROM `tbl_dethi`";
            
            $rsQr = mysqli_query($this-> conn, $qr);
            $rs = null;
            while($row = mysqli_fetch_array($rsQr)){
                $rs = $row["id"];
            }
            return $rs;
        }

        public function getAll($id){
            $qr = "SELECT * FROM `tbl_dethi` WHERE tbl_dethi.id_taiKhoan = '$id'";
            return mysqli_query($this -> conn, $qr);
        }
        
        public function getTotal($id, $from, $numberRows){
            $qr = "SELECT * FROM `tbl_dethi` WHERE tbl_dethi.id_taiKhoan = '$id'";
            $qr .= " ORDER BY tbl_dethi.id_deThi DESC LIMIT $from, $numberRows ";
            return mysqli_query($this -> conn, $qr);
        }

        public function deleteExam($id){
            $qr = "DELETE FROM `tbl_dethi` WHERE tbl_dethi.id_deThi = '$id'";
            $result = mysqli_query($this -> conn, $qr);
            return $result;
        }

        public function getExamByID($id){
            $qr = "SELECT * FROM `tbl_dethi` WHERE tbl_dethi.id_deThi = '$id'";
            return mysqli_query($this -> conn, $qr);
        }
    }
?>