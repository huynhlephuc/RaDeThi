<section class="content_box">
    <div class="container">
        <!-- Left -->
        <div class="box__left">
            <?php require_once "./mvc/views/block/sidebar.php"; ?>
        </div>
        <!-- right -->
        <div class="box__right">
            <form action="" method="post">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Chọn môn học</label>
                            <select name="monThi" class="form-control" id="monFormCreateExam">
                                <option value="">-- Chọn môn --</option>
                                <?php
                                    while($row = mysqli_fetch_array($data["arrSubject"])){ ?>
                                        <option value="<?php echo($row["id_monHoc"])?>"><?php echo($row["tenMonHoc"])?></option>
                                 <?php   }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Số lượng dễ</label>
                            <input type="number" name="de" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Chọn lớp</label>
                            <select name="lopThi" class="form-control" id="lopFormCreateExam">
                                <option value="">-- Chưa chọn môn --</option>
                            </select>
                        </div>
                    </div>        
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Số câu hỏi trung bình</label>
                            <input type="number" name="trungBinh" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Ngày thi</label>
                            <input type="date" name="ngayThi" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Số câu hỏi khó</label>
                            <input type="number" name="kho" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Tổng số câu hỏi</label>
                            <input type="number" name="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div id="create_exam">
                            <div class="form-group" id="show_exam">
                                <label for="">Mã đề</label>
                                <input type="text" name="maDe" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="code_exam">Tự sinh mã đề</label>
                            <input type="checkbox" onchange="checkboxed()" value="1" name="exam_code_checked" id="code_exam">
                        </div> -->
                    </div>
                    <div class="col-12">
                        <input type="submit" name="createExam" value="Thêm mới" class="btn btn-primary"></input>
                        <button class="btn btn-danger" type="reset">Làm mới </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    let checked_exam = document.getElementById('code_exam');

    function checkboxed() {
        if (checked_exam.checked) {
            document.querySelector('#show_exam').remove();
        } else {
            let create_exam = document.querySelector('#create_exam');
            let form_group = document.createElement('div');
            form_group.setAttribute('class', 'form-group');
            form_group.setAttribute('id', 'show_exam');
            let input = document.createElement('input');
            let label = document.createElement('label');
            label.innerText = 'Mã đề';
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'form-control');
            input.setAttribute('name', 'exam_code_text');
            create_exam.appendChild(form_group);
            form_group.appendChild(label);
            form_group.appendChild(input);
        }
    }
</script>

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