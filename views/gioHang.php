<?php include 'views/layout/header.php'; ?>
<?php include 'views/layout/menu.php'; ?>
<?php require_once './views/layout/miniCart.php'; ?>
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
                                <li class="breadcrumb-item active" aria-current="page">cart</li>
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
                                    <th class="pro-thumbnail">Ảnh Sản Phẩm</th>
                                    <th class="pro-title">Tên Sản Phẩm</th>
                                    <th class="pro-price">Giá Tiền</th>
                                    <th class="pro-quantity">Số Lượng</th>
                                    <th class="pro-subtotal">Tổng Tiền</th>
                                    <th class="pro-remove">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $tongGioHang = 0;
                                foreach ($chitietgiohang as $key => $value) : ?>
                                <tr data-id="<?= $value['id'] ?>">
                                    <td class="pro-thumbnail">
                                        <a href="#"><img class="img-fluid" src="<?= BASE_URL . $value['hinh_anh']?>" alt="Product" /></a>
                                    </td>
                                    <td class="pro-title"><a href="#"><?= $value['ten_san_pham']?></a></td>
                                    <td class="pro-price">
                                        <span><?= formatPrice($value['gia_khuyen_mai'] ?: $value['gia_san_pham']) . 'đ'; ?></span>
                                    </td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty">
                                            
                                            <input type="text" min="1" value="<?= $value['so_luong'] ?>" data-price="<?= $value['gia_khuyen_mai'] ?: $value['gia_san_pham'] ?>" class="quantity-input">                                          
                                        </div>
                                    </td>
                                    <td class="pro-subtotal">
                                        <span><?= formatPrice(($value['gia_khuyen_mai'] ?: $value['gia_san_pham']) * $value['so_luong']) . 'đ'; ?></span>
                                    </td>
                                    <td class="pro-remove">
                                        <a href="#"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php 
                                $tongGioHang += ($value['gia_khuyen_mai'] ?: $value['gia_san_pham']) * $value['so_luong'];
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Cart Update Option -->
                    <!-- <div class="cart-update-option d-block d-md-flex justify-content-between">
                        <div class="apply-coupon-wrapper">
                            <form action="#" method="post" class=" d-block d-md-flex">
                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                <button class="btn btn-sqr">Apply Coupon</button>
                            </form>
                        </div>
                        <div class="cart-update">
                           <button class="btn btn-sqr" >Update Cart</button>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 ml-auto">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h6>Tổng Đơn Hàng</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Tổng Tiền</td>
                                        <td class="cart-total"><span><?= formatPrice($tongGioHang) . 'đ'; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Phí Vận Chuyển</td>
                                        <td>200.000đ</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Tổng</td>
                                        <td class="total-amount">
                                            <span><?= formatPrice($tongGioHang + 200000) . 'đ'; ?></span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="<?=BASE_URL.'?act=thanh-toan'?>" class="btn btn-sqr d-block">Tiến Hành Thanh Toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart main wrapper end -->

<?php require_once 'views/layout/footer.php'; ?>


<script>
document.addEventListener('DOMContentLoaded', () => {
    // Hàm cập nhật tổng tiền
    const updateCart = () => {
        let grandTotal = 0;
        document.querySelectorAll('tbody tr').forEach(row => {
            const input = row.querySelector('.quantity-input');
            const price = parseFloat(input.dataset.price) || 0;
            const quantity = parseInt(input.value, 10) || 1;

            // Tính tổng tiền từng sản phẩm
            const subtotal = price * quantity;
            const subtotalElement = row.querySelector('.pro-subtotal span');
            if (subtotalElement) {
                subtotalElement.textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(subtotal);
            }

            grandTotal += subtotal; // Cộng tổng tiền
        });

        // Cập nhật tổng tiền và tổng với phí vận chuyển
        const shippingFee = 200000; // Phí vận chuyển cố định
        document.querySelector('.cart-total span').textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(grandTotal);
        document.querySelector('.total-amount span').textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(grandTotal + shippingFee);
    };

    // Gán sự kiện cho nút tăng
    document.querySelectorAll('.inc').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.closest('.pro-qty').querySelector('.quantity-input');
            let currentValue = parseInt(input.value, 10) || 1;

            if (currentValue > 1) {
                input.value = currentValue + 1; // Giảm đúng 1
                updateCart(); // Cập nhật lại giỏ hàng
            }
        });
    });
    
    // Gán sự kiện cho nút giảm
    document.querySelectorAll('.dec').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.closest('.pro-qty').querySelector('.quantity-input');
            let currentValue = parseInt(input.value, 10) || 1;

            if (currentValue > 1) {
                input.value = currentValue - 1; // Giảm đúng 1
                updateCart(); // Cập nhật lại giỏ hàng
            }
        });
    });

    // Khi nhập số lượng trực tiếp
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('input', () => {
            let currentValue = parseInt(input.value, 10);

            if (isNaN(currentValue) || currentValue < 1) {
                input.value = 1; // Đảm bảo số lượng không nhỏ hơn 1
            }

            updateCart(); // Cập nhật giỏ hàng sau khi thay đổi
        });
    });
    // Khởi tạo giá trị ban đầu
    updateCart();
});



</script>