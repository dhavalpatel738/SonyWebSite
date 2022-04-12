<?php

  function get_fileName($var) {
    $fileNameArray = array_splice(explode(" ",explode(".", str_replace("-"," ",$var))[0]),0,1);
    return implode(" ",$fileNameArray);
  }

  function dir_to_array($dir)
{
        if (!is_dir($dir)) {
                // If the user supplies a wrong path we inform him.
                return null;
        }

        // Our PHP representation of the filesystem
        // for the supplied directory and its descendant.
        $data = [];

        foreach (new DirectoryIterator($dir) as $f) {
                if ($f->isDot()) {
                        // Dot files like '.' and '..' must be skipped.
                        continue;
                }

                $path = $f->getPathname();
                $name = get_fileName($f->getFileName());
                // echo $path;
                if ($f->isFile()) {
                        $data[] = [ 'image_url' => $path,
                                    'name' => $name,
                                    'label' => $name
                                  ];
                }
        }

        return $data;
}


      $allData = dir_to_array('images/lightDarkSeries');
      $allData = array_merge($allData, dir_to_array('images/elevationSeries'));
      $allData = array_merge($allData, dir_to_array('images/kitchenSeries'));

      $items = json_encode($allData);
      echo $items;

      $fp = fopen('items.json', 'w');
      fwrite($fp, $items);
      fclose($fp);


?>
