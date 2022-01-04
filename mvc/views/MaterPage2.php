<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="/hotrorade/public/css/adminpage.css">
    <title>Admin Page</title>

  </head>
  <body>
  <?php
        require_once "./mvc/views/block/adminHeader.php";
        require_once "./mvc/views/pages/" . $data["page"] . ".php";
  ?>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="/hotrorade/public/js/getBoMon.js"></script>
  </body>
  </html>

