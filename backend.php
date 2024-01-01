<?php
if (isset($_POST['imageData'])) {
    $imageData = $_POST['imageData'];
    $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
    $decodedImage = base64_decode($imageData);
    $filename = 'image' . time() . '.jpeg';
    $savePath = 'images/';
    file_put_contents($savePath . $filename, $decodedImage);
} 
?>
