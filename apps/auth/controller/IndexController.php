<?php
/**
 * author: steven
 * date: 4/22/17 2:23 AM
 */

namespace Portal\Auth\Controller;

use Portal\Common\Controller\BaseController;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $this->getDocument()->getHeader()->setStylesheets([
            '/css/auth.css'
        ]);

        $this->render('index', 'layout2');
    }

    function getViewDir()
    {
        return __DIR__ . "/../view/";
    }
}