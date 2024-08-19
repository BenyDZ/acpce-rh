<?php
  include('include/dbconn.php');
?>
<table id="example" class="display" style="width:100%" data-page-length="10">
  <thead>
    <tr>
      <th>Id Congé</th>
      <th>Id Employé(e)</th>
      <th>Date de départ</th>
      <th>Date de fin</th>
      <th>Nombre de jours</th>
      <th>Date de la demande</th>
      <th>Statut</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $eid=$_SESSION['eid'];
    $sql = "SELECT IdCongé,FromDate,ToDate,PostDate,Statuts,NbrOfDay from Congé where IdEmployé=:eid";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0){
    foreach($results as $result)
    {  ?>
      <tr>
        <td><?php echo htmlentities($result->IdCongé);?></td>
        <td><?php echo $eid;?></td>
        <td><?php echo htmlentities($result->FromDate);?></td>
        <td><?php echo htmlentities($result->ToDate);?></td>
        <td><?php echo htmlentities($result->NbrOfDay);?></td>
        <td><?php echo htmlentities($result->PostDate);?></td>
        <td><?php echo htmlentities($result->Statuts);?></td>
      </tr>
    <?php $cnt++;} }?>
                                        
  </tbody>
</table>