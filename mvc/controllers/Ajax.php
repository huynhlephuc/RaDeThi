<?php
class Ajax extends Controller
{

    public $BoMonModel;
    public $LopHocModel;

    public function __construct()
    {
        $this->BoMonModel = $this->Model("BoMonMoDel");
        $this->LopHocModel = $this->Model("LopHocMoDel");
    }

    public function getBoMon()
    {
        $khoa = $_POST["k"];
        $rs = $this->BoMonModel->getByIDKhoa($khoa);

        while ($rows = mysqli_fetch_array($rs)) {
            echo "<option value='{$rows["id_bomon"]}'>{$rows["tenBoMon"]}</option>";
        }
    }

    public function getBoMon2()
    {
        $khoa = $_POST["k"];
        $rs = $this->BoMonModel->getByIDKhoa($khoa);

        while ($rows = mysqli_fetch_array($rs)) {
            echo "<option value='{$rows["id_bomon"]}'>{$rows["tenBoMon"]}</option>";
        }
    }

    public function getClass()
    {
        
        $mon = $_POST["k"];
        $gv = $_SESSION["id"];
        $rs = $this-> LopHocModel -> getClassBySubjectAndTeacher($gv, $mon);

        while ($rows = mysqli_fetch_array($rs)) {
            echo "<option value='{$rows["id_lopHoc"]}'>{$rows["maLop"]}</option>";
        }
    }
}
