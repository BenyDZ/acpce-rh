<!doctype html>
<html data-theme="emerald" class="w-screen h-screen">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/output.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/icons.css">
</head>
<body>
  <div class="flex">
    <div class="flex-none">
      <?php
        $page='dashboard';
        include 'include/rh-sidebar.php';
      ?>
    </div>

    <div class="w-full">
      <div class="flex">
        <?php
          $page='dashboard';
          include 'include/rh-navbar.php';
        ?>
      </div>
    </div>
  </div>
</body>
</html>