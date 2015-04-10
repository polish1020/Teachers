TYPE=VIEW
query=select `db_common`.`T_Teacher`.`teaID` AS `uID`,`db_common`.`T_Teacher`.`teaName` AS `uName`,`db_common`.`T_Teacher`.`teaPasswd` AS `uPwd`,`db_common`.`T_Teacher`.`teaWorkNum` AS `uNum`,\'adm\' AS `uType`,`db_common`.`T_Teacher`.`teaStatus` AS `uStatus` from `db_common`.`T_Teacher` where (`db_common`.`T_Teacher`.`IsAdmin` = 1) union select `db_common`.`T_Teacher`.`teaID` AS `uID`,`db_common`.`T_Teacher`.`teaName` AS `uName`,`db_common`.`T_Teacher`.`teaPasswd` AS `uPwd`,`db_common`.`T_Teacher`.`teaWorkNum` AS `uNum`,\'tea\' AS `uType`,`db_common`.`T_Teacher`.`teaStatus` AS `uStatus` from `db_common`.`T_Teacher` where (`db_common`.`T_Teacher`.`IsAdmin` = 0)
md5=562016922e66b1242d8b8079ea469dd9
updatable=0
algorithm=0
definer_user=exam
definer_host=%
suid=2
with_check_option=0
timestamp=2014-08-10 00:48:21
create-version=1
source=/*For Admin*/\nselect teaID as uID,teaName as uName,teaPasswd as uPwd,\n teaWorkNum as uNum,\'adm\' as uType,teaStatus as uStatus \nfrom db_common.T_Teacher where IsAdmin=1\n\nunion\n\n/*For Teacher*/\nselect teaID as uID,teaName as uName,teaPasswd as uPwd,\n teaWorkNum as uNum,\'tea\' as uType,teaStatus as uStatus \nfrom db_common.T_Teacher where IsAdmin=0\n;
client_cs_name=latin1
connection_cl_name=latin1_swedish_ci
view_body_utf8=select `db_common`.`T_Teacher`.`teaID` AS `uID`,`db_common`.`T_Teacher`.`teaName` AS `uName`,`db_common`.`T_Teacher`.`teaPasswd` AS `uPwd`,`db_common`.`T_Teacher`.`teaWorkNum` AS `uNum`,\'adm\' AS `uType`,`db_common`.`T_Teacher`.`teaStatus` AS `uStatus` from `db_common`.`T_Teacher` where (`db_common`.`T_Teacher`.`IsAdmin` = 1) union select `db_common`.`T_Teacher`.`teaID` AS `uID`,`db_common`.`T_Teacher`.`teaName` AS `uName`,`db_common`.`T_Teacher`.`teaPasswd` AS `uPwd`,`db_common`.`T_Teacher`.`teaWorkNum` AS `uNum`,\'tea\' AS `uType`,`db_common`.`T_Teacher`.`teaStatus` AS `uStatus` from `db_common`.`T_Teacher` where (`db_common`.`T_Teacher`.`IsAdmin` = 0)
