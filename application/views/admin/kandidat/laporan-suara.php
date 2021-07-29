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
              <a href="<?= base_url('kandidat/cetak_suara') ?>" target="_blank" class="btn btn-primary mb-3">Cetak</a>
              <div class="table-responsive">
                 <table class="table table-striped">
                    <thead>
                       <tr>
                          <th>No</th>
                          <th>No.Kandidat</th>
                          <th>Nama</th>
                          <th>Presentasi</th>
                       </tr>
                    </thead>
                    <tbody>
                       <?php $no = 1; foreach($kandidat as $p) : ?>
                       <?php  
                       $jmlSuaraIdKandidat = $this->db->get_where('pilih', ['id_kandidat' => $p->id_kandidat])->num_rows();
                       $presentase = ($jmlSuaraIdKandidat / $suaraMasuk) * 100;
                       ?>
                       <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $p->no_kandidat; ?></td>
                          <td><?= $p->nama_kandidat; ?></td>
                          <td><?= $presentase . '%'; ?></td>
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