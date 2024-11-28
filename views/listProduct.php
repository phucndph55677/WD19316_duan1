<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/menu.php'; ?>
<?php require_once 'views/layout/miniCart.php'; ?>
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sản Phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="sidebar-wrapper">
                        <!-- single sidebar start -->
                        <div class="sidebar-single">
                            <h5 class="sidebar-title">Danh Mục</h5>
                            <div class="sidebar-body">
                                
                                    <ul class="shop-categories">
                                    <?php foreach ($listDanhMuc as $danhmuc): ?>
                                        <li><a href="<?= BASE_URL.'?act=listProduct&id_danh_muc='.$danhmuc['id'] ?>"><?= $danhmuc['ten_danh_muc'] ?></a></li>
                                        <? endforeach; ?>
                                    </ul>

                            </div>
                        </div>
                    
                    <!-- single sidebar end -->

                    <!-- single sidebar start -->
                    <div class="sidebar-single">
                        <h5 class="sidebar-title">Giá</h5>
                        <div class="sidebar-body">
                            <div class="price-range-wrap">
                                <div class="price-range" data-min="1" data-max="1000"></div>
                                <div class="range-slider">
                                    <form action="#" class="d-flex align-items-center justify-content-between">
                                        <div class="price-input">
                                            <label for="amount">Price: </label>
                                            <input type="text" id="amount">
                                        </div>
                                        <button class="filter-btn">filter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single sidebar end -->






                    </aside>
                </div>
                <!-- sidebar area end -->

                <!-- shop main wrapper start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-product-wrapper">
                        <!-- shop product top wrap start -->
                        <div class="shop-top-bar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                    <div class="top-bar-left">
                                        <div class="product-view-mode">
                                            <a class="active" href="#" data-target="grid-view" data-bs-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>

                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                    <div class="top-bar-right">
                                        <div class="product-short">
                                            <p>Sort By : </p>
                                            <select class="nice-select" name="sortby">
                                                <option value="trending">Relevance</option>
                                                <option value="sales">Name (A - Z)</option>
                                                <option value="sales">Name (Z - A)</option>
                                                <option value="rating">Price (Low &gt; High)</option>
                                                <option value="date">Rating (Lowest)</option>
                                                <option value="price-asc">Model (A - Z)</option>
                                                <option value="price-asc">Model (Z - A)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop product top wrap start -->

                        <!-- product item list wrapper start -->
                        <div class="shop-product-wrap grid-view row mbn-30">
                            <!-- product single item start -->
                             <?php foreach ($listSanPham as $sanpham) : ?>
                            <div class="col-md-4 col-sm-6">

                                <!-- product grid start -->
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="<?= BASE_URL.'?act=chiTietSanPham&id_san_pham='.$sanpham['id']?>">
                                            <img class="pri-img" src="<?= BASE_URL . $sanpham['hinh_anh']?>" alt="product">
                                            <img class="sec-img" src="<?= BASE_URL . $sanpham['hinh_anh']?>" alt="product">
                                        </a>
                                        <div class="product-badge">
                                        <?php
                                                    $ngayNhap = new DateTime($sanpham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime('now');
                                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                   
                                                       
                                                    if($tinhNgay->days <= 7) {
                                                    
                                                    ?>
                                                     <div class="product-label new">
                                                        <span>Mới</span>
                                                    </div>
                                                    <?php } ?>
                                                   <?php if($sanpham['gia_khuyen_mai'] ) {?>
                                                    
                                                    
                                                    <div class="product-label discount">
                                                        <span>Giảm Giá</span>
                                                    </div>
                                                    <?php } ?>
                                        </div>

                                        <div class="cart-hover">
                                            <button class="btn btn-cart">Thêm Giỏ Hàng</button>
                                        </div>
                                    </figure>
                                    <div class="product-caption text-center">
                                        

                                        <h6 class="product-name">
                                            <a href="<?= BASE_URL.'?act=chiTietSanPham&id_san_pham='.$sanpham['id']?>"><?=$sanpham['ten_san_pham']?></a>
                                        </h6>
                                        <div class="price-box">
                                        <?php if($sanpham['gia_khuyen_mai']){?>
                                                        <span class="price-regular"><?=formatPrice($sanpham['gia_khuyen_mai']).'đ'?></span>
                                                        <span class="price-old"><del><?=formatPrice($sanpham['gia_san_pham']).'đ'?></del></span>
                                                        <?php } else {?>
                                                        <span class="price-regular"><?=formatPrice($sanpham['gia_san_pham']).'đ'?></span>
                                                        <?php }?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <?php endforeach ?>


                        </div>
                        <!-- product item list wrapper end -->

                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center">
                            <ul class="pagination-box">
                                <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                               
                                <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- end pagination area -->
                    </div>
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
</main>
<?php require_once 'views/layout/footer.php'; ?>