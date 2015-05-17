<?php
	include_once("../login/checkloginstu.php");
    include_once("../common/FileCopy.php");
    include_once("../common/FileDelete.php");
    include_once("../common/conn_database.php");

    $stuNumber = $_SESSION["uNum"];
    $userList = $_SESSION["userList"];

    $Type = $_POST["Type"];
    switch($Type) {
    	case 'SearchCourse': $return = searchCourse($stuNumber, $userList);break;
    	default: break;
    }
    echo json_encode($return);
?>

<?php
	function searchCourse($stuNumber, $userList) {
		$return = array("Type"=>"SearchCourse", "Result"=>"", "CourseArray"=>"", "Info"=>"", "Count"=>"");
		$count = count($userList);
        $return["Count"] = 0;
        for ($i = 0; $i < $count; $i++) {
            $stuID = $userList[$i]["uID"];
            $stuNumber = $stuNumber;
            $stuName = $userList[$i]["uName"];
            $teaID = $userList[$i]["teaID"];
            $classID = $userList[$i]["classID"];
            $coID = $userList[$i]["coID"];
            $coYear = $_POST["coYear"];
            $coTerm = $_POST["coTerm"];

            // 映射教师数据库
            $query = 'select * from db_common.t_teacher where teaID = '.$teaID.'';
            if(!($res = mysql_query($query))) {
                $return["Result"] = "Fail";
                $return["Info"] = "select teacher error: " . mysql_error(); 
                return $return;
            } else if (!($row = mysql_fetch_array($res))) {
                $return["Result"] = "Fail";
                $return["Info"] = "none of teacher";
                return $return;
            } else {
                $Teacher = $row;
                $teaNum = $row["teaWorkNum"];
            }

            // 查找相应课程
            if ( $coTerm == "所有" ){
                $query = 'select * from db_'.$teaNum.'.t_course where coID = '.$coID.' and coYear = "'.$coYear.'"';   
            }
            else {
                $query = 'select * from db_'.$teaNum.'.t_course where coID = '.$coID.' and coYear = "'.$coYear.'" and coTerm = "'.$coTerm.'"'; 
            }

            if(!($res = mysql_query($query))) {
                $return["Result"] = "Fail";
                $return["Info"] = "select course error: " . mysql_error(); 
                return $return;
            } else if (!($row = mysql_fetch_array($res))) {
                continue;
            } else {
                $course = $row;
                $return["Count"] ++;
            }

            // 查找相应班级
            $query = 'select * from db_'.$teaNum.'.t_class where classID = '.$classID.'';
            if(!($res = mysql_query($query))) {
                $return["Result"] = "Fail";
                $return["Info"] = "select class error: " . mysql_error(); 
                return $return;
            } else if (!($row = mysql_fetch_array($res))) {
                $return["Result"] = "Fail";
                $return["Info"] = "none of class";
                return $return;
            } else {
                $class = $row;
            }

            // combine
            $return["CourseArray"][$i] = array(
                "coID"=>$coID, 
                "coBH"=>$course["coBH"], 
                "coName"=>$course["coName"], 
                "coYear"=>$course["coYear"],
                "coTerm"=>$course["coTerm"],
                "coTeacher"=>$Teacher["teaName"],
                "teaNum"=>$teaNum,
                "teaID"=>$teaID
                );
        }
        if ($return["Count"] == 0) {
            $return["Result"] = "None";
        } else {
            $return["Result"] = "Success";
            $return["Info"] = "search course successfully";
        }
		return $return;
	}
?>