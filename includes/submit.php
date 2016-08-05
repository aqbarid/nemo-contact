<?php
function submit() {
	if ( isset( $_POST['cf-submitted'] ) ) {
		$token 		= base64_decode($_POST["cf-token"]);
		$key 		= sanitize_text_field( $_POST["cf-key"] );
		$name 		= sanitize_text_field( $_POST["cf-name"] );
		$email 		= sanitize_email($_POST["cf-email"] );
		$phone 		= sanitize_text_field( $_POST["cf-phone"] );
		$message 	= esc_textarea( $_POST["cf-message"] );
		$date 		= date("d-m-Y");
		$country	= sanitize_text_field( $_POST['cf-country'] );
		$city		= sanitize_text_field( $_POST["cf-city"] );

		global $wpdb;
		$table = $wpdb->prefix . 'nemocontact';

		if($token == $key){
			$insert_data = $wpdb->insert( $table, array(
		    'name' 	=> $name,
		    'email' => $email,
		    'date'	=> $date
			) );
		  		/*Send mail to admin*/
	        	$to			= 'Willy Arisky <willy.arisky@yahoo.de>';
				$subject	= 'Nemo Power Tools: Contact Submission';
				$body		= "$message
							<br><br>
							<strong>Contact Informations:</strong>
							<br>
							Name: $name <br>
							Phone Number : $phone <br>
							Country : $country <br>
							City: $city <br>
								";
			  	$headers[] = 'From: '.$name.' <'.$email.'>';
				$headers[] = 'Cc: CEO Syntac <willy@syntac.co.id>';
				$headers[] = 'Content-Type: text/html; charset=UTF-8';
			  
				wp_mail( $to, $subject, $body, $headers );
			  /* End send mail to admin */

			/* Process insert data*/
			if($insert_data){
				echo "<h4>Thanks for contacting us. We'll be in touch soon to help you.</h4>";
			}else{
				echo "<h4>Sorry, system error. Please try again later or contact support</h4>";
			}
		}else{
			echo "<b>You entered the wrong number in captcha.</b>";
		}
		
	}
}
?>