
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
            <h1>Quản Lý Danh Sach San Pham</h1>
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
                <h3 class="card-title">Thêm san pham</h3>
              </div>
      
              <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                <div class="row card-body">
                  <div class="form-group col-12">
                    <label>Tên san pham</label>
                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập ten san pham">
                    <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label>Gia san pham</label>
                    <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập gia san pham">
                    <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label>Gia khuyen mai</label>
                    <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập gia khuyen mai">
                    <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label>Hinh anh</label>
                    <input type="file" class="form-control" name="hinh_anh">
                    <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label>Album anh</label>
                    <input type="file" class="form-control" name="img_array[]" multiple>
                  </div>

                  <div class="form-group col-6">
                    <label>So luong</label>
                    <input type="number" class="form-control" name="so_luong" placeholder="Nhập so luong">
                    <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label>Ngay nhap</label>
                    <input type="date" class="form-control" name="ngay_nhap" placeholder="Nhập ngay nhap">
                    <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label>Danh muc</label>
                    <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">

                      <option selected disabled>Chon danh muc san pham</option>

                      <?php foreach($listDanhMuc as $key=>$danhMuc): ?>
                        <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label>Trang thai</label>
                    <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">

                      <option selected disabled>Chon danh muc san pham</option>
                      <option value="1">Con ban</option>
                      <option value="2">Dung ban</option>

                    </select>
                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-12">
                    <label>Mo ta</label>
                    <textarea name="mo_ta" id="" class="form-control" placeholder="Nhap mo ta"></textarea>
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
