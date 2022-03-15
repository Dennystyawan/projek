<?php 
include 'head.php'; 
include 'navbar.php';
?>

<!-- ======= Mulai Isi Body ===== -->
<!-- ======= Hero Section (Bagian Atas UI) ======= -->
<section id="hero" class="d-flex align-items-center">
<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
      <h1>Solusi Terbaik Untuk Ilmu Pengetahuan Anda</h1>
      <h2>Kami adalah team yang terus mengembangkan inovasi didunia pendidikan</h2>
      <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
      <img src="assets/img/hero1.png" class="img-fluid animated" alt="">
    </div>
  </div>
</div>
</section><!-- End Hero -->


<!-- Bgian Kedua Tampilan Untuk Kategori -->

<!-- Section-->
        <section id="about" class="py-5">
          <div class="section-title">
            <h2>Materi</h2>
          </div>
    <div class="container px-4 px-lg-5 mt-5">
      <div class="mb-4 col-6">
      <input class="form-control" type="text" autocomplete="true">
      </div>
    
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
          include 'panel/pages/db.php';
          $no = 1;
          $db = new Database();
          $db->connect();
          $db->select('materi','*',null,'','id_materi DESC');
          $res = $db->getResult();

          foreach($res as $data){
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