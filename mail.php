<?php
require_once __DIR__ . '/recaptcha.php';
$secret = "6Le0eAIiAAAAALHrnaNX1Zv_W5kImr8G8D8VpLWG";
$response = null;
 
$reCaptcha = new ReCaptcha($secret);
	if ($_POST["g-recaptcha-response"]) {
		$response = $reCaptcha->verifyResponse(
		$_SERVER["REMOTE_ADDR"],
		$_POST["g-recaptcha-response"]
	);
}
$post = (!empty($_POST)) ? true : false;
if($post) {
	$email = htmlspecialchars(trim($_POST['email']));
			$message = htmlspecialchars(trim($_POST['message']));
	$error = '';
	if(!$response) {$error .= 'ПОСТАВЬТЕ ГАЛОЧКУ, ПОДВЕРДИТЕ ЧТО ВЫ НЕ РОБОТ';}
	if(!$email) {$error .= 'Укажите электронную почту. ';}
		if(!$message || strlen($message) < 1) {$error .= 'Напишите Ваш вопрос. ';}
	if(!$error) {
		$address = "Teki34@mail.ru";
		$mes = "Телефон: ".$email."\n\n Сообщение: ".$message."\n\n Сообщение с teki34.ru";
		$send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = UTF-8\r\nReply-To:$email\r\nFrom:$name <contact>");
		if($send) {echo 'OK';}
	}
	else {echo '<div class="err">'.$error.'</div>';}
}
?>