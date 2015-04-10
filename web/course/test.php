<?php
    include_once("../common/FileCopy.php");
    include_once("../common/FileDelete.php");
    //打开 images 目录
    $dir = opendir("../../teacherdata");

    //列出 images 目录中的文件
    while (($file = readdir($dir)) !== false){
        echo "filename: " . $file . "<br />";
    }
    closedir($dir);
    //mkdir("testing");
    //mkdir("dst");
    //FileCopy("../../teacherdata","dst");
    //FileDelete("dst");
    FileDelete("../../teacherdata/test");






?>




