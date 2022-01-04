<div class="Body">

    <div class="Content">

        <div class="Space">

        </div>
        <h1>Quản lí môn học</h1>

        <div id="Text">


            <h2>Thêm môn học</h2>


            <form action="/hotrorade/AdminPage/AddSubjects" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã môn học</label>
                    <input type="text" name="MaMonHoc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên môn học">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên môn học</label>
                    <input type="text" name="TenMonHoc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên môn học">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tổng số tín chỉ</label>
                    <input type="MatKhau" name="TongTC" class="form-control" id="exampleInputPassword1" placeholder="Tổng số tín chỉ">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tính chỉ lý thuyết</label>
                    <input type="text" name="TCLyThuyet" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Số tính chỉ lý thuyết">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tính chỉ thực hành</label>
                    <input type="text" name="TCThucHanh" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Số tính chỉ thực hành">
                    
                </div>
                <br />
                <input class="btn btn-primary mb-2" type="submit" name="ThemMH" value="Thêm" />
                <a class="btn btn-primary mb-2" href="/hotrorade/AdminPage/ShowSubjects/page=1" role="button">Hủy</a>
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