<?php
/**
 * Created by PhpStorm.
 * User: yg
 * Date: 8/14/17
 * Time: 4:31 PM
 */

require_once 'vendor/autoload.php';
require_once 'JsonLogger.php';

$loggerConfig = array(
    'rootLogger' => array(
        'appenders' => array('default'),
    ),
    'appenders' => array(
        'default' => array(
            'class' => JsonLogger::class,
            'layout' => array(
                'class' => 'LoggerLayoutSimple'
            )
        )
    )
);


Logger::configure($loggerConfig);
$logger = Logger::getLogger("default");

$logger->info("wasdasd");