<?php
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $pengguna = new pengguna();
    $data_pengguna = $pengguna->show();
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
                        <h3 class="tile-title"><a href="penggunatambah.php" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>&nbsp; Tambah Data pengguna</a></h3>
                          <div class="card-header">
                              <strong class="card-title">Data Pengguna</strong>
                          </div>

                          <div class="card-body">
                              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <thead>
                                      <tr align="center">
                                          <th>No</th>
                                          <th>Kode Pengguna</th>
                                          <th>Username</th>
                                          <th> Password </th>
                                          <th> Level </th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $no = 1;
                                      foreach($data_pengguna as $row)
                                      {
                                          echo "<tr>";
                                          echo "<td>".$no."</td>";
                                          echo "<td>".$row['kd_pengguna']."</td>";
                                          echo "<td>".$row['username']."</td>";
                                          echo "<td>".$row['password']."</td>";
                                          echo "<td>".$row['level']."</td>";
                                          echo "<td align='center'><a class='btn btn-info btn-sm' href='penggunaubah.php?kd_pengguna=".$row['kd_pengguna']."'><i class='fa fa-edit'></i>&nbsp; Ubah</a>
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
