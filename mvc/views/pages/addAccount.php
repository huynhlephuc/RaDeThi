<div class="Body">

    <div class="Content">

        <div class="Space">

        </div>
        <h1>Quản lí tài khoản</h1>

        <div id="Text">


            <h2>Thêm tài khoản</h2>


            <form action="/hotrorade/AdminPage/Add" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên tài khoản</label>
                    <input type="text" name="TenTK" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User Name">
                    <small id="emailHelp" class="form-text text-muted">User Name không được trùng nhau.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="MatKhau" name="MatKhau" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <small id="emailHelp" class="form-text text-muted">Pasword không được có kí tự đặc biệt.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên người dùng</label>
                    <input type="text" name="TenUser" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên người dùng">
                    <small id="emailHelp" class="form-text text-muted">Tối đa có 50 kí tự.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Khoa</label>
                    <select name="Khoa" class="form-control" id="khoaFormAdd">
                        <option value="">--Chọn Khoa--</option>
                        <?php
                        while ($row = mysqli_fetch_array($data["arrKhoa"])) { ?>
                            <option value="<?php echo $row["id_khoa"] ?>"><?php echo $row["tenKhoa"] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bộ môn</label>
                    <select name="BoMon" class="form-control" id="boMonFormAdd">
                        <option value="">--Chưa chọn Khoa--</option>
                    </select>
                </div>
                <br />
                <input class="btn btn-primary mb-2" type="submit" name="ThemTK" value="Thêm" />
                <a class="btn btn-primary mb-2" href="/hotrorade/AdminPage/Show/page=1" role="button">Hủy</a>
            </form>
        </div>

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