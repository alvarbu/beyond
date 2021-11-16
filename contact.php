<?php
require_once "./includes/recaptchatlib.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$inlineRadioOptions = $_POST['inlineRadioOptions'];
$secret = "6LccFzgdAAAAAO_4-QGU5xcwEMBBn0O5Bu7_DY_W";
/* $secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe"; */
$response = null;
$datetime = strtotime($date);


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
    $to = "cecilia@beyondyucatan.travel";
    $subject = "¡Nuevo Lead de Beyond Yucatan!";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $message = '<html>
<head>
<title></title>
<style type="text/css">
/* CLIENT-SPECIFIC STYLES */
body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }

/* RESET STYLES */
img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

/* iOS BLUE LINKS */
a[x-apple-data-detectors] {
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}

/* MOBILE STYLES */
@media screen and (max-width: 600px) {
.img-max {
width: 100% !important;
max-width: 100% !important;
height: auto !important;
}

.max-width {
max-width: 100% !important;
}

.mobile-wrapper {
width: 85% !important;
max-width: 85% !important;
}

.mobile-padding {
padding-left: 5% !important;
padding-right: 5% !important;
}
}

/* ANDROID CENTER FIX */
div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>

</head>
<body style="margin: 0 !important; padding: 0; !important background-color: #ffffff;" bgcolor="#ffffff">


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="center" valign="top" width="100%" background="bg.jpg" bgcolor="#000" style="background: #000 url("bg.jpg"); background-size: cover; padding: 50px 15px;" class="mobile-padding">
<!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
<tr>
<td align="center" valign="top" width="600">
<![endif]-->
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
<tr>
<td align="center" valign="top" style="padding: 0 0 20px 0;">
<img src="	https://beyond.testvandu.com/img/beyond-yucatan-logo.svg" width="250" height="50" border="0" style="display: block;">
</td>
</tr>
<tr>
<td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
<h1 style="font-size: 40px; color: #ffffff;">Nuevo lead registrado</h1>
</td>
</tr>
<tr>
<td align="center" valign="top" style="padding: 0 0 35px 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%" style="max-width: 200px;">
<tr>
<td align="center" bgcolor="red" style="color: #ffffff; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; padding: 10px; border-radius: 3px 3px 0 0;">
' . date('F', $datetime) . '
</td>
</tr>
<tr>
<td align="center" bgcolor="#ffffff" style="color: #444444; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; padding: 15px; border-radius: 0 0 3px 3px;">
' . date('d', $datetime) . '
</td>
</tr>
</tr>

</table>
</td>
</tr>

</table>
<!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
</td>
</tr>
<tr>
<td align="center" valign="top" width="100%" bgcolor="#fbfcfc" style="padding: 50px 5px;" class="mobile-padding">
<!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
<tr>
<td align="center" valign="top" width="600">
<![endif]-->
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
<tr>
<td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
<h1 style="font-size: 40px; color: #000000;">Detalles del contacto:</h1>
</td>
</tr>

<tr>
<td align="center" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; padding-top: 0;">

<p style="color: #000000; font-size: 26px; line-height: 30px; margin: 0;">
' . $name . ' 
</p>
<p style="color: #000000; font-size: 26px; line-height: 30px; margin: 0;">
' . $email . '
</p>
<p style="color: #000000; font-size: 26px; line-height: 30px; margin: 0;">
' . $date . ' <span>' . $time . ' hrs</span>
</p>
<p style="color: #000000; font-size: 26px; line-height: 30px; margin: 0;">
' . $inlineRadioOptions . '
</p>
</td>                   
</tr>
</table>
<!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
</td>
</tr>
<tr>
<td align="center" height="100%" valign="top" width="100%" bgcolor="#fbfcfc" style="padding: 0px 5px;">
<!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
<tr>
<td align="center" valign="top" width="600">
<![endif]-->
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
<td align="center" height="100%" valign="top" width="100%" bgcolor="#fbfcfc" style="padding: 40px 15px;">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
<tr>
<td align="center" valign="top" style="padding: 0 0 5px 0;">
<img src="https://beyond.testvandu.com/img/loader.svg" width="35" height="35" border="0" style="display: block;">
</td>
</tr>
<tr>
<td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #999999;">
<p style="font-size: 14px; line-height: 20px;">
<a href="http://litmus.com" style="color: #999999; text-decoration: none;" target="_blank" href="">beyondyucatan.travel</a> <br>
<a href="http://litmus.com" style="color: #e8e8e8; text-decoration: none;" target="_blank"> Desarrollado por  agenciavandu.com</a>
</p>
</td>
</tr>
</table>
</td>
</table>
<!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
</td>
</tr>
</table>

</body>
</html>';

    mail($to, $subject, $message, $headers);
    header('Location: typ.html');
} else {
    echo "Algo pasó";
}
