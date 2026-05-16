<?php


function loadEnv($path) {
    if (!file_exists($path)) return;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
        putenv(trim($name) . "=" . trim($value));
    }
}
loadEnv(__DIR__ . '/.env');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject_form = strip_tags(trim($_POST["subject"]));
    $message_form = strip_tags(trim($_POST["message"]));

    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message_form)) {
        header("Location: kontakt.html?error=invalid_input");
        exit;
    }

    $apiKey = getenv('BREVO_API_KEY');
    $adminEmail = getenv('ADMIN_EMAIL');
    $url = 'https://api.brevo.com/v3/smtp/email';

    $data = array(
        "sender" => array("name" => "Apex Boxing Web", "email" => $adminEmail),
        "to" => array(
            array("email" => $adminEmail, "name" => "Apex Boxing Admin")
        ),


        "replyTo" => array("email" => $email, "name" => $name),


        "subject" => "Apex Boxing: " . $subject_form . " od " . $name,


        "htmlContent" => "


            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #bc000c; padding: 20px;'>


                <h2 style='color: #bc000c; text-transform: uppercase;'>Nováá zpráva z kontaktního formuláře</h2>


                <hr style='border: 0; border-top: 1px solid #eee;'>


                <p><strong>Jméno odesílatele:</strong> " . htmlspecialchars($name) . "</p>


                <p><strong>E-mail odesílatele:</strong> " . htmlspecialchars($email) . "</p>


                <p><strong>Předmět:</strong> " . htmlspecialchars($subject_form) . "</p>


                <div style='background: #f9f9f9; padding: 15px; border-left: 4px solid #bc000c;'>


                    <p><strong>Zpráva:</strong></p>


                    <p>" . nl2br(htmlspecialchars($message_form)) . "</p>


                </div>


                <hr style='border: 0; border-top: 1px solid #eee; margin-top: 20px;'>


                <p style='font-size: 12px; color: #888;'>Tato zpráva byla odeslána automaticky z webu Apex Boxing.</p>


            </div>


        "


    );





    $ch = curl_init($url);


    curl_setopt($ch, CURLOPT_HTTPHEADER, array(


        'api-key: ' . $apiKey,


        'Content-Type: application/json',


        'Accept: application/json'


    ));


    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    curl_setopt($ch, CURLOPT_POST, true);


    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));


    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);





    $response = curl_exec($ch);


    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


    curl_close($ch);





    if ($httpCode >= 200 && $httpCode < 300) {


        header("Location: kontakt.html?success=1");


    } else {


        header("Location: kontakt.html?error=send_failed");


    }


} else {


    header("Location: kontakt.html");


}


?>









