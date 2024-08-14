<?php
    session_start();
    error_reporting(0);
    include('../include/dbconn.php');
    if(strlen($_SESSION['emplogin'])==0){   
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
</head>
<body>
  <div class="flex">
    <div class="flex-none">
      <?php
        $page='permission';
        include 'include/employee-sidebar.php';
      ?>
    </div>

    <div class="w-full">
      <div class="flex">
        <?php
          $page='permission';
          include 'include/employee-navbar.php';
        ?>
      </div>

      <div class="flex">
        
      </div>
    </div>
  </div>
</body>
</html>

<?php } ?>