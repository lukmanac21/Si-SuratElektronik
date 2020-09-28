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
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Master OPD</h3>
          </div>
            <div class="card-body">
            <?php foreach($dinas as $row_dinas){?>
                <form class="form-horizontal" role="form" action="<?= site_url('OPD/update_data');?>" method="post">
                    <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama OPD</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_dinas" placeholder="Nama OPD" value="<?= $row_dinas->nama_dinas;?>" required>
                        <input type="hidden" class="form-control" name="id_dinas" value="<?= $row_dinas->id_dinas;?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat OPD</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat_dinas" placeholder="Alamat OPD" value="<?= $row_dinas->alamat_dinas;?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Telp OPD</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="telp_dinas" placeholder="No Telp OPD" value="<?= $row_dinas->telp_dinas;?>" required>
                        </div>
                    </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <button type="reset" class="btn btn-default float-right">Reset</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            <?php } ?>
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
