<?php
    session_start();
    if(!isset($_SESSION['uNum'])){
	    header("location: ../index.php");
	    exit;
    }

    include_once("../common/FileCopy.php");
    include_once("../common/FileDelete.php");
    include_once("../common/conn_database.php");
    $techID = $_SESSION["uid"];
    $uNum = $_SESSION["uNum"];
    mysql_select_db("db_".$uNum);
    $Type = $_POST["Type"];
    switch ( $Type ){
        case "SearchLecture":{
            $return = array ( "Type"=>"", "Result"=>"", "Info"=>"", "LectureArray"=>"" );
            $return['Type'] = "SearchLecture";
            $coID = $_POST["coID"];
            $query = "select * from t_lecture where coID = ".$coID."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error: ".mysql_error();
            }
            else if ( !($row = mysql_fetch_array($res)) ){
                $return['Result'] = "None";
                $return['Info'] = "Record is empty";
            }
            else {
                $return['Result'] = "Success";
                $return['Info'] = "Search successfully";
                $return['LectureArray'] = $row;
            }
            break;
        }
        
        case "AddLecture":{
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"" );
            $return['Type'] = "AddLecture";
            $fileElementName = $_POST["FileID"];
            $coYear = $_POST["Year"];
            $coID = $_POST["ID"];
            if ( !empty($_FILES[$fileElementName]["error"]) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Upload error: ".$_FILES[$fileElementName]["error"];
            }
            else if ( file_exists("../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/cource/".$_FILES[$fileElementName]["name"]."") ){
                $return['Result'] = "Fail";
                $return['Info'] = $_FILES[$fileElementName]["name"]." is already exist";
            }
            else {
                move_uploaded_file($_FILES[$fileElementName]["tmp_name"], "../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/cource/".$_FILES[$fileElementName]["name"]."");
                //store successfully
                $lectNum = $_POST["Num"];
                $lectTitle = $_POST["Title"];
                $lectNote = $_POST["Note"];
                $lectUrl = "../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."/cource/".$_FILES[$fileElementName]["name"]."";
                $lectCreataDate = date('Y-m-d H:m:s',time());
                $lectStatus = $_POST["Status"];
                $coID = $_POST["ID"];
                $query = "  ";
            }
            break;
        }
        
        default: break;
    }
    echo json_encode($return);
?>

















