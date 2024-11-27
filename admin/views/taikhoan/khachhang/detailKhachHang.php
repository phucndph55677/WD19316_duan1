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
                <div class="col-6">
                    <img src="<?= BASE_URL . $KhachHang['anh_dai_dien'] ?>" style="width: 70%" alt=""
                        onerror="this.onerror=null; this.src='https://i.pinimg.com/564x/59/36/69/5936698bace4c5852463a2581e890bec.jpg'">
                </div>
                <div class="col-6">
                    <div class="container">
                        <table class="table table-borderless">
                            <tbody style="font-site: large;">
                                <tr>
                                    <th>Họ tên:</th>
                                    <td><?=$khachHang['ho_ten'] ?></td>
                                </tr>
                                <tr>
                                    <th>Họ tên:</th>
                                    <td><?=$khachHang['ho_ten'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Ngày sinh:</th>
                                    <td><?=$khachHang['ngay_sinh'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?=$khachHang['email'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại:</th>
                                    <td><?=$khachHang['so_dien_thoai'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Giới tính:</th>
                                    <td><?=$khachHang['gioi_tinh'] == 1 ? 'Nam':'Nữ'; ?></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ:</th>
                                    <td><?=$khachHang['dia_chi'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Trạng thái:</th>
                                    <td><?=$khachHang['trang_thai'] == 1 ? 'Active' :'Inactive' ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="cot-12">
                    <hr>
                    <h2>Thông tin mua hàng</h2>
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
                                <td><?= $donhang['tong_tien'] ?></td>
                                <td><?= $donhang['ten_trang_thai'] ?></td>



                                <td>
                                    <a
                                        href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donhang['id'] ?>">
                                        <button class="btn btn-warning"><i class="fas fa-eye"></i></button>
                                    </a>
                                    <a
                                        href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donhang['id'] ?>">
                                        <button class="btn btn-primary"><i class="fas fa-cogs"></i></i></button>
                                    </a>


                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

                <div class="cot-12">
                    <hr>
                    <h2>Lịch sử bình luận</h2>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Nội dung</th>
                                <th>Ngày bình luận</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listBinhLuan as $key=>$binhLuan): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td>
                                    <a target="_blank"
                                        href="<?=BASE_URL_ADMIN. 'act=chi-tiet-san-pham&id_san_pham' . $binhLuan['san_pham_id'];?>">
                                        <?= $binhLuan['ten_san_pham'] ?>
                                    </a>
                                </td>
                                <td><?= $binhLuan['noi_dung'] ?></td>
                                <td><?= $binhLuan['ngay_binh_luan'] ?></td>
                                <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                                <td>
                                    <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>"
                                        method="POST">
                                        <input type="hiden" name="id_binh_luan" value="<? $binhLuan['id'] ?>">
                                        <input type="hiden" name="name_view" value="detail_khach">
                                        <input type="hiden" name="id_khach_hang"
                                            value="<? $binhLuan['tai_khoan_id'] ?>">
                                        <button onclick="return confirm('Bạn Có Muốn ẩn bình luận này không?')"
                                            class="btn btn-danger">danhSachDanhMuc

                                            < </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
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
<script>
$(function() {
    $(" #example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false, // "buttons" :
        ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
    });
});
</script>

</html>