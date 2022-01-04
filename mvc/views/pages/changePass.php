<section class="content_box">
        <div class="container">
            <!-- Left -->
            <div class="box__left">
                <?php require_once "./mvc/views/block/sidebar.php"; ?>
            </div>
            <!-- right -->
            <div class="box__right">
                <div class="profile">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Mật khẩu cũ</label>
                                    <input type="password" class="form-control" name="passCu">
                                </div>
                                <div class="form-group">
                                    <label for="">Mật khẩu mới</label>
                                    <input type="password" class="form-control" name="passMoi">
                                </div>
                            </div>
                            <div class="col-12 text-left">
                                <input class="btn btn-primary" name="DoiPass" type="submit" value="Cập nhật"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

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