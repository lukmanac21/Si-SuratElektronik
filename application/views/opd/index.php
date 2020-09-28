<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('_partials/head');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php $this->load->view('_partials/navbar');?>
  <?php $this->load->view('_partials/sidebar');?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Master OPD</h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url();?>/Opd/add_data';">Tambah</button>
              <br>
                <br>
              <thead>
              <tr>
                <th>Nama OPD</th>
                <th>Alamat OPD</th>
                <th>No Telp</th>
                <th style="text-align:center;">Ubah</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($dinas as $row_dinas){?>
                    <tr>
                        <td><?= $row_dinas->nama_dinas;?></td>
                        <td><?= $row_dinas->alamat_dinas;?></td>
                        <td><?= $row_dinas->telp_dinas;?></td>
                        <td style="text-align:center;"><a style="color:white;" type="button" href="<?= site_url('Opd/edit_data/').$row_dinas->id_dinas ;?>" class="btn btn-info" > Ubah</a</td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <?php $this->load->view('_partials/footer');?>
</body>
</html>
