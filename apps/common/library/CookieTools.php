<?php
/**
 * author: steven
 * date: 4/25/17 9:42 AM
 */

namespace Portal\Common\Library;

use Portal\Common\Model\CookieModel;

class CookieTools
{
    /**
     * @param string|array $cookieName
     * @return string|array
     */
    public static function getCookie($cookieName){
        if(is_array($cookieName)){
            $result = [];
            foreach ($cookieName as $name){
                if(isset($_COOKIE[$name])){
                    $result[$name] = $_COOKIE[$name];
                }
            }
            return $result;
        } else {
            if(isset($_COOKIE[$cookieName])){
                return $_COOKIE[$cookieName];
            }
            return null;
        }
    }

    /**
     * @param CookieModel|CookieModel[] $cookies
     */
    public static function setCookie($cookies){
        if(is_array($cookies)){
            foreach ($cookies as $cookie){
                setcookie($cookie->getName(),
                    $cookie->getValue(),
                    $cookie->getExpired(),
                    $cookie->getPath(),
                    $cookie->getDomain(),
                    $cookie->isSecure(),
                    $cookie->isHttpOnly());
            }
        } else {
            setcookie($cookies->getName(),
                $cookies->getValue(),
                $cookies->getExpired(),
                $cookies->getPath(),
                $cookies->getDomain(),
                $cookies->isSecure(),
                $cookies->isHttpOnly());
        }
    }

    /**
     * @param string|array $cookies
     */
    public static function removeCookie($cookies){
        if(is_array($cookies)){
            foreach ($cookies as $cookieName){
                if(!empty($cookieName)){
                    setcookie($cookieName, null, -1);
                }
            }
        } else {
            setcookie($cookies, null, -1, '/');
        }
    }
}