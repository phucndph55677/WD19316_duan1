<?php 

class HomeController {

    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct() 
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }

    public function home() 
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }

    public function chiTietSanPham()
    {
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

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

                $san_pham_id = $_POST['san_pham_id'];

                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;

                foreach($chiTietGioHang as $detail){
                    if ($detail['san_pham_id'] == $san_pham_id) {

                        $newSoLuong = $detail['so_luong'] + $so_luong;

                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);

                        $checkSanPham = true;
                        break;
                    }
                }
                if(!$checkSanPham){
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }

                header("Location:" . BASE_URL . '?act=gio-hang');               
            }else{
                var_dump('Chưa đăng nhập');die;
            }        
        }
    }

    public function gioHang()
    {
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
                echo "Ban kh co quyen huy don hang nay";
                exit;
            }

            if ($donHang['trang_thai_id'] != 1) {
                echo "Chi don hang o trang thai 'Chua xac nhan' moi co the huy";
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
    

}