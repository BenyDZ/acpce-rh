<?php
  session_start();
  error_reporting(0);
  include('../include/dbconn.php');
  if(strlen($_SESSION['dglogin'])==0){   
    header('location:../index.php');
  } else {
?>

<!doctype html>
<html data-theme="emerald" class="w-screen h-screen">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../assets/css/output.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/icons.css">
  <link rel="stylesheet" href="../assets/css/datatables.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
  <div class="flex">
    <div class="flex-none">
      <?php
        $page='demande-de-congé';
        include 'include/dg-sidebar.php';
      ?>
    </div>

    <div class="w-full">
      <div class="flex flex-col">
        <?php
          $page='demande-de-congé';
          include 'include/dg-navbar.php';
        ?>

        <div class="flex w-full h-full p-5">

          <div class="flex flex-col w-full space-y-3">
            <h2 class="font-bold">DEMANDES DE CONGE</h2>
            <?php
              include "include/leave-requests-history.php";
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/script.js"></script>
  <script src="../assets/js/datatables.js"></script>
</body>
</html>

<?php } ?>