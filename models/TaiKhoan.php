<?php
class TaiKhoan {

    public $conn;
    public function __construct(){
        $this->conn =  ConnectDB();
    }
    public function checkLogin($email, $mat_khau){
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            $user = $stmt->fetch();
            
            // Kiểm tra người dùng và mật khẩu
            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                // Kiểm tra chức vụ và trạng thái tài khoản
                if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email']; // Đăng nhập thành công
                    } else {
                        return 'Tài Khoản Bị Cấm'; // Tài khoản bị cấm
                    }
                } else {
                    return 'Tài Khoản Không Có Quyền Truy Cập'; // Tài khoản không có quyền
                }
            } else {
                return 'Bạn Đăng Nhập Sai Thông Tin Hoặc Mật Khẩu'; // Sai thông tin đăng nhập
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage(); // Xử lý lỗi kết nối cơ sở dữ liệu
        }
    }
    public function getTaiKhoanFromEmail($email){
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage(); // Xử lý lỗi kết nối cơ sở dữ liệu
        }
    }
}
