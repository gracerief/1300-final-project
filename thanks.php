<?php
$email = $_REQUEST["email"];
$yes =  $_REQUEST["yes"];
$no =  $_REQUEST["no"];

if(isset($yes)) {
  $to      = 'dc784@cornell.edu';
  $subject = 'Hello';
  $message = 'Welcome to the Cornell ASA email list.';
  $headers = "From: " . $email;

  mail($to, $subject, $message,$headers);

  echo 'Email Sent.';

  header('Location: listserv.php');
  return;
}

elseif(isset($no)) {
  header('Location: listserv.php');
  return;
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Arab Student Association At Cornell</title>
  <!-- Auxilliary Stylesheets -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" type="text/css" href="styles/style.css" media="all">
</head>
<body>
  <div class="container" id="solid">
    <?php include "includes/nav.php" ?>
    <div id="thanks">
      <h2>Thanks for contacting us!</h2>
    </div>
    <div class="twoPar">
      <p>Thank you for messaging us. We will E-mail you a response
        as soon as possible at <?php echo(htmlspecialchars($email));?>.</p>
      <p>We really appreciate it!!</p>
      <form action="listserv.php" method="post" id="ask">
        <p>Would you like to join the listserv?</p>
        <div class="button">
          <button type="submit" name="yes">Yes</button>
        </div>
        <div class="button">
          <button type="submit" name="no">No Thanks</button>
        </div>
      </form>
    </div>
  </div>
  <?php include 'includes/scripts.php' ?>
</body>
</html>
