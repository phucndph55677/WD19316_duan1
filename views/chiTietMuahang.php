<?php require_once 'layout/header.php'; ?>

<?php require_once 'layout/menu.php'; ?>

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">bill detail</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-7">
                        <!-- Thong tin san pham cua don hang -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="5">Thong tin san pham</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <th>Hinh anh</th>
                                        <th>Ten san pham</th>
                                        <th>Don gia</th>
                                        <th>So luong</th>
                                        <th>Thanh tien</th>
                                    </tr>
                                    <?php foreach ($chiTietDonHang as $item): ?>
                                        <tr>
                                            <td>
                                                <img class="img-fluid" src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="Product" width="100px"/>
                                            </td>
                                            <td><?= $item['ten_san_pham'] ?></td>
                                            <td><?= number_format($item['don_gia'], 0, ',',  '.') ?> d</td>
                                            <td><?= $item['so_luong'] ?></td>
                                            <td><?= number_format($item['thanh_tien'], 0, ',',  '.') ?> d</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="col-lg-5">
                        <!-- Thong tin don hang -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Thong tin don hang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <th>Ma don hang:</th>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Nguoi nhan:</th>
                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Email:</th>
                                        <td><?= $donHang['email_nguoi_nhan'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>So dien thoai:</th>
                                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Dia chi:</th>
                                        <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Ngay dat:</th>
                                        <td><?= $donHang['ngay_dat'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Ghi chu:</th>
                                        <td><?= $donHang['ghi_chu'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Tong tien</th>
                                        <td><?= number_format($donHang['tong_tien'], 0, ',',  '.') ?> d</td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Phuong thuc thanh toan:</th>
                                        <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Trang thai don hang:</th>
                                        <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- cart main wrapper end -->
</main>


<?php require_once 'layout/miniCart.php'; ?>

<?php require_once 'layout/footer.php'; ?>