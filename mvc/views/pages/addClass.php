<!--Body content-->
<div class="Body">

    <div class="Content">

        <div class="Space">

        </div>
        <h1>Quản lí lớp học</h1>

        <div id="Text">


            <h2>Thêm lớp học mới</h2>


            <form action="/hotrorade/AdminPage/AddClass" method="POST">

                <div class="form-group">
                    <label for="exampleInputEmail1">Mã lớp học</label>
                    <input type="text" name="MaLopHoc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mã lớp học">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã số Giảng viên</label>
                    <input type="text" name="TenGiangVien" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mã số Giảng viên">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã Môn học</label>
                    <input type="text" name="MonHoc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mã Môn học">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Học kì</label>
                    <input type="text" name="HocKi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Học kì">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Năm học</label>
                    <input type="text" name="NamHoc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Năm học">
                </div>
                <br />
                <input class="btn btn-primary mb-2" type="submit" name="ThemLopHoc" value="Thêm" />
                <a class="btn btn-primary mb-2" href="/hotrorade/AdminPage/ShowClass/page=1" role="button">Hủy</a>
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