<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$url = $_SERVER['HTTP_HOST'];
switch ($url) {
    case "localhost":
        $config=dirname(__FILE__).'/protected/config/dev.php';
        break;
    default:
        $config=dirname(__FILE__).'/protected/config/main.php';
        break;
}
//$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
