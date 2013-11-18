 <?php  

//require_once 'Mandrill.php'; //Not required with Composer
//$mandrill = new Mandrill('i5dEhc969G4aqgT2tH6k0g');

require("PHPMailer-master/class.phpmailer.php");
require("PHPMailer-master/class.smtp.php");

// check for form submission - if it doesn't exist then send back to contact form  
if (!isset($_POST["save"]) || $_POST["save"] != "contact") {  
    //header("Location: index.php"); exit;  
}  
      
// get the posted data  
$name = $_POST["contact_first_name"]  . " " . $_POST["contact_last_name"];  
$email_address = $_POST["contact_email"];  
$subject = $_POST["contact_subject"];    
$message = $_POST["contact_message"];


// check that a name was entered  
if (empty ($name))  
    $error = "You must enter your name.";  
// check that an email address was entered  
elseif (empty ($email_address))   
    $error = "You must enter your email address.";  
// check for a valid email address  
elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email_address))  
    $error = "You must enter a valid email address.";  
// check that a message was entered  
elseif (empty ($message))  
    $error = "You must enter a message.";  
          
// check if an error was found - if there was, send the user back to the form  
if (isset($error)) {  
    //header("Location: index.php?e=".urlencode($error)); exit;
    echo $error;  
}  


    $mail = new PHPMailer();
    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->Host     = "smtp.mandrillapp.com"; // SMTP server
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'app19409613@heroku.com';                            // SMTP username
	$mail->Password = 'i5dEhc969G4aqgT2tH6k0g';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
    $mail->From     = "server@hakkagroup.com";
    $mail->addAddress('pete@g33ktalk.com');  
    $mail->Subject  = $subject;
    //$mail->Body 		= "Hi! \n\n This is my first e-mail sent through PHPMailer.";
    $mail->Body 		= "name is: " . $name; . "\nemail is: " .  $email_address; . "\nmessage is: " . $message;
    
    $mail->WordWrap = 50;
    if(!$mail->Send()) {
        echo 'Message was not sent.';
        echo 'Mailer error: ' . $mail->ErrorInfo;
    }else {
        echo 'Message has been sent.';
    }


/*          
// write the email content  
$email_content = "Name: $name\n";  
$email_content .= "Email Address: $email_address\n";  
$email_content .= "Subject:\n\n$subject" . "Message:\n\n$message";  
      
// send the email  
mail ("pete@g33ktalk.com", "New Message Hakka Group Site", $email_content);  

echo "Success!";
*/

// send the user back to the form  
//header("Location: contact-form.php?s=".urlencode("Thank you for your message.")); exit;  
  
?>  
