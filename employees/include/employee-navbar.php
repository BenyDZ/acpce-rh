<div class="flex w-full shadow-md px-4">
  <div class="navbar bg-base-100">
    <div class="flex-1">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle" id="hideNavbarButton">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h7" />
        </svg>
      </div>
      <div class="breadcrumbs text-sm ms-4">
        <?php
          if($page == 'dashboard'){
            echo'<ul>';
              echo'<li><a href="../employees/leave.php">Employé(e)s</a></li>';
              echo'<li>Tableau de bord</li>';
            echo'</ul>';
          }elseif($page == 'congé'){
            echo'<ul>';
              echo'<li><a href="../employees/leave.php">Employé(e)s</a></li>';
              echo'<li>Congé</li>';
            echo'</ul>';
          }elseif($page == 'permission'){
            echo'<ul>';
              echo'<li><a href="../employees/leave.php">Employé(e)s</a></li>';
              echo'<li>Permission</li>';
            echo'</ul>';
          }else{
            echo'<ul>';
              echo'<li><a href="../leave.php">Employé(e)s</a></li>';
              echo'<li>Employés</li>';
              echo'<li><a href="../dashboard.php">Tableau de bord</a></li>';
            echo'</ul>';
          }
        ?> 
      </div>
    </div>
    <div class="flex-none">
      <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
          <div class="indicator">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span class="badge badge-sm indicator-item">8</span>
          </div>
        </div>
        <div
          tabindex="0"
          class="card card-compact dropdown-content bg-base-100 z-[1] mt-3 w-52 shadow">
          <div class="card-body">
            <span class="text-lg font-bold">8 Items</span>
            <span class="text-info">Subtotal: $999</span>
            <div class="card-actions">
              <button class="btn btn-primary btn-block">View cart</button>
            </div>
          </div>
        </div>
      </div>
      <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
          <div class="avatar placeholder">
            <div class="bg-neutral text-neutral-content w-10 rounded-full">
              <?php
                echo'<span class="text-xl">' .$_SESSION["avatar"]. '</span>';
              ?>
            </div>
          </div>
        </div>
        <ul
          tabindex="0"
          class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          <li>
            <a class="justify-between">
              Profil
              <span class="badge">New</span>
            </a>
          </li>
          <li><a href="../employees/include/logout.php">Se déconnecter</a></li>
        </ul>
      </div>
      <div class="ms-3 flex flex-col">
        <?php
          echo'<span class="font-bold">' .$_SESSION["username"]. '</span>';
          echo'<span class="font-normal">' .$_SESSION["autorisation"]. '</span>';
        ?>
      </div>
    </div>
  </div>
</div>