<?php
/**
 * author: steven
 * date: 4/22/17 1:32 AM
 */

namespace Portal;

use Portal\Common\Library\Router;
use Portal\Common\Library\SessionHandlerSqlite;
use Portal\Common\Middleware\Authentication;
use Portal\Common\Model\ConfigModel;
use Portal\Common\Model\RouteModel;

class Application
{
    /** @var  ConfigModel */
    private $config;

    /**
     * @return ConfigModel
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param ConfigModel $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    public function run()
    {
        //load configuration
        $this->setConfig(new ConfigModel(require APP_PATH . '/resources/config.php'));

        //custom php session implementation
        //ini_set('session.save_handler', 'sqlite');
        ini_set('session.save_path', $this->getConfig()->getSession()->getSavePath());

        $sqliteSessionHandler = new SessionHandlerSqlite();

        session_set_save_handler(
            array($sqliteSessionHandler, 'open'),
            array($sqliteSessionHandler, 'close'),
            array($sqliteSessionHandler, 'read'),
            array($sqliteSessionHandler, 'write'),
            array($sqliteSessionHandler, 'destroy'),
            array($sqliteSessionHandler, 'gc'));

        session_start();

        $router = new Router();

        $router->addRoute(new RouteModel([
            'path'       => '/',
            'module'     => 'dashboard',
            'controller' => 'index',
            'action'     => 'index',
            'middleware' => new Authentication()
        ]));

        $router->addRoute(new RouteModel([
            'path'       => '/auth',
            'module'     => 'auth',
            'controller' => 'index',
            'action'     => 'index'
        ]));

        $router->execute($this);
    }
}