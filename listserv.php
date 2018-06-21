<?php
$yes =  $_REQUEST["yes"];
$no =  $_REQUEST["no"];

if(isset($yes)) {
  $listservmsg = 'You have been added to the listserv!';
}

elseif(isset($no)) {
  $listservmsg = 'You have not been added to the list serv. Thank you for your contact request.';
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
    <div id="listservmsg">
      <h2><?php echo $listservmsg ?></h2>
      <a href="index.php"><h2>Click here to return to homepage</h2></a>
    </div>
  </div>
  <?php include 'includes/scripts.php' ?>
</body>
</html>
