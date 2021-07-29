<main class="app-content">
    
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-inbox fa-3x"></i>
        <div class="info">
          <h5>Suara Masuk</h5>
          <p><b><?= $suaraMasuk ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-check-square-o fa-3x"></i>
        <div class="info">
          <h5>Pemilih</h5>
          <p><b><?= $pemilih ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h5>Kandidat</h5>
          <p><b><?= $kandidat ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-user-circle fa-3x"></i>
        <div class="info">
          <h5>Petugas</h5>
          <p><b><?= $petugas ?></b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
     <?php $no = 1; foreach($voting as $k) : ?>
       <div class="col-md-6">
          <div class="card text-center">
             <div class="card-header"><h4><?= $no++; ?></h4></div>
             <div class="card-body">
                <h3><?= $k->nama_kandidat ?></h3>
                <?php  
                $jmlSuaraIdKandidat = $this->db->get_where('pilih', ['id_kandidat' => $k->id_kandidat])->num_rows();
                $presentase = ($jmlSuaraIdKandidat / $suaraMasuk) * 100;
                ?>
                <h6>Perolehan : <?= $presentase . '%' . ' / ' . $jmlSuaraIdKandidat . ' Suara'; ?></h6>
                <img src="<?= base_url('public/backend/images/kandidat/' . $k->foto_kandidat) ?>" width="200" class="img-fluid">
             </div>
          </div>
       </div>
    <?php endforeach; ?>
  </div>

</main>