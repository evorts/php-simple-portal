<?php
/**
 * author: steven
 * date: 4/25/17 1:06 PM
 */

namespace Portal\Common\Model;

class ConfigSessionModel
{
    /** @var  string */
    private $savePath;
    /** @var  string */
    private $saveHandler;

    /**
     * ConfigSessionModel constructor.
     * @param array $params
     */
    public function __construct($params = [])
    {
        if(!empty($params)){
            foreach ($params as $k => $v){
                $this->{$k} = $v;
            }
        }
    }


    /**
     * @return string
     */
    public function getSavePath()
    {
        return $this->savePath;
    }

    /**
     * @param string $savePath
     */
    public function setSavePath($savePath)
    {
        $this->savePath = $savePath;
    }

    /**
     * @return string
     */
    public function getSaveHandler()
    {
        return $this->saveHandler;
    }

    /**
     * @param string $saveHandler
     */
    public function setSaveHandler($saveHandler)
    {
        $this->saveHandler = $saveHandler;
    }

}