<?php
/**
 * author: steven
 * date: 4/25/17 1:20 PM
 */

namespace Portal\Common\Model;

class ConfigModel
{
    /** @var  ConfigSessionModel */
    private $session;
    /** @var  ConfigUserModel */
    private $user;

    /**
     * ConfigModel constructor.
     * @param array $params
     */
    public function __construct($params = [])
    {
        if(!empty($params)){
            foreach ($params as $k => $v){
                if(!empty($v)){
                    if($k == 'session'){
                        $this->{$k} = new ConfigSessionModel($v);
                    } else if($k == 'user'){
                        $this->{$k} = new ConfigUserModel($v);
                    }
                }
            }
        }
    }

    /**
     * @return ConfigSessionModel
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param ConfigSessionModel $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * @return ConfigUserModel
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param ConfigUserModel $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}