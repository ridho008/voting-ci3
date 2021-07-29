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
              <?= form_open_multipart('kandidat/edit/' . $kandidat->id_kandidat); ?>
              <div class="form-group">
                 <label for="nama_kandidat">Nama Kandidat</label>
                 <input type="text" name="nama_kandidat" class="form-control" value="<?= ($kandidat->nama_kandidat) ? $kandidat->nama_kandidat : set_value('nama_kandidat') ?>">
                 <small class="text-danger"><?= form_error('nama_kandidat'); ?></small>
              </div>
              <div class="form-group">
                 <label for="no_kandidat">no_kandidat</label>
                 <input type="text" name="no_kandidat" disabled class="form-control" value="<?= ($kandidat->no_kandidat) ? $kandidat->no_kandidat : set_value('no_kandidat') ?>">
                 <small class="text-danger"><?= form_error('no_kandidat'); ?></small>
              </div>
              <div class="form-group">
                 <label for="foto_kandidat">Foto</label><br>
                 <img src="<?= base_url('public/backend/images/kandidat/' . $kandidat->foto_kandidat) ?>" width="100px" class="img-fluid">
                 <input type="file" name="foto_kandidat" class="form-control-file">
                 <input type="text" name="foto_kandidat_lama" class="form-control" value="<?= ($kandidat->foto_kandidat) ? $kandidat->foto_kandidat : set_value('foto_kandidat') ?>">
              </div> 
              <div class="form-group">
                 <button type="submit" class="btn btn-primary">Edit</button>
                 <a href="<?= base_url('admin/kandidat') ?>" class="btn btn-dark">Kembali</a>
              </div>   
              <?= form_close(); ?>           
           </div>
        </div>
     </div>
  </div>
</main>