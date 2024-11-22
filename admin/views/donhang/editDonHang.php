
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
          <h1>Quản Lý Thông Tin Đơn Hàng</h1>
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
                <h3 class="card-title"> Thông Tin Đơn Hàng: <?= $donHang['ma_don_hang'] ?></h3>
              </div>

              <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">

                <input type="text" name="id" value="<?= $donHang['id'] ?>" hidden>
                
                <div class="card-body">
                     <!-- Hiển thị thông báo lỗi -->
                    
                  <div class="form-group">
                    <label>Tên Người Nhận</label>
                    <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $donHang['ten_nguoi_nhan'] ?>" placeholder="Nhập tên Người Nhận">
                    <?php if (isset($errors['ten_nguoi_nhan'])) { ?>
                        <p class="text-danger"><?= $errors['ten_nguoi_nhan'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label>Số Điện Thoại</label>
                    <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $donHang['sdt_nguoi_nhan'] ?>" placeholder="Nhập Số Điện Thoại Của Người Nhận">
                    <?php if (isset($errors['sdt_nguoi_nhan'])) { ?>
                        <p class="text-danger"><?= $errors['sdt_nguoi_nhan'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email_nguoi_nhan" value="<?= $donHang['email_nguoi_nhan'] ?>" placeholder="Nhập Email Người Nhận">
                    <?php if (isset($errors['email_nguoi_nhan'])) { ?>
                        <p class="text-danger"><?=$errors['email_nguoi_nhan'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label>Địa Chỉ</label>
                    <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= $donHang['dia_chi_nguoi_nhan'] ?>" placeholder="Nhập Địa Chỉ Người Nhận">
                    <?php if (isset($errors['dia_chi_nguoi_nhan'])) { ?>
                        <p class="text-danger"><?= $errors['dia_chi_nguoi_nhan'] ?></p>
                    <?php } ?>
                  </div>
                  
                  <div class="form-group">
                    <label>Ghi Chú</label>
                    <textarea name="ghi_chu" id="" class="form-control" placeholder="Nhập Ghi Chú"><?= $donHang['ghi_chu'] ?></textarea>
                  </div>
                  <hr>
                <div class="form-group">
                    <label for="inputStatus">Trạng Thái Đơn Hàng</label>
                    <select name="trang_thai_id" id="inputStatus" class="form-control">
                       
                            
                        
                        <?php foreach($listTrangThaiDonHang as $trangThai):?>
                        <option
                        <?if($donHang['trang_thai_id'] >$trangThai['id'] 
                        || $donHang['trang_thai_id'] == 9
                        || $donHang['trang_thai_id'] == 10
                        || $donHang['trang_thai_id'] == 11){
                            echo"disabled";
                        }
                        
                        ?>
                         value="<?=$trangThai['id']?>" <?=$trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : ''?> class="form-control"><?=$trangThai['ten_trang_thai']?></option>
                        <?endforeach?>

                    </select>
                    <?php if (isset($errors['trang_thai_id'])) { ?>
                        <p class="text-danger"><?= $errors['trang_thai_id'] ?></p>
                    <?php } ?>
                    
                  </div>
                </div>
                

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
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
