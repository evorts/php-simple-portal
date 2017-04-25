<?php
/**
 * Author: steven
 * Date: 12/20/16
 * Time: 6:46 PM
 */

namespace Portal\Common\Enum;


abstract class HttpStatus
{
    const OK                              = 200;
    const CREATED                         = 201;
    const ACCEPTED                        = 202;
    const NO_CONTENT                      = 204;
    const RESET_CONTENT                   = 205;
    const PARTIAL_CONTENT                 = 206;
    const MULTIPLE_CHOICES                = 300;
    const MOVED_PERMANENTLY               = 301;
    const FOUND                           = 302;
    const NOT_MODIFIED                    = 302;
    const BAD_REQUEST                     = 400;
    const UNAUTHORIZED                    = 401;
    const FORBIDDEN                       = 403;
    const NOT_FOUND                       = 404;
    const METHOD_NOT_ALLOWED              = 405;
    const NOT_ACCEPTABLE                  = 406;
    const REQUEST_TIMEOUT                 = 408;
    const CONFLICT                        = 409;
    const GONE                            = 410;
    const LENGTH_REQUIRED                 = 411;
    const PRECONDITION_FAILED             = 412;
    const PAYLOAD_TOO_LARGE               = 413;
    const URI_TOO_LONG                    = 414;
    const UNSUPPORTED_MEDIA_TYPE          = 415;
    const RANGE_NOT_SATISFIABLE           = 416;
    const EXPECTATION_FAILED              = 417;
    const MISDIRECT_REQUEST               = 421;
    const UN_PROCESSABLE_ENTITY           = 422;
    const LOCKED                          = 423;
    const FAILED_DEPENDENCY               = 424;
    const UPGRADE_REQUIRED                = 426;
    const PRECONDITION_REQUIRED           = 428;
    const TOO_MANY_REQUEST                = 429;
    const REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
    const NO_RESPONSE                     = 444;
    const INTERNAL_SERVER_ERROR           = 500;
    const UNAVAILABLE_FOR_LEGAL_REASON    = 451;
    const SSL_CERTIFICATION_ERROR         = 495;
    const SSL_CERTIFICATION_REQUIRED      = 496;
    const HTTP_REQUEST_SENT_TO_HTTPS_PORT = 497;
    const CLIENT_CLOSED_REQUEST           = 499;
    const NOT_IMPLEMENTED                 = 501;
    const BAD_GATEWAY                     = 502;
    const SERVICE_UNAVAILABLE             = 503;
    const GATEWAY_TIMEOUT                 = 504;
    const HTTP_VERSION_NOT_SUPPORTED      = 505;
    const INSUFFICIENT_STORAGE            = 507;
    const LOOP_DETECTED                   = 508;
    const NO_EXTENDED                     = 510;
    const NETWORK_AUTHENTICATION_REQUIRED = 511;
}