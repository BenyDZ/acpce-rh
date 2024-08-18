<?php
  include('include/dbconn.php');
  try{
    $eid=$_SESSION['eid'];
    $sql = "SELECT IdCongé, FromDate, ToDate, PostDate, Statuts, DGResponse, RHResponse, DGSignature, IsRead, IdEmployé from Congé where DGResponse='Approuvé' AND RHResponse=0";
    $query = $dbh -> prepare($sql);
    // $query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $notifNumber=$query->rowCount();
    $cnt=1;
  }
  catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  
?>

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
      <span class="badge badge-sm indicator-item"><?php echo htmlentities($notifNumber);?></span>
    </div>
  </div>
  <div class="stats stats-vertical shadow dropdown-content z-[1] mt-10" tabindex="0">
    <div class="stat" data-theme="dim">
      <div class="text-nowrap text-md">Vous avez <?php echo htmlentities($notifNumber);?> notification(s) non-lue(s)</div>
    </div>

    <?php
      if($query->rowCount() > 0)
      {
        foreach($results as $result)
        {
          try
          {
            $sql1 = "SELECT Nom, Prénom from Employés where Id=:empId";
            $query1 = $dbh -> prepare($sql1);
            $query1->bindParam(':empId',$result->IdEmployé,PDO::PARAM_STR);
            $query1->execute();
            $results1=$query1->fetchAll(PDO::FETCH_OBJ);
            $cnt1=1;
            $notifNumber1=$query1->rowCount();
            if($query1->rowCount() > 0){
              foreach($results1 as $result1){?>
                <a class="stat" href="#">
                  <div class="stat-title font-bold"><?php echo htmlentities($result1->Prénom);?>  <?php echo htmlentities($result1->Nom);?> </div>
                  <div class="stat-desc">A récemment envoyé une demande de congé le <?php echo htmlentities($result->PostDate);?></div>
                </a>
                <?php $cnt1++;} }
          }
          catch(PDOException $e) 
          {
            echo "Connection failed: " . $e->getMessage();
          }

        }
      }
    ?>
  </div>
</div>