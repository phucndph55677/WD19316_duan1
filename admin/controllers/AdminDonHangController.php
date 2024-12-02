<?php

class AdminDonHangController{

    public $modelDonHang;

    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }

    public function danhSachDonHang(){   

        $listDonHang = $this->modelDonHang->getAllDonHang();

        require_once('./views/donhang/listDonHang.php');
    }


    public function detailDonHang() {

        $don_hang_id = $_GET['id_don_hang'];

        // Lay thong tin don hang o bang don hang
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

        // Lay danh sach san pham da dat dua don hang o bang chi_tiet_don_hangs
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        require_once './views/donhang/detailDonHang.php';
    }

    public function formEditDonHang() 
    {

        $id = $_GET['id_don_hang'];

        $donHang = $this->modelDonHang->getDetailDonHang($id);

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang(); 

        if ($donHang) {

            require_once './views/donhang/editDonHang.php';

            deleteSessionError();

        } else {

            header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }
    }

    public function postEditDonHang() 
    {
        // Ham nay dung de xu ly them du lieu
        
        // Kiem tra xem du lieu co phai dc submit len kh
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            // Lay ra du lieu
            $don_hang_id = $_POST['don_hang_id'] ?? '';

            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu'] ?? '';
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';

            // Tao 1 mang trong de chua du lieu
            $errors = [];
            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Ten nguoi nhan khong duoc de trong';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'SDT nguoi nhan kh duoc de trong';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Email nguoi nhan kh duoc de trong';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Dia chi nguoi nhan kh duoc de trong';
            }
            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Trang thai don hang';
            }

            
            $_SESSION['error'] = $errors;

            // Neu kh co loi thi tien hanh sua
            if (empty($errors)) {
                // Neu kh co loi thi tien hanh sua san pham
                // var_dump('ok');

                $this->modelDonHang->updateDonHang( $don_hang_id,
                                                    $ten_nguoi_nhan, 
                                                    $sdt_nguoi_nhan, 
                                                    $email_nguoi_nhan,
                                                    $dia_chi_nguoi_nhan,
                                                    $ghi_chu,
                                                    $trang_thai_id
                                                );

                header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            } else {
                // Neu co loi tar ve form
                // Dat chi thi xoa session sau khi hien thi form
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
            }
        }
    }

}