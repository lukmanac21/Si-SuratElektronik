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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data ASN</h3>
              </div>
            <div class="card-body">
              <form class="form-horizontal" role="form" action="<?= site_url('asn/save_data');?>" method="post">
                  <div class="card-body">
                  <div class="form-group row">
                      <label for="nama_jabatan">Nama Jabatan</label>
                      <select class="form-control select2" id="nama_jabatan" name="id_asn" style="width: 100%;">
                            <?php foreach($bagian as $row_bagian){?>
                            <option value="<?= $row_bagian->id_bagian;?>"><?= $row_bagian->nama_bagian;?></option>
                            <?php } ?>
                        </select>
                  </div>
                  <div class="form-group row">
                      <label for="nama_asn">Nama Asn</label>
                      <input id="nama_asn" type="text" class="form-control" name="nama_asn" placeholder="Nama Asn" required>
                  </div>
                  <div class="form-group row">
                      <label for="email_asn">Email</label>
                      <input id="email_asn" type="email" class="form-control" name="email_asn" placeholder="Email Asn" required unique="true">
                  </div>
                  <div class="form-group row">
                      <label for="password_asn">Password</label>
                      <input id="password_asn" type="password" class="form-control" name="password_asn" placeholder="Password Asn" required>
                  </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="reset" class="btn btn-default float-right">Reset</button>
                  </div>
                  <!-- /.card-footer -->
              </form>
            </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php $this->load->view('_partials/footer');?>
</body>
</html>
