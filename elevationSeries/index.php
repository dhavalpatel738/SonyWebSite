<!doctype html>
<html lang="en">
  <head>
    <!--  IMPORT CONFIG FILE -->
      <?php include '../config.php'; ?>
      <?php
        echo file_get_contents(HEADER);
      ?>
  </head>
  <body>
    <!-- header navbar-->
    <?php
      echo file_get_contents(HEADER_NAVBAR_REDIRECTS);
      ?>

      <section class="jumbotron text-left mx-4" style="background-color: #121212;>
          <div class="container-fluid">
              <h1 class="jumbotron-heading">Elevation Series</h1>
              <p class="lead text-warning"><mark>Size: 37.5 x 25 cm (10&#34;x15&#34;)</mark></p>
          </div>
      </section>

      <?php
      //return array with file names not starting with '.'
      function not_hidden($path) {
          $files = scandir($path);
          foreach($files as $file) {
              if ($file[0] != '.') $nothidden[] = $file;
            }
          return $nothidden;
      }

      //return filename of images
      function get_fileName($var) {
        $fileNameArray = array_splice(explode(" ",explode(".", str_replace("-"," ",$var))[0]),0,1);
        return implode(" ",$fileNameArray);
      }

      $directory = ELEVATION_IMAGES_DIR;
      $items = not_hidden($directory);
      //rsort($items);
      $numOfFiles = count($items);


      $numberOfColumns = 6;
      $bootstrapColWidth = 12 / $numberOfColumns ;

      //$arrayChunks = array_chunk($items, $numberOfColumns);
      //foreach($arrayChunks as $items) {
        echo '<div class="row mx-4">';
        // echo '<div class="card-deck">';
        foreach($items as $item) {
          if(strcmp(explode(".", $item)[1],"jpg") == 0) {
            //strcmp returns 0 on equal
            //echo '<div class="col-sm-'.$bootstrapColWidth.'">';
            $temp = $directory."/".$item;
            echo '<div class="col-sm-2 mb-3">';
            echo '
                  <div class="card">
                      <a class="image-popup-no-margins" href="'.$temp.'">
                          <img class="card-img-top" src="'.$temp.'" alt="Card image cap">
                      </a>
                      <h5 class="card-text" style="text-align: left;">'.get_fileName($item).'</h5>
                  </div>
            ';
            echo '</div>';
          }
        }
        echo '</div>';
        echo '</div>';
    //}

    ?>

    <?php
      // footer navbar
      echo file_get_contents(FOOTER);
    ?>
  </body>
