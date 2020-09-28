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
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pesan Baru</h3>
                </div>
                <!-- /.card-header -->
                <form class="form-horizontal" role="form" action="<?= site_url('Surat/save_data');?>" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <select class="form-control select2" style="width: 100%;" id="id_dinas">
                            <option value="">--Pilih Dinas--</option>
                            <?php foreach($dinas as $row_dinas){?>
                            <option value="<?= $row_dinas->id_dinas;?>"><?= $row_dinas->nama_dinas;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <select class="form-control select2" style="width: 100%;" id="id_bagian" name="bagian_penerima">
                        <option value="">--Pilih Penanggung Jawab--</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <select class="form-control select2" style="width: 100%;" name="id_perihal">
                            <option value="">--Pilih Perihal--</option>
                            <?php foreach($perihal as $row_perihal){?>
                            <option value="<?= $row_perihal->id_perihal;?>"><?= $row_perihal->nama_perihal;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <input class="form-control" name="no_surat" placeholder="No Surat">
                        <input type="hidden" name="bagian_pengirim"  value="<?= $this->session->userdata("id_bagian"); ?>">
                        <input type="hidden" name="status_surat"  value="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea id="compose-textarea" name="isi_surat" class="form-control" style="height: 300px">
                        </textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
                </form>
                </div>
            </div>
        </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark"></aside>
  <?php $this->load->view('_partials/footer');?>
</body>
</html>
