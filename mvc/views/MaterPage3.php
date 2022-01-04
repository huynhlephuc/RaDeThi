<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/hotrorade/public/css/style.css">
    <title>WEB HO TRO RA DE</title>

</head>
<body>

    <?php
        require_once "./mvc/views/block/header.php";
        require_once "./mvc/views/pages/" . $data["page"] . ".php";
        require_once "./mvc/views/block/footer.php";
    ?>

<script src="https://kit.fontawesome.com/03bca92048.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="/hotrorade/public/js/getClass.js"></script>
<script src="/hotrorade/public/js/script.js"></script>


</body>
</html>