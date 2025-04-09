<?php
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $to ="ronohemmanuel2@gmail.com";

    // Collect and sanitize form inputs
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["comment"]);

    // Validate input
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
        echo "Please fil in all fields correctly.";
        exit;
    }

    // Email subject and body
    $subject = "New message from Contact Form";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Something went wrong. Please try again later.";
    }
} else {
    echo "Invalid request method.";
    //exit;
}

?>