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
                <div class="col-sm-10">
                    <h1>Quản Lý Đơn hàng - Đơn Hàng: <?= $donHang['ma_don_hang'] ?></h1>
                </div>
                <div class="col-sm-2"> 
                <form action="" method="post" class="form-group">
                    <option value="" disabled></option>
                     <select name="trang_thai_id">
                        <?foreach($listTrangThaiDonHang as $trangThai):?>
                            <option value="<?=$trangThai['id']?>" <?=$trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : ''?> <?=$trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled' : ''?> ><?=$trangThai['ten_trang_thai']?></option>
                            <?endforeach?>
                     </select>
                </form>
                </div>
               
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?
                    if ($donHang['trang_thai_id'] == 1) {
                        $colorAlert = 'primary';
                    } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9) {
                        $colorAlert = 'warning';
                    } elseif ($donHang['trang_thai_id'] == 10) {
                        $colorAlert = 'danger';
                    } else {
                        $colorAlert = 'succses';
                    }
                    ?>

                    <div class="alert alert-<?= $colorAlert ?>" role="alert">
                        Đơn Hàng: <?= $donHang['ten_trang_thai'] ?>
                    </div>
                </div>


                <!-- Main content -->
                <div class=" container invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-dog"></i> Thú Cưng FPL
                                <small class="float-right">Ngày Đặt: <?= formatDate($donHang['ngay_dat']) ?></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Thông Tin Người Đặt
                            <address>
                                <strong><?= $donHang['ho_ten'] ?></strong><br>
                                Số Điện Thoại: <?= $donHang['so_dien_thoai'] ?><br>
                                Email: <?= $donHang['email'] ?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-4 col-sm-4 invoice-col">
                            Thông Tin Người Nhận
                            <address>
                                <strong><?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                Địa Chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                                Số Điện Thoại: <?= $donHang['sdt_nguoi_nhan'] ?><br>
                                Email: <?= $donHang['email_nguoi_nhan'] ?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Mã Đơn Hàng: <?= $donHang['ma_don_hang'] ?></b><br>
                            <br>
                            <b>Tổng Tiền:</b> <?=formatDate($donHang['tong_tien']).'đ' ?><br>
                            <b>Ghi Chú:</b> <?= $donHang['ghi_chu'] ?><br>
                            <b>Phương Thức:</b> <?= $donHang['ten_phuong_thuc'] ?>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Đơn Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Thành Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? $tongtien=0;?>
                                    <? foreach ($sanPhamDonHang as $key => $SP)  :?>
                                       
                                    <tr>
                                        <td><?= $key +1 ?></td>
                                        <td><?= $SP['ten_san_pham'] ?></td>
                                        <td><?= formatPrice($SP['don_gia']).'đ' ?></td>
                                        <td><?= $SP['so_luong'] ?></td>
                                        <td><?=formatPrice ($SP['thanh_tien']).'đ' ?></td>
                                    </tr>
                                    <? $tongtien += $SP['thanh_tien']; ?>
                                  <?endforeach?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead">Ngày Đặt Hàng: <?=formatDate($donHang['ngay_dat'])?></p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Thành Tiền:</th>
                                        <td><?= formatPrice($tongtien).'đ';?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Phí Vận Chuyển:</th>
                                        <td>200.000đ</td>
                                    </tr>
                                    <tr>
                                        <th>Tổng Tiền:</th>
                                        <td><?=formatPrice($tongtien+200000).'đ'?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
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
<!-- Code injected by live-server -->

</body>

</html>