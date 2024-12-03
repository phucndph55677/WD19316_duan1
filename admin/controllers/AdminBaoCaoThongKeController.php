<?php

class AdminBaoCaoThongKeController
{

    public $modelThongKe;
        
    
        public function __construct()
        {
            $this->modelThongKe = new AdminThongKe();
        }
    
        public function home()
        {
            // Lấy dữ liệu thống kê
            $doanhthu = $this->modelThongKe->getDoanhThu();
            $soluongdonhang = $this->modelThongKe->getTongDonHang();
            $soluongkhachhang = $this->modelThongKe->getTongTaiKhoan();
            $soluongsp = $this->modelThongKe->getTongSanPham();
    
            // Lấy thống kê doanh thu và số lượng đơn hàng trong tháng 12
            $thongKeThang12 = $this->modelThongKe->getDoanhThuVaDonHangThang12();
            $thongKeThang11 = $this->modelThongKe->getDoanhThuVaDonHangThang11();
            
            // Truyền dữ liệu vào view
            require_once './views/home.php';
        }
    
}