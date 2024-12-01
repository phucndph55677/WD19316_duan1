<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class AdminTaiKhoanController{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;
    public function __construct(){
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
}
public function danhsachQuanTri($chuc_vu_id){
    $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
   
    require_once('./views/taikhoan/quantri/listQuanTri.php');
}
public function formAddQuanTri(){
    require_once('./views/taikhoan/quantri/addQuanTri.php');
    deleteSessionError();
}
public function postAddQuanTri() {
    // Ham nay de xu ly them du lieu
    // var_dump($_POST);

    // Kiem tra xem du lieu co duoc submit len kh
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lay ra du lieu
        $ho_ten = $_POST['ho_ten'];
        $email = $_POST['email'];

        // Tao 1 mang trong de chua du lieu
        $errors = [];
        if (empty($ho_ten)) {
            $errors['ho_ten'] = 'Họ tên khong duoc de trong';
        }
        if (empty($email)) {
            $errors['email'] = 'Email khong duoc de trong';
        }
        $_SESSION['error'] = $errors;

        // Neu khong co loi thi tien hanh them danh muc
        if (empty($errors)) {
            // Neu khong co loi thi tien hanh them danh muc
            // var_dump('oke');
           $password = password_hash('123456', PASSWORD_BCRYPT);
           $chuc_vu_id = 1;
            $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();

        } else {
            $_SESSION['flash'] = true;
            // Tra ve form vaf bao loi
            header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
            exit();
        }
    }
}
public function formEditQuanTri(){
    $id_quan_tri = $_GET['id_quan_tri'];
     $quantri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
     
    require_once('./views/taikhoan/quantri/editQuanTri.php');
    deleteSessionError();
}
public function postEditQuanTri(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
        // Lay ra du lieu
       $id = $_POST['id'];
       $ho_ten = $_POST['ho_ten'];
       $email = $_POST['email'];
       $so_dien_thoai = $_POST['so_dien_thoai'];
       $trang_thai= $_POST['trang_thai'];
       
        $errors = [];
        if (empty($ho_ten)) {
            $errors['ho_ten'] = 'Họ tên Không được Để Trống';
        }
        if (empty($email)) {
            $errors['email'] = 'Email Không được Để Trống';
        }
        if (!isset($trang_thai) || !in_array($trang_thai, ['1', '0'], true)) {
            $errors['trang_thai'] = 'Trạng thái không hợp lệ hoặc chưa được chọn.';
        }
         $_SESSION['error'] = $errors;
         
           
        if (empty($errors)) {
            $this->modelTaiKhoan->updateTaiKhoan($id, $ho_ten, $email, $so_dien_thoai, $trang_thai);
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();         
        } else {
            $_SESSION['flash'] = true;
            $_SESSION['error'] = $errors;
             // Neu co loi thi tra ve form va bao loi
             header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri='. $id);
             exit();
           
        }
       
    }
}
public function resetPassword(){
    $id_quan_tri = $_GET['id_quan_tri'];
    $tai_khoan = $this ->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
    $password = password_hash('123456', PASSWORD_BCRYPT);
    $Status = $this->modelTaiKhoan->restPassword($id_quan_tri, $password);
   if($Status){
    header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
    exit();
   }else{
    var_dump('Lỗi khi reset tài khoản');
   }    
    
}
public function danhSachKhachHang()
{
    $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);

    require_once('./views/taikhoan/khachhang/listKhachHang.php');
}
public function formEditKhachHang(){
    $id_khach_hang = $_GET['id_khach_hang'];
     $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
     
    require_once('./views/taikhoan/khachhang/editKhachHang.php');
    deleteSessionError();
}

public function postEditKhachHang(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
        // Lay ra du lieu
       $khach_hang_id = $_POST['khach_hang_id'];
       $ho_ten = $_POST['ho_ten'];
       $email = $_POST['email'];
       $so_dien_thoai = $_POST['so_dien_thoai'];
       $ngay_sinh = $_POST['ngay_sinh'];
       $gioi_tinh = $_POST['gioi_tinh'];
       $dia_chi = $_POST['dia_chi'];
       $trang_thai= $_POST['trang_thai'];
       
        $errors = [];
        if (empty($ho_ten)) {
            $errors['ho_ten'] = 'Họ tên Không được Để Trống';
        }
        if (empty($email)) {
            $errors['email'] = 'Email Không được Để Trống';
        }
        if (empty($ngay_sinh)) {
            $errors['ngay_sinh'] = 'Ngày sinh Không được Để Trống';
        }
        if (empty($gioi_tinh)) {
            $errors['gioi_tinh'] = 'Giới tính hông được Để Trống';
        }
        if (!isset($trang_thai) || !in_array($trang_thai, ['1', '0'], true)) {
            $errors['trang_thai'] = 'Trạng thái không hợp lệ hoặc chưa được chọn.';
        }
         $_SESSION['error'] = $errors;
         
           
        if (empty($errors)) {
            $this->modelTaiKhoan->updateKhachHang($khach_hang_id, $ho_ten, $email, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai);
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit();         
        } else {
            $_SESSION['flash'] = true;
            $_SESSION['error'] = $errors;
             // Neu co loi thi tra ve form va bao loi
             header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang='. $khach_hang_id);
             exit();
           
        }
       
    }
}
public function detailKhachHang(){
    $id_khach_hang = $_GET['id_khach_hang'];
    $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

    $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
    
    $listBinhLuan =$this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
    require_once('./views/taikhoan/khachhang/detailKhachHang.php');
}


public function formLogin(){
    require_once('./views/auth/formLogin.php');

    deleteSessionError();
    exit();
}

public function login(){
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        //Lấy email và pass gửi lên từ form

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // var_dump($password);die;

        $user = $this->modelTaiKhoan->checkLogin($email, $password);

        if ($user == $email){
            //Trường hợp đăng nhập thành công
            //Lưu thông tin vào SESSION
            $_SESSION['user_admin'] = $user;
            header("Location: " . BASE_URL_ADMIN);
            exit();
        }else{
            //Trường hợp lỗi thì lưu lỗi vào SESSION
            $_SESSION['error'] = $user;
            // var_dump($_SESSION['error']);die;

            $_SESSION['flash'] = true;

            header("Location: " . BASE_URL_ADMIN .'?act=login-admin');
            exit();
        }
    }
}
public function logout(){
    if (isset($_SESSION['user_admin'])){
        unset($_SESSION['user_admin']);
        header("Location:" . BASE_URL_ADMIN . '?act=login-admin');
    }
}
public function formEditCaNhanQuanTri(){
    $email=$_SESSION['user_admin'];
    $thongTin= $this->modelTaiKhoan ->getTaiKhoanformEmail($email);
    require_once './views/taikhoan/canhan/editCaNhan.php';
    deleteSessionError();
}
public function postEditMatKhauCaNhan(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $old_pass=$_POST['old_pass'];
        $new_pass=$_POST['new_pass'];
        $confirm_pass=$_POST['confirm_pass'];

        //Lấy thông tin user
        $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_admin']);

        $checkPass = password_verify($old_pass,$user['mat_khau']);

        $errors=[];

        if(! $checkPass){
            $errors['old_pass'] = 'Mật khẩu người dùng không đúng';
        }
        if($new_pass !== $confirm_pass){
            $errors['confirm_pass'] = 'Mật khẩu nhập lại không khớp với mật khẩu mới';
        }
        if(empty($old_pass)){
            $errors['old_pass'] = 'Vui lòng điền dữ liệu';
        }
        if(empty($new_pass)){
            $errors['new_pass'] = 'Vui lòng điền dữ liệu';
        }
        if(empty($confirm_pass)){
            $errors['confirm_pass'] = 'Vui lòng điền dữ liệu';
        }
        $_SESSION['error'] = $errors;
        if(!$errors){
            //Thực hiện đổi mật khẩu
            $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
            $Status = $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
            if($Status){
                $_SESSION['success'] = "Đã đổi mật khẩu thành công";
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }
        }else{
            //Lỗi khi lưu vào Session
            $_SESSION['flash'] = true;
            header("Location:" . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
            exit();
        }
    }
}
}