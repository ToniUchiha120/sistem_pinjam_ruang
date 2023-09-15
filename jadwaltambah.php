<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $ruangan = new ruangan();
    $data_ruangan = $ruangan->show();

    $kelas = new kelas();
    $data_kelas = $kelas->show();

    $matakuliah = new Matakuliah();
    $data_matakuliah = $matakuliah->show();

    $jadwal = new jadwal();

    if(isset($_POST['tombol_tambah'])){
        $kd_jadwal = $_POST['kd_jadwal'];
        $kd_ruang = $_POST['kd_ruang'];
        $kd_kelas = $_POST['kd_kelas'];
        $kd_matkul = $_POST['kd_matkul'];
        $hari = $_POST['hari'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_berakhir = $_POST['jam_berakhir'];

        $adddata = $jadwal->add_data($kd_jadwal, $kd_ruang, $kd_kelas, $kd_matkul, $jam_mulai, $hari, $jam_berakhir);
        if($adddata){ ?>
          <script type="text/javascript">
            alert('Data Berhasil Disimpan');
            document.location='jadwal.php'
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Data Gagal Disimpan');
            document.location='jadwaltambah.php'
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
                              <strong class="card-title">Tambah Data Jadwal</strong>
                          </div>

                          <div class="card-body">
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Data Jadwal</h3>
                                        </div>
                                        <hr>
                                        <form method="post" novalidate="novalidate">
                                            <div class="form-group text-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-sitemap fa-4x"></i></li>
                                                </ul>
                                            </div>
                                            <div class="form-group">
                                                <label for="kd_jadwal" class="control-label mb-1">Kode Jadwal</label>
                                                <input name="kd_jadwal" type="text" class="form-control" value="<?php echo $jadwal->createCode(); ?>" readonly>

                                                <label for="kd_ruang" class="control-label mb-1">Ruangan</label>
                                                <select class="form-control" name="kd_ruang">
                                                   <?php foreach ($data_ruangan as $row) { ?>
                                                      <option value="<?php echo $row['kd_ruang']; ?>"><?php echo $row['nama_ruang']; ?></option>
                                                   <?php } ?>
                                                 </select>`

                                                 <label for="kd_kelas" class="control-label mb-1">Kelas</label>
                                                 <select class="form-control" name="kd_kelas">
                                                    <?php foreach ($data_kelas as $row) { ?>
                                                       <option value="<?php echo $row['kd_kelas']; ?>"><?php echo $row['nama_kelas']; ?></option>
                                                    <?php } ?>
                                                  </select>`

                                                  <label for="kd_ruang" class="control-label mb-1">Matakuliah</label>
                                                  <select class="form-control" name="kd_matkul">
                                                     <?php foreach ($data_matakuliah as $row) { ?>
                                                        <option value="<?php echo $row['kd_matkul']; ?>"><?php echo $row['nama_matkul']; ?></option>
                                                     <?php } ?>
                                                   </select>`

                                                   <label for="hari" class="control-label mb-1">Hari</label>
                                                   <select class="form-control" name="hari">
                                                        <option value="Senin">Senin</option>
                                                        <option value="Selasa">Selasa</option>
                                                        <option value="Rabu">Rabu</option>
                                                        <option value="Kamis">Kamis</option>
                                                        <option value="Jumat">Jumat</option>
                                                        <option value="Sabtu">Sabtu</option>
                                                        <option value="Minggu">Minggu</option>
                                                    </select>`

                                                  <label for="jam_mulai" class="control-label mb-1">Jam Mulai</label>
                                                  <input name="jam_mulai" type="time" class="form-control">

                                                  <label for="jam_berakhir" class="control-label mb-1">Jam Berakhir</label>
                                                  <input name="jam_berakhir" type="time" class="form-control">

                                            </div>
                                            <div>
                                                <button id="tombol_tambah" name="tombol_tambah" type="submit" class="btn btn-sm btn-success btn-block">
                                                    <i class="fa fa-folder-open fa-lg"></i>&nbsp;
                                                    <span id="tombol_tambah">Simpan</span>
                                                </button>
                                                <a href="ruangan.php"><button id="kembali" name="kembali" type="button" class="btn btn-sm btn-outline-secondary btn-block">
                                                    <i class="fa fa-arrow-left fa-lg"></i>&nbsp;
                                                    <span id="kembali"><a href="jadwal.php">Kembali</a></span>
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
