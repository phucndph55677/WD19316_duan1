<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminBaoCaoThongKe.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';

// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    
// route
        '/'=> (new AdminBaoCaoThongKe())->home(),
    
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),

    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),

    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),

    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),

    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),

    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),
    // route donhang
    'don-hang' => (new AdminDonHangController())->danhSachDonHang(),
     'chi-tiet-don-hang' => (new AdminDonHangController())->detailDonHang(),
     'form-sua-don-hang' => (new AdminDonHangController())->formEditDonHang(),
      'sua-don-hang' => (new AdminDonHangController())->postEditDonHang()
    ///route user
    // 'list-tai-khoan-quan-tri' => (new AdminDonHangController())->listTaiKhoanQuanTri(),
    // 'list-tai-khoan-khach-hang' => (new AdminDonHangController())->listTaiKhoanKhachHang(),
    // 'list-tai-khoan-ca-nhan' => (new AdminDonHangController())->listTaiKhoanCaNhan()

};