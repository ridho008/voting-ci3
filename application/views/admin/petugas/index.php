<main class="app-content">
    
  <div class="app-title">
    <div>
      <h1><i class="fa fa-user-circle"></i> <?= $title; ?></h1>
    </div>
  </div>

  <div class="row">
     <div class="col-md-12">
      <?php if($this->session->flashdata('success') != null) : ?>
         <?= $this->session->flashdata('success') ?>
      <?php endif; ?>
        <div class="card">
           <div class="card-body">
              <a href="petugas/create" class="btn btn-primary mb-3">Tambah Data Petugas</a>
              <div class="table-responsive">
                 <table class="table table-striped">
                    <thead>
                       <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Aksi</th>
                       </tr>
                    </thead>
                    <tbody>
                       <?php $no = 1; foreach($petugas as $p) : ?>
                       <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $p->nama_petugas; ?></td>
                          <td><?= $p->username; ?></td>
                          <td>
                             <a href="<?= base_url('petugas/delete/' . $p->id_petugas); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                             <a href="<?= base_url('petugas/edit/' . $p->id_petugas); ?>" class="btn btn-info btn-sm">Edit</a>
                          </td>
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