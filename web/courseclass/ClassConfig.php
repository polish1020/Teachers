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
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"" );
            $return['Type'] = "DeleteClass";
            $classID = $_POST["classID"];
            //删除班级同时删除所有学生课程关系，同时删除所有t_student中有而t_relclassstudent没有的学生
            //对于classID对应的每个学生，如果在relclassstudent没有其他的记录，则从t_student中删除该学生的记录
            //然后从t_relclassstudent中删掉所有classID对应的记录
            $query = "delete from t_relclassstudent where classID = ".$classID."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Delete student error";
            }
            else {
                $query = "delete from t_class where classID = ".$classID."";
                if ( !($res = mysql_query($query)) ){
                    $return['Result'] = "Fail";
                    $return['Info'] = "Delete error: ".mysql_error();
                }
                else {
                    $return['Result'] = "Success";
                    $return['Info'] = "Delete Successfully";
                }
            }
            break;
        }
        
        case "SelectClass":{
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"", "ClassArray"=>"" );
            $return['Type'] = "SelectClass";
            $classID = $_POST["classID"];
            $query = "select * from t_class where classID = ".$classID."";
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error: ".mysql_error();
            }
            else if ( !($row = mysql_fetch_array($res)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "No Result";
            }
            else {
                $return['Result'] = "Success";
                $return['Info'] = "Select Successfully";
                $return['ClassArray'] = $row;
            }
            break;
        }
        
        case "UpdateClass":{
            //判断修改的班级名称是否和其他班级重复
            $return = array( "Type"=>"", "Result"=>"", "Info"=>"" );
            $return['Type'] = "UpdateClass";
            $classID = $_POST["classID"];
            $className = $_POST["className"];
            $classStatus = $_POST["classStatus"];
            $classDesc = $_POST["classDesc"];
            $query = "select * from t_class where classID != ".$classID." and className = '".$className."'";//判断className重复
            if ( !($res = mysql_query($query)) ){
                $return['Result'] = "Fail";
                $return['Info'] = "Select error: ".mysql_error();
            }
            else if ( $row = mysql_fetch_array($res) ){
                $return['Result'] = "Exist";
                $return['Info'] = "Cannot use this name of class";
            }
            else {
                $query = "update t_class set className = '".$className."', classDesc = '".$classDesc."', classStatus = ".$classStatus." where classID = ".$classID."";
                if ( !($res = mysql_query($query)) ){
                    $return['Result'] = "Fail";
                    $return['Info'] = "Update error: ".mysql_error();
                }
                else {
                    $return['Result'] = "Success";
                    $return['Info'] = "Update Successfully";
                }
            }
            break;
        }
        
        default : break;
    }
    echo json_encode($return);
?>
















