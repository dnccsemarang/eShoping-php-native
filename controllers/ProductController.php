<?php

require_once __DIR__ . './../models/Produk.php';
require_once __DIR__ . './../helpers/uploadImage.php';
require_once __DIR__ . './../helpers/flashMessage.php';


function produk($id)
{
    $data = Produk::getProduk($id);

    return $data;
}

// tambah data produk
function tambah_produk()
{
    // Call helper upload file image
    $upload = uploadImage($_FILES["image"]["name"], "/../assets/images/", 'image');

    if ($upload != false) {
        // save data in database
        $data = [
            htmlspecialchars($_POST['name']),
            (int)htmlspecialchars($_POST['price']),
            htmlspecialchars($_POST['description']),
            "assets/images/$upload",
        ];

        $product = Produk::uploadProduk($data);

        if ($product) {
            Flasher::setFlash('Tambah produk baru berhasil.', 'berhasil', 'success');
            header('location: ../admin/product.php', true);
            exit;
        } else {
            Flasher::setFlash('Tambah produk baru gagal.', 'gagal', 'error');
            header('location: ../admin/tambah_produk.php', true);
            exit;
        }
    }
}

function edit_produk($id_produk)
{
    $product = Produk::getProduk($id_produk);

    // var_dump($_FILES['image']['error'] == 4);

    $image_old = $product['image'];

    $parts = explode("/", $image_old);
    $upload = end($parts);


    if ($_FILES['image']['error'] == 0) {
        // Delete image file
        // $file_path = __DIR__ . "/../" . $product['image'];

        // if (file_exists($file_path)) {
        //     unlink($file_path);
        // }

        $upload = uploadImage($_FILES["image"]["name"], "/../assets/images/", 'image');
    }


    if ($upload != false) {
        // save data in database
        $data = [
            htmlspecialchars($_POST['name']),
            (int)htmlspecialchars($_POST['price']),
            htmlspecialchars($_POST['description']),
            "assets/images/$upload",
            $id_produk
        ];

        $save = Produk::editProduk($data);

        if ($save) {
            Flasher::setFlash('Edit produk baru berhasil.', 'berhasil', 'success');
            header('location: ../admin/product.php', true);
            exit;
        } else {
            Flasher::setFlash('Edit produk baru gagal.', 'gagal', 'error');
            header('location: ../admin/tambah_produk.php', true);
            exit;
        }
    }
}


// function hapus produk
// Menerima parameter id produk
function hapus_produk($id_produk)
{
    $product = Produk::getProduk($id_produk);


    // Delete image file
    // $file_path = __DIR__ . "/../" . $product['image'];

    // if (file_exists($file_path)) {
    //     unlink($file_path);
    // }

    // delete data pada database
    $product = Produk::deleteProduct($id_produk);

    if ($product) {
        Flasher::setFlash('Hapus produk baru berhasil.', 'berhasil', 'success');
        header('location: ../admin/product.php', true);
        exit;
    } else {
        Flasher::setFlash('Hapus produk baru gagal.', 'gagal', 'error');
        header('location: ../admin/tambah_produk.php', true);
        exit;
    }
}
