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

      $directory = LIGHTDARK_IMAGES_DIR;
      $items = scandir($directory);
      rsort($items);
      //print_r($items);
      $numOfFiles = count($items);
    ?>

    <?php
    $numberOfColumns = 6;
    $bootstrapColWidth = 12 / $numberOfColumns ;

    $arrayChunks = array_chunk($items, $numberOfColumns);
    foreach($arrayChunks as $items) {
        echo '<div class="row">';
        foreach($items as $item) {
            echo '<div class="col-sm-'.$bootstrapColWidth.'">';
            echo '
                  <div class="card">
                      <a class="image-popup-no-margins" href="Images/LightDarkSeries/'.$item.'">
                          <img class="card-img-top" src="Images/LightDarkSeries/'.$item.'" alt="Card image cap">
                      </a>
                      <h5 class="card-title" style="text-align: left;">'.explode(" ", $item)[0].'</h5>
                  </div>
            ';
            echo '</div>';
        }
        echo '</div>';
    }
    ?>

    <?php
      // footer navbar
      echo file_get_contents(FOOTER);
    ?>
  </body>
