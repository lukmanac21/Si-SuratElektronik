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
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Master Sub Menu</h3>
          </div>
            <div class="card-body">
              <form class="form-horizontal" role="form" action="<?= site_url('Menusub/save_data');?>" method="post">
                  <div class="card-body">
                  <div class="form-group row">
                      <label class="col-sm-1 col-form-label">Nama Menu</label>
                      <div class="col-sm-11">
                      <select class="form-control select2" name="id_menu" style="width: 100%;">
                            <?php foreach($data_menu as $row_menu){?>
                            <option value="<?= $row_menu->id_menu;?>"><?= $row_menu->nama_menu;?></option>
                            <?php } ?>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-1 col-form-label">Sub Menu</label>
                      <div class="col-sm-11">
                      <input type="text" class="form-control" name="nama_sub_menu" placeholder="Nama Sub Menu" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-1 col-form-label">Link Menu</label>
                      <div class="col-sm-11">
                      <input type="text" class="form-control" name="link_sub_menu" placeholder="Link Menu" required>
                      </div>
                  </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="reset" class="btn btn-default float-right">Reset</button>
                  </div>
              </form>
            </div>
        </div>
      </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <?php $this->load->view('_partials/footer');?>
</body>
</html>
