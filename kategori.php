<?php 
include 'head.php'; 
include 'navbar.php';
?>

<!-- ======= Mulai Isi Body ===== -->

<section id="about" class="py-5 mt-4">
<div class="section-title">
<h2>Materi</h2>
</div>
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php 
        include "koneksi.php";
        $id = $_GET['id'];
        $query_mysql = mysqli_query($koneksi,"SELECT * FROM materi WHERE tingkatan='$id'")or die(mysqli_error());
        while($data = mysqli_fetch_array($query_mysql)){
        ?>
        <div class="col mb-5">
            <div class="card h-100">
                <!-- Sale badge-->
                <div class="badge text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                    <?php 
                      if ($data['tingkatan']>=20) {
                        echo "<span class='badge bg-danger text-light'>Lanjutan</span>";
                      }elseif ($data['tingkatan']>=10) {
                        echo "<span class='badge bg-warning text-light'>Menengah</span>";
                      }else {
                        echo "<span class='badge bg-success text-light'>Dasar</span>";
                      }

                       ?>
                </div>
                <!-- Product image-->
                <img class="card-img-top" src="assets/img/dasar.jpg" alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h6 class="fw-bolder"><?=$data['judul'];?><br>
                        <!-- Product price-->
                        <span class="text-muted" style="font-size: 12px;">
                          <em><?=$data['tag'];?></em>
                        </span>
                        </h6>
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a href="lihat_materi.php?id=<?=$data['id_materi'];?>" class="btn btn-outline-dark mt-auto" href="#">Belajar</a></div>
                </div>
            </div>
        </div>
        <?php } ?>
        
    </div>
</div>
</section>
<?php include 'footer.php'; ?>