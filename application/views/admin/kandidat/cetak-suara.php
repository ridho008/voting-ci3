<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laporan Suara</title>
</head>
<body>
   <center>
      <h1>Laporan Data Suara Website Voting</h1>
   </center>
   <table border="1" cellpadding="10" cellspacing="0" width="100%">
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

<script>
   window.print();
</script>
</body>
</html>