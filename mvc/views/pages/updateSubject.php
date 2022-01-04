<div class="Body">

    <div class="Content">

        <div class="Space">

        </div>
        <h1>Quản lí môn học</h1>

        <div id="Text">


            <h2>Cập nhật môn học</h2>
            <!--php them -->

            <?php
            while ($row = mysqli_fetch_array($data["result"])) {

            ?>
                <form action="/hotrorade/AdminPage/EditSubjectByID/<?php echo $row['id_monHoc'] ?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã môn học</label>
                        <input type="MatKhau" name="MaMonHoc" class="form-control" id="exampleInputPassword1" value="<?php echo $row["maMonHoc"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tên Môn học</label>
                        <input type="MatKhau" name="TenMonHoc" class="form-control" id="exampleInputPassword1" value="<?php echo $row["tenMonHoc"]; ?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tổng số tín chỉ</label>
                        <input type="text" name="TongTC" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["tongTC"]; ?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số tín chỉ lý thuyết</label>
                        <input type="text" name="TCLyThuyet" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["tcLyThuyet"]; ?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số tín chỉ thực hành</label>
                        <input type="text" name="TCThucHanh" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["tcThucHanh"]; ?>">

                    </div>

                    <br />

                    <input class="btn btn-primary mb-2" type="submit" name="CapNhatMonHoc" value="Cập nhật" />
                    <a class="btn btn-primary mb-2" href="/hotrorade/AdminPage/ShowSubjects/page=1" role="button">Hủy</a>

                </form>
            <?php } ?>



        </div>

        <?php
        if (isset($data["resultMessage"])) {
            if ($data["resultMessage"] == true) {
                $message = "Cập nhật thành công";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else {
                $message = "Cập nhật thất bại";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        ?>