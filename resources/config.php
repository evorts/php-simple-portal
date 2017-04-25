<?php
/**
 * author: steven
 * date: 4/21/17 7:54 PM
 */

include("prohibit.php");

return [
    'session' => [
        'savePath'    => APP_PATH . '/resources/session.db',
        'saveHandler' => 'sqlite'
    ],
    'user'    => [
        'domainLimitation' => ['mataharimall.com']
    ]
];