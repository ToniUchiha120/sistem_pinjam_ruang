<?php
error_reporting();
session_start();
//autoload class
spl_autoload_register(function ($class_name) {
  include 'kelas/'.$class_name.'.php';
});
$pengguna = new pengguna();

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $check = $pengguna->get_by_userpass($username, $password);
  if($check){
    $_SESSION['pengguna'] = $check;
    $_SESSION['pengguna']['username'] = $check['username'];
    $_SESSION['pengguna']['kd_pengguna'] = $check['kd_pengguna'];
    //$_SESSION['pengguna']['password'] = $check['password'];

    if($_SESSION['pengguna']['level']=='mahasiswa')
    {
      ?>
      <script type="text/javascript">
      alert ('Selamat Datang di Halaman Mahasiswa');
      document.location='index.php'
      </script>
      <?php
    }
    else if ($_SESSION ['pengguna']['level'] == 'staff') {
    ?>
    <script type="text/javascript">
    alert ('Selamat Datang di Halaman Staff');
    document.location='index.php'
    </script>
    <?php
    }
    else if ($_SESSION ['pengguna']['level'] == 'dosen') {
      ?>
      <script type="text/javascript">
      alert ('Selamat Datang di Halaman Dosen');
      document.location='index.php'
      </script>
      <?php
    }
    }
    else {
      ?>
      <script type="text/javascript">
      alert ('Anda Gagal Login');
      document.location='login.php'
      </script>
      <?php
    }
  }

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<?php include "linkcss.php"; ?>
</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">

                </div>
                <div class="login-form">
                  <h3 class="text-center">Sistem Peminjaman Ruangan</h3>
                  <br/>
                  <br/>
                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" type="text" class="form-control" placeholder="Username" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password" required="">
                        </div>

                        <button id = "login" name="login" type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Login</button>

                        <div class="register-link m-t-15 text-center">
                            <p>Belum memiliki akun? <a href="register.php">Daftar disini</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
  <?php
    include "footer.php";
    include "linkjs.php";
   ?>
</body>
</html>
