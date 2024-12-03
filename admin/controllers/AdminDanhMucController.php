<?php

class AdminDanhMucController {

    public $modelDanhMuc;

    public function __construct() 
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function danhSachDanhMuc() 
    {
        // echo "Day la trang danh muc";

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        require_once './views/danhmuc/listDanhMuc.php';
    }

    public function formAddDanhMuc() 
    {
        // Ham nay dung de hien thi form nhap

        require_once './views/danhmuc/addDanhMuc.php';
    }

    public function postAddDanhMuc() 
    {
        // Ham nay dung de xy ly them du lieu

        // Kiem tra xem du lieu co phai dc submit len khong
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lay ra du lieu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // Tao 1 mang trong de chua du lieu
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Ten danh muc kh duoc de trong';
            }

            // Neu kh co loi thi tien hanh them danh muc
            if (empty($errors)) {
                // Neu kh co loi thi tien hanh them danh muc
                // var_dump('ok');

                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                // Neu co loi tar ve form
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }      
    }

    public function formEditDanhMuc() 
    {
        // Ham nay dung de hthi form nhap
        // Lay ra ttin danh muc can sua
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            require_once './views/danhmuc/editDanhMuc.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }

    public function postEditDanhMuc() 
    {
        // Ham nay dung de xu ly them du lieu
        
        // Kiem tra xem du lieu co phai dc submit len kh
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lay ra du lieu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // Tao 1 mang trong de chua du lieu
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Ten danh muc kh duoc de trong';
            }

            // Neu kh co loi thi tien hanh sua danh muc
            if (empty($errors)) {
                // Neu kh co loi thi tien hanh sua danh muc
                // var_dump('ok');

                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                // Neu co loi tar ve form
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
    }

    public function deleteDanhMuc() 
    {
        // Lay ra ttin danh muc can xoa
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        if ($danhMuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
        }

        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }

}