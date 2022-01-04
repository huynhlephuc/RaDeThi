<div class="Body">

    <div class="Content">

        <div class="Space">

        </div>
        <h1>Quản lí tài khoản</h1>

        <div id="Text">
            <hr>


            <a class="btn btn-primary" href="/hotrorade/AdminPage/Add" role="button"> + Thêm tài khoản mới</a>

            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">Tên tài khoản</th>
                        <th scope="col">Mật khẩu</th>
                        <th scope="col">Tên người dùng</th>
                        <th scope="col">Khoa</th>
                        <th scope="col">Bộ môn</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($row = mysqli_fetch_array($data["arrAccounts"])){
                        $tenTaiKhoan = $row["userName"];
                        $matKhau =  $row["passWord"];
                        $tenNguoiDung = $row["tenUser"];
                        $idKhoa = $row["id_khoa"];
                        $idBoMon = $row["id_boMon"];
                        $id_taiKhoan = $row["id_taiKhoan"];
                        $tenKhoa = "";
                        $tenBoMon = "";

                        // Code thuần hơi ngu cần chuyển sang MVC
                        if(isset($idKhoa) && isset($idBoMon)){
                            $conn = new mysqli("localhost", "root", "","webrade");
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $getKhoa="SELECT tbl_khoa.tenKhoa FROM tbl_khoa JOIN tbl_taikhoan
                            ON  tbl_khoa.id_khoa = tbl_taikhoan.id_khoa
                            WHERE tbl_taikhoan.id_khoa = '$idKhoa' ";
                            $resultKhoa=$conn->query($getKhoa);
                            while($rowKhoa = $resultKhoa->fetch_assoc()){
                                $tenKhoa = $rowKhoa["tenKhoa"];
                            }
                            $getBoMon="SELECT tbl_bomon.tenBoMon FROM tbl_bomon JOIN tbl_taikhoan
                            ON  tbl_bomon.id_boMon = tbl_taikhoan.id_boMon
                            WHERE tbl_taikhoan.id_boMon = '$idBoMon' ";
                            $resultBoMon=$conn->query($getBoMon);
                            while($rowBoMon = $resultBoMon->fetch_assoc()){
                                $tenBoMon = $rowBoMon["tenBoMon"];
                            }
                        }
                        ?>

                    <tr>
                        <th scope="row"><?php echo $tenTaiKhoan?></th>
                        <td><?php echo $matKhau?></td>
                        <td><?php echo $tenNguoiDung?></td>
                        <td><?php echo $tenKhoa?></td>
                        <td><?php echo $tenBoMon?></td>
                        <td>
                            <a href="/hotrorade/AdminPage/ShowByID/<?php echo $id_taiKhoan?>" class="btn btn-info">Sửa</a>
                            <a href="/hotrorade/AdminPage/DeleteByID/<?php echo $id_taiKhoan?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                    
                </tbody>
               
            </table>
            <div style="text-align: right; margin-top: 100px; padding-right: 50px">
            <?php
                if (isset($data["numberPages"])) {
                    for ($i = 1; $i <= $data["numberPages"]; $i++) {
                        echo "<a href = '/hotrorade/AdminPage/Show/page=$i'>Trang $i </a> - ";
                    }
                }

            ?>
                </div>
            

            <!---->
            <div style="width:80%;margin:0 auto;">



            </div>

        </div>


    </div>
</div>
</div>

<?php
    if (isset($data["resultMessage"])) {
        if ($data["resultMessage"] == true) {
            $message = "Xóa thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            
        } else {
            $message = "Xóa thất bại";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } ?>

        <script>
              location.href = '/hotrorade/AdminPage/Show/page=1';
        </script>
        <?php
    }

    ?>

