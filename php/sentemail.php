<?php
//echo '<script type="text/javascript">alert("Inside Sent Email Php...");</script>'; 

$mail = new PHPMailer();

$mail->IsSMTP();                            // set mailer to use SMTP
$mail->Host = "smtp.gmail.com";  			// specify main and backup server
$mail->SMTPAuth = true;     				// turn on SMTP authentication
$mail->Username = "sampaccnt99@gmail.com";  // SMTP username
$mail->Password = "MyNewPassword"; 			// SMTP password
$mail->SMTPSecure = 'tls';					//Previously used "tls" we can try "ssl"
$mail->Port = 587;							//Previously used 587 we can try 465

$mail->From = "sampaccnt99@gmail.com";
$mail->FromName = "VanaaWeb";
$mail->AddAddress("vanaja.sutharsan@aaratech.com", "Vana Aara");
$mail->AddReplyTo("vanamca2014@gmail.com", "Information");

$mail->WordWrap = 250;                      // set word wrap to 50 characters
$mail->IsHTML(true);                        // set email format to HTML


// define variables and set to empty values
$varname = $varphone = $varemail = $varsubject = $varmessage = "";


//Get values from contact form
$varname 	= $_POST["name"];
$varphone 	= $_POST["phone"];
$varemail 	= $_POST["email"];
$varsubject = $_POST["subject"];
$varmessage = $_POST["message"];


// set email format to HTML
$mail->Subject = $varsubject;
$mail->Body    = "Name.........   <b>".$varname."</b><br>Mobile........   <b>".$varphone."</b><br>Email..........   <b>".$varemail."</b><br>Message....   ".$varmessage;
$mail->AltBody = "Name.........   ".$varname."Mobile........   ".$varphone."Email..........   ".$varemail."Message....   ".$varmessage;


	//Checking connected with online or not
       $connected = @fsockopen("www.google.com", 80); 
        //website, port  (try 80 or 443)
       if ($connected) //While Online
       { 	
          	$is_conn = true; //action when connected

			//Check Mail sent or not
			if(!$mail->Send())//Sending a Mail
			{
				//Mail not sent
				echo '<script type="text/javascript">';
			    echo 'setTimeout(function () { swal("Message could not be sent","Mailer Error","error");}, 1000);';
			    echo '</script>';	
   				echo '<script type="text/javascript">alert("Mail could not be sent'.$mail->ErrorInfo.'");</script>';
   				// echo "Message could not be sent. <p>";
   				// echo "Mailer Error: " . $mail->ErrorInfo;
			   exit;
			}
			else //Mail has been sent successfully
			{	
				echo '<script type="text/javascript">';
			    echo 'setTimeout(function () { swal("Successfully Sent...","I will be in Touch","success");}, 1000);';
			    echo '</script>';
			}

          fclose($connected);
       }
       else //While Offline			
       {		
         	$is_conn = false; //action in connection failure
         	echo '<script type="text/javascript">';
			echo 'setTimeout(function () { swal({   title: "You are Offline!",   text: "Try after getting Online...",   timer: 5000,   showConfirmButton: false });}, 1000);';
			echo '</script>';
       }



?>