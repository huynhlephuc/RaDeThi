<?php
class Login extends Controller
{

    public $TaiKhoanMoDel;
    public $MonHocModel;
    public $CauHoiModel;

    public function __construct()
    {
        $this->TaiKhoanMoDel = $this->Model("TaiKhoanModel");
        $this -> MonHocModel = $this -> Model("MonHocModel");
        $this -> CauHoiModel = $this -> Model("CauHoiModel");
    }

    public function SayHi()
    {
        $this->view("MaterPage1", [
            "page" => "login"
        ]);
    }

    public function Logged($page_st)
    {
        $result_message = false;


        if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password_input = $_POST["password"];

            if (empty($_POST["username"]) || empty($_POST["password"])) {
                $this->View("MaterPage1", [
                    "page" => "login",
                    "result" => $result_message
                ]);
            }

            $result = $this->TaiKhoanMoDel->getUserName($username);
        
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row["id_taiKhoan"];
                    $password = $row["passWord"];
                    $phanQuyen = $row["loaiTaiKhoan"];
                }
                if ($password == $password_input) {
                    $_SESSION["id"] = $id;

                    if ($phanQuyen == 0) {

                        $rows = $this -> TaiKhoanMoDel -> getAllAccount();
                        $totalRows = mysqli_num_rows($rows);
                        $numberRows = 8;
                        $numberPages = ceil($totalRows / $numberRows);
                        $page = substr($page_st, 5);

                        $from = ($page - 1) * $numberRows;

                        $result = $this -> TaiKhoanMoDel ->getAccountTotal($from, $numberRows);

                        $this->View("MaterPage2", [
                            "page" => "adminPage",
                            "arrAccounts" => $result,
                            "numberPages" => $numberPages,
                        ]);
                    } else {
                        
                        $this->view("MaterPage3", [
                            "page" => "question",
                            "mess" => true,
                            "arrMonHoc" =>  $this -> MonHocModel -> getSubjectByIdUser($id),
                            "arrMonHoc2" =>  $this -> MonHocModel -> getAll($id),
                            "arrCauHoi" => $this -> CauHoiModel -> getAll($id),
                        ]);
                    }
                } else {
                    $this->View("MaterPage1", [
                        "page" => "login",
                        "result" => $result_message
                    ]);
                }
            } else {
                $this->View("MaterPage1", [
                    "page" => "login",
                    "result" => $result_message
                ]);
            }
        }
    }

    public function Logout()
    {
        unset($_SESSION["id"]);
        unset($_SESSION["phanQuyen"]);
        session_destroy();
        $this->View("MaterPage1", [
            "page" => "login"
        ]);
    }
    public function Register()
    {
        $result_message = false;
        if(isset($_POST["register"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $fullname = $_POST["fullname"];
            $type = 1;

            $result_message = $this -> TaiKhoanMoDel -> Register($username, $password, $fullname, $type);

            $this->View("MaterPage1", [
                "page" => "register",
                "result" => $result_message,
            ]);
        }
        $this->View("MaterPage1", [
            "page" => "register",
        ]);
    }
}
