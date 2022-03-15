<?php 
include 'head.php'; 
include 'navbar.php';
?>

<!-- ======= Mulai Isi Body ===== -->

<!-- Section-->
  <section id="contact" class="contact py-5 mt-4 mb-4">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-title">
          <h2>Forum</h2>
          <p>Silahkan tanyakan kendala anda atau problem anda mengenai praktikum materi yang sudah kami sediakan, dan bergabung dengan komunitas sesama pengguna aplikasi ini.</p>
        </div>

          <div class="">
            <div class="info">
              <div class="card mb-4">
                <div class="card-body">
                  <form action="forum/simpan.php" method="POST" role="form" >
                <div class="form-group">
                  <label for="name">Your Name</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" required>
                </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea name="pesan" id="inputPesan" class="form-control" rows="3"placeholder="Pesan Anda" required></textarea>
              </div>
              <div class="text-center">
                <button class="btn btn-primary" type="submit">Send Message</button></div>
              </form>
                </div>
              </div>
              <hr>
              <hr>
              <?php
              date_default_timezone_set('Asia/Jakarta');
              include 'forum/db.php';
              $db = new Database();
              $db->connect();
              $db->select('postingan','*',null,"parent='0'",'waktu DESC');
              $res = $db->getResult();

              foreach($res as $data){
              ?>

              
              <div class="card shadow p-3 mb-3 bg-body rounded">
                <div class="card-body">
                  <h5><?=$data['nama'];?><br>
                    <span class="text-muted" style="font-size: 12px;">
                      <em><?=$data['waktu'];?></em>
                    </span>
                  </h5>

                  <br>
                  <?=$data['pesan'];?>
                </div>
                <div class="card-footer">
                  <a href="komentar.php?id=<?=$data['id'];?>" class=" position-relative">
                    <i class="bi bi-chat-square-text"></i>
                  </a>
                </div>
              </div>
              <?php } ?>
          </div>
        </div>
    </section>
<?php include 'footer.php'; ?>