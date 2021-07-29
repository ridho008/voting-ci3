<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laporan Kandidat</title>
</head>
<body>
   <center>
      <h1>Laporan Data Kandidat Website Voting</h1>
   </center>
   <table border="1" cellpadding="10" cellspacing="0" width="100%">
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

<script>
   window.print();
</script>
</body>
</html>