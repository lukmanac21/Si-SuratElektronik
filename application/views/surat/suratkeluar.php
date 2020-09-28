<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('_partials/head');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php $this->load->view('_partials/navbar');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view('_partials/sidebar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
            <div class="card-header">
            <h3 class="card-title">Surat Keluar</h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No Surat </th>
                <th>Dikirim Pada</th>
                <th>Bagian Pengirim</th>
                <th>Kepada</th>
                <th>Perihal</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($surat as $row_surat){?>
                  <tr>
                  <td><a href="<?= site_url('surat/read_surat/').$row_surat->id_surat;?>"><?= $row_surat->no_surat?></td>
                  <td><?= $row_surat->terkirim_pada?></td>
                  <td><?= $row_surat->bagian_pengirim?></td>
                  <td><?= $row_surat->bagian_penerima?></td>
                  <td><?= $row_surat->nama_perihal?></td>
                  <td><?= $row_surat->nama_status?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
            </div>
        </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark"></aside>
  <?php $this->load->view('_partials/footer');?>
</body>
</html>
