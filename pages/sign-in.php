<?php 
  include_once('fonctions/con_db.php');
  $query = $db_connection->query('SELECT * FROM Service');
  if($query == false){
    var_dump($db_connection->errorInfo());
    exit();
  }
  $service = $query->fetchAll(PDO::FETCH_ASSOC);
  echo '<pre>';
  print_r($service);
  echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<?php require('elements/head.php');
  // echo(password_hash("Admin", PASSWORD_DEFAULT, ['cost' => 12]));
?>
<?php
  // Vérification de l'authentification
  $error_auth = null;
  $psw = '$2y$12$bKA2XutJ/SUAkqqIMe3iy.XQslxZdB/H.MYef0wluo5f6gkqhlZEm';
  if(!empty($_POST['mail']) && !empty($_POST['psw'])) {
    if($_POST['mail'] === 'admin@admin.admin' && password_verify($_POST['psw'], $psw)){
      if(session_status() === PHP_SESSION_NONE){
          session_start();
      }
      $_SESSION['connect'] = 1;
      header('location:/glotelhoBesoins/pages/besoins.php');
      exit();
    } else {
      $error_auth = "Identifiants incorects!";
    }
  } else {
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    unset($_SESSION['connect']);
  }
?>

<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background: url('/glotelhoBesoins/assets/img/backgound/bg2.jpg') no-repeat center; background-size: 100%;">
      <span class="mask bg-gradient-dark opacity-5"></span>

      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">

              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-primary shadow-dark border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Connection</h4>
                </div>
              </div>

              <div class="card-body">
                <form role="form" action='' method='POST' class="text-start">
                  <?php if($error_auth) {
                    echo(
                    <<<errorAth
                      <div class="alert alert-danger">
                        $error_auth
                      </div>


errorAth);
                  }?>

                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" name = 'mail' class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name = 'psw' class="form-control">
                  </div>

                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <input type="submit" class="btn bg-primary w-100 my-4 mb-2" value = 'connection'>
                  </div>

                  <p class="mt-4 text-sm text-center">
                    Pas de compte?
                    <a href="/glotelhoBesoins/pages/sign-up.php" class="color-primary1 font-weight-bold">Inscription</a>
                  </p>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>

      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                Développé <i class="fa fa-heart" aria-hidden="true"></i> par
                <a href="https://www.linkedin.com/in/said-mansour-ab86b4239/" class="font-weight-bold text-white" target="_blank">Said Mansour.</a>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://github.com/saidMansour1" class="nav-link text-white" target="_blank"><i class="fa fa-github" aria-hidden="true"></i>saidMansour1</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="/glotelhoBesoins/assets/js/core/popper.min.js"></script>
  <script src="/glotelhoBesoins/assets/js/core/bootstrap.min.js"></script>
  <script src="/glotelhoBesoins/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/glotelhoBesoins/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/glotelhoBesoins/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>