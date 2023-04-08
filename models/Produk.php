<?php

require_once __DIR__ . './../connection/koneksi.php';


class Produk
{
    static function getProduk($id)
    {
        $koneksi = koneksi();

        if ($id != null or $id != '') {
            $sql = "SELECT * FROM product WHERE id_produk = ? ";
            $stmt  = $koneksi->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetch();
        } else {
            $sql = "SELECT * FROM product";
            return $koneksi->query($sql);
        }
    }

    static function uploadProduk($data)
    {
        $koneksi = koneksi();
        $sql = "INSERT INTO product (`name`, `price`, `description`, `image`) VALUES (?,?,?,?)";
        $stmt = $koneksi->prepare($sql);

        return $stmt->execute($data);
    }

    static function editProduk($data)
    {
        $koneksi = koneksi();
        $sql = "UPDATE product SET name = ? , price = ? , description = ? , image = ? WHERE id_produk = ?";
        $stmt = $koneksi->prepare($sql);

        return $stmt->execute($data);
    }


    static function deleteProduct($id)
    {
        $koneksi = koneksi();
        $sql = "DELETE FROM `product` WHERE id_produk = ? ";
        $stmt  = $koneksi->prepare($sql);
        $stmt->execute([$id]);

        return $stmt;
    }
}
