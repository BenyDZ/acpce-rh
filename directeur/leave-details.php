<?php
  session_start();
  error_reporting(0);
  include('../include/dbconn.php');
  if(strlen($_SESSION['dirlogin'])==0){   
    header('location:../index.php');
  } else {
    $empId = intval($_GET['empId']);
    $leaveId = intval($_GET['leaveId']);

    $sql="SELECT Nom, Prénom, Genre, Id from Employés where id=:idEmp";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':idEmp',$empId ,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    foreach($results as $result){
      $r = $result;
    }

    $sql1 = "SELECT IdCongé, FromDate, ToDate, PostDate, NbrOfDay, IdEmployé, Statuts, DirectorResponse, DirectorResponseDate, DGResponse, DGResponseDate, RHResponse, RHResponseDate from Congé where IdCongé=:leaveId";
    $query1 = $dbh -> prepare($sql1);
    $query1->bindParam(':leaveId',$leaveId ,PDO::PARAM_STR);
    $query1->execute();
    $results1=$query1->fetchAll(PDO::FETCH_OBJ);

    foreach($results1 as $result1){
      $r1 = $result1;
      $dirR = $r1 -> DirectorResponse;
      if ($dirR == NULL){
        $dirR = 'En attente';
      }
      elseif($dirR == 1){
        $dirR = 'Approuvé';
      }
      else{
        $dirR = 'Refusé';
      }
    }

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
        $page = "leave-details";
        include 'include/directeur-sidebar.php';
      ?>
    </div>

    <div class="w-full">

      <div class="flex flex-col">
        <?php
          $page = "leave-details";
          include 'include/directeur-navbar.php';
        ?>

        <div class="flex flex-col w-full h-full p-5">

          <h2 class="font-bold mb-3">INFORMATIONS SUR LA DEMANDE DE CONGE</h2>

          <div class="flex flex-col w-full border-2"> 
            <div class="p-4 border-2 m-1"><h2 class="text-center font-bold">Informations sur l'employé</h2></div>
            <div class="flex justify-between m-1 border-2 divide-x-2">
              <h2 class="text-center w-full p-4 font-semibold">Nom : <span class="font-normal"><?php echo htmlentities($r->Nom);?></span></h2>
              <h2 class="text-center w-full p-4 font-semibold">Prénom : <span class="font-normal"><?php echo htmlentities($r->Prénom);?></span></h2>
              <h2 class="text-center w-full p-4 font-semibold">Genre : <span class="font-normal"><?php echo htmlentities($r->Genre);?></span></h2>
            </div>
            <div class="p-4 border-2 m-1"><h2 class="text-center font-bold">Informations sur la demande</h2></div>
            <div class="flex justify-between m-1 border-2 divide-x-2">
              <h2 class="text-center w-full p-4 font-semibold">Id de la demande : <span class="font-normal"><?php echo htmlentities($r1->IdCongé);?></span></h2>
              <h2 class="text-center w-full p-4 font-semibold">Date de départ : <span class="font-normal"><?php echo htmlentities($r1->FromDate);?></span></h2>
              <h2 class="text-center w-full p-4 font-semibold">Date de fin : <span class="font-normal"><?php echo htmlentities($r1->ToDate);?></span></h2>
              <h2 class="text-center w-full p-4 font-semibold">Date de la demande : <span class="font-normal"><?php echo htmlentities($r1->PostDate);?></span></h2>
              <h2 class="text-center w-full p-4 font-semibold">Nombre de jours : <span class="font-normal"><?php echo htmlentities($r1->NbrOfDay);?></span></h2>
            </div>
            <div class="flex justify-between m-1 border-2 divide-x-2 items-center">
              <h2 class="text-center w-full p-4 font-semibold">Réponse du <?php echo htmlentities($_SESSION['poste']);?> : <span class="font-normal"><?php echo htmlentities($dirR);?></span></h2>
              <h2 class="text-center w-full p-4 font-semibold">Date de la réponse : <span class="font-normal"><?php echo htmlentities($r1->DirectorResponseDate);?></span></h2>       
              <?php if($dirR == 'En attente'){?>
                <div class="join w-full p-4 justify-center">
                  <a class="btn btn-sm btn-success join-item text-white" href="include/accept-leave-request.php?leaveId=<?php echo htmlentities($r1->IdCongé);?>&empId=<?php echo htmlentities($r->Id);?>&accept=1"><i class="lni lni-checkmark-circle"></i>Approuver</a>
                  <a class="btn btn-sm btn-error join-item text-white" href="include/accept-leave-request.php?leaveId=<?php echo htmlentities($r1->IdCongé);?>&empId=<?php echo htmlentities($r->Id);?>&accept=0">Refuser<i class="lni lni-trash-can"></i></a>
                </div>
              <?php  }?>
            </div>
            <div class="p-4 border-2 m-1"><h2 class="text-center font-bold">Statut de la demande : <span class="font-normal"><?php echo htmlentities($r1->Statuts);?></span></h2></div>

            <div class="p-4 border-2 m-1 flex justify-center">
              <ul class="timeline">
                <li>
                  <div class="timeline-start">
                    <?php 
                      if ($r1->DirectorResponse == NULL){
                        echo 'En attente';
                      }
                      else{
                        echo htmlentities($r1->DirectorResponseDate);
                      }
                    ?>
                  </div>
                  <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 <?php if($r1->DirectorResponse == 1){echo'text-primary';}elseif($r1->DirectorResponse == NULL){echo'';}else{echo'text-error';}?>">
                      <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                        clip-rule="evenodd" />
                    </svg>
                  </div>
                  <div class="timeline-end"><?php echo htmlentities($_SESSION['poste']);?></div>
                  <hr class="bg-primary"/>
                </li>
                <li>
                  <hr class="bg-primary"/>
                  <div class="timeline-start">
                    <?php 
                      if ($r1->RHResponse == NULL){
                        echo 'En attente';
                      }
                      else{
                        echo htmlentities($r1->RHResponseDate);
                      }
                    ?>
                  </div>
                  <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 <?php if($r1->RHResponse == 1){echo'text-primary';}elseif($r1->RHResponse == NULL){echo'';}else{echo'text-error';}?>">
                      <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                        clip-rule="evenodd" />
                    </svg>
                  </div>
                  <div class="timeline-end">Ressources humaines</div>
                  <hr />
                </li>
                <li>
                  <hr/>
                  <div class="timeline-start">
                    <?php 
                      if ($r1->DGResponse == NULL){
                        echo 'En attente';
                      }
                      else{
                        echo htmlentities($r1->DGResponseDate);
                      }
                    ?>
                  </div>
                  <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 <?php if($r1->DGResponse == 1){echo'text-primary';}elseif($r1->DGResponse == NULL){echo'';}else{echo'text-error';}?>">
                      <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                        clip-rule="evenodd" />
                    </svg>
                  </div>
                  <div class="timeline-end">DG</div>
                  <hr />
                </li>
              </ul>
            </div>
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