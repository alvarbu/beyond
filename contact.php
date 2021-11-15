<?php
require_once "./includes/recaptchatlib.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$inlineRadioOptions = $_POST['inlineRadioOptions'];
$secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";
$response = null;
// comprueba la clave secreta
$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
switch ($inlineRadioOptions) {
    case 'whatsapp':
        $inlineRadioOptions = "WhatsApp";
        break;
    case 'email':
        $inlineRadioOptions = "Email";
        break;
    case 'call':
        $inlineRadioOptions = "Llamada";
        break;
    case 'messenger':
        $inlineRadioOptions = "Facebook Messenger";
        break;
}

if ($response != null && $response->success) {
    $to = "ripmarenko@gmail.com";
    $subject = "Asunto del email";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $message = "
<html>
<head>
<title>Nuevo Lead</title>
</head>
<body>
<h1>Nuevo Lead</h1>
<p><b>Nombre:</b> " . $name . "</p>
<p><b>Email:</b> " . $email . "</p>
<p><b>Telefono:</b> " . $phone . "</p>
<p><b>Fechas:</b> " . $date_start . " - " . $date_end . "</p>
<p><b>Medio de contacto:</b> " . $inlineRadioOptions . "</p>
</body>
</html>";

    mail($to, $subject, $message, $headers);
} else {
    echo "Algo paso";
}
