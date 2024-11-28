<?php
class DanhMuc {
    public $conn;
    
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDanhMuc(){
        try {
            $sql = 'SELECT * FROM danh_mucs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function getDetailDanhMuc($id){
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}