<?php
	$return = array("Type" => "", "Result" => "", "Info" => "", "StudentArray" => "");
            $return["Type"] = "AddStudentList";
            $FileElementName = $_POST["FileID"];
            $filename = $_FILES[$FileElementName]["name"];
            if ( !empty($_FILES[$FileElementName]["error"]) ){
                $return["Result"] = "Fail";
                switch ( $_FILES[$FileElementName]["error"] ){
                    case '1':{
                        $return['Info'] = "Upload error: The uploaded file exceeds the upload_max_filesize directive in php.ini";
                        break;
                    } 
                    case '2':{
                        $return['Info'] = "Upload error: The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                        break;
                    }
                    case '3':{
                        $return['Info'] = "Upload error: The uploaded file was only partially uploaded";
                        break;
                    }
                    case '4':{
                        $return['Info'] = "Upload error: No file was uploaded";
                        break;
                    }
                    case '6':{
                        $return['Info'] = "Upload error: Missing a temporary folder";
                        break;
                    }
                    case '7':{
                        $return['Info'] = "Upload error: Failed to write file to disk";
                        break;
                    }
                    case '8':{
                        $return['Info'] = "Upload error: File upload stopped by extension";
                        break;
                    }
                    default : {
                        $return['Info'] = "Upload error: No error code avaiable";
                        break;
                    }
                }
            }
            else if(false) {
            //文件限制
            }
            else {
                //打开文件
                $tmpfile = $_FILES[$FileElementName]["tmp_name"];
                if (!file_exists($tmpfile) || !is_readable ($tmpfile)){
                    $return["Result"] = "Fail";
                    $return["Info"] = "No file uploaded";                
                }
                else {
                    $studentlist = file($tmpfile);
                    //$studentlist = "test";
                    if($studentlist == false){
                        $return["Result"] = "Fail";
                        $return["Info"] = "Failed to open the tmp file.";
                    }
                    else {
                        $return["Result"] = "Success"; 
                        $return["StudentArray"] = $studentlist;
                    }
                }
            }

            echo json_encode($return);
?>