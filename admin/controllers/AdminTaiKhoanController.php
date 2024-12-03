<?php

class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
    }

    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);

        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';

        deleteSessionError();
    }

    public function postAddQuanTri()
    {
        // Ham nay dung de xu ly them du lieu

        // Ktra du lieu co phai dc submit len khong
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lay ra du lieu
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];

            // Tao 1 mang trong de chua du lieu
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }

            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            $_SESSION['error'] = $errors;

            // Neu kh co loi thi tien hanh them tai khoan
            if (empty($errors)) {
                // Neu kh co loi thi tien hanh them tai khoan
                // var_dump('okk');
                // dat password mac dinh - 123@123ab
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);

                // Khai bao chuc vu
                $chuc_vu_id = 1;
                
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);
                
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // Tra ve form va loi
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }

    public function formEditQuanTri()
    {
        $id_quan_tri = $_GET['id_quan_tri'];

        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
        
        require_once './views/taikhoan/quantri/editQuanTri.php';

        deleteSessionError();
    }

    public function postEditQuanTri()
    {

        // Ktra xem du lieu co phai dc submit len kh
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Lay ra du lieu           
            $quan_tri_id = $_POST['quan_tri_id'] ?? '';

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';           

            // Tao 1 mang trong de chua du lieu
            $errors = [];
            
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên quản trị không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email quản trị không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }
            
            $_SESSION['error'] = $errors;
            
            if (empty($errors)) {               
                $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id,
                                                    $ho_ten, 
                                                    $email, 
                                                    $so_dien_thoai, 
                                                    $trang_thai
                                                    );

                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // Tra ve form va loi
                // Đat chi thi xoa session sau khi hien thi form
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
                exit();
            }
        }
    }

    public function resetPassword()
    {
        $tai_khoan_id = $_GET['id_quan_tri'];

        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);

        // Dat password mac dinh - 123@123ab
        $password = password_hash('123@123ab', PASSWORD_BCRYPT);

        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);
        
        if ($status && $tai_khoan['chuc_vu_id'] == 1) {

            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
            
        }else if($status && $tai_khoan['chuc_vu_id'] == 2){

            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit();

        }else{
            var_dump('Lỗi khi reset tài khoản');die;
        }
    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);

        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];

        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        require_once './views/taikhoan/khachhang/editKhachHang.php';

        deleteSessionError();
    }

    public function postEditKhachHang()
    {

        // Ktra xem du lieu co phai dc submit len kh
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Lay ra du lieu         
            $khach_hang_id = $_POST['khach_hang_id'] ?? '';

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';          

            // Tao 1 mang trong de chua du lieu
            $errors = [];
            
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email người dùng không được để trống';
            }

            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'ngày sinh người dùng không được để trống';
            }

            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'giới tính người dùng không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }
            
            $_SESSION['error'] = $errors;
            
            if (empty($errors)) {
                
                $this->modelTaiKhoan->updateKhachHang($khach_hang_id,
                                                    $ho_ten, 
                                                    $email, 
                                                    $so_dien_thoai, 
                                                    $ngay_sinh, 
                                                    $gioi_tinh, 
                                                    $dia_chi, 
                                                    $trang_thai
                                                    );

                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                // Tra ve form va loi
                // Dat chi thi xoa session sau khi hien thi form
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }

    public function deltailKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];

        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        $listDonHang  = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);

        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }





    // Login, Logout
    public function formLogin()
    {     
        require_once './views/auth/formLogin.php';

        deleteSessionError();

        exit();     
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // lay email va pass gui len tu form
            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($email);die;

            // Xu ly ktra thong tin dang nhap
            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if ($user == $email) { // TH dang nhap thanh cong
                // Luu thong tin vao session
                $_SESSION['user_admin'] = $user;

                header("Location: " . BASE_URL_ADMIN);
                exit();
            }else{
                // Loi thi luu loi vao session
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);die;

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
                
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_admin'])) {

            unset($_SESSION['user_admin']);

            header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
        }
    }



    // 
    public function formEditCaNhanQuanTri()
    {
        $email = $_SESSION['user_admin'];

        $thongTin = $this->modelTaiKhoan->getTaiKhoanformEmail($email);
        // var_dump($thongTin);die;
        require_once './views/taikhoan/canhan/editCaNhan.php';
        deleteSessionError();
    }

}