<main class="app-content">
    
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> <?= $title; ?></h1>
    </div>
  </div>

  <div class="row">
     <div class="col-md-12">
      <?php if($this->session->flashdata('success') != null) : ?>
         <?= $this->session->flashdata('success') ?>
      <?php endif; ?>
        <div class="card">
           <div class="card-body">
              <a href="<?= base_url('admin/kandidat/create') ?>" class="btn btn-primary mb-3">Tambah Data Kandidat</a>
              <div class="table-responsive">
                 <table class="table table-striped">
                    <thead>
                       <tr>
                          <th>No</th>
                          <th>Foto</th>
                          <th>No.Kandidat</th>
                          <th>Nama</th>
                          <th>Aksi</th>
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
                          <td>
                             <a href="<?= base_url('kandidat/delete/' . $p->id_kandidat); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                             <a href="<?= base_url('kandidat/edit/' . $p->id_kandidat); ?>" class="btn btn-info btn-sm">Edit</a>
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