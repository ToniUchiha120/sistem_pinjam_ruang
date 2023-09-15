<?php
    if(!isset($_SESSION))
    {
       session_start();
    }

    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $detailpinjam = new detailpinjam();
    $ruangan = new ruangan();

    $data_ruang = $ruangan->show();

    if(isset($_GET['kd_pinjam']))
    {
       $kode = $_GET['kd_pinjam'];
       $data_pinjamdetail = $detailpinjam->get_by_idAll($kode);
    }

    if(isset($_POST['tombol_tambah'])){
        $kd_pinjam = $_POST['kd_pinjam'];
        $kd_ruang = $_POST['kd_ruang'];

        $adddata = $detailpinjam->add_data($kd_pinjam, $kd_ruang);
        if($adddata){ ?>
          <script type="text/javascript">
            alert('Data Berhasil Disimpan');
            document.location='peminjamandetail.php?kd_pinjam=<?php echo $kode; ?>'
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Data Gagal Disimpan');
            document.location='peminjamantambah.php'
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
                              <strong class="card-title">Peminjaman Ruang</strong>
                          </div>

                          <div class="card-body">
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <form method="post" novalidate="novalidate">

                                            <div class="form-group">
                                                <label for="kd_pinjam" class="control-label mb-1">Kode Pinjam</label>
                                                <input name="kd_pinjam" type="text" value="<?php echo $kode; ?>" readonly class="form-control">

                                                <label for="kd_ruang" class="control-label mb-1">Ruangan</label>
                                                <select class="form-control" name="kd_ruang">
                                                   <?php foreach ($data_ruang as $row) { ?>
                                                      <option value="<?php echo $row['kd_ruang']; ?>"><?php echo $row['nama_ruang']; ?></option>
                                                   <?php } ?>
                                                 </select>`
                                            </div>
                                            <div>
                                                <button id="tombol_tambah" name="tombol_tambah" type="submit" class="btn btn-sm btn-success btn-block">
                                                    <i class="fa fa-folder-open fa-lg"></i>&nbsp;
                                                    <span id="tombol_tambah">Simpan</span>
                                                </button>
                                                <a href="unit.php"><button id="kembali" name="kembali" type="button" class="btn btn-sm btn-outline-secondary btn-block">
                                                    <i class="fa fa-arrow-left fa-lg"></i>&nbsp;
                                                    <span id="kembali"><a href="unit.php">Kembali</a></span>
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
