<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST['your_name'];
		$email = $_POST['your_mail'];
		$message = $_POST['your_message'];
		$subject = $_POST['your_subject'];

		// Sender Email and Name 
		$from = stripslashes($_POST['your_name'])."<".stripslashes($_POST['your_mail']).">";

		// Recipient Email Address 
		// Change the email address with yours
		$to = 'gilgameshinmortal0@gmail.com';
		

		// Email Header 
		$headers = "From: $from\r\n" .
                 "MIME-Version: 1.0\r\n" .

        // Message Body 
		$body = "Name: $name\nEmail: $email\nMessage:\n$message";
 		
 		// Check that data was sent to the mailer.
		if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo 'Por favor complete todos los campos y vuelva a intentarlo.';
			exit;
		}

		// If there are no errors, send the email
		if (mail ($to, $subject, $body, $from)) {
			echo 'Gracias! Te responderemos a la brevedad.';
		}
		else {
			echo 'Hubo un error al mandar el mensaje. Por favor intentalo nuevamente';
		}
	}
?>