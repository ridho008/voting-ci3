<main class="app-content">
    
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> <?= $title; ?></h1>
    </div>
  </div>

  <div class="row">
     <div class="col-md-12">
        <div class="card">
           <div class="card-body">
            <?php if($this->session->flashdata('error')) : ?>
               <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>
            <?php if($this->session->flashdata('success')) : ?>
               <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('success') ?></div>
            <?php endif; ?>
              <?= form_open_multipart('kandidat/create'); ?>
              <div class="form-group">
                 <label for="nama_kandidat">Nama Kandidat</label>
                 <input type="text" name="nama_kandidat" class="form-control" value="<?= set_value('nama_kandidat'); ?>">
                 <small class="text-danger"><?= form_error('nama_kandidat'); ?></small>
              </div>
              <!-- <div class="form-group">
                 <label for="no_kandidat">no_kandidat</label>
                 <input type="text" name="no_kandidat" class="form-control" value="<?= set_value('no_kandidat'); ?>">
                 <small class="text-danger"><?= form_error('no_kandidat'); ?></small>
              </div> -->
              <div class="form-group">
                 <label for="foto_kandidat">Foto</label>
                 <input type="file" name="foto_kandidat" class="form-control-file">
              </div> 
              <div class="form-group">
                 <button type="submit" class="btn btn-primary">Tambah</button>
                 <a href="<?= base_url('admin/kandidat') ?>" class="btn btn-dark">Kembali</a>
              </div>   
              <?= form_close(); ?>           
           </div>
        </div>
     </div>
  </div>
</main>