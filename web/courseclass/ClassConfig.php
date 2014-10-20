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
        case "SearchClass":{
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"", "ClassArray"=>"", "Count"=>"" );
            $return['Type'] = "SearchClass";
            $coID = $_POST["coID"];
            $query = "select * from t_class where coID = ".$coID."";
            if ( !$res = mysql_query($query) ){
                $return["Result"] = "Fail";
                $return["Info"] = "Select error: ".mysql_error();
            }
            else {
                $return['Count'] = 0;
                while( $row = mysql_fetch_array($res) ){
                    $return['ClassArray'][$return['Count']] = $row;
                    $return['Count'] ++;
                }
                if ( $return['Count'] == 0 ){
                    $return['Result'] = "None";
                    $return['Info'] = "No result";
                }
                else {
                    $return['Result'] = "Success";
                    $return['Info'] = "Search successfully";
                }
            }
            break;
        }
        
        case "AddClass":{
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"" );
            $return['Type'] = "AddClass";
            $coID = $_POST["coID"];
            $className = $_POST["className"];
            $classDesc = $_POST["classDesc"];
            $classStatus = $_POST["classStatus"];
            $createAt = date('Y-m-d H:m:s',time());
            $query = "select * from t_class where className = '".$className."' and coID = ".$coID."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error: ".mysql_error();
            }
            else if ( $row = mysql_fetch_array($res) ){
                $return['Result'] = "Fail";
                $return['Info'] = "This class already exists";
            }
            else {
                $query = "insert into t_class ( className, classDesc, classStatus, coID, CreateAt ) values ( '".$className."', '".$classDesc."', ".$classStatus.", ".$coID.", '".$createAt."' )";
                if ( !($res = mysql_query($query)) ){
                    $return['Result'] = "Fail";
                    $return['Info'] = "Insert error:".mysql_error();
                }
                else {
                    $return['Result'] = "Success";
                    $return['Info'] = "Add class successfully";
                }
            }
            break;
        }
        
        case "DeleteClass":{
            break;
        }
        
        case "SelectClass":{
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"", "ClassArray"=>"" );
            $return['Type'] = "SelectClass";
            $classID = $_POST["classID"];
            $query = "";
            break;
        }
        
        case "UpdateClass":{
            //判断修改的班级名称是否和其他班级重复
            break;
        }
        
        default : break;
    }
    echo json_encode($return);
?>
















