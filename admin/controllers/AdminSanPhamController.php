<?php

class AdminSanPhamController {

    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct() 
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();

    }

    public function danhSachSanPham() 
    {
        // echo "Day la trang danh muc";

        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once './views/sanpham/listSanPham.php';
    }

    public function formAddSanPham()
    {
        // Ham nay dung de hthi form nhap
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        require_once './views/sanpham/addSanPham.php';

        // Xoa session sau khi load trang
        deleteSessionError();
    }

    public function postAddSanPham()
    {
        // Ham nay dung de xu ly them du lieu

        // Kiem tra xem du lieu co phai dc submit len kh
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
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            // Mang hinh anh
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
                $errors['gia_khuyen_mai'] = 'Gia khuyen mai san pham kh duoc de trong';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'So luong san pham kh duoc de trong';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngay nhap san pham kh duoc de trong';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh muc san pham phai chon';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trang thai san pham phai chon';
            }
            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'Phai chon anh san pham';
            }

            $_SESSION['error'] = $errors;

            // Neu kh co loi thi tien hanh them san pham
            if (empty($errors)) {
                // Neu kh co loi thi tien hanh them san pham
                // var_dump('ok');

                $san_pham_id = $this->modelSanPham->insertSanPham(
                                                    $ten_san_pham,
                                                    $gia_san_pham,
                                                    $gia_khuyen_mai,
                                                    $so_luong,
                                                    $ngay_nhap,
                                                    $danh_muc_id,
                                                    $trang_thai,
                                                    $mo_ta,
                                                    $file_thumb
                                                );                                                   
                    
                // Xu ly them album anh san pham img_array
                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file  = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key],
                        ];

                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }

                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                // Neu co loi tra ve form
                // Dat chi thi xoa session sau khi hien thi form
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-them-san-pham');
            }
        }
    }

    public function formEditSanPham()
    {
        // Ham nay dung de hthi form nhap
        // Lay ra ttin san pham can sua
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }

    public function postEditSanPham()
    {
        // Ham nay dung de xu ly them du lieu

        // Kiem tra xem du lieu co phai dc submit len kh
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lay ra du lieu
            // Lay ra du lieu cu cua san pham
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            // Truy van
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh'];  // Lay anh cu de phuc vu cho sua anh

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;


            // Tao 1 mang trong de chua du lieu
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Ten san pham kh duoc de trong';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Gia san pham kh duoc de trong';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Gia khuyen mai san pham kh duoc de trong';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'So luong san pham kh duoc de trong';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngay nhap san pham kh duoc de trong';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh muc san pham phai chon';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trang thai san pham phai chon';
            }

            $_SESSION['error'] = $errors;

            // logic sua anh
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                // upload anh moi len
                $new_file = uploadFile($hinh_anh, './uploads/');

                if (!empty($old_file)) {  // Neu co anh cu thi xoa di
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }


            // Neu kh co loi thi tien hanh them san pham
            if (empty($errors)) {
                // Neu kh co loi thi tien hanh them san pham
                // var_dump('ok');

                $this->modelSanPham->updateSanPham(
                                    $san_pham_id,
                                    $ten_san_pham,
                                    $gia_san_pham,
                                    $gia_khuyen_mai,
                                    $so_luong,
                                    $ngay_nhap,
                                    $danh_muc_id,
                                    $trang_thai,
                                    $mo_ta,
                                    $new_file
                                );                               

                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                // Neu co loi tar ve form
                // Dat chi thi xoa session sau khi hien thi form
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        }
    }

    // // Sua album anh
    // - Sua anh cu
    //     + Them anh moi
    //     + Kh them anh moi
    // - Kh sua anh cu
    //     + Them anh moi
    //     + Kh them anh moi
    // - Xoa anh cu
    //     + Them anh moi
    //     + Kh them anh moi

    public function postEditAnhSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            // Lay danh sach anh hien tai cua san pham
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

            // Xu ly cac anh duoc gui tu form
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            // Khai bao mang de luu anh them moi hoac thay the anh cu
            $upload_file = [];

            // Upalod anh moi hoac thay the anh cu 
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }

            // Luu anh moi vao db va xoa anh cu neu co
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];

                    // Cap nhat anh cu
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

                    // Xoa anh cu 
                    deleteFile($old_file);
                } else {
                    // Them anh moi
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }

            // Xu ly xoa anh
            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                    // Xoa anh trong db
                    $this->modelSanPham->destroyAnhSanPham($anh_id);

                    // Xoa file
                    deleteFile($anhSP['linh_hinh_anh']);
                }
            }
            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }

    public function deleteSanPham()
    {
        // Lay ra ttin san pham can xoa
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        if ($sanPham) {
            deleteFile($sanPham['hinh_anh']);
            $this->modelSanPham->destroySanPham($id);
        }
        if ($listAnhSanPham) {
            foreach ($listAnhSanPham as $key => $anhSP) {
                deleteFile($anhSP['link_hinh_anh']);
                $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
            }
        }

        header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }

    public function detailSanPham()
    {
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        if ($sanPham) {
            require_once './views/sanpham/detailSanPham.php';
            
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }



    

    // Update trang thai Binh luan
    public function updateTrangThaiBinhLuan()
    {
        $id_binh_luan = $_POST['id_binh_luan'];

        $name_view = $_POST['name_view'];
        
        $binhLuan = $this->modelSanPham->getDetailBinhLuan($id_binh_luan);

        if ($binhLuan) {
            $trang_thai_update = '';
            if ($binhLuan['trang_thai'] == 1) {
                $trang_thai_update = 2;
            } else {
                $trang_thai_update = 1;
            }

            $status = $this->modelSanPham->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);

            if ($status) {
                if ($name_view == 'detail_khach') {

                    header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id']);

                }else{

                    header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']);
                }
            }
        }
    }

}