<?php
/* North American 10-digit phone numbers can be formatted a number of ways: XXX-XXX-XXXX, (XXX) XXX-XXXX, XXX.XXX.XXXX and so on.

We’re creating a form to collect names and phone numbers. Once collected, we want to save the phone numbers to our “database” (here the $contacts array). We’ll need all the phone numbers to be formatted in the exact same way so that we can use them consistently throughout our application. However, we want users to be able to input their phone number in whatever way they prefer.

In these tasks, you’ll be creating the logic to sanitize and validate a user-submitted phone number and then store it in the $contacts array. 
*/

<?php
$contacts = ["Susan" => "5551236666", "Alex" => "7779991717", "Lily" => "8181117777"];  
$message = "";
$validation_error = "* Please enter a 10-digit North American phone number.";
$name = "";
$number = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST["name"];
   $number  = $_POST["number"];

   if (strlen($number)<30){
     $formatted_number = preg_replace("/[^0-9]/", "", $number);
     if (strlen($formatted_number)===10){
       $contacts[$name] = $formatted_number;
       $message = "Thanks ${name}, we'll be in touch.";
     } else {
       $message = $validation_error;
     } 
   } else {
     $message = $validation_error;
   }
};
?>

<html>
	<body>
  <h3>Contact Form:</h3>
		<form method="post" action="">
			Name:
			<br>
  		<input type="text" name="name" value="<?= $name;?>">
 			<br><br>
  		Phone Number:
  		<br>
  		<input type="text" name="number" value="<?= $number;?>">
  		<br><br> 
  		<input type="submit" value="Submit">
		</form>
		<div id="form-output">
			<p id="response"><?= $message?></p>
    </div>
	</body>
</html>
    