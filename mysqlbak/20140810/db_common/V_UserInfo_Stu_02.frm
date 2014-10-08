TYPE=VIEW
query=select `db_lhq`.`T_Student`.`stuID` AS `uID`,`db_lhq`.`T_Student`.`stuName` AS `uName`,`db_lhq`.`T_Student`.`stuPasswd` AS `uPwd`,`db_lhq`.`T_Student`.`stuNumber` AS `uNum`,\'stu\' AS `uType`,`db_lhq`.`T_Student`.`stuStatus` AS `uStatus` from `db_lhq`.`T_Student`
md5=475850853326657c47893c1ce56527a2
updatable=1
algorithm=0
definer_user=exam
definer_host=%
suid=2
with_check_option=0
timestamp=2014-08-10 00:48:21
create-version=1
source=/*This is for teacher lhq*/\nselect stuID as uID,stuName as uName,stuPasswd as uPwd,\n stuNumber as uNum,\'stu\' as uType,`stuStatus` as uStatus \nfrom db_lhq.T_Student \n\n/* \nIf there are any other teachers, use union to combine it.\n*/\n\n;
client_cs_name=latin1
connection_cl_name=latin1_swedish_ci
view_body_utf8=select `db_lhq`.`T_Student`.`stuID` AS `uID`,`db_lhq`.`T_Student`.`stuName` AS `uName`,`db_lhq`.`T_Student`.`stuPasswd` AS `uPwd`,`db_lhq`.`T_Student`.`stuNumber` AS `uNum`,\'stu\' AS `uType`,`db_lhq`.`T_Student`.`stuStatus` AS `uStatus` from `db_lhq`.`T_Student`
