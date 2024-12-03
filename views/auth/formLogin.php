
<?php include './views/layout/header.php'; ?>

<?php include './views/layout/menu.php'; ?>

 

        <!-- login register wrapper start -->
        <div class="login-register-wrapper section-padding">
            <div class="container" style="max-width: 40vw">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-12">
                            <div class="login-reg-form-wrap">
                                <h5 class="text-center">ĐĂNG NHẬP</h5>

                                <?php if (isset($_SESSION['error'])) { ?>
                                <?php if (is_array($_SESSION['error'])) { ?>
                                    <p class="text-danger login-box-msg text-center">
                                        <?= implode('<br>', $_SESSION['error']); ?>
                                    </p>
                                <?php } else { ?>
                                    <p class="text-danger login-box-msg text-center">
                                        <?= $_SESSION['error']; ?>
                                    </p>
                                <?php } ?>
                                <?php unset($_SESSION['error']); // Xóa lỗi sau khi hiển thị ?>
                                <?php } else { ?>
                                    <p class="login-box-msg text-center">Vui Lòng Đăng Nhập</p>
                                <?php } ?>

                                <form action="<?= BASE_URL . '?act=check-login' ?>" method="post">
                                    <div class="single-input-item">
                                        <input type="email" placeholder="Email or Username" name="email"  />
                                    </div>

                                    <div class="single-input-item">
                                        <input type="password" placeholder="Enter your Password" name="password"  />
                                    </div>

                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">                          
                                            <a href="#" class="forget-pwd">Quên mật khẩu</a>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <button class="btn btn-sqr">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
    </main>
    

<?php include './views/layout/footer.php'; ?>
