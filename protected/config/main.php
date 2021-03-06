<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Lasso',

	// preloading 'log' component
	'preload'=>array('log', 'urlAccess'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                 'application.extensions.*',
                'ext.yii-mail.YiiMailMessage',
                'ext.timepicker.EJuiDateTimePicker',
                'ext.EchMultiSelect.EchMultiSelect',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
            'cal' => array(
                    'debug' => true // For first run only!
                ),
		
	),

	// application components
	'components'=>array(
             'bootstrap' => array(
	    'class' => 'ext.bootstrap.components.Bootstrap',
//	    'responsiveCss' => false,
//                'coreCss' => true,
//                'ajaxCssImport' => true,
	),
		'user'=>array(
                        'class' => 'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        'loginUrl'=>array('admin/login'),
		),
             //image extension 
            'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'/opt/local/bin'),
                ),
                
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
                        'urlFormat'=>'path',
			'showScriptName'=>false,
//                        'caseSensitive'=>false,
			'rules'=>array(
//                            'search'=>'site/search',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=lasso_dreamax',
			'emulatePrepare' => true,
			'username' => 'lasso',
			'password' => 'XiiggtxK',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
                                        'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
//					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
//				// uncomment the following to show log messages on web pages
//				/*
//				array(
//					'class'=>'CWebLogRoute',
//				),
//				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);