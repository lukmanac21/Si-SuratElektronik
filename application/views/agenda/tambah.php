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
            <h3 class="card-title">Tambah Data Master Agenda</h3>
          </div>
            <div class="card-body">
              <form class="form-horizontal" role="form" action="<?= site_url('Agenda/save_data');?>" method="post">
                  <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Nama Agenda</label>
                        <div class="col-sm-11">
                        <input type="text" class="form-control" name="nama_agenda" placeholder="Nama Agenda" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Tanggal </label>
                        <div class="col-sm-11">
                        <input type="date" class="form-control" name="tgl_agenda" placeholder="Tanggal Agenda" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Jam</label>
                        <div class="col-sm-11">
                        <input type="time" class="form-control" name="jam_agenda" placeholder="Jam Agenda" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Tempat</label>
                        <div class="col-sm-11">
                        <input type="text" class="form-control" name="tempat_agenda" placeholder="Tempat Agenda" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Keterangan</label>
                        <div class="col-sm-11">
                        <input type="text" class="form-control" name="ket_agenda" placeholder="Keterangan Agenda" required>
                        </div>
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
