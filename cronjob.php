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

                if ($f->isFile()) {
                        $data[] = [ 'image_url' => $path,
                                    'name' => $name,
                                    'label' => $name
                                  ];
                }
        }

        return $data;
}

      $data = json_encode(dir_to_array('images/lightDarkSeries'));
      echo $data;

      $fp = fopen('items.json', 'w');
      fwrite($fp, $data);
      fclose($fp);


?>
