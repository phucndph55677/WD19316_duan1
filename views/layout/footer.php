<!-- footer area start -->
<footer class="footer-widget-area">
        <div class="footer-top section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <div class="widget-title">
                                <div class="widget-logo">
                                    <a href="index.html">
                                        <img src="assets/img/logo/LOGO.png" alt="brand logo">
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <p>Shop Bán Thú Cưng FPL</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Liên Hệ</h6>
                            <div class="widget-body">
                                <address class="contact-block">
                                    <ul>
                                        <li><i class="pe-7s-home"></i>Số 13, Trịnh Văn Bô,Nam Từ Liêm, Hà Nội</li>
                                        <li><i class="pe-7s-mail"></i> <a href="mailto:demo@plazathemes.com">thucungFPL@gmail.com </a></li>
                                        <li><i class="pe-7s-call"></i> <a href="tel:(012)800456789987">+84 35545545</a></li>
                                    </ul>
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Thông Tin</h6>
                            <div class="widget-body">
                                <ul class="info-list">
                                    <li><a href="#">Về Chúng Tôi</a></li>
                                    <li><a href="#">Điều khoản & Điều kiện</a></li>
                                    <li><a href="#">Liên Hệ</a></li>
                                    <li><a href="#">Bản Đồ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Follow Chúng Tôi</h6>
                            <div class="widget-body social-link">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mt-20">
                    <div class="col-md-6">
                        <div class="newsletter-wrapper">
                            <h6 class="widget-title-text">Signup for newsletter</h6>
                            <form class="newsletter-inner" id="mc-form">
                                <input type="email" class="news-field" id="mc-email" autocomplete="off" placeholder="Enter your email address">
                                <button class="news-btn" id="mc-submit">Subscribe</button>
                            </form>
                            <!-- mail-chimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mail-chimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mail-chimp-success end -->
                                <div class="mailchimp-error"></div><!-- mail-chimp-error end -->
                            </div>
                            <!-- mail-chimp-alerts end -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-payment">
                            <img src="assets/img/payment.png" alt="payment method">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                       
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->
        <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="assets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="assets/js/plugins/image-zoom.min.js"></script>
    <!-- Images loaded JS -->
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- mail-chimp active js -->
    <script src="assets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="assets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    
<script>

// Hàm cập nhật tổng tiền
document.addEventListener('DOMContentLoaded', () => {
    // Hàm cập nhật tổng tiền
    const updateCart = () => {
        let grandTotal = 0; // Tổng tiền giỏ hàng ban đầu
        const shippingFee = 200000; // Phí vận chuyển cố định

        // Lặp qua từng dòng sản phẩm trong giỏ hàng
        document.querySelectorAll('tbody tr').forEach(row => {
            const input = row.querySelector('.quantity-input'); // Lấy input số lượng
            if (input) {
                const price = parseFloat(input.dataset.price) || 0; // Giá sản phẩm
                const quantity = parseInt(input.value, 10) || 1; // Số lượng

                // Kiểm tra giá trị price và quantity
                console.log('Price:', price);  // Kiểm tra giá trị price
                console.log('Quantity:', quantity);  // Kiểm tra giá trị quantity

                // Tính tổng tiền cho từng sản phẩm
                const subtotal = price * quantity;
                const subtotalElement = row.querySelector('.pro-subtotal span');
                if (subtotalElement) {
                    subtotalElement.textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(subtotal);
                }

                // Cộng dồn tổng tiền cho tất cả các sản phẩm
                grandTotal += subtotal; 
            } 
        });

        // Tính tổng số tiền sau khi cộng phí vận chuyển
        const totalAmount = grandTotal + shippingFee;
        console.log('Grand Total:', grandTotal);  // Kiểm tra tổng tiền trước phí
        console.log('Total Amount (with shipping):', totalAmount);  // Kiểm tra tổng tiền sau phí

        // Cập nhật tổng tiền và tổng cộng với phí vận chuyển
        document.querySelector('.cart-total span').textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(grandTotal);
        document.querySelector('.total-amount span').textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totalAmount);
    };

    // Gán sự kiện cho nút tăng số lượng
    document.querySelectorAll('.inc').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopImmediatePropagation();

            const input = btn.closest('.pro-qty').querySelector('.quantity-input');
            let currentValue = parseInt(input.value, 10) || 1;
            input.value = currentValue + 1;  // Tăng 1

            console.log('Before increment - currentValue:', currentValue);
            console.log('After increment - currentValue:', input.value);

            // Chờ một chút để đảm bảo giá trị đã được cập nhật
            setTimeout(() => {
                updateCart();  // Cập nhật lại giỏ hàng sau khi thay đổi
            }, 100);  // Delay nhỏ (100ms) giúp cập nhật giá trị mới
        });
    });

    // Gán sự kiện cho nút giảm số lượng
    document.querySelectorAll('.dec').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopImmediatePropagation();

            const input = btn.closest('.pro-qty').querySelector('.quantity-input');
            let currentValue = parseInt(input.value, 10) || 1;

            if (currentValue > 1) {
                input.value = currentValue - 1;  // Giảm đúng 1
                console.log('Before decrement - currentValue:', currentValue);
                console.log('After decrement - currentValue:', input.value);

                // Chờ một chút để đảm bảo giá trị đã được cập nhật
                setTimeout(() => {
                    updateCart();  // Cập nhật lại giỏ hàng sau khi thay đổi
                }, 100);  // Delay nhỏ (100ms) giúp cập nhật giá trị mới
            }
        });
    });

    // Khi nhập số lượng trực tiếp
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('input', () => {
            let currentValue = parseInt(input.value, 10);
            if (isNaN(currentValue) || currentValue < 1) {
                input.value = 1;
            }

            console.log('Input change - currentValue:', currentValue);

            // Cập nhật giỏ hàng ngay khi thay đổi
            updateCart(); 
        });
    });

    // Khởi tạo giá trị ban đầu
    updateCart();
});

    // Gán sự kiện cho nút tăng số lượng

</script>
</body>


<!-- Mirrored from htmldemo.net/corano/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:43 GMT -->
</html>
