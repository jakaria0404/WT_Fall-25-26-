<?php
$cv_link = $_GET['file'] ?? '';
if ($cv_link) {
    $file = urldecode($cv_link);
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    readfile($file);
    exit;
}
?>