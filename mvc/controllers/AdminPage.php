<?php
    class AdminPage extends Controller {

        public $TaiKhoanModel;
        public $KhoaModel;
        public $BoMonModel;
        public $MonHocModel;
        public $LopHocModel;

        function SayHi(){
            $this->View("MaterPage1",[
                "page" => "login"
            ]);
        }

        public function __construct()
        {
            $this -> CheckSession();
            $this-> TaiKhoanModel = $this -> Model("TaiKhoanModel");
            $this -> KhoaModel = $this -> Model("KhoaModel");
            $this -> BoMonModel = $this -> Model("BoMonModel");
            $this -> MonHocModel = $this -> Model("MonHocModel");
            $this -> LopHocModel = $this -> Model("LopHocModel");
        }

        public function Show($page_st) {

            $rows = $this -> TaiKhoanModel -> getAllAccount();
            $totalRows = mysqli_num_rows($rows);
            $numberRows = 8;
            $numberPages = ceil($totalRows / $numberRows);
            $page = substr($page_st, 5);

            $from = ($page - 1) * $numberRows;

            $result = $this -> TaiKhoanModel -> getAccountTotal($from, $numberRows);

            $this -> View("MaterPage2", [
                "page" => "adminPage",
                "arrAccounts" => $result,
                "numberPages" => $numberPages,
            ]);

            
        }

        
        public function Add() {

            if(isset($_POST["ThemTK"])){

                $userName = $_POST["TenTK"];
                $passWord = $_POST["MatKhau"];
                $tenUser = $_POST["TenUser"];
                $loaiTaiKhoan = 1;
                $id_khoa = $_POST["Khoa"];
                $id_boMon = $_POST["BoMon"];
                
                $rs = false;

                if(!empty($userName) && !empty($passWord) && !empty($tenUser) && !empty($id_khoa) && !empty($id_boMon)){
                    
                    $rs = $this -> TaiKhoanModel -> insertNewAccount($userName, $passWord, $tenUser, $loaiTaiKhoan, $id_khoa, $id_boMon);
        
                }
                $this -> View("MaterPage2", [
                    "page" => "addAccount",
                    "arrKhoa" => $this -> KhoaModel -> getAll(),
                    "resultMessage" => $rs, 
                ]);
            }

            $this -> View("MaterPage2", [
                "page" => "addAccount",
                "arrKhoa" => $this -> KhoaModel -> getAll(),
            ]);
        }

        public function ShowByID($id_taiKhoan) {

            $this -> View("MaterPage2", [
                "page" => "updateAccount",
                "result" => $this -> TaiKhoanModel -> getAccountByID($id_taiKhoan),
                "arrKhoa" => $this -> KhoaModel -> getAll(),
                "arrBoMon" => $this -> BoMonModel -> getNameByIDAccount($id_taiKhoan),
            ]);
        }

        public function EditByID($id_taiKhoan) {

            if(isset($_POST["SuaTK"])) {
                $rs = false;
                $userName = $_POST["TenTK"];
                $passWord = $_POST["MatKhau"];
                $tenUser = $_POST["TenUser"];
                $id_khoa = $_POST["Khoa"];
                $id_boMon = $_POST["BoMon"];

                if(!empty($userName) && !empty($passWord) && !empty($tenUser) && !empty($id_khoa) && !empty($id_boMon)){
                    
                    $rs = $this -> TaiKhoanModel -> updateAccountByID($id_taiKhoan, $userName, $passWord, $tenUser, $id_khoa, $id_boMon);
        
                }
                $this -> View("MaterPage2", [
                    "page" => "updateAccount",
                    "result" => $this -> TaiKhoanModel -> getAccountByID($id_taiKhoan),
                    "arrKhoa" => $this -> KhoaModel -> getAll(),
                    "arrBoMon" => $this -> BoMonModel -> getNameByIDAccount($id_taiKhoan),
                    "resultEdit" => $rs,
                ]);
            }
            $this -> View("MaterPage2", [
                "page" => "updateAccount",
                "result" => $this -> TaiKhoanModel -> getAccountByID($id_taiKhoan),
                "arrKhoa" => $this -> KhoaModel -> getAll(),
                "arrBoMon" => $this -> BoMonModel -> getNameByIDAccount($id_taiKhoan),
            ]);


        }

        public function DeleteByID($id_taiKhoan) {
            $rs = false;
            $rs = $this -> TaiKhoanModel -> deleteByID($id_taiKhoan);
            $this -> View("MaterPage2", [
                "page" => "adminPage",
                "arrAccounts" => $this -> TaiKhoanModel -> getAllAccount(),
                "resultMessage" => $rs
            ]);
        }

        public function ShowSubjects($page_st) {

            $rows = $this -> MonHocModel -> getAll();
            $totalRows = mysqli_num_rows($rows);
            $numberRows = 8;
            $numberPages = ceil($totalRows / $numberRows);
            $page = substr($page_st, 5);

            $from = ($page - 1) * $numberRows;

            $result = $this -> MonHocModel -> getSubjectsTotal($from, $numberRows);

            $this -> View("MaterPage2", [
                "page" => "subjectsPage",
                "arrSubjects" => $result,
                "numberPages" => $numberPages,
            ]);
        }

        public function AddSubjects(){

            if(isset($_POST["ThemMH"])){

                

                $maMH = $_POST["MaMonHoc"];
                $tenMH = $_POST["TenMonHoc"];
                $tongTC = $_POST["TongTC"];
                $lyThuyet = $_POST["TCLyThuyet"];
                $thucHanh = $_POST["TCThucHanh"];

                $rs = false;

                if(!empty($maMH) && !empty($tenMH) && !empty($tongTC)){
    
                    $rs = $this -> MonHocModel -> insertNewSubject($maMH, $tenMH, $tongTC, $lyThuyet, $thucHanh);      
                }
                $this -> View("MaterPage2", [
                    "page" => "addSubjects",
                    "resultMessage" => $rs, 
                ]);
            }


            $this -> View("MaterPage2", [
                "page" => "addSubjects",
            ]);
        }

        public function ShowSubjectByID($id) {
            $this -> View("MaterPage2", [
                "page" => "updateSubject",
                "result" => $this -> MonHocModel -> getSubjectByID($id),             
            ]);          
        }

        public function EditSubjectByID($id) {
            if(isset($_POST["CapNhatMonHoc"])) {
                $maMH = $_POST["MaMonHoc"];
                $tenMH = $_POST["TenMonHoc"];
                $tongTC = $_POST["TongTC"];
                $lyThuyet = $_POST["TCLyThuyet"];
                $thucHanh = $_POST["TCThucHanh"];

                $rs = false;

                if(!empty($maMH) && !empty($tenMH) && !empty($tongTC)){
    
                    $rs = $this -> MonHocModel -> updateSubjectByID($id, $maMH, $tenMH, $tongTC, $lyThuyet, $thucHanh);      
                }
                $this -> View("MaterPage2", [
                    "page" => "updateSubject",
                    "resultMessage" => $rs,
                    "result" => $this -> MonHocModel -> getSubjectByID($id),
                ]);

            }
            $this -> View("MaterPage2", [
                "page" => "updateSubject",
                "result" => $this -> MonHocModel -> getSubjectByID($id),
            ]);
        }

        public function DeleteSubjectByID($id) {
            $rs = false;
            $rs = $this -> MonHocModel -> deleteSubjectByID($id);
            $this -> View("MaterPage2", [
                "page" => "subjectsPage",
                "arrSubjects" => $this -> MonHocModel -> getAll(),
                "resultMessage" => $rs
            ]);
        }

        public function ShowClass($page_st) {
            $rows = $this -> LopHocModel -> getAll();
            $totalRows = mysqli_num_rows($rows);
            $numberRows = 8;
            $numberPages = ceil($totalRows / $numberRows);
            $page = substr($page_st, 5);

            $from = ($page - 1) * $numberRows;

            $result = $this -> LopHocModel -> getClassTotal($from, $numberRows);

            $this -> View("MaterPage2", [
                "page" => "classPage",
                "arrClass" => $result,
                "numberPages" => $numberPages,
            ]);
        }

        public function AddClass() {

            if(isset($_POST["ThemLopHoc"])) {

                $maLopHoc = $_POST["MaLopHoc"];
                $idGiangVien  = $_POST["TenGiangVien"];
                $monHoc = $_POST["MonHoc"];
                $hocKy = $_POST["HocKi"];
                $namHoc = $_POST["NamHoc"];

                $rs = false;

                if(!empty($maLopHoc) && !empty($idGiangVien) && !empty($monHoc) && !empty($hocKy) && !empty($namHoc)) {

                    $idMonHoc = null;

                    $arrIdMonHoc = $this -> MonHocModel -> getIdOfSubjectByMMH($monHoc);
                    while($row = mysqli_fetch_array($arrIdMonHoc)){
                        $idMonHoc = $row["id_monHoc"];
                    }

                    $rs = $this -> LopHocModel -> insertNewClass($maLopHoc, $idGiangVien, $idMonHoc, $hocKy, $namHoc);
                }

                $this -> View("MaterPage2", [
                    "page" => "addClass",
                    "resultMessage" => $rs, 
                ]);

            }

            $this -> View("MaterPage2", [
                "page" => "addClass",
            ]);
        }

        public function ShowClassById($id) {

            $arrClass = $this -> LopHocModel -> getClassByID($id);
            $idMonHoc = null;
            while($row = mysqli_fetch_array($arrClass)){
                $idMonHoc = $row["id_monHoc"];
            }

            $maMonHoc = null;
            $arrMonHoc = $this -> MonHocModel -> getSubjectByID($idMonHoc);
            while($row = mysqli_fetch_array($arrMonHoc)){
                $maMonHoc = $row["maMonHoc"];
            }
            $this -> View("MaterPage2", [
                "page" => "updateClass",
                "result" => $this -> LopHocModel -> getClassByID($id),
                "maMonHoc" => $maMonHoc,
            ]);
        }

        public function EditClassByID($id) {

            if(isset($_POST["CapNhatLopHoc"])){

                $maLopHoc = $_POST["MaLopHoc"];
                $idGiangVien  = $_POST["TenGiangVien"];
                $monHoc = $_POST["MonHoc"];
                $hocKy = $_POST["HocKi"];
                $namHoc = $_POST["NamHoc"];

                $rs = false;

                $arrClass = $this -> LopHocModel -> getClassByID($id);
                $idMonHoc = null;
                while($row = mysqli_fetch_array($arrClass)){
                    $idMonHoc = $row["id_monHoc"];
                }

                $maMonHoc = null;
                $arrMonHoc = $this -> MonHocModel -> getSubjectByID($idMonHoc);
                while($row = mysqli_fetch_array($arrMonHoc)){
                    $maMonHoc = $row["maMonHoc"];
                }
                
                if(!empty($maLopHoc) && !empty($idGiangVien) && !empty($monHoc) && !empty($hocKy) && !empty($namHoc)) {
                    
                    $idMonHoc = null;

                    $arrIdMonHoc = $this -> MonHocModel -> getIdOfSubjectByMMH($monHoc);
                    while($row = mysqli_fetch_array($arrIdMonHoc)){
                        $idMonHoc = $row["id_monHoc"];
                    }

                    $rs = $this -> LopHocModel -> updateClassByID($id, $maLopHoc, $idGiangVien, $idMonHoc, $hocKy, $namHoc);

                    $this -> View("MaterPage2", [
                        "page" => "updateClass",
                        "maMonHoc" => $maMonHoc,
                        "result" => $this -> LopHocModel -> getClassByID($id),
                        "resultMessage" => $rs,
                    ]);
                }

            }
            $this -> View("MaterPage2", [
                "page" => "updateClass",
                "maMonHoc" => $maMonHoc,
                "result" => $this -> LopHocModel -> getClassByID($id),
            ]);

        }

        public function DeleteClassByID($id) {
            $rs = false;
            $rs = $this -> LopHocModel -> deleteClassByID($id);

            $this -> View("MaterPage2", [
                "page" => "classPage",
                "arrClass" => $this -> LopHocModel -> getAll(),
                "resultMessage" => $rs
            ]);
            
        }
    }
