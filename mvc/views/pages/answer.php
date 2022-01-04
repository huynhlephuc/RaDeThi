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
                <h4>BỘ ĐÁP ÁN</h4>
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

            $dapAnDung = null;


            if (isset($idch)) {
                $conn = new mysqli("localhost", "root", "", "webrade");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $getCH = "SELECT * FROM tbl_cauhoi WHERE tbl_cauhoi.id_cauHoi = '$idch'";
                $resultCH = $conn->query($getCH);
                while ($rowCH = $resultCH->fetch_assoc()) {
    
                    $dapAnDung = $rowCH["dapAnDung"];

                }
            }
                   
        ?>
                    <div class="question">
                        <div class="title">
                            <h4>Câu <?php echo($n)?>. </h4>
                            <span>
                            <?php echo($dapAnDung)?>
                            </span>
                        </div>
                        
                    </div>
        <?php
             $n++;
            }
        ?>
    </div>
</section>