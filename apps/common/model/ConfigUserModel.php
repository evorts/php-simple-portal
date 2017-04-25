<?php
/**
 * author: steven
 * date: 4/25/17 1:07 PM
 */

namespace Portal\Common\Model;

class ConfigUserModel
{
    /** @var  array */
    private $domainLimitation;

    /**
     * ConfigUserModel constructor.
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
     * @return array
     */
    public function getDomainLimitation()
    {
        return $this->domainLimitation;
    }

    /**
     * @param array $domainLimitation
     */
    public function setDomainLimitation($domainLimitation)
    {
        $this->domainLimitation = $domainLimitation;
    }

}