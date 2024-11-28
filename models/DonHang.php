<?php
class DonHang
{

    public $conn;
    public function __construct()
    {
        $this->conn =  ConnectDB();
    }
    public function addDonHang($ma_don_hang,$tai_khoan_id,$ten_nguoi_nhan,$email_nguoi_nhan,$sdt_nguoi_nhan,$dia_chi_nguoi_nhan,$ngay_dat,$tong_tien,$ghi_chu,$phuong_thuc_thanh_toan_id,$trang_thai_id){
        try {
            $sql = 'INSERT INTO don_hangs (ma_don_hang,tai_khoan_id,ten_nguoi_nhan,email_nguoi_nhan,sdt_nguoi_nhan,dia_chi_nguoi_nhan,ngay_dat,tong_tien,ghi_chu,phuong_thuc_thanh_toan_id,trang_thai_id) 
            VALUES (:ma_don_hang,:tai_khoan_id,:ten_nguoi_nhan,:email_nguoi_nhan,:sdt_nguoi_nhan,:dia_chi_nguoi_nhan,:ngay_dat,:tong_tien,:ghi_chu,:phuong_thuc_thanh_toan_id,:trang_thai_id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ma_don_hang' => $ma_don_hang,
                ':tai_khoan_id' => $tai_khoan_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ngay_dat' => $ngay_dat,
                ':tong_tien' => $tong_tien,
                ':ghi_chu' => $ghi_chu,
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                ':trang_thai_id' => $trang_thai_id
            ]);            

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }
    public function addchiTietDonHang($don_hang_id,$san_pham_id,$don_gia,$so_luong,$thanh_tien){
       try {
          $sql = 'INSERT INTO chi_tiet_don_hangs (don_hang_id,san_pham_id,don_gia,so_luong,thanh_tien) 
          VALUES (:don_hang_id,:san_pham_id,:don_gia,:so_luong,:thanh_tien)';

          $stmt = $this->conn->prepare($sql);

          $stmt->execute([
              ':don_hang_id' => $don_hang_id,
              ':san_pham_id' => $san_pham_id,
              ':don_gia' => $don_gia,
              ':so_luong' => $so_luong,
              ':thanh_tien' => $thanh_tien
          ]) ;
       } catch (Exception $e) {
        echo "Loi" . $e->getMessage();
    }
    }
      
    
}
