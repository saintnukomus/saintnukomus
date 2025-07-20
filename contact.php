<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $telephone_number = $_POST["telephone_number"];
  $email_address = $_POST["email_address"];
  $problem = $_POST["problem"];
  $best_contact_time = $_POST["best_contact_time"];


  if (empty($name) || empty($telephone_number) || empty($email_address)  || empty($problem)  || empty($best_contact-time)) {
    echo "Please fill in all fields.";
    exit;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
  }

  $to = "saintnukomus@gmail.com"; 
  $subject = "New Contact Form Submission";
  $email_body = "Name: $name\nEmail: $email\nemail_address: $email_address\n problem: $problem\nbest_contact_time: $best_contact_time";
  $headers = "From: $email"; 


  if (mail($to, $subject, $email_body, $headers)) {
    echo "Thank you for your submission!";
   
    $user_subject = "Thank you for your message";
    $user_email_body = "Dear $name,\n\nThank you for contacting us. We will get back to you soon.\n\nYour message:\n$message";
    mail($email, $user_subject, $user_email_body); 
  } else {
    echo "There was an error sending your message.";
  }
}
?>