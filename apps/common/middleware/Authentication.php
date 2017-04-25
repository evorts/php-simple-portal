<?php
/**
 * author: steven
 * date: 4/24/17 10:10 AM
 */

namespace Portal\Common\Middleware;

use Portal\Common\Library\CookieTools;
use Portal\Common\Library\RequestTools;

class Authentication extends Middleware
{
    public static $COOKIE_AUTH_NAME = 'EVOA';

    public function run()
    {
        $authCookie = CookieTools::getCookie(self::$COOKIE_AUTH_NAME);

        if (!empty($authCookie)) {
            //check authentication
        } else {
            RequestTools::redirectTemporary(RequestTools::getRequestBaseUrl() . '/auth');
        }
    }
}