<?php
/**
 * author: steven
 * date: 4/25/17 10:07 AM
 */

namespace Portal\Common\Library;

use Portal\Common\Enum\HttpStatus;

class RequestTools
{
    /**
     * @param string $url
     * @param int $httpCode
     */
    public static function redirect($url, $httpCode){
        header("Location: {$url}", true, $httpCode);
        exit;
    }

    /**
     * @param string $url
     */
    public static function redirectTemporary($url){
        self::redirect($url, HttpStatus::FOUND);
    }

    /**
     * @param string $url
     */
    public static function redirectPermanent($url){
        self::redirect($url, HttpStatus::MOVED_PERMANENTLY);
    }

    public static function getRequestProtocol(){
        $protocol = $_SERVER['HTTP_X_FORWARDED_PROTO'] ?: ($_SERVER['SERVER_PROTOCOL'] ?: $_SERVER['REQUEST_SCHEME']);
        if(!empty($protocol) && strpos(strtolower($protocol), 'https') !== false){
            return 'https';
        } else {
            return 'http';
        }
    }

    public static function getBaseRequestProtocol(){
        return self::getRequestProtocol() . '://';
    }

    public static function getRequestRemoteIp(){
        return $_SERVER['HTTP_X_FORWARDED_FOR'] ?: $_SERVER['REMOTE_ADDR'];
    }

    public static function getRequestDomain(){
        return $_SERVER['HTTP_HOST'] ?: $_SERVER['SERVER_NAME'];
    }

    public static function getRequestBaseUrl(){
        return self::getBaseRequestProtocol() . self::getRequestDomain();
    }
}