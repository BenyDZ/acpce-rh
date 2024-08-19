<?php
    session_start();
    error_reporting(0);
    include('../include/dbconn.php');
    if(strlen($_SESSION['safAttachelogin'])==0){   
        header('location:../index.php');
    } else {
      if(isset($_POST['apply']))
      {

        $empid=$_SESSION['eid'];
        $fromdate=$_POST['fromDate'];  
        $todate=$_POST['toDate'];
        $nbrOfDays=$_POST['nbrOfDays'];
        $isread=0;

        if($fromdate > $todate || $fromdate == $todate){
          $error="La date de fin doit être antérieure à la date de début pour être validée !";
        }
        else{
          $sql="INSERT INTO Congé(FromDate,toDate,IsRead,IdEmployé,NbrOfDay) VALUES(:fromdate,:todate,:isread,:empid,:nbrOfDay)";
          $query = $dbh->prepare($sql);
          $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
          $query->bindParam(':todate',$todate,PDO::PARAM_STR);
          $query->bindParam(':isread',$isread,PDO::PARAM_STR);
          $query->bindParam(':empid',$empid,PDO::PARAM_STR);
          $query->bindParam(':nbrOfDay',$nbrOfDays,PDO::PARAM_STR);
          $query->execute();
          $lastInsertId = $dbh->lastInsertId();

          if($lastInsertId)
          {
              $msg="Votre demande de congé a été envoyée, merci.";
          }   else    {
              $error="Désolé, impossible de traiter cette demande. Veuillez réessayer!!!";
          }
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
  <div class="flex h-screen">
    <div class="flex-none">
      <?php
        $page='congé';
        include 'include/employee-sidebar.php';
      ?>
    </div>

    <div class="w-full">
      <div class="flex flex-col h-full">
        <?php
          $page='congé';
          include 'include/employee-navbar.php';
        ?>

        <div class="flex w-full h-full p-5">
          <div class="flex flex-col w-full space-y-3">
            
            <?php if($error)
            {?>
              <div class="bg-white-300 flex p-2 gap-3 items-center justify-center rounded-2xl border border-red-600" id="alert">
                <svg class="h-6 w-6 fill-current text-red-600" viewBox="0 0 448 512">
                  <path
                    d="M256 32V49.88C328.5 61.39 384 124.2 384 200V233.4C384 278.8 399.5 322.9 427.8 358.4L442.7 377C448.5 384.2 449.6 394.1 445.6 402.4C441.6 410.7 433.2 416 424 416H24C14.77 416 6.365 410.7 2.369 402.4C-1.628 394.1-.504 384.2 5.26 377L20.17 358.4C48.54 322.9 64 278.8 64 233.4V200C64 124.2 119.5 61.39 192 49.88V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32V32zM216 96C158.6 96 112 142.6 112 200V233.4C112 281.3 98.12 328 72.31 368H375.7C349.9 328 336 281.3 336 233.4V200C336 142.6 289.4 96 232 96H216zM288 448C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288z" />
                </svg>
                <div class="ml-3 font-sans text-xs leading-6 text-red-600"> <?php echo htmlentities($error); ?> </div>
                <button type="button"
                  class="ml-auto inline-flex h-5 w-5 rounded-full border border-red-600 p-0.5 text-red-600"
                  aria-label="Close" id="closeButton">
                  <svg aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z">
                    </path>
                  </svg>
                </button>
              </div>
            <?php }

            else if($msg)
            {?>
              <div class="bg-white-300 flex p-2 gap-3 items-center justify-center rounded-2xl border border-green-600" id="alert">
                <svg class="h-6 w-6 fill-current text-green-600" viewBox="0 0 448 512">
                  <path
                    d="M256 32V49.88C328.5 61.39 384 124.2 384 200V233.4C384 278.8 399.5 322.9 427.8 358.4L442.7 377C448.5 384.2 449.6 394.1 445.6 402.4C441.6 410.7 433.2 416 424 416H24C14.77 416 6.365 410.7 2.369 402.4C-1.628 394.1-.504 384.2 5.26 377L20.17 358.4C48.54 322.9 64 278.8 64 233.4V200C64 124.2 119.5 61.39 192 49.88V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32V32zM216 96C158.6 96 112 142.6 112 200V233.4C112 281.3 98.12 328 72.31 368H375.7C349.9 328 336 281.3 336 233.4V200C336 142.6 289.4 96 232 96H216zM288 448C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288z" />
                </svg>
                <div class="ml-3 font-sans text-xs leading-6 text-green-600"> <?php echo htmlentities($msg); ?> </div>
                <button type="button"
                  class="ml-auto inline-flex h-5 w-5 rounded-full border border-green-600 p-0.5 text-green-600"
                  aria-label="Close" id="closeButton">
                  <svg aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z">
                    </path>
                  </svg>
                </button>
              </div>
            <?php }?>

            <?php
              include "include/leave-history.php";
            ?>

          </div>
          

          <div class="flex flex-col h-full px-4 space-y-5">
            <div>
              <div class="stats stats-vertical lg:stats-horizontal shadow">
                <div class="stat">
                  <div class="stat-title font-bold">Congé</div>
                  <?php
                    echo'<div class="stat-desc text-accent"> Nombre de jours annuel :   ' .$_SESSION["conge"]. '</div>';
                    echo'<div class="stat-desc text-accent"> Nombre de jours disponibles :  ' .$_SESSION["conge"]. '</div>';
                    echo'<div class="stat-desc text-accent"> Nombre de jours utilisés :   ' .$_SESSION["conge"]. '</div>';
                  ?>
                </div>
              </div>
            </div>
            
            <div class="">
              <div class="stats stats-vertical lg:stats-horizontal shadow w-64">
                <div class="stat">
                  <div class="calendar-container">
                    <header class="calendar-header">
                      <p class="calendar-current-date stat-title font-bold"></p>
                      <div class="calendar-navigation flex">
                        <svg 
                          id="calendar-prev"
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-4 w-4 cursor-pointer"
                          stroke="currentColor"
                          viewBox="0 0 320 512">
                          <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                        </svg>
                        <svg
                          id="calendar-next"
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-4 w-4 cursor-pointer"
                          stroke="currentColor"
                          viewBox="0 0 320 512">
                          <path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/>
                        </svg>
                      </div>
                    </header>
                
                    <div class="calendar-body">
                      <ul class="calendar-weekdays">
                        <li>Dim</li>
                        <li>Lun</li>
                        <li>Mar</li>
                        <li>Mer</li>
                        <li>Jeu</li>
                        <li>Ven</li>
                        <li>Sam</li>
                      </ul>
                      <ul class="calendar-dates"></ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="relative h-full w-full content-end">

              <div class="flex justify-end">
                <div class="dropdown dropdown-top dropdown-end items-end">
                  <div tabindex="0" role="button" class="btn btn-lg btn-primary btn-circle hover:scale-125">
                    <div class="indicator">
                      <i class="lni lni-plus lni-lg clr-white"></i>
                    </div>
                  </div>
                  <div
                    tabindex="0"
                    class="card card-compact dropdown-content bg-base-100 z-[1] mt-3 shadow-lg">
                    <div class="card-body">
                      <form class="w-[400px]" method="POST">
                        <div class="text-center">
                          <h1 class="text-3xl font-semibold text-gray-900">Demande de congé</h1>
                          <p class="mt-2 text-gray-500">Remplissez le formulaire de demande de congé</p>
                        </div>
                        <div class="relative mt-6">
                          <input type="date" name="fromDate" id="fromDate" placeholder="Date de départ" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" required/>
                          <label for="fromDate" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Date de départ</label>
                        </div>
                        <div class="relative mt-6">
                          <input type="date" name="toDate" id="toDate" placeholder="Date de de fin" class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" required/>
                          <label for="toDate" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Date de fin</label>
                        </div>
                        <div class="relative mt-6">
                          <input type="number" name="nbrOfDays" id="nbrOfDays" placeholder="Nombre de jours" class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                          <label for="nbrOfDays" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Nombre de jours</label>
                        </div>
                        <div class="my-6 relative">
                          <button
                            class="bg-gradient-to-r dark:text-gray-300 from-blue-500 to-purple-500 shadow-lg p-2 text-white rounded-lg w-full hover:scale-105 hover:from-purple-500 hover:to-blue-500 transition duration-300 ease-in-out"
                            name="apply" id="apply" type="submit"
                          >
                            Envoyer la demande
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/script.js"></script>
  <script src="../assets/js/datatables.js"></script>
  <script src="../assets/js/calendar.js"></script>
</body>
</html>

<?php } ?>