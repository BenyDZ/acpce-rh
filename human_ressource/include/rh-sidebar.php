<div class="h-screen flex flex-col space-y-5 bg-base-200" data-theme="dim" id="sidebar">
  <ul class="menu bg-base-200 px-4">
    <li>
      <a class="" href="../human_ressource/dashboard.php">
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
      <a class="<?php if($page=='dashboard') {echo 'active';} ?>" href="../human_ressource/dashboard.php">
        <i class="lni lni-home lni-xxl"></i>
        Tableau de bord
      </a>
    </li>
    <li>
      <a class="<?php if($page=='congé') {echo 'active';} ?>" href="../human_ressource/leave.php">
        <i class="lni lni-exit lni-xxl"></i>
        Congé
      </a>
    </li>
    <li>
      <a>
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
            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        Permission
      </a>
    </li>
    <li>
      <a>
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
            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        Employés
      </a>
    </li>
  </ul>
</div>