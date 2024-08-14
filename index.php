<?php
  session_start();
  error_reporting(0);
  include('include/dbconn.php');
  if(isset($_POST['signin']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql ="SELECT Id,Email,Nom,Prénom,MotDePasse,Role,CongéDisponible FROM Employés WHERE Email=:email and MotDePasse=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0)
    {
      foreach ($results as $result) {
        $role=$result->Role;
        $nom=$result->Nom;
        $prenom=$result->Prénom;
        $conge=$result->CongéDisponible;
        $_SESSION['eid']=$result->Id;
      }
      if($role=='Admin')
      {
        $_SESSION['alogin']=$_POST['email'];
        $_SESSION['username']= $prenom .' '. $nom;
        $_SESSION['avatar']= substr($prenom,0,1) .''. substr($nom,0,1);
        $_SESSION['conge']= $conge;
        echo "<script type='text/javascript'> document.location = 'admin/dashboard.php'; </script>";
      }
      
      elseif($role=='Employé'){
        $_SESSION['emplogin']=$_POST['email'];
        $_SESSION['username']= $prenom .' '. $nom;
        $_SESSION['avatar']= substr($prenom,0,1) .''. substr($nom,0,1);
        $_SESSION['conge']= $conge;
        echo "<script type='text/javascript'> document.location = 'employees/leave.php'; </script>";
      }

      elseif($role=='RH'){
        $_SESSION['rhlogin']=$_POST['email'];
        $_SESSION['username']= $prenom .' '. $nom;
        $_SESSION['avatar']= substr($prenom,0,1) .''. substr($nom,0,1);
        $_SESSION['conge']= $conge;
        echo "<script type='text/javascript'> document.location = 'human_ressource/dashboard.php'; </script>";
      }
      
      else {
        $_SESSION['dglogin']=$_POST['email'];
        $_SESSION['username']= $prenom .' '. $nom;
        $_SESSION['avatar']= substr($prenom,0,1) .''. substr($nom,0,1);
        $_SESSION['conge']= $conge;
        echo "<script type='text/javascript'> document.location = 'dg/dashboard.php'; </script>";
      }
    }else  {
      echo "<script>alert('Sorry, Invalid ².');</script>";
    }
  }
?>

<!doctype html>
<html data-theme="emerald" class="w-screen h-screen">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/output.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/icons.css">
</head>
<body>
  <!-- login area start -->
  <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
      <div
        class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
      </div>
      <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
        <form method="POST" name="signIn">
          <div class="avatar w-full justify-center mb-3">
            <div class="w-28 rounded">
              <img src="assets/img/logo1.png" />
            </div>
          </div>
    
          <div class="max-w-md mx-auto">
            <div>
              <h1 class="text-2xl font-semibold">Se connecter</h1>
            </div>
            <div class="divide-y divide-gray-200">
              <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                <div class="relative">
                  <input autocomplete="off" id="email" name="email" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Email address" />
                  <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email Address</label>
                </div>
                <div class="relative">
                  <input autocomplete="off" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Password" />
                  <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                </div>
                <div class="relative">
                  <button
                    class="bg-gradient-to-r dark:text-gray-300 from-blue-500 to-purple-500 shadow-lg mt-6 p-2 text-white rounded-lg w-full hover:scale-105 hover:from-purple-500 hover:to-blue-500 transition duration-300 ease-in-out"
                    id="form_submit" type="submit" name="signin"
                  >
                    Se connecter
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- login area end -->
</body>
</html>