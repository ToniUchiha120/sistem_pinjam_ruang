<?php
    if(!isset($_SESSION))
    {
       session_start();
    }
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $pinjam = new pinjam();

    if(isset($_SESSION['pengguna']))
    {
       $kode = $_SESSION['pengguna']['kd_pengguna'];
       $data_pinjam = $pinjam->get_by_idAll($kode);
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

                  <div class="col-md-12">
                      <div class="card">
                        <h3 class="tile-title"><a href="peminjamantambah.php" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>&nbsp; Pinjam Ruangan</a></h3>
                          <div class="card-header">
                              <strong class="card-title">Data Peminjaman</strong>
                          </div>

                          <div class="card-body">
                              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <thead>
                                      <tr align="center">
                                          <th>No</th>
                                          <th>Kode Pinjam</th>
                                          <th>Kode Peminjam</th>
                                          <th>Tanggal Pinjam</th>
                                          <th>Lama Pinjam</th>
                                          <th>Keperluan</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $no = 1;
                                      foreach($data_pinjam as $row)
                                      {
                                          echo "<tr>";
                                          echo "<td>".$no."</td>";
                                          echo "<td>".$row['kd_pinjam']."</td>";
                                          echo "<td>".$row['kd_peminjam']."</td>";
                                          echo "<td>".$row['tgl_pinjam']."</td>";
                                          echo "<td>".$row['lama_pinjam']."</td>";
                                          echo "<td>".$row['keperluan']."</td>";

                                          echo "<td align='center'><a class='btn btn-info btn-sm' href='peminjamanubah.php?kd_pinjam=".$row['kd_pinjam']."'><i class='fa fa-edit'></i>&nbsp; Ubah</a>
                                          <a class='btn btn-warning btn-sm' href='peminjamandetail.php?kd_pinjam=".$row['kd_pinjam']."'><i class='fa fa-search'></i>&nbsp; Detail</a>
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
