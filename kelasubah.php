<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include '../kelas/'.$class_name.'.php';
    });

    $kelas = new kelas();

    $prodi = new prodi();
    $data_prodi = $prodi->show();


    if(isset($_GET['kd_kelas'])){
        $kode = $_GET['kd_kelas'];
        $data_kelas = $kelas->get_by_id($kode);
    }
    else
    {
        header('Location: kelas.php');
    }

    if(isset($_POST['tombol_ubah'])){
        $kd_kelas = $kode;
        $nama_kelas = $_POST['nama_kelas'];
        $kd_prodi = $_POST['kd_prodi'];
        $status_update = $kelas->update($kd_kelas, $nama_kelas, $kd_prodi);
        if($status_update){ ?>
          <script type="text/javascript">
            alert('Data Berhasil Diubah');
            document.location='kelas.php'
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Data Gagal Diubah');
            document.location='ubahkelas.php'
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
                              <strong class="card-title">Ubah Data Kelas</strong>
                          </div>

                          <div class="card-body">
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Data Kelas</h3>
                                        </div>
                                        <hr>
                                        <form method="post" novalidate="novalidate">
                                            <div class="form-group text-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-sitemap fa-4x"></i></li>
                                                </ul>
                                            </div>
                                            <div class="form-group">
                                                <label for="nm_kelas" class="control-label mb-1">Nama Kelas</label>
                                                <input name="nama_kelas" type="text" class="form-control" value="<?php echo $data_kelas['nama_kelas']; ?>">
                                                <label for="kd_prodi" class="control-label mb-1">Prodi</label>
                                                <select class="form-control" name="kd_prodi">
                                                   <?php foreach ($data_prodi as $row) { ?>
                                                      <option value="<?php echo $row['kd_prodi']; ?>"><?php echo $row['nama_prodi']; ?></option>
                                                   <?php } ?>
                                                 </select>`
                                            </div>
                                            <div>
                                                <button id="tombol_tambah" name="tombol_ubah" type="submit" class="btn btn-sm btn-success btn-block">
                                                    <i class="fa fa-folder-open fa-lg"></i>&nbsp;
                                                    <span id="tombol_ubah">Ubah</span>
                                                </button>
                                                <a href="kelas.php"><button id="kembali" name="kembali" type="button" class="btn btn-sm btn-outline-secondary btn-block">
                                                    <i class="fa fa-arrow-left fa-lg"></i>&nbsp;
                                                    <span id="kembali"><a href="kelas.php">Kembali</a></span>
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
