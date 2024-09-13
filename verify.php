<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the CAPTCHA number from the session
    if (isset($_SESSION['captcha_text'])) {
        $captcha_number = $_SESSION['captcha_text'];
    } else {
        // Handle the case where the CAPTCHA text is not set
        die('CAPTCHA text is not set in the session.');
    }
    
    // Retrieve the user input
    $user_input = $_POST['captcha'];
    
    // Check if the user input matches the CAPTCHA number
    if ($user_input == $captcha_number) {
        // Correct CAPTCHA, redirect to next page
        header('Location: success.html');
        exit();
    } else {
        // Incorrect CAPTCHA, show an error message
        echo 'CAPTCHA verification failed. Please <a href="sellerdetails.html">try again</a>.';
    }
} else {
    // Invalid request method
    echo 'Invalid request method.';
}
?>
