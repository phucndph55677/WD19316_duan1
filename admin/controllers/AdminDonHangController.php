<?php
class AdminDonHangController{
    public $modelDonHang;
    public function __construct(){
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachDonHang(){   
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once('./views/donhang/listDonHang.php');
    }
   
    public function detailDonHang(){
        $don_hang_id = $_GET['id_don_hang'];
        
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
        
        $sanPhamDonHang = $this->modelDonHang->getListPDonHang($don_hang_id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThai();
       
        require_once('./views/donhang/detailDonHang.php');
    }
   
    public function formEditDonHang(){
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);
         
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThai();
        if($donHang){
            require_once('./views/donhang/editDonHang.php');
        }else{
            header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }
    
    }
  
    public function postEditDonHang(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            // Lay ra du lieu
           $id = $_POST['id'];
           $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
           $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
          
           $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
           $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
           $ghi_chu = $_POST['ghi_chu'];
           $trang_thai_id = $_POST['trang_thai_id'];
            // Tao 1 mang trong de chua du lieu
            $errors = [];
            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Tên Người Nhận Không được Để Trống';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Số Điện Thoại Của Người Nhận Không được Để trống';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Nhập Địa Chỉ Người Nhận Không được Để Trống';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Email Người Nhận Không được Để Trống';
            }
            if (empty($ghi_chu)) {
                $errors['ghi_chu'] = 'Nhập Ghi Chú Không được Để Trống';
            }
            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Hãy cập Nhập trạng thái đơn hàng';
            }
            

           
            // $_SESSION['errors'] = $errors;
            //   var_dump($errors);die;


            
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old_input'] = $_POST; // Lưu dữ liệu đã nhập
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $id);
                exit();
            } else {
                // Nếu không có lỗi, tiến hành cập nhật
                $this->modelDonHang->updateDonHang($id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id);
                header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            }
        }
    }
    
  
}