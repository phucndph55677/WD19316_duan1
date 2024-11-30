<?php require_once './views/layout/header.php';?>
<?php require_once './views/layout/menu.php';?>

<body>
   


    <main>
        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slider1.png">
                        <div class="container">
                            <div class="row">
                               
                            </div>
                        </div>
                    </div>
                </div>
               
                <!-- single slider item end -->
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slider1.png">
                        <div class="container">
                            <div class="row">
                               
                            </div>
                        </div>
                    </div>
                </div>
               
                <!-- single slider item end -->
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slider2.png">
                        <div class="container">
                            <div class="row">
                               
                            </div>
                        </div>
                    </div>
                </div>
               
                <!-- single slider item end -->
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slider3.png">
                        <div class="container">
                            <div class="row">
                               
                            </div>
                        </div>
                    </div>
                </div>
               
                <!-- single slider item end -->
            </div>
        </section>
        <!-- hero slider area end -->

       

        <!-- service policy area start -->
        <div class="service-policy section-padding">
            <div class="container">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Giao Hàng</h6>
                                <p>Miễn Phí Giao Hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Hỗ Trợ</h6>
                                <p>Hỗ Trợ 24/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Hoàn Tiền</h6>
                                <p>Hoàn Tiền Trong 30 Ngày</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Thanh Toán</h6>
                                <p>Bảo Mật Thanh Toán</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- banner statistics area start -->
        <div class="banner-statistics-area">
            <div class="container">
                <div class="row row-20 mtn-20">
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/slider/slider1.png" alt="product banner">
                            </a>
                            
                        </figure>
                    </div>
                    
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/slider/slider2.png" alt="product banner">
                            </a>
                            
                        </figure>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <!-- banner statistics area end -->

        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm Của Chúng Tôi</h2>
                            <p class="sub-title">Sản Phẩm Được Cập Nhập Liên Tục</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <!-- product tab menu start -->
                            <div class="product-tab-menu">
                               
                            </div>
                            <!-- product tab menu end -->

                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <?php foreach ($listSanPham as $key => $sanPham) : ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL.'?act=chiTietSanPham&id_san_pham='.$sanPham['id']?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime('now');
                                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                   
                                                       
                                                    if($tinhNgay->days <= 7) {
                                                    
                                                    ?>
                                                     <div class="product-label new">
                                                        <span>Mới</span>
                                                    </div>
                                                    <?php } ?>
                                                   <?php if($sanPham['gia_khuyen_mai'] ) {?>
                                                    
                                                    
                                                    <div class="product-label discount">
                                                        <span>Giảm Giá</span>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                               
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">Xem Chi Tiết</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL.'?act=chiTietSanPham&id_san_pham='.$sanPham['id']?>"><?=$sanPham['ten_san_pham']?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if($sanPham['gia_khuyen_mai']){?>
                                                        <span class="price-regular"><?=formatPrice($sanPham['gia_khuyen_mai']).'đ'?></span>
                                                        <span class="price-old"><del><?=formatPrice($sanPham['gia_san_pham']).'đ'?></del></span>
                                                        <?php } else {?>
                                                        <span class="price-regular"><?=formatPrice($sanPham['gia_san_pham']).'đ'?></span>
                                                        <?php }?>
                                                        
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->

                                       
                                        <?endforeach?>
                                    </div>
                                </div>
                              
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->

        <!-- product banner statistics area start -->
    
        <!-- product banner statistics area end -->

        <!-- featured product area start -->
        <section class="feature-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Mèo Cảnh</h2>
                    <p class="sub-title">Add featured products to weekly lineup</p>
                </div>
                <!-- section title end -->
            </div>
        </div>
        <div class="row">
            <?php foreach ($SanPhamMeo as $key => $sanPham) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4"> <!-- 4 sản phẩm một hàng -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="<?= BASE_URL . '?act=chiTietSanPham&id_san_pham=' . $sanPham['id'] ?>">
                                <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                            </a>
                            <div class="product-badge">
                                <?php
                                $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                $ngayHienTai = new DateTime('now');
                                $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                if ($tinhNgay->days <= 7) {
                                ?>
                                    <div class="product-label new">
                                        <span>Mới</span>
                                    </div>
                                <?php } ?>
                                <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                    <div class="product-label discount">
                                        <span>Giảm Giá</span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">Xem Chi Tiết</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <h6 class="product-name">
                                <a href="<?= BASE_URL . '?act=chiTietSanPham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                            </h6>
                            <div class="price-box">
                                <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                    <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                <?php } else { ?>
                                    <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
        <section class="feature-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Chó Cảnh</h2>
                    <p class="sub-title">Add featured products to weekly lineup</p>
                </div>
                <!-- section title end -->
            </div>
        </div>
        <div class="row">
            <?php foreach ($SanPhamCho as $key => $sanPham) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4"> <!-- 4 sản phẩm một hàng -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="<?= BASE_URL . '?act=chiTietSanPham&id_san_pham=' . $sanPham['id'] ?>">
                                <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                            </a>
                            <div class="product-badge">
                                <?php
                                $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                $ngayHienTai = new DateTime('now');
                                $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                if ($tinhNgay->days <= 7) {
                                ?>
                                    <div class="product-label new">
                                        <span>Mới</span>
                                    </div>
                                <?php } ?>
                                <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                    <div class="product-label discount">
                                        <span>Giảm Giá</span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">Xem Chi Tiết</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <h6 class="product-name">
                                <a href="<?= BASE_URL . '?act=chiTietSanPham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                            </h6>
                            <div class="price-box">
                                <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                    <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                <?php } else { ?>
                                    <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

        <!-- featured product area end -->

        <!-- testimonial area start -->
        
        <!-- testimonial area end -->

        <!-- group product start -->
      
        <!-- group product end -->

        <!-- latest blog area start -->
       
        <!-- latest blog area end -->

        <!-- brand logo area start -->
       
        <!-- brand logo area end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    

    
    <?php require_once './views/layout/footer.php';?>

 