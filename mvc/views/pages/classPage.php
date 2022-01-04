<div class="Body">
       
      <div class="Content">
        <div class="Space">

        </div>
        
        
        <h1>Quản lí lớp học</h1>
        <hr>
        <div id="Text">
          
          
        
          <a class="btn btn-primary" href="/hotrorade/AdminPage/AddClass" role="button"> + Thêm lớp học mới</a>

          <table class="table">
         
          <thead>
            
            <tr>
              <th scope="col">Mã lớp</th>
              <th scope="col">Tên giảng viên</th>
              <th scope="col">Tên môn học</th>
              <th scope="col">Học kì</th>
              <th scope="col">Năm</th>
              <th scope="col">Thao tác</th>
            </tr>
          </thead>
          
          <tbody>
          <?php 
                while($row = mysqli_fetch_array($data["arrClass"])){    

                    //Code thuan can chinh lai
                    $id_lopHoc = $row["id_lopHoc"];
                    $tenUser = "";
                    $tenMonHoc = "";

                    if(isset($row["id_taiKhoan"]) && isset($row["id_monHoc"])){
                        $conn = new mysqli("localhost", "root", "","webrade");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $getTK="SELECT tbl_taikhoan.tenUser FROM tbl_taikhoan JOIN tbl_lophoc
                        ON  tbl_lophoc.id_taiKhoan = tbl_taikhoan.id_taiKhoan
                        WHERE tbl_lophoc.id_lopHoc = '$id_lopHoc' ";
                        $resultTK=$conn->query($getTK);
                        while($rowTK = $resultTK->fetch_assoc()){
                            $tenUser = $rowTK["tenUser"];
                        }
                        $getBoMon="SELECT tbl_monhoc.tenMonHoc FROM tbl_monhoc JOIN tbl_lophoc
                        ON  tbl_monhoc.id_monHoc = tbl_lophoc.id_monHoc
                        WHERE tbl_lophoc.id_lopHoc = '$id_lopHoc' ";
                        $resultMH=$conn->query($getBoMon);
                        while($rowMH = $resultMH->fetch_assoc()){
                            $tenMonHoc = $rowMH["tenMonHoc"];
                        }
                    }
                
            ?>
            <tr>
              <th scope="row"><?php echo $row["maLop"]?></th>
              <td><?php echo $tenUser?></td>
              <td><?php echo $tenMonHoc?></td>
              <td><?php echo $row["hocKy"]?></td>
              <td><?php echo $row["namHoc"]?></td>
              <td>
                <a href="/hotrorade/AdminPage/ShowClassById/<?php echo($row["id_lopHoc"])?>" class="btn btn-info">Sửa</a>
                <a href="/hotrorade/AdminPage/DeleteClassById/<?php echo($row["id_lopHoc"])?>" class="btn btn-danger">Xóa</a>
              </td>
              
            </tr>
            <?php } ?>
                    
          </tbody>
          </table>

          <div style="text-align: right; margin-top: 100px; padding-right: 50px">
            <?php
                if (isset($data["numberPages"])) {
                    for ($i = 1; $i <= $data["numberPages"]; $i++) {
                        echo "<a href = '/hotrorade/AdminPage/ShowClass/page=$i'>Trang $i </a> - ";
                    }
                }
             ?>
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
              location.href = '/hotrorade/AdminPage/ShowClass/page=1';
        </script>
        <?php
    }

    ?>