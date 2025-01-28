<?php
class Flasher
{

    public static function setFlash($caption, $pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'caption' => $caption,
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset ($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                 ' . $_SESSION['flash']['caption'] . '<strong> ' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . ' 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
            unset($_SESSION['flash']);
        }

    }

    public static function setToast($judul, $pesan, $type, $durasi)
    {
        $_SESSION['toast'] = [
            'judul' => $judul,
            'pesan' => $pesan,
            'type' => $type,
            'durasi' => $durasi
        ];
    }


    public static function toast()
    {
        // Pastikan bahwa $_SESSION['toast'] tidak null dan telah diatur sebelumnya
        if (isset ($_SESSION['toast'])) {
            echo '<script> $.toast({ ' .
                'title: "' . $_SESSION['toast']['judul'] . '",' .
                'message: "' . $_SESSION['toast']['pesan'] . '",' .
                'type: "' . $_SESSION['toast']['type'] . '",' .
                'duration: ' . $_SESSION['toast']['durasi'] .
                '}); </script>';
            unset($_SESSION['toast']); // Hapus variabel session setelah menampilkan notifikasi
        }
    }


}

?>