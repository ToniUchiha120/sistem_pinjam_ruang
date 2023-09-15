<?php
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $matakuliah = new matakuliah();
    $data_matkul = $matakuliah->show();
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-MATAKULIAH</title>
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
                        <h3 class="tile-title"><a href="matkultambah.php" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>&nbsp; Tambah Data Mata Kuliah</a></h3>
                          <div class="card-header">
                              <strong class="card-title">Data Mata Kuliah</strong>
                          </div>

                          <div class="card-body">
                              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <thead>
                                      <tr align="center">
                                          <th>No</th>
                                          <th>Kode Mata Kuliah</th>
                                          <th>Nama Mata Kuliah</th>
                                          <th>Semester</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $no = 1;
                                      foreach($data_matkul as $row)
                                      {
                                          echo "<tr>";
                                          echo "<td>".$no."</td>";
                                          echo "<td>".$row['kd_matkul']."</td>";
                                          echo "<td>".$row['nama_matkul']."</td>";
                                          echo "<td>".$row['semester']."</td>";
                                          echo "<td align='center'><a class='btn btn-info btn-sm' href='matkulubah.php?kd_matkul=".$row['kd_matkul']."'><i class='fa fa-edit'></i>&nbsp; Ubah</a>
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
