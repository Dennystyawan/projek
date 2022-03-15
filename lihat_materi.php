<?php 
include 'head.php'; 
include 'navbar.php';
?>

<!-- ======= Mulai Isi Body ===== -->

<!-- Section-->

      <div class="container py-5 mt-4 mb-4">
        <?php 
        include "koneksi.php";
        $id = $_GET['id'];
        $query_mysql = mysqli_query($koneksi,"SELECT * FROM materi WHERE id_materi='$id'")or die(mysqli_error());
        $data = mysqli_fetch_array($query_mysql);
        ?>
        <div class="">
          <h4><?=$data['judul'];?>
          <span class="text-muted" style="font-size: 12px;"><br>
            Tag : <em><?=$data['tag'];?></em>,<br>
            Diposting: <em><?=$data['tanggal'];?></em>
          </span>
          </h4>
          <hr>
          <p><?=$data['materi'];?></p>
          
        </div>

        </div>

<?php include 'footer.php'; ?>