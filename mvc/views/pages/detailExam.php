<section class="section_head">
    <div class="container">
        <div class="contents one">
            <div class="head">
                <H3>TRƯỜNG ĐẠI HỌC KỸ THUẬT CÔNG NGHỆ CẦN THƠ</H3>
                <span>*</span>
                <span>*</span>
                <span>*</span>
                <span>*</span>
                <span>*</span>
            </div>
            <div>
                <h4>KỲ THI CUỐI HỌC KỲ 1</h4>
                <h4>NĂM HỌC 2021-2022</h4>
            </div>
        </div>
        <hr class="head">
        <?php
        while ($rowDT = mysqli_fetch_array($data["deThi"])) {
        ?>
            <div class="contents two">
                <div class="title">
                    <h4>Môn thi: <?php echo ($data["monHoc"]) ?></h4>
                </div>
                <div class="times">
                    <p>Lớp: <span><?php echo ($data["lopHoc"]) ?></span></p>
                </div>
                <div class="times">
                    <p>Mã Đề: <span><?php echo ($rowDT["maDe"]) ?></span></p>
                </div>
                <div class="times">
                    <p>Ngày thi: <span><?php echo ($rowDT["ngayThi"]) ?></span></p>
                </div>
            </div>
        <?php
        }
        ?>
        <hr class="footer">
    </div>
</section>
<section class="question">
    <div class="container">

        <?php
        $n = 1;
        while ($row = mysqli_fetch_array($data["arrQuestion"])) {
            $idch = $row["id_cauHoi"];

            $noiDung = null;
            $dapAnA = null;
            $dapAnB = null;
            $dapAnC = null;
            $dapAnD = null;


            if (isset($idch)) {
                $conn = new mysqli("localhost", "root", "", "webrade");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $getCH = "SELECT * FROM tbl_cauhoi WHERE tbl_cauhoi.id_cauHoi = '$idch'";
                $resultCH = $conn->query($getCH);
                while ($rowCH = $resultCH->fetch_assoc()) {
                    $noiDung = $rowCH["noiDung"];
                    $dapAnA = $rowCH["dapAnA"];
                    $dapAnB = $rowCH["dapAnB"];
                    $dapAnC = $rowCH["dapAnC"];
                    $dapAnD = $rowCH["dapAnD"];

                }
            }
                   
        ?>
                    <div class="question">
                        <div class="title">
                            <h4>Câu <?php echo($n)?>. </h4>
                            <span>
                            <?php echo($noiDung)?>
                            </span>
                        </div>
                        <div class="anwser">
                            <div class="ex">
                                <div>
                                    <h5>A.</h5>
                                    <span><?php echo($dapAnA)?></span>
                                </div>
                            </div>
                            <div class="ex">
                                <div>
                                    <h5>B.</h5>
                                    <span><?php echo($dapAnB)?></span>
                                </div>
                            </div>
                            <div class="ex">
                                <div>
                                    <h5>C.</h5>
                                    <span><?php echo($dapAnC)?></span>
                                </div>
                            </div>
                            <div class="ex">
                                <div>
                                    <h5>D.</h5>
                                    <span><?php echo($dapAnD)?></span>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
             $n++;
            }
        ?>
    </div>
</section>