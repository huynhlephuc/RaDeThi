
    <!--Body content-->
    <div class="Body">
    
      <div class="Content">
        
        <div class="Space">

        </div>
        <h1>Quản lí lớp học</h1>
        
        <div id="Text">
          
        
        <h2>Cập nhật lớp học</h2> 

        <?php 
            while($row = mysqli_fetch_array($data["result"])){            
        ?>
        
        <form action="/hotrorade/AdminPage/EditClassByID/<?php echo($row["id_lopHoc"])?>" method="POST">

                <div class="form-group">
                    <label for="exampleInputEmail1">Mã lớp học</label>
                    <input type="text" name="MaLopHoc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mã lớp học"
                        value="<?php echo($row["maLop"]) ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã số Giảng viên</label>
                    <input type="text" name="TenGiangVien" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mã số Giảng viên"
                        value="<?php echo($row["id_taiKhoan"]) ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã Môn học</label>
                    <input type="text" name="MonHoc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mã Môn học"
                        value="<?php echo($data["maMonHoc"])?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Học kì</label>
                    <input type="text" name="HocKi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Học kì"
                        value="<?php echo($row["hocKy"]) ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Năm học</label>
                    <input type="text" name="NamHoc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Năm học"
                        value="<?php echo($row["namHoc"]) ?>"
                    >
                </div>
                <br />
                <input class="btn btn-primary mb-2" type="submit" name="CapNhatLopHoc" value="Cập nhật" />
                <a class="btn btn-primary mb-2" href="/hotrorade/AdminPage/ShowClass/page=1" role="button">Hủy</a>
            </form>
        
        <?php
            }
        ?>
        
    
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
        