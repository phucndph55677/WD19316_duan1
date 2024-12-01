
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
            <h1>Quản Lý Tài Khoản Khách Hàng</h1>
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
                <h3 class="card-title">Sửa Thông Tin Tài Khoản Khách Hàng:<?= $khachHang['ho_ten'] ?>  </h3>
              </div>
      
              <form action="<?= BASE_URL_ADMIN . '?act=sua-khach-hang' ?>" method="POST">
               <input type="hidden" name="khach_hang_id" value="<?= $khachHang['id'] ?>">
               
                <div class="card-body">
                  <div class="form-group">
                    
                    <label>Họ Tên</label>
                    <input type="text" class="form-control" name="ho_ten" placeholder="Nhập Họ Tên" value="<?= $khachHang['ho_ten'] ?>">
                    <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                       
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Nhập Email" value="<?= $khachHang['email'] ?>">
                    <?php if (isset($_SESSION['error']['email'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label>Số Điện Thoại</label>
                    <input type="text" class="form-control" name="so_dien_thoai" placeholder="Nhập Số Điện Thoại" value="<?= $khachHang['so_dien_thoai'] ?>">
                    <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" class="form-control" name="ngay_sinh" value="<?= $khachHang['ngay_sinh'] ?>">
                    <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label>Giới tính</label>
                    <select name="gioi_tinh" class="form-control">
                        <option value="1" <?=$khachHang['gioi_tinh'] == 1 ? 'selected' : ''?>>Nam</option>
                        <option value="0" <?=$khachHang['gioi_tinh'] == 0 ? 'selected' : ''?>>Nữ</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ" value="<?= $khachHang['so_dien_thoai'] ?>">
                    <?php if (isset($_SESSION['error']['dia_chi'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label>Trạng Thái</label>
                    <select name="trang_thai" class="form-control">
                        <option value="1" <?=$khachHang['trang_thai'] == 1 ? 'selected' : ''?>>Active</option>
                        <option value="0" <?=$khachHang['trang_thai'] == 0 ? 'selected' : ''?>>Inactive</option>
                    </select>
                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                    <?php } ?>
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
