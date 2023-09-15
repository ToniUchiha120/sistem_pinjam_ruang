<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $pengguna = new pengguna();
    $organisasi = new organisasi();

    if(isset($_POST['register'])){
      $kd_organisasi = $organisasi->createCode();
      $nm_organisasi = $_POST['nm_organisasi'];
      $pj = $_POST['pj'];
      $kd_pengguna = $kd_organisasi;
      $username = $_POST['username'];
      $password = $_POST['password'];
      $level = "organisasi";

      $username_ada = $pengguna->cekusername($username);
      if($username_ada > 0)
      {
        ?>
        <script type="text/javascript">
        alert('Username sudah ada. Silahkan gunakan username lain');
        document.location='register.php'
        </script>
        <?php
      }
      else {
        $adddata1 = $organisasi->add_data($kd_organisasi, $nm_organisasi, $pj);
        $adddata2 = $pengguna->add_data($kd_pengguna, $username, $password, $level);
        if (($adddata1)&&($adddata2)){ ?>
          <script type="text/javascript">
            alert('Anda sudah terdaftar. Silahkan login sekarang.');
            document.location='index.php'
            </script>
            <?php
          }
          else {
            ?>
            <script type="text/javascript">
              alert('Mohon isi data dengan lengkap');
              document.location='register.php'
            </script>
            <?php
          }
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

                <div class="login-form">
                  <h3 class="text-center">Sistem Peminjaman Ruangan</h3>
                  <br/>
                  <br/>
                    <form method="post">
                      <div class="form-group">
                          <label>Nama Organisasi</label>
                          <input name="nm_organisasi" type="text" class="form-control" placeholder="Nama Organisasi" required autocomplete="off">
                      </div>
                      <div class="form-group">
                          <label>Penanggung Jawab</label>
                          <input name="pj" type="text" class="form-control" placeholder="Penanggung Jawab" required autocomplete="off">
                      </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" type="text" class="form-control" placeholder="Username" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password" required autocomplete="off">
                        </div>

                        <button name="register" type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Daftar</button>

                        <div class="register-link m-t-15 text-center">
                            <p>Sudah memiliki akun? <a href="index.php"> Login</a></p>
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
