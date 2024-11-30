<?php
class SanPham {
    public $conn; // Khai bao phuong thuc

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getSanPhamHot() {
        try {
            // Câu truy vấn SQL để lấy sản phẩm hot
            $sql = 'SELECT * FROM san_phams WHERE gia_khuyen_mai > 0 and ngay_nhap > DATE_SUB(NOW(), INTERVAL 7 DAY)';
    
            // Chuẩn bị câu lệnh SQL
            $stmt = $this->conn->prepare($sql);
    
            // Thực thi câu lệnh
            $stmt->execute();
    
            // Trả về tất cả các kết quả
            return $stmt->fetchAll();
        } catch (Exception $e) {
            // Xử lý lỗi và trả về thông báo lỗi
            echo 'Error: ' . $e->getMessage();
        }
    }
    // Viet ham lay toan bo danh sach san pham
    public function getAllSanPham(){
        try {
            $sql = 'SELECT  san_phams.*,danh_mucs.ten_danh_muc FROM 
            san_phams 
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (Exception $e) {
            echo "Loi". $e->getMessage();
        }
    }
    public function getDetailSanPham($id) {
        try {
            $sql = 'SELECT san_phams.*,danh_mucs.ten_danh_muc FROM 
            san_phams 
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id WHERE san_phams.id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getListAnhSanPham($id) {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function getBinhLuanfromSanPham($id) {
        try {
            $sql = 'SELECT binh_luans.*,tai_khoans.ho_ten,tai_khoans.anh_dai_dien FROM binh_luans 
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
             WHERE binh_luans.san_pham_id  = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function getListSanPhamCungDanhMuc($danh_muc_id){
        try {
            $sql = 'SELECT  san_phams.*,danh_mucs.ten_danh_muc FROM 
            san_phams 
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.danh_muc_id = '.$danh_muc_id.' LIMIT 5';
            

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (Exception $e) {
            echo "Loi". $e->getMessage();
        }
    }
    public function getSanPhamByDanhMuc($danh_muc_id) {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM 
                    san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
                    WHERE san_phams.danh_muc_id = :danh_muc_id';
    
            $stmt = $this->conn->prepare($sql);
    
            $stmt->execute([':danh_muc_id' => $danh_muc_id]);
    
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getSanPhamTuDanhMucMeo() {
        try {
            // Câu truy vấn SQL trực tiếp lấy sản phẩm từ danh mục "Mèo"
            $sqlSanPham = 'SELECT * FROM san_phams WHERE danh_muc_id = (SELECT id FROM danh_mucs WHERE ten_danh_muc = "Mèo")';
    
            // Chuẩn bị câu lệnh SQL
            $stmtSanPham = $this->conn->prepare($sqlSanPham);
    
            // Thực thi câu lệnh
            $stmtSanPham->execute();
    
            // Trả về tất cả các sản phẩm từ danh mục "Mèo"
            return $stmtSanPham->fetchAll();
        } catch (Exception $e) {
            // Xử lý lỗi và trả về thông báo lỗi
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getSanPhamTuDanhMucCho() {
        try {
            // Câu truy vấn SQL trực tiếp lấy sản phẩm từ danh mục "Mèo"
            $sqlSanPham = 'SELECT * FROM san_phams WHERE danh_muc_id = (SELECT id FROM danh_mucs WHERE ten_danh_muc = "Chó")';
    
            // Chuẩn bị câu lệnh SQL
            $stmtSanPham = $this->conn->prepare($sqlSanPham);
    
            // Thực thi câu lệnh
            $stmtSanPham->execute();
    
            // Trả về tất cả các sản phẩm từ danh mục "Mèo"
            return $stmtSanPham->fetchAll();
        } catch (Exception $e) {
            // Xử lý lỗi và trả về thông báo lỗi
            echo 'Error: ' . $e->getMessage();
        }
    }

}

