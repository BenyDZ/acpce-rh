<?php
  include('include/dbconn.php');
?>
<table id="example" class="display" style="width:100%" data-page-length="10">
  <thead>
    <tr>
      <th></th>
      <th>Nom(s)</th>
      <th>Prénom(s)</th>
      <th>Date de départ</th>
      <th>Date de fin</th>
      <th>Date de la demande</th>
      <th>Nombre de jours</th>
      <th>Statut</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $eid=$_SESSION['eid'];
    $sql = "SELECT IdCongé, FromDate, ToDate, PostDate, IdEmployé, Statuts, NbrOfDay from Congé where Statuts='En cours' and DepName=:dep";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':dep',$_SESSION['dep'],PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $result)
      {
        $sql1 = "SELECT Nom, Prénom from Employés where Id=:idE";
        $query1 = $dbh -> prepare($sql1);
        $query1->bindParam(':idE',$result->IdEmployé,PDO::PARAM_STR);
        $query1->execute();
        $results1=$query1->fetchAll(PDO::FETCH_OBJ);
        $cnt1=1;
        if($query1->rowCount() > 0)
        {
          foreach($results1 as $result1)
          { ?>
            <tr>
              <td><?php echo $cnt;?></td>
              <td><?php echo htmlentities($result1->Nom);?></td>
              <td><?php echo htmlentities($result1->Prénom);?></td>
              <td><?php echo htmlentities($result->FromDate);?></td>
              <td><?php echo htmlentities($result->ToDate);?></td>
              <td><?php echo htmlentities($result->PostDate);?></td>
              <td><?php echo htmlentities($result->NbrOfDay);?></td>
              <td><?php echo htmlentities($result->Statuts);?></td>
              <td><a class="btn btn-sm" href="../directeur/leave-details.php?leaveId=<?php echo htmlentities($result->IdCongé);?>&empId=<?php echo htmlentities($result->IdEmployé);?>">Voir les details</a></td>
            </tr>
            <?php $cnt1++;
          }
        }
        $cnt++;
      } 
    }?>
                                        
  </tbody>
</table>
