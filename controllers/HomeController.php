<?php 
class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDanhMuc;
   public $modelDonHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelDonHang = new DonHang();
        
    }

    public function home(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $SanPhamHot = $this->modelSanPham->getSanPhamHot();
        $SanPhamMeo = $this->modelSanPham->getSanPhamTuDanhMucMeo();
        $SanPhamCho = $this->modelSanPham->getSanPhamTuDanhMucCho();
       
        require_once './views/home.php';


    }
    public function sanPham(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        
        require_once './views/listProduct.php';
    }
    public function sanPhamTheoDanhMuc(){
        $danh_muc_id = $_GET['id_danh_muc'];
        $listSanPham = $this->modelSanPham->getSanPhamByDanhMuc($danh_muc_id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/listSanPhamDanhMuc.php';
    }
    
    public function trangChu(){
        echo "Day la trang chu cua toi";
    }

    public function chiTietSanPham(){
        
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $ListAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanfromSanPham($id);
        $ListSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamCungDanhMuc($sanPham['danh_muc_id']);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if($sanPham){
        require_once './views/detailSanPham.php';  
        }else{
            header("Location: " . BASE_URL_ADMIN );
            exit();
        }
    }
    public function formLogin(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }
    public function postLogin(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
       $user = $this->modelTaiKhoan->checkLogin($email, $password);
       if($user ==  $email){
        $_SESSION['user_client'] = $user;
        header("Location: " . BASE_URL );
           exit();
       }else{
        $_SESSION['error'] = $user;
        $_SESSION['flash'] = true;
        header("Location: " . BASE_URL . '?act=login' );
        exit();
       }
      }  

}
public function logout(){
    unset($_SESSION['user_client']);
    header("Location: " . BASE_URL );
    exit();
}
public function addGioHang() {   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        
        
        $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
        if(!$gioHang){
            $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
            $gioHang = ['id' => $gioHangId];
        }else{
            $chitietgiohang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        }
        $san_pham_id = $_POST['san_pham_id'];
        $so_luong = $_POST['so_luong'];
        $checkSanPham = false;

        foreach($chitietgiohang as $detail){
            if($detail['san_pham_id'] == $san_pham_id){
                $newSoLuong = $detail['so_luong'] + $so_luong;
                $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                $checkSanPham = true;
            break;
            }
            
     
     
     
        }
        if(!$checkSanPham){
            $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
        }
        header("Location: " . BASE_URL . '?act=gio-hang' );


    }else{
        var_dump('chưa đăng nhập');die();
    }
           

} 
public function gioHang(){
    $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
    // Kiểm tra nếu người dùng đã đăng nhập
    if(isset($_SESSION['user_client'])){
        $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

        // Kiểm tra xem người dùng đã có giỏ hàng chưa
        $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
        if(!$gioHang){
            // Nếu chưa có giỏ hàng, thêm giỏ hàng mới
            $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
            $gioHang = ['id' => $gioHangId];
        }
        
        // Lấy chi tiết giỏ hàng
        $chitietgiohang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        
        // Trực tiếp yêu cầu file view
        require_once './views/gioHang.php';
        
    } else {
        // Thông báo người dùng chưa đăng nhập
        header('Location:'. BASE_URL . '?act=login');
        // Có thể thêm redirect đến trang đăng nhập
        // header('Location: /login');
       
    }
}

public function sanPhamDanhMuc() {
    if (isset($_GET['id_danh_muc'])) {
        $danhMucId = $_GET['id_danh_muc'];
        $listSanPham = $this->modelSanPham->getSanPhamByDanhMuc($danhMucId);
        require_once './views/listsanPhamTheoDanhMuc.php';
    } else {
        header("Location: " . BASE_URL);
        exit();
    }
}
public function thanhToan() {
    $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
    if(isset($_SESSION['user_client'])){
        $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

        // Kiểm tra xem người dùng đã có giỏ hàng chưa
        $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
        if(!$gioHang){
            // Nếu chưa có giỏ hàng, thêm giỏ hàng mới
            $gioHangId = $this->modelGioHang->addGioHang($user['id']);
            $gioHang = ['id' => $gioHangId];
        }
        
        // Lấy chi tiết giỏ hàng
        $chitietgiohang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        
        // Trực tiếp yêu cầu file view
        require_once './views/thanhToan.php';
        
    } else {
        // Thông báo người dùng chưa đăng nhập
        header('Location:'. BASE_URL . '?act=login');
        // Có thể thêm redirect đến trang đăng nhập
        // header('Location: /login');
       
    }
  
}
public function postThanhToan() {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
       $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
       $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
       $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
       $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
       $ghi_chu = $_POST['ghi_chu'];
       $tong_tien = $_POST['tong_tien'];
       $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
       $ngay_dat =  date('Y-m-d');
       $trang_thai_id = 1;
       $ma_don_hang = 'D-H'.rand(1000,9999);
       $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
       $tai_khoan_id = $user['id'];
       
       $donHang = $this->modelDonHang->addDonHang( $ma_don_hang,$tai_khoan_id,$ten_nguoi_nhan,$email_nguoi_nhan,$sdt_nguoi_nhan,$dia_chi_nguoi_nhan,$ngay_dat,$tong_tien,$ghi_chu,$phuong_thuc_thanh_toan_id,$trang_thai_id);

       
       $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
       if($donHang){
        $chitietgiohang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        foreach($chitietgiohang as $detail){
            $dongia = $detail['gia_khuyen_mai'] ?? $detail['gia_san_pham'];
            $this->modelDonHang->addchiTietDonHang($donHang,$detail['san_pham_id'],
                $dongia,$detail['so_luong'],$dongia*$detail['so_luong']);
        }
        $this->modelGioHang->clearDetailGioHang($gioHang['id']);
        $this->modelGioHang->clearGioHang($tai_khoan_id);
        // header('Location:'. BASE_URL . '?act=lich-su-don-dang');
        exit();


       }else{
        var_dump('khong thanh cong');
        exit();
       }
       
}

}
public function lichSuMuaHang() {
    $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
    if(isset($_SESSION['user_client'])){
        $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        $tai_khoan_id = $user['id'];

        $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
        $TrangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
        $arrphuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
        $phuongThucThanhToan = array_column($arrphuongThucThanhToan, 'ten_phuong_thuc', 'id');

        $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
        require_once './views/lichSuMuaHang.php';

    }else{
        header('Location:'. BASE_URL . '?act=login');
        die();
    }

}
    public function chiTietMuaHang() {
    $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
    if(isset($_SESSION['user_client'])){
        $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        $tai_khoan_id = $user['id'];
        $don_hang_id = $_GET['id'];
       
        $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
        $TrangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
        $arrphuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
        $phuongThucThanhToan = array_column($arrphuongThucThanhToan, 'ten_phuong_thuc', 'id');
        $donHang = $this->modelDonHang->getDonHangById($don_hang_id);
        $chitietdonhang = $this->modelDonHang->getChiTietDonHangById($don_hang_id);
        if($donHang['tai_khoan_id'] != $tai_khoan_id ){
           echo 'Bạn Không Có Quyen Xem Đơn Hàng Này';
        }

        require_once './views/chiTietMuaHang.php';
    }else{
        header('Location:'. BASE_URL . '?act=login');
        die();
    }
    }
public function huyDonHang() {
    if(isset($_SESSION['user_client'])){
        $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        $tai_khoan_id = $user['id'];
        $don_hang_id = $_GET['id'];
        $donHang = $this->modelDonHang->getDonHangById($don_hang_id);
        if($donHang['tai_khoan_id'] != $tai_khoan_id){
            echo 'Bạn Không Có Quyen Hủy Đơn Hàng Này';
            exit();
        }
        if($donHang['trang_thai_id'] != 1){
            echo 'Chỉ Đơn Hàng (Chưa Xác Nhận) Mới Có Thể Hủy';
            exit();

        }
        $this->modelDonHang->updateTrangThaiDonHang($don_hang_id,11);
        header('Location:'. BASE_URL . '?act=lich-su-mua-hang');
    }else{
        header('Location:'. BASE_URL . '?act=login');
        die();
    }

}

}