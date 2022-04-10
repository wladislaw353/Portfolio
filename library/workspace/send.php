<?php
	$text_title =   $_POST['title'];
	$text_email =   $_POST['email'];
	$text_project = $_POST['project'];
	$text_name =    $_POST['name'];
	$figma =        $_POST['figma'];
	$edits =        $_POST['edits'];

	$title = "$text_title - $text_project | WonderWeb Digatal Agency";
	$from = "agency@wonder-web.com.ua";
	$headers = "From: $from \r\n";
	$headers .= "Content-type: text/html; charset=utf-8";

	$msg = "<h1>Вітаємо, $text_name!<br></h1>";
	switch ($text_title) {
		case 'Затвердження прототипу':
			$msg .= "<p>Повідомляємо Вам, що прототип сайту вже готовий. <br> Цей етап потребує Вашого затвердження, для цього надішліть відповідь на цей лист. <br><br> Посилання на прототип (Оберіть зліва вкладку «Прототип») <br>$figma</p>";
		break;
		case 'Затвердження дизайну':
			$msg .= "<p>Повідомляємо Вам, що дизайн сайту вже готовий. <br> Цей етап потребує Вашого затвердження, для цього надішліть відповідь на цей лист. <br><br> Посилання на дизайн (Оберіть зліва вкладку «Дизайн») <br>$figma</p>";
		break;
		case 'Затвердження правок по сайту':
			$msg .= "<p>Повідомляємо Вам, що Ваш проєкт вже на фінальному етапі. <br> Якщо ви бажаєте щось підправити, опишіть це в документу за посиланням нижче та повідомте нам, коли складете перелік правок, надіславши відповідь на цей лист. <br><br> Посилання на документ для правок <br>$edits</p>";
		break;
	}
	$msg .= "<br><br><p>З повагою, команда WonderWeb</p>";

	$html = '<table style="text-align:center">';
	$html .= '<tr>';
	$html .= "<td>$msg</td>";
	$html .= '</tr>';
	$html .= '</table>';

	mail($text_email, $title, $html, $headers);