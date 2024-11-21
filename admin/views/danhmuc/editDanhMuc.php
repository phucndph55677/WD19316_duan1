
<!-- Header -->
<?php require './views/layout/header.php'; ?>

<!-- Navbar -->
<?php require './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php require './views/layout/sidebar.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quan ly danh muc san pham</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sua danh muc san pham</h3>
              </div>
      
              <form action="<?= BASE_URL_ADMIN . '?act=sua-danh-muc' ?>" method="POST">

                <input type="text" name="id" value="<?= $danhMuc['id'] ?>" hidden>
                
                <div class="card-body">
                  <div class="form-group">
                    <label>Ten danh muc</label>
                    <input type="text" class="form-control" name="ten_danh_muc" value="<?= $danhMuc['ten_danh_muc'] ?>" placeholder="Nhap ten danh muc">
                    <?php if (isset($errors['ten_danh_muc'])) { ?>
                        <p class="text-danger"><?= $errors['ten_danh_muc'] ?></p>
                    <?php } ?>
                  </div>

                <div class="form-group">
                    <label>Mo ta</label>
                    <textarea name="mo_ta" id="" class="form-control" placeholder="Nhap mo ta"><?= $danhMuc['mo_ta'] ?></textarea>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Footer -->
<?php require './views/layout/footer.php'; ?>
<!-- End footer -->

</body>
</html>
