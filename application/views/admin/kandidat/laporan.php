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
              <a href="<?= base_url('kandidat/cetak') ?>" target="_blank" class="btn btn-primary mb-3">Cetak</a>
              <div class="table-responsive">
                 <table class="table table-striped">
                    <thead>
                       <tr>
                          <th>No</th>
                          <th>Foto</th>
                          <th>No.Kandidat</th>
                          <th>Nama</th>
                       </tr>
                    </thead>
                    <tbody>
                       <?php $no = 1; foreach($kandidat as $p) : ?>
                       <tr>
                          <td><?= $no++; ?></td>
                          <td>
                             <img src="<?= base_url('public/backend/images/kandidat/' . $p->foto_kandidat) ?>" width="100px" class="img-fluid">
                          </td>
                          <td><?= $p->no_kandidat; ?></td>
                          <td><?= $p->nama_kandidat; ?></td>
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