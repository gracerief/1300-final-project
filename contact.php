<?php
  $submit = $_REQUEST["submit"];
  $HIDDEN_ERROR_CLASS = "hiddenError";
  //Form Validation
  if(isset($submit)) {
    $name = strip_tags(trim($_REQUEST["name"]));
    $email = strip_tags(trim($_REQUEST["email"]));
    $message = strip_tags(trim($_REQUEST["message"]));

    if(!empty($name)) {
      $nameValid = true;
    }
    else {
      $nameValid = false;
    }

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailValid = true;
    }
    else {
      $emailValid = false;
    }

    if(!empty($message)) {
      $messageValid = true;
    }
    else {
      $messageValid = false;
    }

    $formValid = $nameValid && $emailValid && $messageValid;

    if($formValid) {
      session_start();
      $_SESSION["name"] = $name;
      $_SESSION["email"] = $email;
      $_SESSION["message"] = $message;

      header("Location: form.php");
      return;
    }
  }
  // Default Behavior
  else {
    $nameValid = true;
    $emailValid = true;
    $messageValid = true;
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
    <div id="contact">
      <h2>Contact</h2>
      <form action="thanks.php" method="post" id="mainForm" novalidate>
        <div class="name">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" placeholder="Full Name" value="<?php echo($name);?>" required>
          <span class="errorContainer <?php if ($nameValid) {echo($HIDDEN_ERROR_CLASS);} ?>" id="nameError">
            Name is required.
          </span>
        </div>
        <div class="email">
          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" placeholder="user@example.com" value="<?php echo($email);?>" required>
          <span class="errorContainer <?php if ($emailValid) {echo($HIDDEN_ERROR_CLASS);} ?>" id="emailError">
            Email Address is required.
          </span>
          <span class="errorContainer <?php if ($emailValid) {echo($HIDDEN_ERROR_CLASS);} ?>" id="emailErrorFill">
            Not a valid Email Address.
          </span>
        </div>
        <div class="message">
          <label for="msg">Message:</label>
          <textarea id="msg" name="message" placeholder="Message" required><?php
            if(isset($_REQUEST["message"]))
            {
              echo htmlentities($_REQUEST["message"], ENT_QUOTES);
            }
            ?></textarea>
          <span class="errorContainer <?php if ($messageValid) {echo($HIDDEN_ERROR_CLASS);} ?>" id="msgError">
            Please write a message.
          </span>
        </div>
        <div class="button">
          <button type="submit">Send</button>
        </div>
      </form>
      <div id="notes">
        <p> You can also email us separately at:
          <a href="mailto:asacornell@gmail.com" id="mailto">asacornell@gmail.com</a>.</p>
        <p> If you would like to contact an individual E-Board member, you may find their contact on the <a href="eboard.php">E-Board</a> page.</p>
      </div>
    </div>
  </div>
  <?php include 'includes/scripts.php' ?>
</body>
</html>
