
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
          <h1>Quản Lý Đơn hàng</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã Đơn Hàng</th>
                  <th>Tên Người Nhận</th>
                  <th>Số Điện Thoại</th>
                  <th>Ngày Đặt</th>
                  <th>Tổng Tiền</th>
                  <th>Trạng Thái</th>
                  <th>Thao Tác</th>

                </tr>
                </thead>
                <tbody>
                  <?php foreach($listDonHang as $key=>$donhang): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $donhang['ma_don_hang'] ?></td>
                    <td><?= $donhang['ten_nguoi_nhan'] ?></td>
                    <td><?= $donhang['sdt_nguoi_nhan'] ?></td>
                    <td><?= formatDate($donhang['ngay_dat']) ?></td>
                    <td><?=formatPrice($donhang['tong_tien']).'đ'; ?></td>
                    <td><?= $donhang['ten_trang_thai'] ?></td>
                    
                    

                  <td>
                    <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donhang['id'] ?>">
                      <button class="btn btn-warning"><i class="fas fa-eye"></i></button>
                    </a>
                    <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donhang['id'] ?>">
                      <button class="btn btn-primary"><i class="fas fa-cogs"></i></i></button>
                    </a>
                    
                    
                  </td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>STT</th>
                  <th>Mã Đơn Hàng</th>
                  <th>Tên Người Nhận</th>
                  <th>Số Điện Thoại</th>
                  <th>Ngày Đặt</th>
                  <th>Tổng Tiền</th>
                  <th>Trạng Thái</th>
                  <th>Thao Tác</th>

                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
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

<!-- Page specific script -->
<script>
$(function () {
  $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});
</script>
<!-- Code injected by live-server -->

</body>
</html>
