<?php
if ($_POST) {
    $name = "";
    $email = "";
    $phone = "";

    // Validate and sanitize input fields
    if (isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        if (empty($name)) {
            $error = "Name field cannot be empty.";
        }
    }

    if (isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $error = "Invalid email format.";
        }
    }

    if (isset($_POST['phone'])) {
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        if (empty($phone)) {
            $error = "Phone number field cannot be empty.";
        }
    }

    // Check for validation errors
    if (isset($error)) {
        echo json_encode(array("success" => false, "message" => $error));
        exit;
    }

    // Email sending logic
    $recipient = "divyanshu.tripathi@inframantra.com";
    $email_content = "<html><body>";
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Name:</td><td style='background: #fda; padding: 10px;'>$name</td></tr>";
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Email:</td><td style='background: #fda; padding: 10px;'>$email</td></tr>";
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Phone:</td><td style='background: #fda; padding: 10px;'>$phone</td></tr>";
    $email_content .= '</body></html>';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type:text/html; charset=utf-8' . "\r\n";
    $headers .= 'title: Godrej 101 Hills Received a Query' . "\r\n";
    $headers .= 'From: ' . $email . "\r\n";

    if (mail($recipient, "Godrej 101 Received a Query", $email_content, $headers)) {
        echo json_encode(array("success" => true, "message" => "Email sent successfully."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Failed to send email. Please try again later."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request. Please try again."));
    exit;
}
?>


