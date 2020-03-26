<?php
$dbl = dir(".");
echo "P: ".$dbl->handle."<br>\n";
echo "Chemin: ".$dbl->path."<br>\n";
while($entree = $dbl->read()) {
    echo $entree."<br>\n";
}
$dbl->close();
$BASE = "../index.php";
function list_dir($base, $pp, $niveau=0) {
  global $PHP_SELF, $BASE;
  if ($dir = opendir($base)) {
    while($entree = readdir($dir)) {
      
      $file = $base."/".$entree;
      if(is_dir($file) && !in_array($entree, array(".",".."))) {

        for($i=1; $i<=(4*$niveau); $i++) {
            echo "&nbsp;";
        }
       
        if($file == $pp) {
          echo "<b>$entree</b><br />\n";
        } else {
          echo "<a href=\"$PHP_SELF?dir=".rawurlencode($file)."\">$entree</a><br />\n";
        }
       
      }
    }
    closedir($dir);
  }
  function list_file($cur) {
    if ($dir = opendir($cur)) {
      
      $tab_dir = array();
      $tab_file = array();
      
      while($file = readdir($dir)) {
        if(is_dir($cur."/".$file)) {
            $tab_dir[] = $file;
        } else {
            $tab_file[] = $file;
        }
      }
     
      sort($tab_dir);
      sort($tab_file);
     
      foreach($tab_dir as $elem) {
        echo "<img src=\"dir-close.gif\" />&nbsp;".$elem."<br />\n";
      }
      foreach($tab_file as $elem) {
        echo "<img src=\"file-none.gif\" />&nbsp;".$elem."<br />\n";
      }
      closedir($dir);
    }
  }
}
?>