<?php 
	$us = 'jason@jasonray.me'; 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: ' . $name . ' <' . $email . '>' . "\r\n";
	$subject = 'Website Contact Data';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$body = 'We have received the following information:<br><br>'; 
	$body .= '<table style="border:1px solid #e7e7e7; width:500px" border=0 cellspacing=0 cellpadding=5>';
	$body .= '<tr><td align="right" valign="top" style="background:#e7e7e7">Name </td><td style="border-bottom:1px solid #e7e7e7">' . $name . '</td></tr>';
	$body .= '<tr><td align="right" valign="top" style="background:#e7e7e7">Email </td><td style="border-bottom:1px solid #e7e7e7">' . $email . '</td></tr>';
	$body .= '<tr><td align="right" valign="top" style="background:#e7e7e7">Message </td><td>' . $message . '</td></tr>';
	$body .= '</table>';

	$headers2  = 'MIME-Version: 1.0' . "\r\n";
	$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers2 .= 'From: jasonray.me <' . $us . '>' . "\r\n";
	$subject2 = 'Thanks for reaching out!';
	$autoreply = 'Dear ' . $name . ',<br /><br />';
	$autoreply .= 'Thanks for reaching out! I\'ll get back to you ASAP. If you have an urgent request feel fee to call me at <a href="tel:+17066186186">706.618.6186</a>.<br /><br />';
	$autoreply .= 'Thanks again for contacting me!<br /><br />';
	$autoreply .= '-- Jason, <a href="http://www.jasonray.me">jasonray.me</a>';

	if ($name == '') {
		print 'You have not entered your name, please try again.';
	}
	elseif ($email == '') {
		print 'You have not entered your email address, please try again.';
	}
	else {
		$send = mail($us, $subject, $body, $headers);
		$send2 = mail($email, $subject2, $autoreply, $headers2);
	}
 ?> 