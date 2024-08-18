<?php
    session_start();
    error_reporting(0);
    include('../include/dbconn.php');
    if(strlen($_SESSION['alogin'])==0){   
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
        $page='dashboard';
        include 'include/admin-sidebar.php';
      ?>
    </div>

    <div class="w-full ">
      <div class="flex flex-col w-full h-full">
        <?php
          $page='dashboard';
          include 'include/admin-navbar.php';
        ?>

        <div class="flex w-full h-full bg-gray-100">
  
        </div>
      </div>
    </div>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php } ?>