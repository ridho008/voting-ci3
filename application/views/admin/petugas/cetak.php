<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laporan Petugas</title>
</head>
<body>
   <center>
      <h1>Laporan Data Petugas Website Voting</h1>
   </center>
   <table border="1" cellpadding="10" cellspacing="0" width="100%">
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

<script>
   window.print();
</script>
</body>
</html>