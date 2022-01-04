<section class="content_box">
    <div class="container">
        <!-- Left -->
        <div class="box__left">
            <?php require_once "./mvc/views/block/sidebar.php"; ?>
        </div>

        <!-- table -->
        <div class="box__right">
            <div class="box__table" style="text-align: center;">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center">Mã đề</th>
                            <th class="text-center">Môn học</th>
                            <th class="text-center">Lớp</th>
                            <th class="text-center">Số lượng câu hỏi</th>
                            <th class="text-center">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($data["arrExam"])) {

                            $idmh = $row["id_monHoc"];
                            $tenMH = null;

                            if (isset($idmh)) {
                                $conn = new mysqli("localhost", "root", "", "webrade");
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                $getMH = "SELECT * FROM tbl_monhoc WHERE tbl_monhoc.id_monHoc = '$idmh'";
                                $resultMH = $conn->query($getMH);
                                while ($rowMH = $resultMH->fetch_assoc()) {
                                    $tenMH = $rowMH["tenMonHoc"];
                                }
                            }

                            $idlh = $row["id_lopHoc"];
                            $tenLH = null;

                            if (isset($idlh)) {
                                $conn = new mysqli("localhost", "root", "", "webrade");
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                $getLH = "SELECT * FROM tbl_lophoc WHERE tbl_lophoc.id_lopHoc = '$idlh'";
                                $resultLH = $conn->query($getLH);
                                while ($rowLH = $resultLH->fetch_assoc()) {
                                    $tenLH = $rowLH["maLop"];
                                }
                            }

                            $idDT = $row["id_deThi"];
                            $slCH = null;
                            if (isset($idDT)) {
                                $conn = new mysqli("localhost", "root", "", "webrade");
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                $getCTDT = "SELECT * FROM tbl_chitietdethi WHERE tbl_chitietdethi.id_deThi = '$idDT'";
                                $resultLH = $conn->query($getCTDT);
                                $slCH = mysqli_num_rows($resultLH);
                            }

                        ?>
                            <tr>
                                <td><?php echo $row["maDe"] ?></td>
                                <td><?php echo $tenMH ?></td>
                                <td><?php echo $tenLH ?></td>
                                <td><?php echo $slCH ?></td>
                                <td class="text-center">
                                    <a href="/hotrorade/User/DetailExam/<?php echo $row["id_deThi"]?>" class="btn btn-primary"><i class="fas fa-search"></i></a>
                                    <a href="/hotrorade/User/DetailAnswer/<?php echo $row["id_deThi"]?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                    <a href="/hotrorade/User/DeleteExam/page=1/<?php echo $row["id_deThi"]?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
                </br>
                <?php
                if (isset($data["numberPages"])) {
                    for ($i = 1; $i <= $data["numberPages"]; $i++) {
                        echo "<a href = '/hotrorade/User/ShowExam/page=$i'>Trang $i </a> - ";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($data["resultMessage2"])) {
    if ($data["resultMessage2"] == true) {
        $message = "Xóa thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $message = "Xóa thất bại";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>