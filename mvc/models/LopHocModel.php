<?php

class LopHocModel extends Db
{

    public function getAll()
    {
        $qr = "SELECT * FROM tbl_lophoc";
        return mysqli_query($this->conn, $qr);
    }

    public function getClassTotal($from, $numberRows)
    {
        $qr = "SELECT * FROM tbl_lophoc";
        $qr .= " ORDER BY tbl_lophoc.id_lopHoc ASC LIMIT $from, $numberRows ";
        return mysqli_query($this->conn, $qr);
    }

    public function insertNewClass($ma, $tk, $mh, $hk, $nh)
    {
        $qr = "INSERT INTO `tbl_lophoc`(`maLop`, `id_taiKhoan`, `id_monHoc`, `hocKy`, `namHoc`)
             VALUES ('$ma','$tk','$mh','$hk','$nh')";

        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return $rs;
    }

    public function getClassByID($id)
    {
        $qr = "SELECT * FROM `tbl_lophoc` WHERE tbl_lophoc.id_lopHoc = '$id'";

        return mysqli_query($this->conn, $qr);
    }

    public function updateClassByID($id, $ma, $tk, $mon, $hk, $nam)
    {
        $qr = "UPDATE `tbl_lophoc` 
            SET `maLop`='$ma',`id_taiKhoan`='$tk',`id_monHoc`='$mon',`hocKy`='$hk',`namHoc`='$nam'
            WHERE tbl_lophoc.id_lopHoc = '$id'";

        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return $rs;
    }

    public function deleteClassByID($id) {
        $qr = "DELETE FROM `tbl_lophoc` WHERE tbl_lophoc.id_lopHoc = '$id'";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return $rs;
    }

    public function getClassBySubjectAndTeacher($gv, $m)
    {
        $qr = "SELECT * FROM `tbl_lophoc` 
        WHERE tbl_lophoc.id_taiKhoan = '$gv' AND tbl_lophoc.id_monHoc = '$m'";
        return mysqli_query($this->conn, $qr);
    }

    public function getNameByIdExam($id){
        $qr = "SELECT tbl_lophoc.maLop FROM tbl_lophoc
        JOIN tbl_dethi ON tbl_dethi.id_lopHoc = tbl_lophoc.id_lopHoc
        WHERE tbl_dethi.id_deThi = '$id'
        ";
        return mysqli_query($this -> conn, $qr);
    }

    
}
