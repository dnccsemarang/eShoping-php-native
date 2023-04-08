<?php

require_once __DIR__ . './../connection/koneksi.php';


class Transaction
{
    static function getTransaction($id)
    {
        $koneksi = koneksi();

        if ($id != null or $id != '') {
            $sql = "SELECT * FROM `transaction` WHERE id_transaction = ? ";
            $stmt  = $koneksi->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetch();
        } else {
            $sql = "SELECT * FROM `transaction`";
            return $koneksi->query($sql);
        }
    }

    static function checkout($data)
    {
        $koneksi = koneksi();
        $sql = "INSERT INTO `transaction` (`buyer`, `produk`, `grand_total`, `metode_pembayaran`,`bukti_pembayaran`,`created_at`) VALUES (?,?,?,?,?,?)";
        $stmt = $koneksi->prepare($sql);

        return $stmt->execute($data);
    }

    static function updateStatus($data)
    {
        $koneksi = koneksi();
        $sql = "UPDATE `transaction` SET `status` = ? WHERE id_transaction = ?";
        $stmt = $koneksi->prepare($sql);

        return $stmt->execute($data);
    }
}
