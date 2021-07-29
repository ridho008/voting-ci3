<main class="app-content">
    
  <div class="app-title">
    <div>
      <h1><i class="fa fa-user-circle"></i> <?= $title; ?></h1>
    </div>
  </div>

  <div class="row">
     <div class="col-md-12">
        <div class="card">
           <div class="card-body">
              <a href="<?= base_url('petugas/cetak') ?>" target="_blank" class="btn btn-primary mb-3">Cetak</a>
              <div class="table-responsive">
                 <table class="table table-striped">
                    <thead>
                       <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Username</th>
                       </tr>
                    </thead>
                    <tbody>
                       <?php $no = 1; foreach($petugas as $p) : ?>
                       <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $p->nama_petugas; ?></td>
                          <td><?= $p->username; ?></td>
                       </tr>
                       <?php endforeach;?>
                    </tbody>
                 </table>
              </div>
           </div>
        </div>
     </div>
  </div>
</main>