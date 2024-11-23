<?php

class AdminSanPhamController {

    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function danhSachSanPham(){
        // echo "Day la trang danh muc"; 

        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once './views/sanpham/listSanPham.php';
    }

    public function formAddSanPham() {
        // Ham nay de hien thi form nhap
        // var_dump('Form them');

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        require_once './views/sanpham/addSanPham.php';

        // Xoa session sao khi load trang
        deleteSessionError();
    }

    public function postAddSanPham() {
        // Ham nay de xu ly them du lieu
        // var_dump($_POST);

        // Kiem tra xem du lieu co duoc submit len kh
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lay ra du lieu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // Luu hinh anh vao
            $file_thumb = upLoadFile($hinh_anh, './uploads/');

            // mang hinh anh
            $img_array = $_FILES['img_array'];

            // Tao 1 mang trong de chua du lieu
            $errors = [];

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Ten san pham khong duoc de trong';
            }

            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Gia san pham khong duoc de trong';
            }

            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Gia khuyen mai khong duoc de trong';
            }

            if (empty($so_luong)) {
                $errors['so_luong'] = 'So luong khong duoc de trong';
            }

            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngay nhap khong duoc de trong';
            }

            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Dnah muc khong duoc de trong';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trang thai san pham phai chon';
            }

            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'Phai chon anh san pham';
            }

            $_SESSION['error'] = $errors;


            // Neu khong co loi thi tien hanh them san pham
            if (empty($errors)) {
                // Neu khong co loi thi tien hanh them san pham
                // var_dump('oke');

                $san_pham_id = $this->modelSanPham->insertSanPham($ten_san_pham, 
                                                   $gia_san_pham, 
                                                   $gia_khuyen_mai, 
                                                   $so_luong,
                                                   $ngay_nhap, 
                                                   $danh_muc_id,
                                                   $trang_thai,
                                                   $mo_ta,
                                                   $file_thumb
                                                );
                // var_dump($san_pham_id);die;
                // Xu ly them album anh sp img_array
                if (!empty($img_array['name'])) {
                    foreach($img_array['name'] as $key=>$value){
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key]
                        ];

                        $link_hinh_anh = upLoadFile($file, './uploads/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }

                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();

            } else {
                // Tra ve form vaf bao loi
                // Dat chi thi xoa session sau khi hien thi form
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }

    // public function formEditDanhMuc() {
    //     // Ham nay dung de hien thi form suaaa
    //     // Lay ra thong tin cua danh muc can sua
    //     $id = $_GET['id_danh_muc'];
    //     $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
    //     if ($danhMuc) {
    //         require_once './views/danhmuc/editDanhMuc.php';
    //     } else {
    //         header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
    //         exit();
    //     }
    // }

    // public function postEditDanhMuc() {
    //     // Ham nay dung de xu ly them du lieu
    //     // var_dump($_POST);

    //     // Kiem tra xem du lieu co duoc submit len kh
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Lay ra du lieu
    //         $id = $_POST['id'];
    //         $ten_danh_muc = $_POST['ten_danh_muc'];
    //         $mo_ta = $_POST['mo_ta'];

    //         // Tao 1 mang trong de chua du lieu
    //         $errors = [];
    //         if (empty($ten_danh_muc)) {
    //             $errors['ten_danh_muc'] = 'Ten danh muc khong duoc de trong';
    //         }

    //         // Neu khong co loi thi tien hanh sua danh muc
    //         if (empty($errors)) {
    //             // Neu khong co loi thi tien hanh sua danh muc
    //             // var_dump('oke');

    //             $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
    //             header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
    //             exit();

    //         } else {
    //             // Tra ve form vaf bao loi
    //             $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
    //             require_once './views/danhmuc/editDanhMuc.php';
    //         }
    //     }
    // }

    // public function deleteDanhMuc() {
    //     $id = $_GET['id_danh_muc'];
    //     $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

    //     if ($danhMuc) {
    //         $this->modelDanhMuc->destroyDanhMuc($id);
    //     }

    //     header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
    //     exit();
    // }
    

}

?>