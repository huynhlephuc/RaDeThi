<?php
class User extends Controller
{

    public $TaiKhoanModel;
    public $LopHocModel;
    public $MonHocModel;
    public $CauHoiModel;
    public $DeThiModel;
    public $ChiTietDeThiModel;

    public function __construct()
    {
        $this->CheckSession();

        $this->TaiKhoanModel = $this->Model("TaiKhoanModel");
        $this->LopHocModel = $this->Model("LopHocModel");
        $this->MonHocModel = $this->Model("MonHocModel");
        $this->CauHoiModel = $this->Model("CauHoiModel");
        $this->DeThiModel = $this->Model("DeThiModel");
        $this->ChiTietDeThiModel = $this->Model("ChiTietDeThiModel");
    }

    public function SayHi()
    {
        $this->view("MaterPage1", [
            "page" => "login"
        ]);
    }

    public function Info($id)
    {

        $this->view("MaterPage3", [
            "page" => "profile",
            "result" => $this->TaiKhoanModel->getAccountByID($id),
        ]);
    }

    public function UpdateInfo($id)
    {
        if (isset($_POST["CapNhatTK"])) {
            $rs = false;
            $name = $_POST["hoTen"];
            $email = $_POST["email"];
            $diaChi = $_POST["diaChi"];
            $sdt = $_POST["sdt"];

            if (!empty($name) && !empty($email) && !empty($diaChi) && !empty($sdt)) {

                $rs = $this->TaiKhoanModel->updateInfoByID($id, $name, $email, $diaChi, $sdt);
            }
            $this->View("MaterPage3", [
                "page" => "profile",
                "result" => $this->TaiKhoanModel->getAccountByID($id),
                "resultEdit" => $rs,
            ]);
        }
        $this->View("MaterPage3", [
            "page" => "profile",
            "result" => $this->TaiKhoanModel->getAccountByID($id),
        ]);
    }

    public function ChangePassword($id)
    {
        if (isset($_POST["DoiPass"])) {
            $rs = false;
            $passCu = $_POST["passCu"];
            $passMoi = $_POST["passMoi"];

            $idPass = null;
            $arrPass = $this->TaiKhoanModel->getAccountByID($id);
            while ($row = mysqli_fetch_array($arrPass)) {
                $idPass = $row["passWord"];
            }

            if ($passCu == $idPass) {
                $rs = $this->TaiKhoanModel->updatePassword($id, $passMoi);
            }
            $this->View("MaterPage3", [
                "page" => "changePass",
                "resultEdit" => $rs,
            ]);
        }
        $this->View("MaterPage3", [
            "page" => "changePass",
        ]);
    }

    public function CreateQuestion($id)
    {


        if (isset($_POST["createQuestion"])) {

            $rs = false;

            $ten = $_POST["name"];
            $mon = $_POST["monhocID"];
            $mucDo = $_POST["mucdo"];
            $dapAnA = $_POST["dapan1"];
            $dapAnB = $_POST["dapan2"];
            $dapAnC = $_POST["dapan3"];
            $dapAnD = $_POST["dapan4"];
            $dapAnDung = $_POST["dapAnDung"];
            $tacGia = $_SESSION["id"];




            if (!empty($ten) && !empty($mon) && isset($mucDo) && !empty($dapAnA) && !empty($dapAnB) && !empty($dapAnC) && !empty($dapAnD) && !empty($dapAnDung)) {

                $rs = $this->CauHoiModel->insertNewQuestion($mon, $tacGia, $mucDo, $ten, $dapAnA, $dapAnB, $dapAnC, $dapAnD, $dapAnDung);
            }
            $this->View("MaterPage3", [
                "page" => "question",
                "arrMonHoc" =>  $this->MonHocModel->getSubjectByIdUser($id),
                "arrMonHoc2" =>  $this->MonHocModel->getSubjectByIdUser($id),
                "resultMessage" => $rs,
                "arrCauHoi" => $this->CauHoiModel->getAll($id)

            ]);
        }

        $this->View("MaterPage3", [
            "page" => "question",
            "arrMonHoc" =>  $this->MonHocModel->getSubjectByIdUser($id),
            "arrMonHoc2" =>  $this->MonHocModel->getSubjectByIdUser($id),
            "arrCauHoi" => $this->CauHoiModel->getAll($id),
            "tk" => $_SESSION["id"],
        ]);
    }

    public function ShowQuestion($id)
    {
        $this->View("MaterPage3", [
            "page" => "updateQuestion",
            "result" => $this->CauHoiModel->getQuestionByID($id),
            "arrMonHoc" =>  $this->MonHocModel->getSubjectByIdUser($_SESSION["id"]),
        ]);
    }

    public function UpdateQuestion($id)
    {
        if (isset($_POST["UpdateQuestion"])) {
            $rs = false;
            $nd = $_POST["1"];
            $mh = $_POST["monhocID"];
            $md = $_POST["mucdo"];
            $a = $_POST["01"];
            $b = $_POST["02"];
            $c = $_POST["03"];
            $d = $_POST["04"];
            $da = $_POST["dapAnDung"];

            if (!empty($nd) && !empty($mh) && isset($md) && !empty($a) && !empty($b) && !empty($c) && !empty($d) && !empty($da)) {
                $rs = $this->CauHoiModel->updateByID($id, $nd, $mh, $md, $a, $b, $c, $d, $da);
            }

            $this->View("MaterPage3", [
                "page" => "updateQuestion",
                "result" => $this->CauHoiModel->getQuestionByID($id),
                "arrMonHoc" =>  $this->MonHocModel->getSubjectByIdUser($_SESSION["id"]),
                "resultEdit" => $rs,
            ]);
        }
    }

    public function DeleteQuestion($id)
    {

        $rs = false;
        $rs = $this->CauHoiModel->deleteQuestionByID($id);

        $this->View("MaterPage3", [
            "page" => "question",
            "arrMonHoc" =>  $this->MonHocModel->getSubjectByIdUser($id),
            "arrMonHoc2" =>  $this->MonHocModel->getSubjectByIdUser($id),
            "arrCauHoi" => $this->CauHoiModel->getAll($id),
            "resultMessage2" => $rs,
        ]);
    }

    public function SearchQuestion($page_st)
    {

        $numberRows = 8;
        $page = substr($page_st, 5);
        $from = ($page - 1) * $numberRows;
        $key = null;
        $subject = null;

        if (isset($_POST["search-btn"])) {


            $key = $_POST["key"];
            $subject = $_POST["monhocID"];

            $rows = $this->CauHoiModel->searchQuestion($_SESSION["id"], $key, $subject);
            $totalRows = mysqli_num_rows($rows);
            $numberPages = ceil($totalRows / $numberRows);
            $this->View("MaterPage4", [
                "page" => "searchQuestion",
                "arrCauHoiAll" => $this->CauHoiModel->getSearchTotal($_SESSION["id"], $from, $numberRows, $key, $subject),
                'numberPages' => $numberPages,
                "totalRows" => $totalRows,
                'page_st' => $page,
                'numberRows' => $numberRows,
                "arrMonHoc2" =>  $this->MonHocModel->getSubjectByIdUser($_SESSION["id"]),
                'key' => $key,
                'subject' => $subject,
            ]);
        } else {
            $rows = $this->CauHoiModel->getAllByID($_SESSION["id"]);
            $totalRows = mysqli_num_rows($rows);
            $numberPages = ceil($totalRows / $numberRows);
            $this->View("MaterPage4", [
                "page" => "searchQuestion",
                "arrCauHoiAll" => $this->CauHoiModel->getTotal($_SESSION["id"], $from, $numberRows),
                'numberPages' => $numberPages,
                "totalRows" => $totalRows,
                'page_st' => $page,
                'numberRows' => $numberRows,
                "arrMonHoc2" =>  $this->MonHocModel->getSubjectByIdUser($_SESSION["id"]),
                'key' => $key,
                'subject' => $subject,
            ]);
        }
    }

    public function SearchQuestionBreak($page_st, $key_st, $subject_st)
    {
        $numberRows = 8;
        $page = substr($page_st, 5);
        $from = ($page - 1) * $numberRows;




        $key = substr($key_st, 4);
        $subject = substr($subject_st, 8);

        $rows = $this->CauHoiModel->searchQuestion($_SESSION["id"], $key, $subject);
        $totalRows = mysqli_num_rows($rows);
        $numberPages = ceil($totalRows / $numberRows);

        $this->View("MaterPage4", [
            "page" => "searchQuestion",
            "arrCauHoiAll" => $this->CauHoiModel->getSearchTotal($_SESSION["id"], $from, $numberRows, $key, $subject),
            'numberPages' => $numberPages,
            "totalRows" => $totalRows,
            'page_st' => $page,
            'numberRows' => $numberRows,
            "arrMonHoc2" =>  $this->MonHocModel->getSubjectByIdUser($_SESSION["id"]),
            'key' => $key,
            'subject' => $subject,
        ]);
    }

    public function Exam()
    {

        if (isset($_POST["createExam"])) {
            $gv = $_SESSION["id"];
            $mon = $_POST["monThi"];
            $lop = $_POST["lopThi"];
            $ngay = $_POST["ngayThi"];
            $d = $_POST["de"];
            $tb = $_POST["trungBinh"];
            $k = $_POST["kho"];
            $maDe = $_POST["maDe"];
            $rs = false;

            if (!empty($mon) && !empty($lop) && !empty($ngay) && isset($d) && isset($tb) && isset($k) && isset($maDe)) {

                $rs = $this->DeThiModel->insertExam($gv, $mon, $lop, $maDe, $ngay);

                $dt = $this->DeThiModel->selectNew();

                $rsD = $this->CauHoiModel->randomQuestion0($d, $gv, $mon);
                while ($row = mysqli_fetch_array($rsD)) {

                    $rs = $this->ChiTietDeThiModel->setNew($dt, $row["id_cauHoi"]);
                }

                $rsTB = $this->CauHoiModel->randomQuestion1($tb, $gv, $mon);
                while ($row = mysqli_fetch_array($rsTB)) {

                    $rs = $this->ChiTietDeThiModel->setNew($dt, $row["id_cauHoi"]);
                }

                $rsK = $this->CauHoiModel->randomQuestion2($k, $gv, $mon);
                while ($row = mysqli_fetch_array($rsK)) {

                    $rs = $this->ChiTietDeThiModel->setNew($dt, $row["id_cauHoi"]);
                }
            }
            $this->view("MaterPage3", [
                "page" => "createExam",
                "arrSubject" => $this->MonHocModel->getSubjectByIdUser($_SESSION["id"]),
                "resultMessage" => $rs
            ]);
        }


        $this->view("MaterPage3", [
            "page" => "createExam",
            "arrSubject" => $this->MonHocModel->getSubjectByIdUser($_SESSION["id"]),
        ]);
    }

    public function ShowExam($page_st)
    {

        $numberRows = 8;
        $page = substr($page_st, 5);
        $from = ($page - 1) * $numberRows;

        $rows = $this->DeThiModel->getAll($_SESSION["id"]);
        $totalRows = mysqli_num_rows($rows);
        $numberPages = ceil($totalRows / $numberRows);

        $this->view("MaterPage3", [
            "page" => "showExam",
            'numberPages' => $numberPages,
            "totalRows" => $totalRows,
            'page_st' => $page,
            'numberRows' => $numberRows,
            "arrExam" => $this->DeThiModel->getTotal($_SESSION["id"], $from, $numberRows),
        ]);
    }

    public function DeleteExam($page_st, $id)
    {

        $rs = false;
        $rs = $this->ChiTietDeThiModel->deleteExam($id);
        $rs = $this->DeThiModel->deleteExam($id);

        $numberRows = 8;
        $page = substr($page_st, 5);
        $from = ($page - 1) * $numberRows;

        $rows = $this->DeThiModel->getAll($_SESSION["id"]);
        $totalRows = mysqli_num_rows($rows);
        $numberPages = ceil($totalRows / $numberRows);

        $this->View("MaterPage3", [
            "page" => "showExam",
            'numberPages' => $numberPages,
            "totalRows" => $totalRows,
            'page_st' => $page,
            'numberRows' => $numberRows,
            "arrExam" => $this->DeThiModel->getTotal($_SESSION["id"], $from, $numberRows),
            "resultMessage2" => $rs,
        ]);
    }

    public function DetailExam($id){
        $arrMonHoc = $this -> MonHocModel -> getNameByIdExam($id);
        $monHoc = null;
        while($row = mysqli_fetch_array($arrMonHoc)){
            $monHoc = $row["tenMonHoc"];
        }

        $arrLopHoc = $this -> LopHocModel -> getNameByIdExam($id);
        $lopHoc = null;
        while($row = mysqli_fetch_array($arrLopHoc)){
            $lopHoc = $row["maLop"];
        }

        $this->View("MaterPage5", [
            "page" => "detailExam",
            "monHoc" => $monHoc,
            "lopHoc" => $lopHoc,
            "deThi" => $this -> DeThiModel -> getExamByID($id),
            "arrQuestion" => $this -> ChiTietDeThiModel -> getByIdExam($id),
        ]);
    }

    public function DetailAnswer($id){

        $arrMonHoc = $this -> MonHocModel -> getNameByIdExam($id);
        $monHoc = null;
        while($row = mysqli_fetch_array($arrMonHoc)){
            $monHoc = $row["tenMonHoc"];
        }

        $arrLopHoc = $this -> LopHocModel -> getNameByIdExam($id);
        $lopHoc = null;
        while($row = mysqli_fetch_array($arrLopHoc)){
            $lopHoc = $row["maLop"];
        }

        $this->View("MaterPage5", [
            "page" => "answer",
            "monHoc" => $monHoc,
            "lopHoc" => $lopHoc,
            "deThi" => $this -> DeThiModel -> getExamByID($id),
            "arrQuestion" => $this -> ChiTietDeThiModel -> getByIdExam($id),
        ]);

    }
}
