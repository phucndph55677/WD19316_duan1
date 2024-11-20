<?php 

class HomeController
{
    public $modelSanPham;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }

    public function home(){
        echo "Day la home 123";
    }

    public function trangChu(){
        echo "Day la trang chu cua toi";
    }

    public function danhSachSanPham(){
        // echo "Day la danh sach san pham";
        $listProduct = $this->modelSanPham->getAllProduct();
        // var_dump($listProduct);die;

        require_once './views/listProduct.php';
    }

}