<?php
class AdminThongKeController {
    public $modelThongKe;

    public function __construct() {
        $this->modelThongKe = new AdminThongKe();
    }

    public function thongKe() {
        $tongDoanhThu = $this->modelThongKe->getDoanhThu();
        $tongDonHang = $this->modelThongKe->getTongDonHang();
        $tongSanPham = $this->modelThongKe->getTongSanPham();
        $tongTaiKhoan = $this->modelThongKe->getTongTaiKhoan();
     // Gọi dữ liệu 7 ngày gần nhất
       
                

        require_once './views/home.php'; // Tạo view để hiển thị dữ liệu
    }
}
?>