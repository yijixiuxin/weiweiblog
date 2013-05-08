<?php  if ( ! defined('APPPATH')) exit('not permission');
//此文件用户配置数据库链接配置

if (getenv('HTTP_BAE_ENV_ADDR_SQL_IP')) {
	$db_hostname = getenv('HTTP_BAE_ENV_ADDR_SQL_IP').':'.getenv('HTTP_BAE_ENV_ADDR_SQL_PORT');
	$db_username = getenv('HTTP_BAE_ENV_AK');
	$db_password = getenv('HTTP_BAE_ENV_SK');
	$db_database = 'ZMIHpJEtXwaHfHvucDhG';
	$db_port = '3306';
} else {
	$db_hostname = 'localhost';
	$db_username = 'root';
	$db_password = '111111';
	$db_database = 'weiweiblog';
	$db_port = '3306';
}
$db_charset = 'utf8';
