<div class="Body">

    <div class="Content">

        <div class="Space">

        </div>
        <h1>Quản lí tài khoản</h1>

        <div id="Text">


            <h2>Cập nhật tài khoản</h2>
            <?php
            while ($row = mysqli_fetch_array($data["result"])) {

            ?>

                <form action="/hotrorade/AdminPage/EditByID/<?php echo $row['id_taiKhoan'] ?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên tài khoản</label>
                        <input type="text" name="TenTK" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User Name" value="<?php echo $row["userName"] ?>">
                        <small id="emailHelp" class="form-text text-muted">User Name không được trùng nhau.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật khẩu</label>
                        <input type="MatKhau" name="MatKhau" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $row["passWord"] ?>">
                        <small id="emailHelp" class="form-text text-muted">Pasword không được có kí tự đặc biệt.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên người dùng</label>
                        <input type="text" name="TenUser" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên người dùng" value="<?php echo $row["tenUser"] ?>">
                        <small id="emailHelp" class="form-text text-muted">Tối đa có 50 kí tự.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Khoa</label>
                        <select name="Khoa" class="form-control" id="khoaFormUpdate">
                            <option value="">--Chọn Khoa--</option>
                            <?php
                            while ($rowKhoa = mysqli_fetch_array($data["arrKhoa"])) { ?>
                                <option value="<?php echo $rowKhoa["id_khoa"] ?>" <?php
                                                                                    if ($row['id_khoa'] == $rowKhoa["id_khoa"]) { ?> selected='selected' <?php }
                                                                                                                                                            ?>><?php echo $rowKhoa["tenKhoa"] ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <?php
                        if(isset($data["arrBoMon"])){
                            while ($rowBoMon = mysqli_fetch_array($data["arrBoMon"])) {
                    
                    ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bộ môn</label>
                        
                            <select name="BoMon" class="form-control" id="boMonFormUpdate">                               
                                <option value="" ><?php echo $rowBoMon["tenBoMon"] ?></option>
                            </select>
                        
                    </div>
                    <?php 
                        }
                    }
                    ?>
                    <br />
                    <input class="btn btn-primary mb-2" type="submit" name="SuaTK" value="Cập nhật" />
                    <a class="btn btn-primary mb-2" href="/hotrorade/AdminPage/Show/page=1" role="button">Hủy</a>
                </form>
            <?php
            }
            ?>
        </div>
        <?php
        if (isset($data["resultEdit"])) {
            if ($data["resultEdit"] == true) {
                $message = "Cập nhật thành công";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else {
                $message = "Cập nhật thất bại";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        ?>