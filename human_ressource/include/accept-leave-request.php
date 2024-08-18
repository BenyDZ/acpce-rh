<?php
  include('../../include/dbconn.php');
  try{
    $empId = intval($_GET['empId']);
    $leaveId = intval($_GET['leaveId']);
    $accept = intval($_GET['accept']);

    if($accept==1)
    {
      $sql="UPDATE Congé SET DGResponse = 'Approuver', DGResponseDate = current_date(), Statuts='En cours' where IdCongé=:leaveId";
      $query = $dbh -> prepare($sql);
      $query->bindParam(':leaveId',$leaveId,PDO::PARAM_STR);
      $query->execute();

      header("location:../leave-details.php?leaveId=$leaveId&empId=$empId");
    }
    else
    {
      $sql="UPDATE Congé SET DGResponse = 'Refuser', DGResponseDate = current_date(), Statuts='Terminé' where IdCongé=:leaveId";
      $query = $dbh -> prepare($sql);
      $query->bindParam(':leaveId',$leaveId,PDO::PARAM_STR);
      $query->execute();

      header("location:../leave-details.php?leaveId=$leaveId&empId=$empId");
    }

  }
  catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  
?>