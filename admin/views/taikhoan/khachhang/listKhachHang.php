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
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ Tên</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Email</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($listKhachHang as $key=>$KhachHang): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $KhachHang['ho_ten'] ?></td>
                                        <td><?= $KhachHang['so_dien_thoai'] ?></td>
                                        <td>
                                            <img src="<?= BASE_URL . $KhachHang['anh_dai_dien'] ?>" style="width: 100px"
                                                alt=""
                                                onerror="this.onerror=null; this.src='https://i.pinimg.com/564x/59/36/69/5936698bace4c5852463a2581e890bec.jpg'">
                                        </td>
                                        <td><?= $KhachHang['email'] ?></td>
                                        <td class><?= $KhachHang['trang_thai']==1 ?'Active':'Inactive' ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $KhachHang['id'] ?>">
                                                    <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                </a>
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $KhachHang['id'] ?>">
                                                    <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=rest-password&id_quan_tri=' . $KhachHang['id'] ?>"
                                                    onclick="return confirm('Bạn Có Muốn Rest Password Của tài khoản này?')">
                                                    <button class="btn btn-danger"><i
                                                            class="fas fa-circle-notch"></i></button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>

                                        </td>
                                    <tr>
                                        <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ Tên</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Email</th>
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
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
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