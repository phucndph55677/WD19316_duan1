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

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img style="width: 400px; height: 400px;" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>"
                                class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <?php foreach ($listAnhSanPham as $key => $anhSP): ?>
                            <div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active' : '' ?>"><img
                                    src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="Product Image"></div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Ten san pham: <?= $sanPham['ten_san_pham'] ?></h3>
                        <hr>
                        <h4 class="mt-3">Gia tien: <small><?= $sanPham['gia_san_pham'] ?></small></h4>
                        <h4 class="mt-3">Gia khuyen mai: <small><?= $sanPham['gia_khuyen_mai'] ?></small></h4>
                        <h4 class="mt-3">So luong: <small><?= $sanPham['so_luong'] ?></small></h4>
                        <h4 class="mt-3">Luot xem: <small><?= $sanPham['luot_xem'] ?></small></h4>
                        <h4 class="mt-3">Ngay nhap: <small><?= $sanPham['ngay_nhap'] ?></small></h4>
                        <h4 class="mt-3">Danh muc: <small><?= $sanPham['ten_danh_muc'] ?></small></h4>
                        <h4 class="mt-3">Trang thai:
                            <small><?= $sanPham['trang_thai'] == 1 ? 'Con ban' : 'Dung ban' ?></small>
                        </h4>
                        <h4 class="mt-3">Mo ta: <small><?= $sanPham['mo_ta'] ?></small></h4>
                    </div>
                </div>


                <div class="cot-12">
                    <hr>
                    <h2>Bình luận của sản phẩm</h2>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Người bình luận</th>
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
                                <a target="_blank"
                                    href="<?=BASE_URL_ADMIN. 'act=chi-tiet-khach-hang&id_khach_hang' . $binhLuan['tai_khoan_id'];?>">
                                    <?= $binhLuan['ho_ten'] ?>
                                </a>
                                <td><?= $binhLuan['noi_dung'] ?></td>
                                <td><?= $binhLuan['ngay_binh_luan'] ?></td>
                                <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                                <td>
                                    <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>"
                                        method="POST">
                                        <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                        <input type="hidden" name="name_view" value="detail_sanpham">
                                        <input type="hidden" name="id_khach_hang"
                                            value="<? $binhLuan['tai_khoan_id'] ?>">
                                        <button onclick="return confirm('Bạn Có Muốn ẩn bình luận này không?')"
                                            class="btn btn-warning">
                                            <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn': ' Bỏ ẩn' ?>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

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
<script>
$(document).ready(function() {
    $('.product-image-thumb').on('click', function() {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
    })
})
</script>

</html>