<script src="/hotrorade/public/ckeditor/ckeditor.js"></script>
<script src="/hotrorade/public/ckfinder/ckfinder.js"></script>


<?php
$conn = new mysqli("localhost", "root", "", "webrade");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require './vendor/autoload.php';

if (isset($_POST["importFile"])) {
    $rs = false;

    $file = $_FILES["file"]["tmp_name"];
    $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file);
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

    $reader->setReadDataOnly(true);
    $reader->setLoadSheetsOnly("Sheet1");

    $this->spreadsheet = $reader->load($file);
    $worksheet = $this->spreadsheet->getActiveSheet()->toArray();
    $highestRow = $this->spreadsheet->getActiveSheet()->getHighestRow();
   
    for($row = 1; $row<$highestRow; $row++){

        $m = $_POST["monFile"];
        $tk = $_SESSION["id"];
        $md = $worksheet[$row][6];
        $nd = $worksheet[$row][0];
        $a = $worksheet[$row][1];
        $b = $worksheet[$row][2];
        $c = $worksheet[$row][3];
        $d = $worksheet[$row][4];
        $da = $worksheet[$row][5];

        $qr = "INSERT INTO `tbl_cauhoi`(`id_monHoc`, `id_taiKhoan`, `mucDo`, `noiDung`, `dapAnA`, `dapAnB`, `dapAnC`, `dapAnD`, `dapAnDung`) 
            VALUES ('$m','$tk','$md','$nd','$a','$b','$c','$d','$da')";
        $rs = mysqli_query($conn, $qr);
        
        
    }
    if(isset($rs)){
        if($rs){
            $message = "Thêm thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
        }else{
            $message = "Thêm thất bại";
             echo "<script type='text/javascript'>alert('$message');</script>";
        } ?>
        <script>
              location.href = '/hotrorade/User/CreateQuestion/<?php echo $_SESSION["id"]?>';
        </script>
    <?php }
    
}
?>

<!-- BODY -->
<section class="content_box">
    <div class="container">
        <!-- Left -->
        <div class="box__left">
            <?php require_once "./mvc/views/block/sidebar.php"; ?>
        </div>
        <!-- right -->
        <div class="box__right">
            <div class="box__head">
                <div class="create__btn">
                    <i class="fas fa-edit"></i><a id="create_question" href="javascript:void(0)"> Tạo câu hỏi</a>
                </div>
            </div>
            <div class="container__box">

                <form method="POST" enctype="multipart/form-data">
                    <div class="select__box">
                        <div class="select__subject">
                            <label for="subject">Môn học:</label>

                            <select name="monFile" id="subject">
                                <?php
                                if (isset($data["arrMonHoc"])) {
                                    while ($row = mysqli_fetch_array($data["arrMonHoc"])) {
                                ?>
                                        <option value="<?php echo $row["id_monHoc"] ?>"><?php echo $row["tenMonHoc"] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="button__create">
                        <div>
                            <input type="file" name="file" class="btn btn-primary">
                            <button type="submit" name="importFile" class="btn btn-primary">Tạo bằng File</button>
                        </div>
                    </div>
                </form>
                <!-- search box -->
                <div class="box__search">
                    
                    <!-- table -->
                    <div class="box__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-center">Mã CH</th>
                                    <th class="text-center">Tên câu hỏi</th>
                                    <th class="text-center">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($data["arrCauHoi"])) {
                                ?>
                                    <tr>
                                        <td><?php echo ($row["id_cauHoi"]) ?></td>
                                        <td><?php echo ($row["noiDung"]) ?></td>

                                        <td class="text-center">
                                            <a id="update_question" href="/hotrorade/User/ShowQuestion/<?php echo ($row["id_cauHoi"]) ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="/hotrorade/User/DeleteQuestion/<?php echo ($row["id_cauHoi"]) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- FORM SUA -->

<div id="modal" class="lg">
    <div class="modal__content">
        <div class="modal__body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="" class="text-danger">Tên câu hỏi</label>
                    <textarea id="" cols="30" name="name" class="form-control" rows="3"></textarea>
                    <script>
                        CKEDITOR.replace('name', {
                            filebrowserBrowseUrl: '/hotrorade/public/ckfinder/ckfinder.html',
                            filebrowserUploadUrl: '/hotrorade/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                            filebrowserWindowWidth: '1000',
                            filebrowserWindowHeight: '700'
                        });
                    </script>
                </div>

                <div class="form-group">
                    <div class="select__subject">
                        <label for="subject">Môn học:</label>
                        <select name="monhocID" id="subject" class="form-control">

                            <?php
                            if (isset($data["arrMonHoc2"])) {
                                while ($row = mysqli_fetch_array($data["arrMonHoc2"])) {
                            ?>
                                    <option value="<?php echo $row["id_monHoc"] ?>"><?php echo $row["tenMonHoc"] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="text-danger">Mức độ câu hỏi</label>
                    <select name="mucdo" id="" class="form-control">
                        <option value="0">Dễ</option>
                        <option value="1">Trung bình</option>
                        <option value="2">Khó</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="box_anwser">
                        <label for="" class="text-danger">Đáp án A</label>
                        <textarea id="" cols="30" name="dapan1" class="form-control" rows="3"></textarea>
                        <script>
                            CKEDITOR.replace('dapan1', {
                                filebrowserBrowseUrl: '/hotrorade/public/ckfinder/ckfinder.html',
                                filebrowserUploadUrl: '/hotrorade/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserWindowWidth: '1000',
                                filebrowserWindowHeight: '700'
                            });
                        </script>
                    </div>
                    <div class="box_anwser">
                        <label for="" class="text-danger">Đáp án B</label>
                        <textarea id="" cols="30" name="dapan2" class="form-control" rows="3"></textarea>
                        <script>
                            CKEDITOR.replace('dapan2', {
                                filebrowserBrowseUrl: '/hotrorade/public/ckfinder/ckfinder.html',
                                filebrowserUploadUrl: '/hotrorade/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserWindowWidth: '1000',
                                filebrowserWindowHeight: '700'
                            });
                        </script>
                    </div>
                    <div class="box_anwser">
                        <label for="" class="text-danger">Đáp án C</label>
                        <textarea id="" cols="30" name="dapan3" class="form-control" rows="3"></textarea>
                        <script>
                            CKEDITOR.replace('dapan3', {
                                filebrowserBrowseUrl: '/hotrorade/public/ckfinder/ckfinder.html',
                                filebrowserUploadUrl: '/hotrorade/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserWindowWidth: '1000',
                                filebrowserWindowHeight: '700'
                            });
                        </script>
                    </div>
                    <div class="box_anwser">
                        <label for="" class="text-danger">Đáp án D</label>
                        <textarea id="" cols="30" name="dapan4" class="form-control" rows="3"></textarea>
                        <script>
                            CKEDITOR.replace('dapan4', {
                                filebrowserBrowseUrl: '/hotrorade/public/ckfinder/ckfinder.html',
                                filebrowserUploadUrl: '/hotrorade/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserWindowWidth: '1000',
                                filebrowserWindowHeight: '700'
                            });
                        </script>
                    </div>
                    <div class="box_anwser">
                        <label for="" class="text-danger">Đáp án đúng</label>
                        <select name="dapAnDung" id="" class="form-control">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
                <div class="form-group text-right">
                    <input type="submit" class="btn btn-success" value="Tạo câu hỏi" name="createQuestion"></input>
                </div>
            </form>
        </div>
        <div class="modal__footer">
            <button id="closed__modal" class="btn btn-primary">Close</button>
        </div>
    </div>
</div>




<div class="overlay"></div>
<script src="/hotrorade/public/js/modal.js"></script>

<?php
if (isset($data["mess"])) { ?>
    <script>
        location.href = '/hotrorade/User/CreateQuestion/<?php echo $_SESSION["id"] ?>';
    </script>
<?php
}
?>

<?php
if (isset($data["resultMessage"])) {
    if ($data["resultMessage"] == true) {
        $message = "Thêm thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $message = "Thêm thất bại";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>

<?php
if (isset($data["resultMessage2"])) {
    if ($data["resultMessage2"] == true) {
        $message = "Xóa thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $message = "Xóa thất bại";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } ?>

    <script>
        location.href = '/hotrorade/User/CreateQuestion/<?php echo $_SESSION["id"] ?>';
    </script>
<?php
}

?>