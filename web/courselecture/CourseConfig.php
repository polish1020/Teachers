<?php
    session_start();
    if(!isset($_SESSION['uNum'])){
	    header("location: ../index.php");
	    exit;
    }

    include_once("../common/FileCopy.php");
    include_once("../common/FileDelete.php");
    include_once("../common/conn_database.php");
    //error_reporting(0);
    date_default_timezone_set('PRC');
    $techID = $_SESSION["uid"];
    $uNum = $_SESSION["uNum"];
    //$uNum = "cjh";
    mysql_select_db("db_".$uNum);
    $Type = $_POST["Type"];
    switch ( $Type ){
        case "SearchLecture":{
            $return = array ( "Type"=>"", "Result"=>"", "Info"=>"", "LectureArray"=>"", "Count"=>"" );
            $return['Type'] = "SearchLecture";
            $coID = $_POST["coID"];
            $query = "select * from t_lecture where coID = ".$coID." order by lectID";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error: ".mysql_error();
            }
            else {
                $return['Count'] = 0;
                while ( $row = mysql_fetch_array($res) ){
                    $return['LectureArray'][$return['Count']] = $row;
                    $return['Count'] ++ ;
                }
                if ( $return['Count'] == 0 ){
                    $return['Result'] = "None";
                    $return['Info'] = "No record";
                }
                else {
                    $return['Result'] = "Success";
                    $return['Info'] = "Search successfully";
                }
                
            }
            break;
        }
        
        case "AddLecture":{
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"" );
            $return['Type'] = "AddLecture";
            $fileElementName = $_POST["FileID"];
            $coYear = $_POST["coYear"];
            $coID = $_POST["coID"];
            $name = $_FILES[$fileElementName]["name"];
            //$name = iconv("UTF-8","GB2312", $_FILES[$fileElementName]["name"]);
            if ( !empty($_FILES[$fileElementName]["error"]) ){
                $return['Result'] = "FailStore";
                switch ( $_FILES[$fileElementName]["error"] ){
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
            else if ( file_exists("../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/cource/".$name."") ){
                $return['Result'] = "Exist";
                $return['Info'] = $name." is already exist";
            }
            else if (false){
                //文件名长度限制和文件大小限制
            }
            else {               
                $lectNum = $_POST["lectNum"];
                $lectTitle = $_POST["lectTitle"];
                $lectNote = $_POST["lectNote"];
                $lectDesc = $name.":".$_POST["lectDesc"];
                $lectUrl = "../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/cource/".$name."";
                $lectCreateDate = date('Y-m-d H:m:s',time());
                $lectStatus = $_POST["lectStatus"];
                
                $query = "insert into t_lecture ( lectNum, lectTitle, lectNote, lectDesc, lectUrl, lectCreateDate, lectStatus, coID ) values ( '".$lectNum."', '".$lectTitle."', '".$lectNote."', '".$lectDesc."', '".$lectUrl."', '".$lectCreateDate."', '".$lectStatus."', '".$coID."' )";
                if ( !($res = mysql_query($query)) ){
                    $return['Result'] = "FailInsert";
                    $return['Info'] = "Insert error: ".mysql_error();
                }
                else {
                    //store successfully
                    move_uploaded_file($_FILES[$fileElementName]["tmp_name"], "../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/cource/".$name."");
                    $return['Result'] = "Success";
                    $return['Info'] = "Add lecture successfully";                    
                }
            }
            break;
        }
        
        case "DeleteLecture":{
            $return = array( "Type"=>"", "Info"=>"" );
            $return['Type'] = "DeleteLecture";
            $lectID = $_POST["lectID"];
            $query = "select * from t_lecture where lectID = ".$lectID."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error: ".mysql_error();
            }
            else if ( !($row = mysql_fetch_array($res)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Not exist";
            }
            else {
                $url = $row["lectUrl"];
                if ( !file_exists($url) ){
                    $return['Result'] = "Fail";
                    $return['Info'] = "Lecture is not found";
                }
                else if ( !unlink($url) ){
                    $return['Result'] = "Fail";
                    $return['Info'] = "Cannot delete the lecture";
                }
                else {
                    $query = "delete from t_lecture where lectID = ".$lectID."";
                    if ( !($res = mysql_query($query)) ){
                        $return['Result'] = "Fail";
                        $return['Info'] = "Delete error: ".mysql_error();
                    } 
                    else {
                        $return['Result'] = "Success";
                        $return['Info']  = "Delete lecture successfully";
                    }                    
                }
            }
            break;
        }
        
        case "SelectLecture":{
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"", "LectureArray"=>"" );
            $return['Type'] = "SelectLecture";
            $lectID = $_POST["lectID"];
            $query = "select * from t_lecture where lectID = '".$lectID."'";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error: ".mysql_error();
            }
            else if ( !($row = mysql_fetch_array($res)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "No result";
            }
            else {
                $return['Result'] = "Success";
                $return['Info'] = "Select successfully";
                $return['LectureArray'] = $row;
            }
            break;
        }
        
        case "UpdateLecture":{
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"" );
            $return['Type'] = "UpdateLecture";
            $lectID = $_POST["lectID"];
            $coID = $_POST["coID"];
            $lectUrl = $_POST["lectUrl"];
            $lectNum = $_POST["lectNum"];
            $lectTitle = $_POST["lectTitle"];
            $lectNote = $_POST["lectNote"];
            $lectDesc = $_POST["lectDesc"];
            $lectStatus = $_POST["lectStatus"];
            $query = "update t_lecture set lectNum = '".$lectNum."', lectTitle = '".$lectTitle."', lectNote = '".$lectNote."', lectDesc = '".$lectDesc."', lectStatus = ".$lectStatus." where lectID = ".$lectID."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Update error: ".mysql_error();
            }
            else {
                $return['Result'] = "Success";
                $return['Info'] = "Update successfully";
            }
            break;
        }
        
        default: break;
    }
    echo json_encode($return);
?>

















