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

      //return array with file names not starting with '.'
      function not_hidden($path) {
          $files = scandir($path);
          foreach($files as $file) {
              if ($file[0] != '.') $nothidden[] = $file;
            }
          return $nothidden;
      }

      $directory = LIGHTDARK_IMAGES_DIR;
      $items = not_hidden($directory);
      //rsort($items);
      $numOfFiles = count($items);

    ?>

    <?php

    $numberOfColumns = 6;
    $bootstrapColWidth = 12 / $numberOfColumns ;

    $arrayChunks = array_chunk($items, $numberOfColumns);
    foreach($arrayChunks as $items) {
        echo '<div class="row mx-4">';
        echo '<div class="card-deck">';
        foreach($items as $item) {
          if(strcmp(explode(".", $item)[1],"jpg") == 0) {
            //strcmp returns 0 on equal
            echo '<div class="col-sm-'.$bootstrapColWidth.'">';
            echo '
                  <div class="card">
                      <a class="image-popup-no-margins embed-responsive embed-responsive-1by1" href="Images/LightDarkSeries/'.$item.'">
                          <img class="card-img-top embed-responsive-item" src="Images/LightDarkSeries/'.$item.'" alt="Card image cap">
                      </a>
                      <h5 class="card-title" style="text-align: left;">'.explode(" ", $item)[0].'</h5>
                  </div>
            ';
            echo '</div>';
          }
        }
        echo '</div>';
        echo '</div>';
    }

    ?>

    <?php
      // footer navbar
      echo file_get_contents(FOOTER);
    ?>
  </body>
