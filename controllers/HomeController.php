<?php 
class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        
    }

    public function home(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';


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
        if($sanPham){
        require_once './views/detailSanPham.php';  
        }else{
            header("Location: " . BASE_URL_ADMIN );
            exit();
        }
    }
    public function formLogin(){
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



}