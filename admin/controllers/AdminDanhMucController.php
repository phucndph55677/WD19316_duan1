<?php

class AdminDanhMucController {

    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function danhSachDanhMuc(){
        // echo "Day la trang danh muc"; 

        $listDanhMuc = $this->modelDanhMuc->getAllDanhuc();
        require_once './views/danhmuc/DanhMuc.php';
    }

}

?>