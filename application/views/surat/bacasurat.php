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
  <div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                        <h3 class="card-title">Baca Pesan</h3>
                </div>
                    <?php foreach($surat as $row_surat){?>
                    <div class="card-body">
                    <div class="mailbox-read-info">
                        <h5><?= $row_surat->dinas_pengirim?></h5>
                        <h6><?= $row_surat->nama_perihal?>
                        <span class="mailbox-read-time float-right"><?= $row_surat->terkirim_pada?></span></h6>
                    </div>
                </div>
                    <div class="mailbox-read-message">
                        <p><?= $row_surat->isi_surat?></p>
                    </div>
                    <?php } ?>
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Disposisi</button>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark"></aside>
  <?php $this->load->view('_partials/footer');?>
</body>
</html>
