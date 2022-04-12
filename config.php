<?php
// -----------------------------------------------------------------------------
// DEFINE ROOT PATHS
// -----------------------------------------------------------------------------

  //$_SERVER["DOCUMENT_ROOT"] = '';
  define('RELATIVE_PATH_ROOT', '');
  define('LOCAL_PATH_ROOT', $_SERVER["DOCUMENT_ROOT"]); // for server-side

// -----------------------------------------------------------------------------
// COMPONENTS PATHS
// -----------------------------------------------------------------------------
  define('HEADER', LOCAL_PATH_ROOT.'/components/php/header.php');
  define('FOOTER', LOCAL_PATH_ROOT.'/components/php/footer.php');
  define('HEADER_NAVBAR_REDIRECTS', LOCAL_PATH_ROOT.'/components/php/header-navbar-redirects.php');
  define('GREETINGS', 'HELLO WORLD!!');

// -----------------------------------------------------------------------------
// IMAGES FOLDER PATHS
// -----------------------------------------------------------------------------
  define('LIGHTDARK_IMAGES_DIR', '../images/lightDarkSeries');
  define('ELEVATION_IMAGES_DIR', '../images/elevationSeries');
  define('KITCHEN_IMAGES_DIR', '../images/kitchenSeries');
?>
