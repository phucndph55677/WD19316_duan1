<?php
// Kiểm tra xem biến $chitietgiohang có tồn tại và là mảng không
if (!isset($chitietgiohang)) {
    $chitietgiohang = []; 
}

// Tính tổng tiền giỏ hàng
$totalPrice = 0;
foreach ($chitietgiohang as $key => $value) {
    $price = $value['gia_khuyen_mai'] ?: $value['gia_san_pham']; // Chọn giá khuyến mãi nếu có, nếu không thì chọn giá sản phẩm
    $totalPrice += $price * $value['so_luong']; // Cộng dồn tổng giá trị (giá * số lượng)
}
?>
<!-- offcanvas mini cart start -->
<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <div class="minicart-item-wrapper">
                    <?php foreach($chitietgiohang as $key => $value) :?>
                    <ul>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="<?= BASE_URL . $value['hinh_anh'] ?>" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="<?= BASE_URL.'?act=chiTietSanPham&id_san_pham='.$value['id']?>"><?= $value['ten_san_pham'] ?></a>
                                </h3>
                                <p>
                                    <span class="cart-quantity"><?= $value['so_luong']?> <strong>&times;</strong></span>
                                    <span class="cart-price"><?= formatPrice($value['gia_khuyen_mai'] ?: $value['gia_san_pham']) . 'đ'; ?></span>
                                </p>
                            </div>
                            <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                        </li>
                    </ul>
                    <?php endforeach ?>
                </div>
                    
                <div class="minicart-pricing-box">
                    <ul>
                        <li class="total">
                            <span>Tổng Tiền</span>
                            <span><strong><?= formatPrice($totalPrice) . 'đ'; ?></strong></span>
                        </li>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="<?=BASE_URL.'?act=gio-hang'?>"><i class="fa fa-shopping-cart"></i> Xem Giỏ Hàng</a>
                    <a href="<?=BASE_URL.'?act=thanh-toan'?>"><i class="fa fa-share"></i> Thanh Toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offcanvas mini cart end -->
