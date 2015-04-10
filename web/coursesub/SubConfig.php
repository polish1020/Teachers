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
    switch ($Type) {
    	case 'SearchSubItems': $return = searchSubItems();break;
    	//case 'SaveSub': $return  = saveSub();break;
    	default: break;
    }
    echo json_encode($return);
?>

<?php
	function searchSubItems(){
		$return = array("Type" => "", "Result" => "", "Info" => "", "Items" => "");
		$return['Type'] = "SearchSubItems";
		$subDifficulty = $_POST["subDifficulty"];
		$subType = $_POST['subType'];
		$coID = $_POST['coID'];

		if($subDifficulty != 0 && $subType != 0){
			$query = 'select SID, subID, subTitle, subCont, subType, subDifficulty, Answer, subDesc from t_sublib where coID = '.$coID.' and subType = '.$subType.' and subDifficulty = '.$subDifficulty.''; 	
		} else if($subDifficulty != 0 && $subType == 0){
			$query = 'select SID, subID, subTitle, subCont, subType, subDifficulty, Answer, subDesc from t_sublib where coID = '.$coID.' and subDifficulty = '.$subDifficulty.''; 	
		} else if($subDifficulty == 0 && $subType != 0){
			$query = 'select SID, subID, subTitle, subCont, subType, subDifficulty, Answer, subDesc from t_sublib where coID = '.$coID.' and subType = '.$subType.''; 	
		} else {
			$query = 'select SID, subID, subTitle, subCont, subType, subDifficulty, Answer, subDesc from t_sublib where coID = '.$coID.'';
		}
		if( !($res = mysql_query($query)) ){
			$return['Result'] = 'Fail';
			$return['Info'] = 'selct sub error: '.mysql_error();
		} else{
			$count = 0;
			while($row = mysql_fetch_array($res)){
				$return['Items'][$count++] = $row;
			}
			if($count == 0){
				$return['Result'] = 'None';
			} else {
				$return['Result'] = 'Success';
			}
		}
		return $return;
	}

/*	function saveSub(){
		$return = array( "Type" => "", "Result" => "", "Info" => "" );
		$return['Type'] = "SaveSub";

		$coID = $_POST['coID'];
		$subType = $_POST['subType'];
		$subDifficulty = $_POST['subDifficulty'];
		$subCont = $_POST['subCont'];
		$Answer = $_POST['Answer'];
		$subTitle = $_POST['subTitle'];
		$subDesc = $_POST['subDesc'];
		$subID  = 0;
		$subCatID
		$status = 1;
		$subFlag = 0;
		$creator = 0;


		$query = 0;
	}*/
?>