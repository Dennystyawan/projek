<?php 
include 'head.php'; 
include 'navbar.php';
?>

<!-- ======= Mulai Isi Body ===== -->

<!-- Section-->
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section class="faq section-bg py-5 mt-4 mb-4">
      <div class="container">

        <div class="section-title">
          <h2>Pertanyaan Yang Umum</h2>
          <p>Berikut ini merupakan pertanyaan yang sering muncul di forum atau di konsultasi mengenai penggunaan aplikasi ini, apakah pertanyaan ini sama seperti yang ingin anda sampaikan ? jika sama mungkin solusi kami akan membantu anda menyelesaikan masalah anda lebih cepat.</p>
        </div>

<!-- faq dikontrol langsung dari admin dan data disimpan ke database -->
        <div class="faq-list">
          <ul>
            <?php
            include 'panel/pages/db.php';
            $no = 100;
            $db = new Database();
            $db->connect();
            $db->select('faq','*',null,'','id_faq DESC');
            $res = $db->getResult();

            foreach($res as $data){
            ?>

            <li data-aos="fade-up" data-aos-delay="<?=$no++;?>">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-<?=$data['id_faq'];?>">
              <?=$data['judul'];?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-<?=$data['id_faq'];?>" class="collapse" data-bs-parent=".faq-list">
                <p>
                  <?=$data['isi'];?>
                </p>
              </div>
            </li>
            <?php } ?>


          </ul>
        </div>

      </div>
    </section>
<?php include 'footer.php'; ?>