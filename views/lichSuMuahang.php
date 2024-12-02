<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/menu.php'; ?>

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL?>"><i class="fa fa-home"></i></a></li>
                                
                                <li class="breadcrumb-item active" aria-current="page">Lịch Sử Mua Hàng</li>
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
                <div class="col-lg-12">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th >Mã Đơn Hàng</th>
                                    <th >Tên Sản Phẩm</th>
                                    <th>Tổng Tiền</th>
                                    <th >Phương Thức Thanh Toán</th>
                                    <th >Trạng Thái Đơn Hàng</th>
                                    <th>Thao Tác</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?foreach ($donHangs as $key => $donhang):?>
                                    <tr>
                                        <td class="text-center"><?=$donhang['ma_don_hang']?></td>
                                        <td><?= formatDate($donhang['ngay_dat'])?></td>
                                        <td><?= formatPrice($donhang['tong_tien']).'đ'?></td>
                                        <td><?= $phuongThucThanhToan[$donhang['phuong_thuc_thanh_toan_id']]?></td>
                                        <td><?=$TrangThaiDonHang[$donhang['trang_thai_id']]?></td>
                                        <td>
                                            <a href="<?= BASE_URL . '?act=chi-tiet-mua-hang&id=' . $donhang['id'] ?>" class="btn btn-sqr">Xem Chi Tiết</a>
                                            <?if($donhang['trang_thai_id'] == 1):?>
                                                <a href="<?= BASE_URL . '?act=huy-don-hang&id=' . $donhang['id'] ?>" class="btn btn-sqr" onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này Không?')">
                                                    Hủy
                                                </a>
                                            <?endif?>
                                        </td>
                                        
                                    </tr>
                                <?endforeach?>    
                           </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- cart main wrapper end -->

<?php require_once 'views/layout/footer.php'; ?>



