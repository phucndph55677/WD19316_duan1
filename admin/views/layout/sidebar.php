<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Thú Cưng FPL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['user_admin']?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN ?>" class="nav-link">
                        <i class="fas fa-home"></i>
                        <p>
                            Trang Chủ
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh Mục
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link">
                        <i class="nav-icon fas fa-cat"></i>
                        <p>
                            Sản Phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p>
                            Đơn Hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link">
                        <i class="fas fa-user"></i>
                        <p>
                            Quản Lý Tài Khoản
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="nav-link">
                                <i class="far fa-user"></i>
                                <p>
                                    Tài Khoản Admin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="nav-link">
                                <i class="far fa-user"></i>
                                <p>
                                    Tài Khoản Khách Hàng
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri' ?>"
                                class="nav-link">
                                <i class="far fa-user"></i>
                                <p>
                                    Tài Khoản Cá Nhân
                                </p>
                            </a>
                        </li>

                    </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>