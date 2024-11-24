<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
   
}

// Them file
function upLoadFile($file, $folderUpload) {
    $pathStorage = $folderUpload . time() . $file['name'];

    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}

// Xoa file
function deleteFile($file) {
    $pathDelete = PATH_ROOT . $file;
    if (file_exists(($pathDelete))) {
        unlink($pathDelete);
    }
}

function formatDate($date) {
    return date("d/m/Y", strtotime($date)); // Định dạng ngày theo kiểu dd/mm/yyyy
}

// Xoa session sau khi load trang
function deleteSessionError() {
    if (isset($_SESSION['flash'])) {
        // Huy session sau khi da tai trang
        unset($_SESSION['flash']);
        session_unset();
        session_destroy();
    }
}
<<<<<<< HEAD
function formatPrice($price) {
    return number_format($price, 0, '', '.');
}
=======

// Upload - update album anh
function uploadFileAlbum($file, $folderUpload, $key) {
    $pathStorage = $folderUpload . time() . $file['name'][$key];

    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}

>>>>>>> 22f977b85614054961a640accbb09d8e6337c23c
// Debug
