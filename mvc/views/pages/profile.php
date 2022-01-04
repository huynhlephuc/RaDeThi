<link rel="stylesheet" href="/hotrorade/public/css/profile.css">
    <!-- BODY -->
    <section class="content_box">
        <div class="container">
            <!-- Left -->
            <div class="box__left">
                <?php require_once "./mvc/views/block/sidebar.php"; ?>
            </div>
            <!-- right -->
            <div class="box__right">
                <div class="profile">
                <?php
                    while($row = mysqli_fetch_array($data["result"])){
                ?>
                    <form action="/hotrorade/User/UpdateInfo/<?php echo($row["id_taiKhoan"])?>" method="post">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Họ tên</label>
                                    <input type="text" class="form-control" name="hoTen"
                                        value="<?php echo($row["tenUser"])?>"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email"
                                    value="<?php echo($row["email"])?>"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" class="form-control" name="diaChi"
                                    value="<?php echo($row["diaChi"])?>"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control" name="sdt"
                                    value="<?php echo($row["soDienThoai"])?>"
                                    >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="image_box">
                                    <img src="images/user.png" alt="" id="preview">
                                </div>
                                <div class="btn__chooseImage">
                                    <label for="image">Chọn ảnh đại diện</label>
                                    <input type="file" name="" id="image">
                                </div>
                            </div>
                            <div class="col-12 text-left">
                                <input class="btn btn-primary" type="submit" name="CapNhatTK" value="Cập nhật"></input>
                            </div>
                        </div>
                    </form>
                <?php 
                    }
                ?>
                </div>
            </div>
        </div>
    </section>

<script>
    let image = document.querySelector('#image');
    image.addEventListener('change',(e)=>{
        let files = e.target.files[0];
        if (files) {
            let reader = new FileReader();
            reader.onload = function(event){
                document.querySelector('#preview').setAttribute('src',event.target.result)
            }
            reader.readAsDataURL(files);
        }
        else{
            document.querySelector('#preview').setAttribute('src','/hotrorade/public/img/user.png')
        }
    });
</script>

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