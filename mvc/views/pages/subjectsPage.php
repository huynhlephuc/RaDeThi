<div class="Body">
      <div class="Content">
        
        <div class="Space">

        </div>
        <h1>Quản lí môn học</h1>
        <hr>
        <div id="Text">
          
          
        
          <a class="btn btn-primary" href="/hotrorade/AdminPage/AddSubjects" role="button"> + Thêm môn học mới</a>

          <table class="table">
          
          <thead>
            <tr>
              <th scope="col">Mã môn học</th>
              <th scope="col">Tên môn học</th>
              <th scope="col">Tổng số tính chỉ</th>
              <th scope="col">Số tín chỉ lý thuyết</th>
              <th scope="col">Số tín chỉ thực hành</th>
              <th scope="col">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                while($row = mysqli_fetch_array($data["arrSubjects"])){
            ?>
            <tr>
              <th scope="row"><?php echo $row["maMonHoc"]?></th>
              <td><?php echo $row["tenMonHoc"]?></td>
              <td><?php echo $row["tongTC"]?></td>
              <td><?php echo $row["tcLyThuyet"]?></td>
              <td><?php echo $row["tcThucHanh"]?></td>
              <td>
                <a href="/hotrorade/AdminPage/ShowSubjectByID/<?php echo $row["id_monHoc"]?>" class="btn btn-info">Sửa</a>
                <a href="/hotrorade/AdminPage/DeleteSubjectByID/<?php echo $row["id_monHoc"]?>" class="btn btn-danger">Xóa</a>
                
              </td>
              
            </tr>
            <?php } ?>
        
          
          </tbody>
          </table>
                
          <div style="text-align: right; margin-top: 100px; padding-right: 50px">
            <?php
                if (isset($data["numberPages"])) {
                    for ($i = 1; $i <= $data["numberPages"]; $i++) {
                        echo "<a href = '/hotrorade/AdminPage/ShowSubjects/page=$i'>Trang $i </a> - ";
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
              location.href = '/hotrorade/AdminPage/ShowSubjects/page=1';
        </script>
        <?php
    }

    ?>
    
  
  
    
  
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>