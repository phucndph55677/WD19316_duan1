<?php
class GioHang {

    public $conn;
    public function __construct(){
        $this->conn =  ConnectDB();
    }
    public function getGioHangFromUser($id){
        try {
            $sql = 'SELECT * FROM gio_hangs WHERE tai_khoan_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetchAll();
            
        } catch (Exception $e) {
            echo "Loi". $e->getMessage();
        }
    }
    public function getDetailGioHang($id){
        try {
            $sql = 'SELECT * FROM chi_tiet_gio_hangs WHERE gio_hang_id = :gio_hang_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':gio_hang_id' => $id
            ]);

            return $stmt->fetchAll();
            
        } catch (Exception $e) {
            echo "Loi". $e->getMessage();
        }
}
public function addGioHang($id){
    try {
        $sql = 'INSERT INTO gio_hangs (tai_khoan_id) VALUES (:id)';

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $this->conn->lastInsertId();        
    } catch (Exception $e) {
        echo "Loi". $e->getMessage();
    }
} 
public function updateSoLuong($gio_hang_id,$san_pham_id,$soluong){
    try {
        $sql = 'UPDATE chi_tiet_gio_hangs SET so_luong = :so_luong 
        WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id';
        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':gio_hang_id' => $gio_hang_id,
            ':san_pham_id' => $san_pham_id,
            ':soluong' => $soluong
        ]);

        return true;        
    } catch (Exception $e) {
        echo "Loi". $e->getMessage();
    }
}
public function addDetailGioHang($gio_hang_id,$san_pham_id,$soluong){
    try {
        $sql = 'INSERT INTO chi_tiet_gio_hangs (gio_hang_id,san_pham_id,so_luong) VALUES (:gio_hang_id,:san_pham_id,:soluong)';
        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':gio_hang_id' => $gio_hang_id,
            ':san_pham_id' => $san_pham_id,
            ':soluong' => $soluong
        ]);

        return true;        
    } catch (Exception $e) {
        echo "Loi". $e->getMessage();
    }
}
}