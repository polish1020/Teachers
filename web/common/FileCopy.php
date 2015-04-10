<?php
function FileCopy($src,$dst) {  // 原目录，复制到的目录

    $dir = opendir($src);
    mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            
            if ( is_dir($src . '/' . $file) ) {
                FileCopy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                //echo $dir."=>".$src."/".$file."=>".$dst."/".$file."<br>";
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
    
}
?>
