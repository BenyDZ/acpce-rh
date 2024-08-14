<div class="h-screen flex flex-col space-y-5 bg-base-200 transition-all duration-200" data-theme="dim" id="sidebar">
  <ul class="menu bg-base-200 px-4">
    <li>
      <a class="" href="../employees/dashboard.php">
        <div class="avatar">
          <div class="w-10 rounded">
            <img src="../assets/img/logo1.png" />
          </div>
        </div>
        ACPCE
      </a>
    </li>
    
  </ul>

  <ul class="menu bg-base-200 space-y-3 px-4">
    <li>
      <a class="<?php if($page=='congé') {echo 'active';} ?>" href="../employees/leave.php">
        <i class="lni lni-exit lni-xxl"></i>
        Congé
      </a>
    </li>
    <li>
      <a class="<?php if($page=='permission') {echo 'active';} ?>" href="../employees/permission.php">
        <i class="lni lni-hand lni-xxl"></i>
        Permission
      </a>
    </li>
  </ul>
</div>