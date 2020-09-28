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
            <h3 class="card-title">Data Master Agenda</h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url();?>/Agenda/add_data';">Tambah</button>
              <br>
                <br>
              <thead>
              <tr>
                <th>Nama Kegiatan</th>
                <th>Tanggal / Jam</th>
                <th>Tempat</th>
                <th style="text-align:center;">Ubah</th>
                <th style="text-align:center;">Hapus</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($agenda as $row_agenda){?>
                    <tr>
                        <td><?= $row_agenda->nama_agenda;?></td>
                        <td><?= $row_agenda->tgl_agenda ." / ". $row_agenda->jam_agenda;?></td>
                        <td><?= $row_agenda->tempat_agenda;?></td>
                        <td style="text-align:center;"><a style="color:white;" type="button" href="<?= site_url('agenda/edit_data/').$row_agenda->id_agenda ;?>" class="btn btn-info" > Ubah</a</td>
                        <td style="text-align:center;"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $row_agenda->id_agenda?>"> Hapus</button</td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      </div>
    </section>
    <?php foreach($agenda as $row_agenda){?>
    <div class="modal fade" id="delete<?= $row_agenda->id_agenda?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?= site_url('agenda/delete_data');?>">
          <div class="modal-body">
            <p>Hapus data agenda <?= $row_agenda->nama_agenda?> ? </p>
            <input type="hidden" name="id_agenda" value="<?= $row_agenda->id_agenda ;?>">
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Hapus</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
    </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <?php $this->load->view('_partials/footer');?>
</body>
</html>
