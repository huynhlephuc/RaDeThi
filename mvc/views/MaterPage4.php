<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/hotrorade/public/css/style2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d7d59571b2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>WEB HO TRO RA DE</title>

</head>
<body>

    <?php
        require_once "./mvc/views/block/header.php";
        require_once "./mvc/views/pages/" . $data["page"] . ".php";
        require_once "./mvc/views/block/footer.php";
    ?>

<script src="https://kit.fontawesome.com/03bca92048.js" crossorigin="anonymous"></script>
<script src="/hotrorade/public/js/script.js"></script>
</body>
</html>