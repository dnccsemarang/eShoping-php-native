<?php

function uploadImage($file,$target= "/../assets/images/",$tmp)
{
    $target_dir = __DIR__ . $target;
    $nameFile = basename($file);

    $typeImage = explode('.', $nameFile);
    $typeImage = strtolower(end($typeImage));


    // cek apakah yang dikirim berupa gambar atau bukan
    if (!in_array($typeImage, ['jpg', 'jpeg', 'png'])) {
        echo "<script>alert('Yang anda upload bukan gambar!')</script>";

        return false;
    }

    // generate nama file (random)
    $newFilenameImage = uniqid();
    $newFilenameImage .= '.';
    $newFilenameImage .= $typeImage;

    $target_file = $target_dir . $newFilenameImage;

    // pindahkan file gambar yg berada di local storage ke dalam storage pribadi
    move_uploaded_file($_FILES[$tmp]['tmp_name'], $target_file);

    return $newFilenameImage;
}
