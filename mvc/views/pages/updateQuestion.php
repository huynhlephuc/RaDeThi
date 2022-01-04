<script src="/hotrorade/public/ckeditor/ckeditor.js"></script>
<script src="/hotrorade/public/ckfinder/ckfinder.js"></script>

<!-- BODY -->
<section class="content_box">
    <div class="container">
        <!-- Left -->
        <div class="box__left">
            <?php require_once "./mvc/views/block/sidebar.php"; ?>
        </div>
        <!-- right -->
        <div class="box__right">
            <div class="lg">
                <div class="modal__content">
                    <div class="modal__body">
                        <?php
                        while ($row = mysqli_fetch_array($data["result"])) {
                        ?>
                            <form action="/hotrorade/User/UpdateQuestion/<?php echo($row["id_cauHoi"])?>" method="post">
                                <div class="form-group">
                                    <label for="" class="text-danger">Tên câu hỏi</label>
                                    <textarea id="" cols="30" name="1" class="form-control" rows="3">
                                    <?php echo ($row["noiDung"]) ?>
                                </textarea>
                                    <script>
                                        CKEDITOR.replace('1', {
                                            filebrowserBrowseUrl: 'public/ckfinder/ckfinder.html',
                                            filebrowserUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                            filebrowserWindowWidth: '1000',
                                            filebrowserWindowHeight: '700'
                                        });
                                    </script>
                                </div>

                                <div class="form-group">
                                    <div class="select__subject">
                                        <label for="subject">Môn học:</label>
                                        <select name="monhocID" id="subject" class="form-control">
                                            <?php
                                            while ($row2 = mysqli_fetch_array($data["arrMonHoc"])) { ?>
                                                <option value="<?php echo ($row2["id_monHoc"]) ?>" <?php if ($row2["id_monHoc"] == $row["id_monHoc"]) { ?> selected="selected" <?php } ?>><?php echo ($row2["tenMonHoc"]) ?></option>
                                            <?php   }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-danger">Mức độ câu hỏi</label>
                                    <select name="mucdo" id="" class="form-control">
                                        <option value="0" <?php
                                                            if ($row["mucDo"] == 0) { ?> selected="selected" <?php   }
                                                                                                            ?>>Dễ</option>
                                        <option value="1" <?php
                                                            if ($row["mucDo"] == 1) { ?> selected="selected" <?php   }
                                                                                                            ?>>Trung bình</option>
                                        <option value="2" <?php
                                                            if ($row["mucDo"] == 3) { ?> selected="selected" <?php   }
                                                                                                            ?>>Khó</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="box_anwser">
                                        <label for="" class="text-danger">Đáp án A</label>
                                        <textarea id="" cols="30" name="01" class="form-control" rows="3">
                                        <?php echo ($row["dapAnA"]) ?>
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace('01', {
                                                filebrowserBrowseUrl: 'public/ckfinder/ckfinder.html',
                                                filebrowserUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                filebrowserWindowWidth: '1000',
                                                filebrowserWindowHeight: '700'
                                            });
                                        </script>
                                    </div>
                                    <div class="box_anwser">
                                        <label for="" class="text-danger">Đáp án B</label>
                                        <textarea id="" cols="30" name="02" class="form-control" rows="3">
                                        <?php echo ($row["dapAnB"]) ?>
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace('02', {
                                                filebrowserBrowseUrl: 'public/ckfinder/ckfinder.html',
                                                filebrowserUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                filebrowserWindowWidth: '1000',
                                                filebrowserWindowHeight: '700'
                                            });
                                        </script>
                                    </div>
                                    <div class="box_anwser">
                                        <label for="" class="text-danger">Đáp án C</label>
                                        <textarea id="" cols="30" name="03" class="form-control" rows="3">
                                        <?php echo ($row["dapAnC"]) ?>
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace('03', {
                                                filebrowserBrowseUrl: 'public/ckfinder/ckfinder.html',
                                                filebrowserUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                filebrowserWindowWidth: '1000',
                                                filebrowserWindowHeight: '700'
                                            });
                                        </script>
                                    </div>
                                    <div class="box_anwser">
                                        <label for="" class="text-danger">Đáp án D</label>
                                        <textarea id="" cols="30" name="04" class="form-control" rows="3">
                                        <?php echo ($row["dapAnD"]) ?>
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace('04', {
                                                filebrowserBrowseUrl: 'public/ckfinder/ckfinder.html',
                                                filebrowserUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                filebrowserWindowWidth: '1000',
                                                filebrowserWindowHeight: '700'
                                            });
                                        </script>
                                    </div>
                                    <div class="box_anwser">
                                        <label for="" class="text-danger">Đáp án đúng</label>
                                        <select name="dapAnDung" id="" class="form-control">
                                            <option value="A"
                                            <?php if($row["dapAnDung"] == "A"){?>
                                                selected = 'selected'
                                            <?php }?>
                                            >A</option>
                                            <option value="B"
                                            <?php if($row["dapAnDung"] == "B"){?>
                                                selected = 'selected'
                                            <?php }?>
                                            >B</option>
                                            <option value="C"
                                            <?php if($row["dapAnDung"] == "C"){?>
                                                selected = 'selected'
                                            <?php }?>
                                            >C</option>
                                            <option value="D"
                                            <?php if($row["dapAnDung"] == "D"){?>
                                                selected = 'selected'
                                            <?php }?>
                                            >D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <input type="submit" class="btn btn-success" value="Sửa câu hỏi" name="UpdateQuestion"></input>
                                    <a class="btn btn-success" href="/hotrorade/User/CreateQuestion/<?php echo $_SESSION["id"]?>">Hủy bỏ</a>
                                </div>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
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