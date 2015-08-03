<?php
// created by Pavel
session_start();
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

function autoload_app($class)
{
	$class = str_replace("_", "/", $class);
	$file  = "../app/" . strtolower($class) . ".php";
	if (file_exists($file)) {
		include $file;
	}
}
// подгрузка классов из libs
function autoload_lib($class)
{
	$file = "../libs/".strtolower($class).".php";
	if (file_exists($file)) {
		include $file;
	}
}
// подгрузка конфиг-файла
function autoload_config($class)
{
	$file = "../config/".strtolower($class).".php";
	if (file_exists($file)) {
		include $file;
	}
}

spl_autoload_register("autoload_app");
spl_autoload_register("autoload_lib");
spl_autoload_register("autoload_config");

//connect Database
AbstractModel::setDB(database::getDB());
$user = new Model_User();
$user->signUpUser();
echo $user->first_name;
//require "../libs/registry.php";
//
//$request = new Request();
//$user = new Model_UserModel();
//$user->authUser($request->email,$request->password);
//echo $_SESSION['user'];

$app = new App();
$app->run();

