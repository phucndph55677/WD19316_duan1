<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/menu.php'; ?>
<?php require_once './views/layout/miniCart.php'; ?>

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>">Lịch Sử Mua Hàng</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi Tiết Đơn Hàng</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding bg-white">
        <div class="container">
            <div class="section-bg-color p-4 border rounded">
                <div class="row g-4">
                    <!-- Product Information Table -->
                    <div class="col-lg-7">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th colspan="5">Thông Tin Sản Phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Đơn Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Thành Tiền</th>
                                    </tr>
                                    <?php foreach ($chitietdonhang as $key => $value) : ?>
                                        <tr>
                                            <td>
                                                <img class="img-fluid rounded" src="<?= BASE_URL . $value['hinh_anh'] ?>" alt="Product" width="80" />
                                            </td>
                                            <td><?= $value['ten_san_pham'] ?></td>
                                            <td><?= formatPrice($value['don_gia']) . 'đ'; ?></td>
                                            <td><?= $value['so_luong'] ?></td>
                                            <td><?= formatPrice($value['don_gia'] * $value['so_luong']) . 'đ'; ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Order Information Table -->
                    <div class="col-lg-5">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead >
                                    <tr>
                                        <th colspan="2">Thông Tin Đơn Hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Mã Đơn Hàng</td>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tên Người Nhận</td>
                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?= $donHang['email_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Số Điện Thoại</td>
                                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Địa Chỉ</td>
                                        <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày Đặt</td>
                                        <td><?= formatDate($donHang['ngay_dat']) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tổng Tiền</td>
                                        <td><?= formatPrice($donHang['tong_tien']) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ghi Chú</td>
                                        <td><?= $donHang['ghi_chu'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phương Thức Thanh Toán</td>
                                        <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Trạng Thái</td>
                                        <td><?= $TrangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->

</main>

<?php require_once 'views/layout/footer.php'; ?>
