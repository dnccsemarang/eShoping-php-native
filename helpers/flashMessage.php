<?php

/**
 * Flasher for alert
 */
class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION["flash"] = [
            "pesan" => $pesan,
            "aksi" => $aksi,
            "tipe" => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION["flash"])) {
            switch ($_SESSION["flash"]['tipe']) {
                case 'error':
                    echo '<div class="alert alert-danger" role="alert">
                                <p>' . $_SESSION["flash"]['pesan'] . '</p>
                          </div>';
                    break;
                case 'success':
                    echo '<div class="alert alert-success" role="alert">
                                <p>' . $_SESSION["flash"]['pesan'] . '</p>
                          </div>';
                    break;

                default:
                    echo '<div class="alert alert-success" role="alert">
                                <p>' . $_SESSION["flash"]['pesan'] . '</p>
                          </div>';
                    break;
            }

            unset($_SESSION["flash"]);
        }
    }
}
