<section class="content_box">
    <div class="container">
        <!-- Left -->
        <div class="box__left">
            <div class="list__items">
                <ul>
                    <?php require_once "./mvc/views/block/sidebar.php"; ?>
                </ul>
            </div>
        </div>
        <div class="box__right">

            <div class="layout1">
                <h3>Tìm kiếm câu hỏi</h3>
                <div class="form__container">
                    <form action="/hotrorade/User/SearchQuestion/page=1" class="form" method="POST">
                        <div class="form__row">
                            <label class="form__lable">Nhập từ khóa</label>
                            <input class="form__input" type="text" id="" name="key" placeholder="--- Tìm theo nội dung câu hỏi ---" style="text-align: center">
                        </div>
                        <div class="form__row">
                            <label class="form__lable">Môn học:</label>
                            <select name="monhocID" id="subject" class="form-control">
                                <option value="">--- Tìm theo môn học ---</option>
                                <?php
                                if (isset($data["arrMonHoc2"])) {
                                    while ($row = mysqli_fetch_array($data["arrMonHoc2"])) {
                                ?>
                                        <option value="<?php echo $row["id_monHoc"] ?>"><?php echo $row["tenMonHoc"] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>


                        <button type="submit" name="search-btn">Tìm kiếm</button>
                    </form>
                </div>

                <h3>Có <?php if (isset($data["totalRows"])) {
                            echo ($data["totalRows"]);
                        } ?> câu hỏi được tìm thấy</h3>
                <!-- table -->
                <div class="box__table" style="text-align: center;">


                    <table>
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Môn học</th>

                                <th class="text-center">Tên câu hỏi</th>
                                <th class="text-center">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($data["arrCauHoiAll"])) {
                                $i = 1;
                                while ($row = mysqli_fetch_array($data["arrCauHoiAll"])) {

                                    $idmh = $row["id_monHoc"];
                                    $tenMH = null;

                                    if (isset($idmh)) {
                                        $conn = new mysqli("localhost", "root", "", "webrade");
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $getMH = "SELECT * FROM tbl_monhoc WHERE tbl_monhoc.id_monHoc = '$idmh'";
                                        $resultMH = $conn->query($getMH);
                                        while ($rowMH = $resultMH->fetch_assoc()) {
                                            $tenMH = $rowMH["tenMonHoc"];
                                        }
                                    }
                            ?>


                                    <tr>
                                        <td><?php echo $i + ($data['page_st'] - 1) * $data['numberRows'] ?></td>
                                        <td><?php echo ($tenMH) ?></td>

                                        <td><?php echo ($row["noiDung"]) ?></td>
                                        <td class="text-center">
                                            <a id="update_question" href="/hotrorade/User/ShowQuestion/<?php echo ($row["id_cauHoi"]) ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="/hotrorade/User/DeleteQuestion/<?php echo ($row["id_cauHoi"]) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                    $i++;
                                }
                            } ?>
                        </tbody>
                    </table>
                    </br>

                    <?php
                    if (isset($data["numberPages"])) {
                        for ($i = 1; $i <= $data["numberPages"]; $i++) {
                            echo "<a href = '/hotrorade/User/SearchQuestionBreak/page=$i/key=".$data["key"]."/subject=".$data["subject"]."'>Trang $i </a> - ";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>