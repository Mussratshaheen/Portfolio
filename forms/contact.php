<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "786mussratshaheen@gmail.com"; // Your Gmail address
    $subject = $_POST['subject']; // Subject of the email
    $name = $_POST['name']; // Sender's name
    $from = $_POST['email']; // Sender's email address
    $message = $_POST['message']; // Message body

    // Compose the email message
    $headers = "From: $name <$from>" . "\r\n" .
               "Reply-To: $from" . "\r\n" .
               "Content-type: text/html; charset=UTF-8" . "\r\n";

    // Attempt to send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "OK"; // Send success response
    } else {
        http_response_code(500); // Internal Server Error
        echo "Failed to send email."; // Send error response
    }
} else {
    http_response_code(400); // Bad Request
    echo "Invalid request."; // Send error response for invalid request method
}
?>
