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
              <?= form_open('petugas/create'); ?>
              <div class="form-group">
                 <label for="nama_petugas">Nama Petugas</label>
                 <input type="text" name="nama_petugas" class="form-control" value="<?= set_value('nama_petugas'); ?>">
                 <small class="text-danger"><?= form_error('nama_petugas'); ?></small>
              </div>
              <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>">
                 <small class="text-danger"><?= form_error('username'); ?></small>
              </div>
              <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" name="password" class="form-control">
                 <small class="text-danger"><?= form_error('password'); ?></small>
              </div> 
              <div class="form-group">
                 <button type="submit" class="btn btn-primary">Tambah</button>
                 <a href="<?= base_url('admin/petugas') ?>" class="btn btn-dark">Kembali</a>
              </div>   
              <?= form_close(); ?>           
           </div>
        </div>
     </div>
  </div>
</main>