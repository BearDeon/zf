<?php

namespace Helloworld\Entity;

class Host{
    
    protected $ip;
    protected $hostname;
    
    public function getHostName(){
        return $this->hostname;
    }
    
    public function getIp(){
        return $this->ip;
    }
}
