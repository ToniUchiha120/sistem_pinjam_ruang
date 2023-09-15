<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $ruangan = new ruangan();

    if(isset($_GET['kd_ruang'])){
        $kode = $_GET['kd_ruang'];
        $data_ruangan = $ruangan->get_by_id($kode);
    }
    else
    {
        header('Location: ruangan.php');
    }

    if(isset($_POST['tombol_ubah'])){
        $kd_ruang = $kode;
        $nama_ruang = $_POST['nama_ruang'];
        $kapasitas=$_POST['kapasitas'];

        $status_update = $ruangan->update($kd_ruang, $nama_ruang, $kapasitas);
        if($status_update){ ?>
          <script type="text/javascript">
            alert('Data Berhasil Diubah');
            document.location='ruangan.php'
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Data Gagal Diubah');
            document.location='ruanganubah.php'
          </script>
          <?php
        }
      }
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-RUANG</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include "linkcss.php"; ?>
</head>

<body>
    <?php include "sidebar.php"; ?>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <?php include "header.php"; ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
              <div class="row">

                  <div class="col-md-6">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Ubah Data Ruangan</strong>
                          </div>

                          <div class="card-body">
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Data Ruangan</h3>
                                        </div>
                                        <hr>
                                        <form method="post" novalidate="novalidate">
                                            <div class="form-group text-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-sitemap fa-4x"></i></li>
                                                </ul>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_ruang" class="control-label mb-1">Nama Ruangan</label>
                                                <input name="nama_ruang" type="text" class="form-control" value="<?php echo $data_ruangan['nama_ruang']; ?>">

                                                <label for="kapasitas" class="control-label mb-1">Kapasitas Ruangan</label>
                                                <input name="kapasitas" type="text" class="form-control" value="<?php echo $data_ruangan['kapasitas']; ?>">
                                            </div>
                                            <div>
                                                <button id="tombol_tambah" name="tombol_ubah" type="submit" class="btn btn-sm btn-success btn-block">
                                                    <i class="fa fa-folder-open fa-lg"></i>&nbsp;
                                                    <span id="tombol_ubah">Ubah</span>
                                                </button>
                                                <a href="ruangan.php"><button id="kembali" name="kembali" type="button" class="btn btn-sm btn-outline-secondary btn-block">
                                                    <i class="fa fa-arrow-left fa-lg"></i>&nbsp;
                                                    <span id="kembali"><a href="ruangan.php">Kembali</a></span>
                                                </button></a>
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
            <!-- .animated -->
        </div>
        <!-- /.content -->

        <?php //include "footer.php"; ?>

    </div>
    <!-- /#right-panel -->

    <?php include "linkjs.php"; ?>
</body>
</html>
