<?php
require_once __DIR__ . '/recaptcha.php';
$secret = "6LeFAB4gAAAAAGLVghfL5Z0jvSC0MLCBu09lnB9s";
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
		if(!$message || strlen($message) < 1) {$error .= 'Введите сообщение. ';}
	if(!$error) {
		$address = "joker-dima@yandex.ru";
		$mes = "Почта: ".$email."\n\n Сообщение: ".$message."\n\n Сообщение с volgograd-tour.ru";
		$send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = UTF-8\r\nReply-To:$email\r\nFrom:$name <contact>");
		if($send) {echo 'OK';}
	}
	else {echo '<div class="err">'.$error.'</div>';}
}
?>