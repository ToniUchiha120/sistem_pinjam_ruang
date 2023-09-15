<?php
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $jadwal = new jadwal();
    $data_jadwal = $jadwal->show();
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

                  <div class="col-md-12">
                      <div class="card">
                        <h3 class="tile-title"><a href="jadwaltambah.php" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>&nbsp; Tambah Data Jadwal</a></h3>
                          <div class="card-header">
                              <strong class="card-title">Data Jadwal</strong>
                          </div>

                          <div class="card-body">
                              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <thead>
                                      <tr align="center">
                                          <th>No</th>
                                          <th>Kode Jadwal</th>
                                          <th>Ruang</th>
                                          <th>Kelas</th>
                                          <th>Matakuliah</th>
                                          <th>Hari</th>
                                          <th>Jam Mulai</th>
                                          <th>Jam Berakhir</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $no = 1;
                                      foreach($data_jadwal as $row)
                                      {
                                          echo "<tr>";
                                          echo "<td>".$no."</td>";
                                          echo "<td>".$row['kd_jadwal']."</td>";
                                          echo "<td>".$row['nama_ruang']."</td>";
                                          echo "<td>".$row['nama_kelas']."</td>";
                                          echo "<td>".$row['nama_matkul']."</td>";
                                          echo "<td>".$row['hari']."</td>";
                                          echo "<td>".$row['jam_mulai']."</td>";
                                          echo "<td>".$row['jam_berakhir']."</td>";
                                          echo "<td align='center'><a class='btn btn-info btn-sm' href='jadwalubah.php?kd_jadwal=".$row['kd_jadwal']."'><i class='fa fa-edit'></i>&nbsp; Ubah</a>
                                          </td>";
                                          echo "</tr>";
                                          $no++;
                                      }
                                    ?>
                                  </tbody>
                              </table>
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
