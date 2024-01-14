<?php
// Hancurkan session dan hapus semua data session
session_destroy();
// Redirect ke halaman login atau melakukan tindakan selanjutnya
header('Location:' . BASEURL . '/login');
exit;
?>