<?php
/**
 * author: steven
 * date: 4/24/17 10:13 AM
 */

namespace Portal\Common\Middleware;

use Portal\Common\Library\Router;

abstract class Middleware {
    protected $router;

    public abstract function run();

    /**
     * @param Router $router
     */
    public function setRouter($router){
        $this->router = $router;
    }

    /**
     * @return Router
     */
    public function getRouter(){
        return $this->router;
    }
}