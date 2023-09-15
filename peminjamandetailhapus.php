<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $detailpinjam = new detailpinjam();
    $pinjam = new pinjam();

    if((isset($_GET['kd_pinjam'])) && (isset($_GET['kd_ruang'])) ){
        $kd_ruang = $_GET['kd_ruang'];
        $kd_pinjam = $_GET['kd_pinjam'];
        $status = $pinjam->cekStatusPinjam($kd_pinjam);

        //echo json_encode($status);

        if($status != "ACC")
        {
          $hapusdetail = $detailpinjam->delete($kd_pinjam, $kd_ruang);

          if($hapusdetail){ ?>
            <script type="text/javascript">
              alert('Data Berhasil Dihapus');
              document.location='peminjaman.php'
            </script>
            <?php
          }
          else {
            ?>
            <script type="text/javascript">
              alert('Data Gagal Dihapus');
                document.location='peminjamandetailhapus.php'
            </script>
            <?php
          }
        }
        else
        { ?>
          <script type="text/javascript">
            alert('Data Peminjaman Sudah di ACC. Anda tidak dapat manghapusnya');
            document.location='peminjaman.php'
          </script>
        <?php
      }
    }


?>
