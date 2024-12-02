<?php require_once './views/layout/header.php'; ?>
<?php require_once './views/layout/menu.php'; ?>

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
                                    
                                    <li class="breadcrumb-item active" aria-current="page">Thanh Toán</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
            <form action="<?= BASE_URL. '?act=xu-ly-thanh-toan'?>" method="post">
                <div class="row">
                    <div class="col-12">
                       
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Thông Tin Người Nhận</h5>
                            <div class="billing-form-wrap">
                                
                                    <div class="single-input-item">
                                        <label for="ho_ten" class="required">Tên Người Nhận</label>
                                        
                                        <input type="text" id="ho_ten" name="ten_nguoi_nhan" value="<?=$user['ho_ten']?>" placeholder="Tên Người Nhận" required/>
                                     </div>

    
                                    <div class="single-input-item">
                                        <label for="email_nguoi_nhan" class="required">Địa Chỉ Email</label>
                                        <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?=$user['email']?>"  placeholder="Điền Địa Chỉ Email Người Nhận" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="sdt_nguoi_nhan" class="required"> Số Điện Thoại</label>
                                        <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?=$user['so_dien_thoai']?>" placeholder="Điền Tên Số Điện Thoại Người Nhận" value="" required />
                                     </div>
                                     <div class="single-input-item">
                                        <label for="dia_chi_nguoi_nhan" class="required">Địa Chỉ</label>
                                        <input type="text" id="dia_chi_nguoi_nhan" value="<?=$user['dia_chi']?>" name="dia_chi_nguoi_nhan" placeholder="Điền Địa Chỉ Người Nhận" required />
                                     </div>


                                       
                                    <div class="single-input-item">
                                        <label for="ghi_chu">Order Note</label>
                                        <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="3" placeholder="Thêm Ghi Chú."></textarea>
                                    </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Thông Tin Sản Phẩm</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản Phẩm</th>
                                                <th>Tổng Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $tongGioHang = 0;
                                            foreach ($chitietgiohang as $item) : ?>
                                            <tr>
                                                <td><a href="product-details.html"><?=$item['ten_san_pham']?><strong> × <?=$item['so_luong']?></strong></a>
                                                </td>
                                                <td> <span>
                                                <?php 
                                                $tongtien=0;
                                                if ($item['gia_khuyen_mai']) {
                                                    $tongtien += $item['gia_khuyen_mai'] * $item['so_luong'];
                                                   
                                                } else {
                                                    $tongtien += $item['gia_san_pham'] * $item['so_luong'];
                                                    
                                                }
                                                $tongGioHang += $tongtien; 
                                                echo formatPrice($tongtien) . 'đ';
                                                ?>
                                                </span></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Tổng Tiền Sản Phẩm</td>
                                                <td><strong><?= formatPrice($tongGioHang) . 'đ'; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td> Phí Vận Chuyển</td>
                                                <td class="d-flex justify-content-center">
                                                   <strong>200.000đ</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tổng Đơn Hàng</td>
                                                <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 200000 ?>">
                                                <td><strong><?= formatPrice($tongGioHang + 200000) . 'đ'; ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon"  value="1" name="phuong_thuc_thanh_toan_id" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Thanh Toán Khi Nhận Hàng</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Khách hàng có thể thanh toán khi đơn hàng đã xác nhận (thành công).</p>
                                        </div>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="directbank"  value="2"  name="phuong_thuc_thanh_toan_id" class="custom-control-input" />
                                                <label class="custom-control-label" for="directbank">Thanh Toán Online</label>
                                                    
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="bank">
                                            
                                            <p>Vnpay</p>

                                        </div>
                                    </div>
                                    
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">Xác Nhận Đặt hàng </label>
                                        </div>
                                        <button type="submit" class="btn btn-sqr">Tiến Hành Đặt Hàng</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        </form>
        <!-- checkout main wrapper end -->
    </main>








<?php require_once './views/layout/footer.php'; ?>