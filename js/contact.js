jQuery(document).ready(function ($) {
	$("#contact").submit(function () {
		var str = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "mail.php",
			data: str,
			success: function (msg) {
				if (msg == 'OK') {
					result = '<div class="ok">Отправлено! Мы скоро свяжемся с Вами</div>';
					$("#fields").hide();
				}
				else { result = msg; }
				$('#note').html(result);
			}
		});
		return false;
	});
});