TYPE=VIEW
query=select `db_cjh`.`T_Student`.`stuID` AS `uID`,`db_cjh`.`T_Student`.`stuName` AS `uName`,`db_cjh`.`T_Student`.`stuPasswd` AS `uPwd`,`db_cjh`.`T_Student`.`stuNumber` AS `uNum`,\'stu\' AS `uType`,`db_cjh`.`T_Student`.`stuStatus` AS `uStatus` from `db_cjh`.`T_Student`
md5=e57665d99d10fa258ef508c711ebe75a
updatable=1
algorithm=0
definer_user=exam
definer_host=%
suid=2
with_check_option=0
timestamp=2014-08-10 00:48:21
create-version=1
source=/*This is for teacher cjh*/\nselect stuID as uID,stuName as uName,stuPasswd as uPwd,\n stuNumber as uNum,\'stu\' as uType,`stuStatus` as uStatus \nfrom db_cjh.T_Student \n\n/* \nIf there are any other teachers, use union to combine it.\n*/\n\n;
client_cs_name=latin1
connection_cl_name=latin1_swedish_ci
view_body_utf8=select `db_cjh`.`T_Student`.`stuID` AS `uID`,`db_cjh`.`T_Student`.`stuName` AS `uName`,`db_cjh`.`T_Student`.`stuPasswd` AS `uPwd`,`db_cjh`.`T_Student`.`stuNumber` AS `uNum`,\'stu\' AS `uType`,`db_cjh`.`T_Student`.`stuStatus` AS `uStatus` from `db_cjh`.`T_Student`
