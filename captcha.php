<?php
session_start();

// Create a blank image
$width = 150;
$height = 50;
$image = imagecreatetruecolor($width, $height);

// Set colors
$background_color = imagecolorallocate($image, 255, 255, 255); // White
$text_color = imagecolorallocate($image, 0, 0, 0); // Black

// Fill the background
imagefilledrectangle($image, 0, 0, $width, $height, $background_color);

// Generate a random number
$captcha_number = rand(1000, 9999);

// Save the number in the session
$_SESSION['captcha_text'] = $captcha_number; // Ensure this key matches

// Add the text to the image
$font = __DIR__ . '/gd.ttf'; // Ensure this path is correct
imagettftext($image, 20, 0, 30, 35, $text_color, $font, $captcha_number);

// Set the content-type header
header('Content-Type: image/png');

// Output the image
imagepng($image);

// Free up memory
imagedestroy($image);
?>
