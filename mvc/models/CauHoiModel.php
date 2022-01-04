<?php

class CauHoiModel extends Db
{

    public function insertNewQuestion($m, $tk, $md, $nd, $a, $b, $c, $d, $da)
    {
        $qr = "INSERT INTO `tbl_cauhoi`(`id_monHoc`, `id_taiKhoan`, `mucDo`, `noiDung`, `dapAnA`, `dapAnB`, `dapAnC`, `dapAnD`, `dapAnDung`) 
            VALUES ('$m','$tk','$md','$nd','$a','$b','$c','$d','$da')";

        $rs = mysqli_query($this->conn, $qr);
        return $rs;
    }

    public function getAll($id)
    {
        $qr = "SELECT  * FROM `tbl_cauhoi` WHERE tbl_cauhoi.id_taiKhoan = '$id'
            ORDER BY tbl_cauhoi.id_cauHoi DESC
            LIMIT 5
            ";
        return  mysqli_query($this->conn, $qr);
    }

    public function getTotal($id, $from, $numberRows)
    {
        $qr = "SELECT * FROM `tbl_cauhoi` WHERE tbl_cauhoi.id_taiKhoan = '$id'";
        $qr .= " ORDER BY tbl_cauhoi.id_cauHoi DESC LIMIT $from, $numberRows ";

        return  mysqli_query($this->conn, $qr);
    }

    public function getQuestionByID($id)
    {
        $qr = "SELECT * FROM `tbl_cauhoi` WHERE tbl_cauhoi.id_cauHoi = '$id'";
        return mysqli_query($this->conn, $qr);
    }

    public function updateByID($id, $nd, $mh, $md, $a, $b, $c, $d, $da)
    {
        $qr = "UPDATE `tbl_cauhoi` 
            SET `id_monHoc`='$mh', `mucDo`='$md',`noiDung`='$nd',`dapAnA`='$a',`dapAnB`='$b',`dapAnC`='$c',`dapAnD`='$d',`dapAnDung`='$da'
             WHERE tbl_cauhoi.id_cauHoi = '$id'";

        $rs = mysqli_query($this->conn, $qr);
        return $rs;
    }

    public function deleteQuestionByID($id)
    {
        $qr = "DELETE FROM `tbl_cauhoi` WHERE tbl_cauhoi.id_cauHoi = '$id'";
        $rs = mysqli_query($this->conn, $qr);
        return $rs;
    }

    public function getAllByID($id)
    {
        $qr = "SELECT  * FROM `tbl_cauhoi` WHERE tbl_cauhoi.id_taiKhoan = '$id'
           ";
        return  mysqli_query($this->conn, $qr);
    }

    public function searchQuestion($id, $key, $subject)
    {
        $qr = "SELECT  * FROM `tbl_cauhoi` 
            WHERE tbl_cauhoi.id_taiKhoan = '$id' ";

        if (!empty($key)) {
            $qr .= " AND tbl_cauhoi.noiDung LIKE '%$key%' ";
        }

        if (!empty($subject)) {
            $qr .= " AND tbl_cauhoi.id_monHoc = '$subject' ";
        }


        return  mysqli_query($this->conn, $qr);
    }

    public function getSearchTotal($id, $from, $numberRows, $key, $subject)
    {
        $qr = "SELECT  * FROM `tbl_cauhoi` 
        WHERE tbl_cauhoi.id_taiKhoan = '$id' ";

        if (!empty($key)) {
            $qr .= " AND tbl_cauhoi.noiDung LIKE '%$key%' ";
        }

        if (!empty($subject)) {
            $qr .= " AND tbl_cauhoi.id_monHoc = '$subject' ";
        }
        $qr .= " ORDER BY tbl_cauhoi.id_cauHoi DESC LIMIT $from, $numberRows ";
        return  mysqli_query($this->conn, $qr);
    }

    public function randomQuestion0($d, $tk, $mh)
    {
        $qr = "SELECT tbl_cauhoi.id_cauHoi FROM `tbl_cauhoi` 
            WHERE tbl_cauhoi.mucDo = '0' AND tbl_cauhoi.id_taiKhoan = '$tk' AND tbl_cauhoi.id_monHoc = '$mh'
            ORDER BY RAND()
            LIMIT $d";
        return  mysqli_query($this->conn, $qr);
    }

    public function randomQuestion1($d, $tk, $mh)
    {
        $qr = "SELECT tbl_cauhoi.id_cauHoi FROM `tbl_cauhoi` 
            WHERE tbl_cauhoi.mucDo = '1' AND tbl_cauhoi.id_taiKhoan = '$tk' AND tbl_cauhoi.id_monHoc = '$mh'
            ORDER BY RAND()
            LIMIT $d";
        return  mysqli_query($this->conn, $qr);
    }

    public function randomQuestion2($d, $tk, $mh)
    {
        $qr = "SELECT tbl_cauhoi.id_cauHoi FROM `tbl_cauhoi` 
            WHERE tbl_cauhoi.mucDo = '2' AND tbl_cauhoi.id_taiKhoan = '$tk' AND tbl_cauhoi.id_monHoc = '$mh'
            ORDER BY RAND()
            LIMIT $d";

        return  mysqli_query($this->conn, $qr);
    }
}
