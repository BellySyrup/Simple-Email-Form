<?php
	$to = 'test@gmail.com';
	$subject = 'From Custom Email Form';
	$returnPage = 'http://stephanconzen.com/';

	if (isset($_POST['submit'])){
		$spam = $_POST['spam'];
		
		if($spam == ''){
			
  			$email1 = $_POST['email1'] ;
  			$name1 = $_POST['name1'] ;
  			$email2 = $_POST['email2'] ;
  			$name2 = $_POST['name2'] ;
  			$comments = $_POST['comments'] ;
  	
  			$message = "Name: ".$name1."\n";
  			$message .= "Email: ".$email1."\n";
  			$message .= "Other Name: ".$name2."\n";
  			$message .= "Other Email: ".$email2."\n";
  			$message .= "Comments: ".$comments;
  	
  			$headers = "MIME-Version: 1.0\r\n";  
			$headers .= "Content-type: text/plain; charset=utf-8\r\n"; 
			$headers .= "To: ".$to." <".$to.">\r\n";  
			$headers .= "From: ".$email1." <".$email1.">\r\n";  
			$headers .= "Reply-To: ".$email1." <".$email1.">\r\n";  
			$headers .= "Return-Path: ".$email1." <".$email1.">\r\n";  
			$headers .= "\r\n"; 
	
  			mail($to, $subject, $message, "From:" . $email1);
			echo "Thank you for using our mail form";
			
			} else {
				echo "The hidden spam field was filled in, so email was not sent.";
		}
	}
?>
<form name="email" method='post' action='index.php'>

	<label for="name1">Your Name</label><br/>
	<input id="name1" type="text" class="required" name="name1" focus required /><br/>
  	
  	<label for="email1">Your Email</label><br/>
	<input type="email" name="email1" id="email1" required /><br/>
	
	<label for="name2">Resident Name</label><br/>
	<input id="name2" type="text" class="required" name="name2" required /><br/>
	
	<label for="email2">Resident Email</label><br/>
	<input type="email" name="email2" id="email2" required /><br/>
  	
  	<label for="comments">Type  or Paste letter below ... </label><br/>
 	<textarea name='comments' id="comments" rows='15' cols='40'></textarea><br><br/>
 		
 	<input type="hidden" name="spam"/>
 	
  	<input name='submit' type='submit'>
  	<input name='reset' type='reset'>
  	
</form>