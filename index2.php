<?php
$dbl = dir(".");
echo "P: ".$dbl->handle."<br>\n";
echo "Chemin: ".$dbl->path."<br>\n";
while($entree = $dbl->read()) {
    echo $entree."<br>\n";
}
$dbl->close();
$BASE = "../index.php";
function list_dir($base, $cur, $level=0) {
  global $PHP_SELF, $BASE;
  if ($dir = opendir($base)) {
    while($entree = readdir($dir)) {
      
      $file = $base."/".$entree;
      if(is_dir($file) && !in_array($entree, array(".",".."))) {

        for($i=1; $i<=(4*$level); $i++) {
            echo "&nbsp;";
        }
       
        if($file == $cur) {
          echo "<b>$entree</b><br />\n";
        } else {
          echo "<a href=\"$PHP_SELF?dir=".rawurlencode($file)."\">$entree</a><br />\n";
        }
       
      }
    }
    closedir($dir);
  }
}
?>