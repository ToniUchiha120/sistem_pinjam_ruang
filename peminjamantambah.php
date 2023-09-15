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

    $pinjam = new pinjam();

    if(isset($_SESSION['pengguna']))
    {
        $kode = $_SESSION['pengguna']['kd_pengguna'];
    }

    if(isset($_POST['tombol_tambah'])){
        $kd_pinjam = $_POST['kd_pinjam'];
        $kd_peminjam = $_POST['kd_peminjam'];
        $keperluan = $_POST['keperluan'];
        $ketua_panitia = $_POST['ketua_panitia'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = "-";
        $lama_pinjam = $_POST['lama_pinjam'];
        $status_pinjam = "-";

        $adddata = $pinjam->add_data($kd_pinjam, $kd_peminjam, $keperluan, $ketua_panitia, $tgl_pinjam, $tgl_kembali, $lama_pinjam, $status_pinjam);
        if($adddata){ ?>
          <script type="text/javascript">
            alert('Data Berhasil Disimpan');
            document.location='peminjamandetail.php'
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

                  <div class="col-md-8">
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
                                                <input name="kd_pinjam" type="text" value="<?php echo $pinjam->createCode(); ?>" readonly class="form-control">

                                                <label for="kd_peminjam" class="control-label mb-1">Kode Peminjam</label>
                                                <input name="kd_peminjam" type="text" value="<?php echo $kode; ?>" readonly class="form-control">

                                                <label for="kd_peminjam" class="control-label mb-1">Keperluan</label>
                                                <input name="keperluan" type="text" class="form-control">

                                                <label for="kd_peminjam" class="control-label mb-1">Ketua Panitia</label>
                                                <input name="ketua_panitia" type="text" class="form-control">

                                                <label for="tgl_pinjam" class="control-label mb-1">Tanggal Pinjam</label>
                                                <input name="tgl_pinjam" type="date" class="form-control">

                                                <label for="lama_pinjam" class="control-label mb-1">Lama Pinjam</label>
                                                <input name="lama_pinjam" type="date" class="form-control">
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
