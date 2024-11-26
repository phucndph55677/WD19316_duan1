<?php
class SanPham {
    public $conn; // Khai bao phuong thuc

    public function __construct()
    {
        $this->conn = connectDB();
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

}

