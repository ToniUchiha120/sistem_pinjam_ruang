<?php
    if(!isset($_SESSION))
    {
       session_start();
    }
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $detailpinjam = new detailpinjam();

    if(isset($_GET['kd_pinjam']))
    {
       $kode = $_GET['kd_pinjam'];
       $data_pinjamdetail = $detailpinjam->get_by_idAll($kode);
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
                        <h3 class="tile-title"><a href="peminjamandetailtambah.php?kd_pinjam=<?php echo $kode; ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>&nbsp; Tambah Ruangan</a></h3>
                          <div class="card-header">
                              <strong class="card-title">Data Peminjaman</strong>
                          </div>

                          <div class="card-body">
                              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <thead>
                                      <tr align="center">
                                          <th>No</th>
                                          <th>Kode Pinjam</th>
                                          <th>Kode Ruang</th>
                                          <th>Nama Ruangan</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $no = 1;
                                      foreach($data_pinjamdetail as $row)
                                      {
                                          echo "<tr>";
                                          echo "<td>".$no."</td>";
                                          echo "<td>".$row['kd_pinjam']."</td>";
                                          echo "<td>".$row['kd_ruang']."</td>";
                                          echo "<td>".$row['nama_ruang']."</td>";

                                          echo "<td align='center'><a class='btn btn-warning btn-rounded btn-sm' href='peminjamandetailhapus.php?kd_pinjam=".$row['kd_pinjam']."&kd_ruang=".$row['kd_ruang']."'><i class='fa fa-eraser'></i>Hapus</a>
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

        <?php include "footer.php"; ?>

    </div>
    <!-- /#right-panel -->

    <?php include "linkjs.php"; ?>
</body>
</html>
