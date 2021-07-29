<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
    <div>
      <p class="app-sidebar__user-name"><?= ($this->session->userdata('nama_petugas') ? $this->session->userdata('nama_petugas') : ($this->session->userdata('nama_pemilih') ? $this->session->userdata('nama_pemilih') : '')); ?></p>
      <p class="app-sidebar__user-designation">Frontend Developer</p>
    </div>
  </div>
  <ul class="app-menu">
    <?php if($this->session->userdata('id_petugas')) : ?>
    <li><a class="app-menu__item" href="<?= base_url('admin/dashboard') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Kelola</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?= base_url('admin/petugas') ?>"><i class="icon fa fa-circle-o"></i> Petugas</a></li>
        <li><a class="treeview-item" href="<?= base_url('admin/kandidat') ?>"><i class="icon fa fa-circle-o"></i> Kandidat</a></li>
        <li><a class="treeview-item" href="<?= base_url('admin/pemilih') ?>"><i class="icon fa fa-circle-o"></i> Pemilih</a></li>
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Laporan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?= base_url('admin/petugas/laporan') ?>"><i class="icon fa fa-circle-o"></i> Petugas</a></li>
        <li><a class="treeview-item" href="<?= base_url('admin/kandidat/laporan') ?>"><i class="icon fa fa-circle-o"></i> Kandidat</a></li>
        <li><a class="treeview-item" href="<?= base_url('admin/kandidat/suara') ?>"><i class="icon fa fa-circle-o"></i> Hasil Suara</a></li>
      </ul>
    </li>
    <?php endif; ?>

    <?php if($this->session->userdata('id_pemilih')) : ?>
    <li><a class="app-menu__item" href="<?= base_url('admin/dashboard') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    <?php endif; ?>

    <!-- <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li> -->
  </ul>
</aside>

    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url('public/backend/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('public/backend/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('public/backend/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('public/backend/js/main.js') ?>"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url('public/backend/js/plugins/pace.min.js') ?>"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      $('.alert').fadeIn(1000);
       setTimeout(function() { 
           $('.alert').fadeOut(1000); 
           <?php 
           $this->session->unset_userdata('success'); 
           $this->session->unset_userdata('danger'); 
           $this->session->unset_userdata('error'); 
           ?>
       }, 5000);
      if(document.location.hostname == 'pratikborsadiya.in') {
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
         ga('create', 'UA-72504830-1', 'auto');
         ga('send', 'pageview');
      }
    </script>
  </body>
</html>