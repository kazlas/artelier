<?php 
/** Loads the WordPress Environment and Template */
require('../../../../wp-blog-header.php');
require_once('validEmail.php');

//Get address for entry form redirections
$location_redirect = $_POST['backurl'];

$msg_sent_ok = "Wiadomo&#347;&#263; zosta&#322;a wys&#322;ana";
$msg_sent_nok = "Wiadomo&#347;&#263; NIE mog&#322;a zosta&#322;a wys&#322;ana.<br>Spr&#243;buj wys&#322;a&#263; na adres <a href=\"mailto:info@artelier.edu.pl?subject=[WWW] List ze strony WWW\">info@artelier.edu.pl</a>";
 

// Set the headers. 
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-2' . "\r\n";

$send_result = true;
$to = "info@artelier.edu.pl," . $_POST['email'];  //insert the email address it goes to here
$subject = "[WWW][NEWSLETTER] Zapisz na newsletter Artelier: " . $_POST['email'];

	//MAIN
	if (validateForm() == true) {
			$_SESSION['newsletter']['error'] = "";
			
			// Send mail, return true or false
			$message = prepareMessage () ;
			mb_language  ("uni");
			$send_result = @mb_send_mail($to, $subject, $message, $headers); 
			
			if($send_result) {
				//OK message
				$location = "Location: " . $location_redirect;
				$_SESSION['newsletter']['message'] = $msg_sent_ok;
			} else {
				//NOK message
				$location = "Location: " . $location_redirect;
				$_SESSION['newsletter']['message'] = $msg_sent_nok;
			}
			
			//Redirect to confirmation message
			header ($location);
	}
	else {
		
		$location = "Location: " . $location_redirect;
		//Redirect to sending e-mail
		header ($location);
		
	}
	//END MAIN 

	
	//===================== FUNCTIONS ===============
	//Check form fields
	function validateForm () {
		$result = true;
		$_SESSION['newsletter']['error'] = "";
		
		if ($_POST['name'] == "") { 
			$_SESSION['newsletter']['error'] .= "Imi&#281; jest nieprawid&#322;owe.<br>";
			$result = false;
		}
		if ($_POST['phone'] == "") { 
			$_SESSION['newsletter']['error'] .= "Telefon jest nieprawid&#322;owy.<br>";
			$result = false;
		}
		if (validEmail($_POST['email']) != true) { 
			$_SESSION['newsletter']['error'] .= "E-mail jest nieprawid&#322;owy.<br>";
			$result = false;
		}
		return $result;
	}
	
	//Save form fields
	function prepareMessage () {
		$message = "DANE ZAMAWIAJ&#260;CEGO NEWSLETTER" ."<br><br>\r\n\r\n";

		$message .= "<br><br>\r\n\r\nImi&#281;: ";
		$message .= $_POST['name'];
		
		$message .= "<br><br>\r\n\r\nTelefon: ";
		$message .= $_POST['phone'];
		
		$message .= "<br><br>\r\n\r\nE-mail: ";
		$message .= $_POST['email'];
		
		return $message;
	}

?>