<?php

require_once __DIR__ . './../models/Transaction.php';
require_once __DIR__ . './../models/Produk.php';
require_once __DIR__ . './../helpers/uploadImage.php';
require_once __DIR__ . './../helpers/flashMessage.php';


function transaction($id)
{
    $data = Transaction::getTransaction($id);

    return $data;
}

function checkout($id_produk)
{
    // Save Image (Bukti Pembayaran)
    $upload = uploadImage($_FILES["bukti"]["name"], "/../assets/images/bukti/", 'bukti');

    $product = Produk::getProduk($id_produk);


    // Buyer / pembeli
    $buyer = [
        'name' => htmlspecialchars($_POST['name']),
        'email' => htmlspecialchars($_POST['email']),
        'phone_number' => htmlspecialchars($_POST['phone_number']),
        'address' => htmlspecialchars($_POST['address']),
    ];


    $product = [
        'name' => $product['name'],
        'price' => $product['price'],
        'description' => $product['description'],
        'image' => $product['image'],
    ];

    // count ppn 11% and grand total

    /**
     * Untuk menghitung PPN 11%, Anda dapat menggunakan rumus sebagai berikut:
     * PPN = (Nilai Barang atau Jasa x Persentase PPN) / 100
     * Dalam contoh ini, nilai barang adalah Rp 3.000.000 dan persentase PPN adalah 11%, sehingga Anda dapat menghitung PPN-nya dengan cara berikut:
     * PPN = (3.000.000 x 11) / 100
     * PPN = 330.000
     * Jadi, PPN sebesar Rp 330.000 harus ditambahkan pada harga barang atau jasa tersebut untuk menghitung total harga yang harus dibayarkan.
     * Penjelasan dikutip dari chatGPT
     */

    $ppn = ((int) $product['price'] * 11) / 100;
    $grand_total = (int) $product['price'] + $ppn;

    if ($upload != false) {
        // save data in database
        $data = [
            json_encode($buyer),
            json_encode($product),
            $grand_total,
            htmlspecialchars($_POST['metode_pembayaran']),
            "assets/images/bukti/$upload",
            date("Y-m-d H:i:s")
        ];

        $transaction = Transaction::checkout($data);

        if ($transaction) {
            Flasher::setFlash('Tambah transaksi baru berhasil.', 'berhasil', 'success');
            header('location: success_page.php', true);
            exit;
        } else {
            Flasher::setFlash('Tambah transaksi baru gagal.', 'gagal', 'error');
            header('location: checkout.php?id=' . $id_produk, true);
            exit;
        }
    }
}

function verif($id)
{

    $data = [
        1,
        $id
    ];

    $verif = Transaction::updateStatus($data);
    if ($verif) {
        Flasher::setFlash('Berhasil memverifikasi pesanan.', 'berhasil', 'success');
        header('location: ../admin/transaction.php', true);
        exit;
    } else {
        Flasher::setFlash('Gagal memverifikasi pesanan.', 'gagal', 'error');
        header('location: ../admin/transaction.php', true);
        exit;
    }
}
