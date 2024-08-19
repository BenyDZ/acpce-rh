<div class="h-screen flex flex-col space-y-5 bg-base-200" data-theme="dim" id="sidebar">
  <ul class="menu bg-base-200 px-4">
    <li>
      <a class="" href="../admin/dashboard.php">
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
      <a class="<?php if($page=='dashboard') {echo 'active';} ?>" href="../directeur/dashboard.php">
        <ion-icon name="grid-outline" size="small"></ion-icon>
        Tableau de bord
      </a>
    </li>
    <li>
      <a class="<?php if($page=='département') {echo 'active';} ?>" href="../directeur/dashboard.php">
        <ion-icon name="business-outline" size="small"></ion-icon>
        Département
      </a>
    </li>
    <li>
      <details>
        <summary>
          <ion-icon name="people-outline" size="small"></ion-icon>
          Employés
        </summary>
        <ul>
          <li><a class="<?php if($page=='') {echo 'active';} ?>" href="../directeur/leave-requests.php">Profil</a></li>
          <li><a class="<?php if($page=='') {echo 'active';} ?>" href="../directeur/leave-history.php">Liste des employés</a></li>
        </ul>
      </details>
    </li>
    <li>
      <details>
        <summary>
          <ion-icon name="log-out-outline" size="small"></ion-icon>
          Congé
        </summary>
        <ul>
          <li><a class="<?php if($page=='demande-de-congé') {echo 'active';} ?>" href="../directeur/leave-requests.php">Demandes de congé</a></li>
          <li><a class="<?php if($page=='historique-de-congé') {echo 'active';} ?>" href="../directeur/leave-history.php">Historique des demandes</a></li>
        </ul>
      </details>
    </li>
    <li>
      <a class="<?php if($page=='permission') {echo 'active';} ?>" href="../directeur/dashboard.php">
        <ion-icon name="hand-left-outline" size="small"></ion-icon>
        Permission
      </a>
    </li>
  </ul>
</div>