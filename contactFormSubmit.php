 <?php  

require_once 'Mandrill.php'; //Not required with Composer
//$mandrill = new Mandrill('YOUR_API_KEY');
  
// check for form submission - if it doesn't exist then send back to contact form  
if (!isset($_POST["save"]) || $_POST["save"] != "contact") {  
    //header("Location: index.php"); exit;  
}  
      
// get the posted data  
$name = $_POST["contact_first_name"]  . " " . $_POST["contact_last_name"];  
$email_address = $_POST["contact_email"];  
$subject = $_POST["contact_subject"];    
$message = $_POST["contact_message"];
      

echo "name is: " . $name; 
echo "email is: " . $email_address; 
echo "subject is: " . $subject; 
echo "message is: " . $message; 


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
          
// write the email content  
$email_content = "Name: $name\n";  
$email_content .= "Email Address: $email_address\n";  
$email_content .= "Subject:\n\n$subject" . "Message:\n\n$message";  
      
// send the email  
mail ("pete@g33ktalk.com", "New Message Hakka Group Site", $email_content);  

echo "Success!";

// send the user back to the form  
//header("Location: contact-form.php?s=".urlencode("Thank you for your message.")); exit;  
  
?>  
