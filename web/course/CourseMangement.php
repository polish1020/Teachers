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
        case "SearchCourse":{
            $return = array("Type"=>"", "Result"=>"", "CourseArray"=>"", "Info"=>"", "Count"=>"");
            $return['Type'] = "SearchCourse";
            $coYear = $_POST["coYear"];
            $coTerm = $_POST["coTerm"];
            if ( $coTerm == "所有" ){
                $query = "select * from t_course where techID = '".$techID."' and coYear = '".$coYear."'";   
            }
            else {
                $query = "select * from t_course where techID = '".$techID."' and coYear = '".$coYear."' and coTerm = '".$coTerm."'";
            }

            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error:".mysql_error();
            }
            else {
                $return['Count'] = 0;
                while ( $row = mysql_fetch_array($res) ){
                    $return['CourseArray'][$return['Count']] = $row;
                    $return['Count'] ++ ;
                }
            }
            if ( $return['Count'] == 0 ){
                $return['Result'] = "None";
                $return['Info'] = "Have no result";
            }
            else {
                $return['Result'] = "Success";
                $return['Info'] = "Search successfully";
            }
            break;
        }
        
        case "DeleteCourse":{
            $return = array("Type"=>"", "Result"=>"", "Info"=>"");
            $return['Type'] = "DeleteCourse";
            $coID = $_POST["coID"];
            $coYear = $_POST["coYear"];
            $query = "delete from t_course where coID = ".$coID."";
            if( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Delete error:".mysql_error();
            }
            else {
                $return['Result'] = "Success";
                $dir = "../../teacherdata/".$uNum."/lesson/".$coYear."/".$coID."";
                if ( FileDelete($dir) ){
                    $return['Info'] = "Delete successfully";
                }
                else {
                    $return['Info'] = "Delete successfully but cannot delete all the files";
                }
            }            
            break;
        }

        case "SelectCourse":{
            $return = array("Type"=>"", "Result"=>"", "CourseArray"=>"", "Info"=>"");
            $return['Type'] = "SelectCourse";
            $coID = $_POST["coID"];
            $query = "select * from t_course where coID = ".$coID."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error:".mysql_error();
            }
            else if ( !($row = mysql_fetch_array($res)) ){
                $return['Result'] = "None";
                $return['Info'] = "No result";
            }
            else {
                $return['Result'] = "Success";
                $return['Info'] = "Select successfully";
                $return['CourseArray'] = $row;
            }
            break;
        }

        case "UpdateCourse":{
            $return = array("Type"=>"", "Result"=>"", "Info"=>"");
            $return['Type'] = "UpdateCourse";
            break;
        }

        default : break;
    }
    echo json_encode($return);
?>








