<main class="app-content">
    
  <div class="app-title">
    <div>
      <h1><i class="fa fa-user-circle"></i> <?= $title; ?></h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
       <?php if($this->session->flashdata('success') != null) : ?>
          <?= $this->session->flashdata('success') ?>
       <?php endif; ?>

       <?php if($sudahMemilih) : ?>
       <div class="alert-info p-4 mb-2" role="alert">Anda sudah melakukan pemilihan kandidat, tidak bisa lagi melakukannya lagi!</div>
       <?php endif; ?>
    </div>
  </div>
  <div class="row">
   <?php $no = 1; foreach($kandidat as $k) : ?>
     <div class="col-md-6">
        <div class="card text-center">
           <div class="card-header"><h4><?= $no++; ?></h4></div>
           <div class="card-body">
              <h3><?= $k->nama_kandidat ?></h3>
              <img src="<?= base_url('public/backend/images/kandidat/' . $k->foto_kandidat) ?>" width="200" class="img-fluid">
              <?php if(empty($sudahMemilih)) : ?>
              <a href="<?= base_url('utama/pilih/' . $k->id_kandidat); ?>" class="btn btn-primary btn-block mt-3">Pilih</a>
              <?php endif; ?>
           </div>
        </div>
     </div>
  <?php endforeach; ?>
  </div>
  
</main>