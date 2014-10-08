<?php

require_once('common/config.php');
require_once('lib/DataAccess.php');
require_once('lib/UserModel.php');
require_once('lib/UserView.php');
require_once('lib/UserController.php');

$dao = new DataAccess ('localhost','root','root','db_cjh');

$userModel = new UserModel($dao);

$userController = new UserController($userModel,$_GET);

echo $userController->display();

?>