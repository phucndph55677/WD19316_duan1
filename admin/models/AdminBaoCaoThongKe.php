

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
    public function getDoanhThuVaDonHang7Ngay() {
        try {
            // Lấy ngày hiện tại và ngày cách đây 7 ngày
            $today = date('Y-m-d');
            $sevenDaysAgo = date('Y-m-d', strtotime('-7 days'));

            // Lấy tổng đơn hàng và doanh thu trong 7 ngày
            $sql = "SELECT COUNT(*) as tong_don_hang, SUM(tong_tien) as doanh_thu 
                    FROM don_hangs 
                    WHERE ngay_dat BETWEEN '$sevenDaysAgo' AND '$today'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về mảng với tổng đơn hàng và doanh thu
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return null; // Hoặc có thể trả về giá trị mặc định
        }
    }
   
    
}

?>