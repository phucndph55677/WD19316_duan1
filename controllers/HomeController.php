<?php 

class HomeController {

    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;
    public $modelDanhMuc;

    public function __construct() 
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
        $this->modelDanhMuc = new DanhMuc();
    }
   

    public function home() 

    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }

    public function chiTietSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);

        if ($sanPham) {

            require_once './views/detailSanPham.php';
        } else {

            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function formLogin()
    {     
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/auth/formLogin.php';

        deleteSessionError();
        exit();    
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // lay email va pass gui len tu form
            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($email);die;

            // Xu ly ktra thong tin dang nhap
            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if ($user == $email) { // TH dang nhap thanh cong
                // Luu thong tin user vao session
                $_SESSION['user_client'] = $user;

                header("Location: " . BASE_URL);
                exit();
            }else{
                // Loi thi luu loi vao session
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);die;

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL . '?act=login');
                exit();
                
            }
        }
    }
    public function logout()
    {
        session_destroy();
        header("Location: " . BASE_URL);
        exit();
    }

    public function addGioHang() {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin tài khoản người dùng
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
    
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
            } else {
                $chitietgiohang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
    
            // Lấy thông tin sản phẩm và số lượng
            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];
    
            // Kiểm tra tồn kho
            $sanPham = $this->modelSanPham->getDetailSanPham($san_pham_id); // Lấy thông tin sản phẩm
            if ($so_luong > $sanPham['so_luong']) {
                // Hiển thị thông báo lỗi và ngăn không thêm vào giỏ hàng
                $_SESSION['error_message'] = "Số lượng bạn chọn vượt quá số lượng trong kho.";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
    
            // Kiểm tra và cập nhật giỏ hàng
            $checkSanPham = false;
            foreach ($chitietgiohang as $detail) {
                if ($detail['san_pham_id'] == $san_pham_id) {
                    $newSoLuong = $detail['so_luong'] + $so_luong;
    
                    // Kiểm tra lại tồn kho khi cập nhật số lượng
                    if ($newSoLuong > $sanPham['so_luong']) {
                        $_SESSION['error_message'] = "Số lượng bạn chọn vượt quá số lượng trong kho.";
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        exit;
                    }
    
                    $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                    $checkSanPham = true;
                    break;
                }
            }
    
            // Thêm sản phẩm mới nếu chưa có trong giỏ hàng
            if (!$checkSanPham) {
                $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
            }
    
            // Điều hướng về giỏ hàng
            header("Location: " . BASE_URL . '?act=gio-hang');
            exit;
        } else {
            // Xử lý trường hợp chưa đăng nhập
            header('Location: ' . BASE_URL . '?act=login');
            
            exit;
        }
    }

    public function gioHang()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            // Lay du lieu gio hang cua nguoi dung           
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                
                $gioHang = ['id'=>$gioHangId];

                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            }else{
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/gioHang.php';

        }else{
            header("Location: ". BASE_URL . '?act=login');
        }
    }

    public function thanhToan()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if (isset($_SESSION['user_client'])) {

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            // Lay du lieu gio hang cua nguoi dung
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

            if (!$gioHang) {

                $gioHangId = $this->modelGioHang->addGioHang($user['id']);

                $gioHang = ['id'=>$gioHangId];
                
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            }else{
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/thanhToan.php';

        }else{
            var_dump('Chưa đăng nhập');die;
        }                                                                         
    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = 'DH-' . rand(1000,9999);

            // Them thong tin vao db
            $donHang = $this->modelDonHang->addDonHang($tai_khoan_id,
                                            $ten_nguoi_nhan,
                                            $email_nguoi_nhan,
                                            $sdt_nguoi_nhan,
                                            $dia_chi_nguoi_nhan,
                                            $ghi_chu,
                                            $tong_tien,
                                            $phuong_thuc_thanh_toan_id,
                                            $ngay_dat,
                                            $ma_don_hang,
                                            $trang_thai_id
            );
            
            // Lay thong tin gio hang cua nguoi dung
            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
            
            // Luu sp vao chi tiet  don hang
            if ($donHang) {
                // Lay ra toan bo san pham trong gio hang
                
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                
                // Them tung sp tu gio hang vao chi tiet don hang
                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san-pham']; // Uu tien don gia se lay gia khuyen mai

                    $this->modelDonHang->addChiTietDonHang(
                        $donHang, // Id don hang vua tao
                        $item['san_pham_id'], // Id san pham
                        $donGia, // Don gia lay tu san pham
                        $item['so_luong'], // So luong
                        $donGia * $item['so_luong'] // Thanh tien
                    ); 
                }

                // Sau khi them xong thi phai tien hanh xoa sp trong gio hang
                // Xoa toan bo sp trong chi tiet gio hang
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);

                // Xoa ttin gio hnag nguoi dung
                $this->modelGioHang->clearGioHang($tai_khoan_id);

                // Chuyen huong dem tramh lich su mua hang
                header("Location:" . BASE_URL . '?act=lich-su-mua-hang');
                exit;

            } else {
                var_dump('Lỗi dat hang. Vui logn thu lai sau');die;
            }
        }
    }

    public function lichSuMuaHang()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if (isset($_SESSION['user_client'])) {
            // Lya ra ttin tk dang nhap
             $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            // Lay ra danh sach trang thai don hang
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            // Lay ra danh sach phuong thuc thanh toan
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // Lay ra danh sach tat ca don hang cua tai khoan
            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);

            require_once './views/lichSuMuaHang.php';

        } else {
            var_dump('Chưa đăng nhập');die;
        }
    }

    public function chiTietMuaHang()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        if (isset($_SESSION['user_client'])) {
            // Lya ra ttin tk dang nhap
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            // Lay id don hang truyen tu URL
            $donHangId = $_GET['id'];

            // Lay ra danh sach trang thai don hang
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            // Lay ra danh sach phuong thuc thanh toan
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // Lay ra thong tin don hang theo id
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            // Lay thong tin sp cua don hang trong bang chi tiet don hang
            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHang($donHangId);    
            
            // echo "<pre>";
            // print_r($donHang);
            // print_r($chiTietDonHang);
             
            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
               echo "Ban khong co quyen truy cap don hang nay.";
               exit;
            }

            require_once './views/chiTietMuaHang.php';
            
        } else {
            var_dump('Ban chưa đăng nhập');die;
        }
    }

    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            // Lya ra ttin tk dang nhap
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            // Lay id don hang truyen tu URL
            $donHangId = $_GET['id'];

            // Kiem tra don hangg co ton tai khong
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền hủy ";
                exit;
            }

            if ($donHang['trang_thai_id'] != 1) {
                echo "Chỉ đơn hàng ở trạng thái 'Chưa xác nhận' mới có thể hủy";
                exit;
            }

            // Huy don hang
            $this->modelDonHang->updateTrangThaiDonHang($donHangId, 11);

            header("Location:" . BASE_URL . '?act=lich-su-mua-hang');
            exit;

        } else {
            var_dump('Chưa đăng nhập');die;
        }
    }
    public function sanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once './views/listProduct.php';
    }
    public function sanPhamTheoDanhMuc()
    {
        $danh_muc_id = $_GET['id_danh_muc'];

        $listSanPham = $this->modelSanPham->getSanPhamByDanhMuc($danh_muc_id);

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        require_once './views/listSanPhamDanhMuc.php';
    }
    

}