<?php 
	// Here we get all the information from the fields sent over by the form.
		$senderName = isset( $_POST['senderName'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderName'] ) : "";
		$senderEmail = isset( $_POST['senderEmail'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['senderEmail'] ) : "";
		$details = isset( $_POST['senderMessage'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['senderMessage'] ) : "";


	$to = 'yourmail_sonalikrdse8@gmail.com'; // Add your email here
	$subject = 'Your email subject here'; // Add your email subject here

		$headers = "From: " . $senderName . " <" . $senderEmail . ">" . "\r\n";
		$headers .= "Reply-To: ". strip_tags($senderEmail) . "\r\n";

		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$message = '<html><body>';
			$message .= '<table width="752px" cellpadding="0" cellspacing="0" align="center">';
				$message .= '<tbody><tr>';	
					$message .= '<td>';
						$message .= '<table style="width:752px;padding-top:12px;margin:0 auto;border:1px solid #d9d9d9;font-family:Arial;">';
							$message .= '<tbody><tr>';
								$message .= '<td height="40" colspan="2" style="padding-left:12px;line-height:24px;font-size:24px;">';
		
									$message .= 'Dear Admin';
								
								$message .= '</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td height="40" style="font-size:14px;color:#666666;line-height:24px;padding-left:12px;">';
							
									$message .= 'You have received an Inquiry from "Your site name!" ';
								
								$message .= '</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="font-size:14px;color:#dc0000;line-height:24px;padding-left:12px;" height="40">';
	
									$message .= 'Detials are as below:';
								
								$message .= '</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td>';
									$message .= '<table style="line-height:35px;font-size:14px;margin-left:12px;font-family:Arial,Helvetica,sans-serif;">';
										$message .= '<tbody><tr>';
											$message .= '<td width="183px" style="font-weight:bold; padding-left:15px;">Name:</td>';
											$message .= '<td>' . strip_tags($senderName) . '</td>';
										$message .= '</tr>';
										$message .= '<tr>';
											$message .= '<td width="183px" style="font-weight:bold; padding-left:15px;">Email Address:</td>';
											$message .= '<td><a href="mailto:$senderEmail" target="_blank">' . strip_tags($senderEmail) . '</a></td>';
										$message .= '</tr>';
										$message .= '<tr>';
											$message .= '<td width="183px" style="font-weight:bold;display:block; padding-left:15px;">Details:</td>';
											$message .= '<td style="line-height:24px;">' . htmlentities($details) . '</td>';
										$message .= '</tr>';
									$message .= '</tbody></table>';
								$message .= '</td>';
							$message .= '</tr>';
						$message .= '</tbody></table>';
					$message .= '</td>';
				$message .= '</tr>';
			$message .= '</tbody></table>';
		$message .= "</body></html>"; 
		if (filter_var($senderEmail, FILTER_VALIDATE_EMAIL)) 
			{ 
				// this line checks that we have a valid email address
				mail($to, $subject, $message, $headers); //This method sends the mail.
				
				echo "<div class='alert alert-success alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
			      	<strong>Thanks for contacting us! We will get in touch with you shortly.</strong></div>"; // success message
			}
		else
			{
				echo "<div class='alert alert-warning alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
			      	<strong>Invalid Email, please provide a correct email.</strong></div>"; // error message
			}

	

?>