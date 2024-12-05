

<?php
class AdminThongKe {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getTongDonHang() {
        try {
            $sql = "SELECT COUNT(*) as tong_don_hang FROM don_hangs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return null; // Hoặc có thể trả về giá trị mặc định
        }
    }

    public function getDoanhThu() {
        try {
            $sql = "SELECT SUM(tong_tien) as doanh_thu FROM don_hangs"; // Giả sử trạng thái 2 là đã hoàn thành
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return null; // Hoặc có thể trả về giá trị mặc định
        }
    }

    public function getTongSanPham() {
        try {
            $sql = "SELECT COUNT(*) as tong_san_pham FROM san_phams WHERE trang_thai = 1"; // Chỉ lấy sản phẩm đang bán
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return null; // Hoặc có thể trả về giá trị mặc định
        }
    }

    public function getTongTaiKhoan() {
        try {
            $sql = "SELECT COUNT(*) as tong_tai_khoan FROM tai_khoans";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return null; // Hoặc có thể trả về giá trị mặc định
        }
    }

    // Hàm mới để xem doanh thu và tổng đơn hàng của 7 ngày
    public function getDoanhThuVaDonHangThang12() {
        try {
            // Xác định khoảng thời gian của tháng 12
            $startOfDecember = date('Y') . '-12-01'; // Ngày đầu tiên của tháng 12
            $endOfDecember = date('Y') . '-12-31';  // Ngày cuối cùng của tháng 12
    
            // Lấy tổng đơn hàng và doanh thu trong tháng 12
            $sql = "SELECT COUNT(*) as tong_don_hang, SUM(tong_tien) as doanh_thu 
                    FROM don_hangs 
                    WHERE ngay_dat BETWEEN '$startOfDecember' AND '$endOfDecember'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về mảng chứa tổng đơn hàng và doanh thu
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi
        }
    }
    public function getDoanhThuVaDonHangThang11() {
        try {
            // Xác định khoảng thời gian của tháng 12
            $startOfNovember = date('Y') . '-11-01'; // Ngày đầu tiên của tháng 12
            $endOfNovember = date('Y') . '-11-30';  // Ngày cuối cùng của tháng 12
    
            // Lấy tổng đơn hàng và doanh thu trong tháng 12
            $sql = "SELECT COUNT(*) as tong_don_hang, SUM(tong_tien) as doanh_thu 
                    FROM don_hangs 
                    WHERE ngay_dat BETWEEN '$startOfNovember' AND '$endOfNovember'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về mảng chứa tổng đơn hàng và doanh thu
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi
        }
    }
  
}

?>