<?php
// if (isset($_POST['imageData'])) {
//     $imageData = $_POST['imageData'];
//     $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
//     $decodedImage = base64_decode($imageData);
//     $filename = 'image' . time() . '.jpeg';
//     $savePath = 'images/';
//     file_put_contents($savePath . $filename, $decodedImage);
// }





$imageData = $_POST['imageData'];
$encodedData = str_replace('data:image/png;base64,', '', $imageData);
$decodedData = base64_decode($encodedData);
$savePath = 'images/';
$filename = 'captured_image.jpeg';
file_put_contents($savePath . $filename, $decodedData);

echo json_encode(['success' => true, 'filename' => $filename]);

























// if (isset($_POST['imageData'])) {
//     $imageData = $_POST['imageData'];
//     $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
//     $decodedImage = base64_decode($imageData);

//     $framePath = 'images/Option-1.png';
//     $frame = imagecreatefrompng($framePath);

//     $capturedImage = imagecreatefromstring($decodedImage);

//     $frameWidth = imagesx($frame);
//     $frameHeight = imagesy($frame);

//     $capturedImageResized = imagecreatetruecolor($frameWidth, $frameHeight);
//     imagecopyresampled($capturedImageResized, $capturedImage, 0, 0, 0, 0, $frameWidth, $frameHeight, imagesx($capturedImage), imagesy($capturedImage));

//     $mergedImage = imagecreatetruecolor($frameWidth, $frameHeight);
//     imagecopy($mergedImage, $frame, 0, 0, 0, 0, $frameWidth, $frameHeight);
//     imagecopy($mergedImage, $capturedImageResized, 0, 0, 0, 0, $frameWidth, $frameHeight);

//     $filename = 'image_' . time() . '.png';  
//     $savePath = 'images/';
//     imagepng($mergedImage, $savePath . $filename);
    
//     imagedestroy($frame);
//     imagedestroy($capturedImage);
//     imagedestroy($capturedImageResized);
//     imagedestroy($mergedImage);
// }

?>
