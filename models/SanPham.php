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

}

?>