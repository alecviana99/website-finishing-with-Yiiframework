<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'theme'=>'hebo',
	'language'=>'fr',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
        'application.modules.user.components.*',

	),

	'modules'=>array(
		'user',
		
		'forum'=>array(
			'class'=>'application.modules.bbii.BbiiModule',
			'adminId'=>1,
			'userClass'=>'User',
			'userIdColumn'=>'id',
			'userNameColumn'=>'username',
			
		),
		'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType'=>'smtp',
			'encryption'=>'ssl',
            'transportOptions'=>array(
                'host'=>'<hostanme>',
                'username'=>'<berarale.info@gmail.com>',
                'password'=>'<password>',
                'port'=>'25',                       
            ),
            'viewPath' => 'application.views.mail',             
        
		),
			
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'info',
			'ipFilters'=>array('127.0.0.1',$_SERVER['REMOTE_ADDR'],'::1'),
			//'ipFilters'=>array('193.48.132.5','::1'),
			//'ipFilters'=>array('','',''),
		),
	),

	// application components
	'components'=>array(
		'ftp'=>array(
			'class'=>'application.extensions.ftp.EFtpComponent',
			'host'=>'ftp.rhid.fr',
			'port'=>21,
			'username'=>'rhidfriwfw',
			'password'=>'j5VvjgGe2y9Q',
			'ssl'=>false,
			'timeout'=>90,
			'autoConnect'=>true,
		),
	
		'user'=>array(
                        // enable cookie-based authentication
                        'allowAutoLogin'=>true,
                        'loginUrl' => array('/user/login'),
						
                ),
				
		'session' => array('autoStart'=>true,),
		
				
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'gii'=>'gii',
				'gii/<controller:\w+>'=>'gii/<controller>',
				'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
			),
			'rules'=>array(
				'forum/<controller:\w+>/<action:[\w-]+>'=> 'forum/<controller>/<action>',
				'forum/<controller:\w+>'=>'forum/<controller>',
				'forum'=>'forum',
			),
		),
		 
		'db'=>array(
			//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
			'class'=>'CDbConnection',
            'connectionString'=>'mysql:host=rhidfriwfwrhiddb.mysql.db;dbname=rhidfriwfwrhiddb',
            'username'=>'rhidfriwfwrhiddb',
            'password'=>'J52mAc2g58',
            'emulatePrepare'=>true,
			'tablePrefix' => 'tbl_',
			'charset' => 'utf8',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		
		
		
		
		//parametrage javascript
		' clientScript ' => array (
             ' packages ' => array (
                 ' jquery ' => array (
                     ' baseUrl ' => ' //ajax.googleapis.com/ajax/libs/jquery/1/ ' , 
                      ' js ' => array ( ' jquery.min.js ' ) , 
                  )
             ) , 
          ) , 
		  
		  
		  
		  
	),


	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);

//include('../modules/tcpdf/examples/main.php');