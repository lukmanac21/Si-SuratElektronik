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
            <h3 class="card-title">Data Master Sub Menu</h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url();?>/Menusub/add_data';">Tambah</button>
              <br>
                <br>
              <thead>
              <tr>
                <th>Nama menu</th>
                <th>Nama Sub menu</th>
                <th>Link Sub menu</th>
                <th style="text-align:center;">Ubah</th>
                <th style="text-align:center;">Hapus</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($sub_menu as $row_sub_menu){?>
                    <tr>
                        <td><?= $row_sub_menu->nama_menu;?></td>
                        <td><?= $row_sub_menu->nama_sub_menu;?></td>
                        <td><?= $row_sub_menu->link_sub_menu;?></td>
                        <td style="text-align:center;"><a style="color:white;" type="button" href="<?= site_url('Menusub/edit_data/').$row_sub_menu->id_sub_menu ;?>" class="btn btn-info" > Ubah</a</td>
                        <td style="text-align:center;"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $row_sub_menu->id_sub_menu?>"> Hapus</button</td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      </div>
    </section>
    <?php foreach($sub_menu as $row_sub_menu){?>
    <div class="modal fade" id="delete<?= $row_sub_menu->id_sub_menu?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?= site_url('Menusub/delete_data');?>">
          <div class="modal-body">
            <p>Hapus data sub_menu <?= $row_sub_menu->nama_sub_menu?> ? </p>
            <input type="hidden" name="id_sub_menu" value="<?= $row_sub_menu->id_sub_menu ;?>">
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
