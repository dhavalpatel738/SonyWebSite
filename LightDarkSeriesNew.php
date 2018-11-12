<!doctype html>
<html lang="en">
  <head>
    <!--  IMPORT CONFIG FILE -->
      <?php include 'config.php'; ?>
      <?php
        echo file_get_contents(HEADER);
      ?>
  </head>
  <body>
    <!-- header navbar-->
    <?php
      echo file_get_contents(HEADER_NAVBAR_REDIRECTS);
    ?>
  </body>
