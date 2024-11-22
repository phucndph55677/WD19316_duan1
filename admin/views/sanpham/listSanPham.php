
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
            <h1>Quản Lý Danh Sach Thu Cung</h1>
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
                <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham' ?>">
                  <button class="btn btn-success">Thêm thu cung moi</button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên san pham</th>
                    <th>Anh san pham</th>
                    <th>Gia tien</th>
                    <th>So luong</th>
                    <th>Danh muc</th>
                    <th>Trang thai</th>
                    <th>Thao Tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listSanPham as $key=>$sanPham): ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $sanPham['ten_san_pham'] ?></td>
                      <td>
                        <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" style="width: 100px" alt=""
                        onerror="this.onerror=null; this.src='https://i.pinimg.com/564x/59/36/69/5936698bace4c5852463a2581e890bec.jpg'"
                        >
                      </td>
                      <td><?= $sanPham['gia_san_pham'] ?></td>
                      <td><?= $sanPham['so_luong'] ?></td>
                      <td><?= $sanPham['ten_danh_muc'] ?></td>
                      <td><?= $sanPham['trang_thai'] == 1 ? 'Con ban': 'Dung ban' ?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                          <button class="btn btn-warning">Sửa</button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>" 
                          onclick="return confirm('Ban co muon xoa khong?')">
                          <button class="btn btn-danger">Xóa</button>
                        </a>
                      </td>
                    <tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên san pham</th>
                    <th>Anh san pham</th>
                    <th>Gia tien</th>
                    <th>So luong</th>
                    <th>Danh muc</th>
                    <th>Trang thai</th>
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
</body>
</html>
