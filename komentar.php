<?php 
include 'head.php'; 
include 'navbar.php';
?>

<!-- ======= Mulai Isi Body ===== -->

<!-- Section-->
  <section id="contact" class="contact py-5 mt-4 mb-4">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Forum</h2>
        </div>

        <div class="row">
          <div class="align-items-stretch">
            <div class="info">
              <div class="card mb-4">
                <?php
                include 'forum/db.php';
                $db = new Database();
                $db->connect();

                // data postingan
                $id = $db->escapeString(trim($_GET['id']));
                $db->select('postingan','nama, pesan, waktu',null,"id='$id' and parent='0'");
                $parent = $db->getResult();
                ?>

                <div class="card-body">
                  <h5><?=$parent[0]['nama'];?><br>
                    <span class="text-muted" style="font-size: 12px;">
                      <em><?=$parent[0]['waktu'];?></em>
                    </span>
                  </h5>
                  <br>
                  <?=$parent[0]['pesan'];?>
                </div>
                <div class="card-footer">
                  <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="bi bi-pencil-square"></i>
                  </a>
                </div>
              </div>
              <hr>

              <?php
              $db->select('postingan','nama, pesan, waktu',null,"parent='$id'",'waktu desc');
              $komentar = $db->getResult();
              foreach($komentar as $data){ ?>

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
              </div>
              <?php } ?>
          </div>
        </div>

      </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-body">
        <form action="forum/simpan_komentar.php" method="POST" role="form">
        <input type="hidden" name="id" id="inputId" class="form-control" value="<?=$_GET['id'];?>">
      
        <div class="form-group">
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" required>
        </div>
      
        <div class="form-group">
          <textarea name="pesan" id="inputPesan" class="form-control" rows="3"placeholder="Pesan Anda" required></textarea>
        </div>
      
        <button type="submit" class="btn btn-primary">Kirim</button>
      </form>
      </div>

    </div>
  </div>
</div>
<?php include 'footer.php'; ?>