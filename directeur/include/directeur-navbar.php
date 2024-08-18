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
              echo'<li><a href="dashboard.php">ACPCE</a></li>';
              echo'<li>Tableau de bord</li>';
            echo'</ul>';
          }elseif($page == 'historique-de-congé'){
            echo'<ul>';
              echo'<li><a href="dashboard.php">ACPCE</a></li>';
              echo'<li>Congé</li>';
              echo'<li>Demandes de congé</li>';
            echo'</ul>';
          }elseif($page == 'demande-de-congé'){
            echo'<ul>';
              echo'<li><a href="dashboard.php">ACPCE</a></li>';
              echo'<li>Congé</li>';
              echo'<li>Demandes de congé</li>';
            echo'</ul>';
          }
          elseif($page == 'permission'){
            echo'<ul>';
              echo'<li><a href="dashboard.php">ACPCE</a></li>';
              echo'<li>Permission</li>';
            echo'</ul>';
          }elseif($page == 'leave-details'){
            echo'<ul>';
              echo'<li><a href="dashboard.php">ACPCE</a></li>';
              echo'<li>Congé</li>';
              echo'<li>Informations sur la demande de congé</li>';
            echo'</ul>';
          }
          else{
            echo'<ul>';
              echo'<li><a href="dashboard.php">ACPCE</a></li>';
              echo'<li>Employés</li>';
            echo'</ul>';
          }
        ?> 
      </div>
    </div>
    <div class="flex-none">
      
      <?php
        include 'notifications.php';
      ?>

      <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
          <div class="avatar placeholder">
            <div class="bg-neutral text-neutral-content w-10 rounded-full">
              <?php
                echo'<span class="text-xl">' .$_SESSION["avatar"]. '</span>';
              ?>
              <!-- <span class="text-xl">BD</span> -->
            </div>
          </div>
        </div>
        <ul
          tabindex="0"
          class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          <li>
            <a class="justify-between">
              Profil
            </a>
          </li>
          <li><a href="../dg/include/logout.php">Se déconnecter</a></li>
        </ul>
      </div>
      <div class="ms-3">
        <?php
          echo'<span>' .$_SESSION["username"]. '</span>';
        ?>
      </div>
    </div>
  </div>
</div>