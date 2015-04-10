TYPE=VIEW
query=select `V_UserInfo_Tea`.`uID` AS `uID`,`V_UserInfo_Tea`.`uName` AS `uName`,`V_UserInfo_Tea`.`uPwd` AS `uPwd`,`V_UserInfo_Tea`.`uNum` AS `uNum`,`V_UserInfo_Tea`.`uType` AS `uType`,`V_UserInfo_Tea`.`uStatus` AS `uStatus` from `db_common`.`V_UserInfo_Tea` union select `V_UserInfo_Stu_01`.`uID` AS `uID`,`V_UserInfo_Stu_01`.`uName` AS `uName`,`V_UserInfo_Stu_01`.`uPwd` AS `uPwd`,`V_UserInfo_Stu_01`.`uNum` AS `uNum`,`V_UserInfo_Stu_01`.`uType` AS `uType`,`V_UserInfo_Stu_01`.`uStatus` AS `uStatus` from `db_common`.`V_UserInfo_Stu_01` union select `V_UserInfo_Stu_02`.`uID` AS `uID`,`V_UserInfo_Stu_02`.`uName` AS `uName`,`V_UserInfo_Stu_02`.`uPwd` AS `uPwd`,`V_UserInfo_Stu_02`.`uNum` AS `uNum`,`V_UserInfo_Stu_02`.`uType` AS `uType`,`V_UserInfo_Stu_02`.`uStatus` AS `uStatus` from `db_common`.`V_UserInfo_Stu_02`
md5=38c8e68b28dbe6affc5a0de717ae26b3
updatable=0
algorithm=0
definer_user=exam
definer_host=%
suid=2
with_check_option=0
timestamp=2014-08-10 00:48:21
create-version=1
source=select * from db_common.V_UserInfo_Tea\n\nunion\n\nselect * from db_common.V_UserInfo_Stu_01\n\n\nunion\n\nselect * from db_common.V_UserInfo_Stu_02
client_cs_name=latin1
connection_cl_name=latin1_swedish_ci
view_body_utf8=select `V_UserInfo_Tea`.`uID` AS `uID`,`V_UserInfo_Tea`.`uName` AS `uName`,`V_UserInfo_Tea`.`uPwd` AS `uPwd`,`V_UserInfo_Tea`.`uNum` AS `uNum`,`V_UserInfo_Tea`.`uType` AS `uType`,`V_UserInfo_Tea`.`uStatus` AS `uStatus` from `db_common`.`V_UserInfo_Tea` union select `V_UserInfo_Stu_01`.`uID` AS `uID`,`V_UserInfo_Stu_01`.`uName` AS `uName`,`V_UserInfo_Stu_01`.`uPwd` AS `uPwd`,`V_UserInfo_Stu_01`.`uNum` AS `uNum`,`V_UserInfo_Stu_01`.`uType` AS `uType`,`V_UserInfo_Stu_01`.`uStatus` AS `uStatus` from `db_common`.`V_UserInfo_Stu_01` union select `V_UserInfo_Stu_02`.`uID` AS `uID`,`V_UserInfo_Stu_02`.`uName` AS `uName`,`V_UserInfo_Stu_02`.`uPwd` AS `uPwd`,`V_UserInfo_Stu_02`.`uNum` AS `uNum`,`V_UserInfo_Stu_02`.`uType` AS `uType`,`V_UserInfo_Stu_02`.`uStatus` AS `uStatus` from `db_common`.`V_UserInfo_Stu_02`
