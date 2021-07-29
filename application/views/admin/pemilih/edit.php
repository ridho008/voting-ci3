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
              <?= form_open('pemilih/edit/' . $pemilih->id_pemilih); ?>
              <div class="form-group">
                 <label for="nama_pemilih">Nama Pemilih</label>
                 <input type="text" name="nama_pemilih" class="form-control" value="<?= ($pemilih->nama_pemilih) ? $pemilih->nama_pemilih : set_value('nama_pemilih') ?>">
                 <small class="text-danger"><?= form_error('nama_pemilih'); ?></small>
              </div>
              <div class="form-group">
                 <label for="jenkel">Jenis Kelamin</label>
                 <select name="jenkel" id="jenkel" class="form-control">
                    <option value="">-- Jenis Kelamin --</option>
                    <option value="P" <?= ($pemilih->jenkel == 'P' ? 'selected' : '') ?>>Pria</option>
                    <option value="W" <?= ($pemilih->jenkel == 'W' ? 'selected' : '') ?>>Wanita</option>
                 </select>
              </div>
              <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" name="username" class="form-control" value="<?= ($pemilih->username) ? $pemilih->username : set_value('username') ?>">
                 <small class="text-danger"><?= form_error('username'); ?></small>
              </div>
              <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" name="password" class="form-control" placeholder="masukan password baru">
                 <small class="text-danger"><?= form_error('password'); ?></small>
              </div> 
              <div class="form-group">
                 <button type="submit" class="btn btn-primary">Edit</button>
                 <a href="<?= base_url('admin/pemilih') ?>" class="btn btn-dark">Kembali</a>
              </div>   
              <?= form_close(); ?>           
           </div>
        </div>
     </div>
  </div>
</main>