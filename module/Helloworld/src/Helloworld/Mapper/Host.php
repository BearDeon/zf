<?php

namespace Helloworld\Mapper;

use Helloworld\Entity\Host as HostEntity;
use Zend\Stdlib\Hydrator\HydrationInterface;
use Zend\Db\TableGateway;
use Zend\Db\TableGateway\Feature\RowGatewayFeature;

class Host extends TableGateway{
    
    protected $tableName = 'Host';
    protected $idCole = 'id';
    protected $entityPrototype;
    protected $hydrator = null;
    
    public function __construct($adapter) {
        
        parent::__construct(
            $this->tableName, $adapter, new RowGatewayFeature($this->idCol)
        );
        
        $this->entityPrototype = new HostHydrator();
    }
    
    public function findByIp($ip){
        
        return $his->hydrate(
            $this->select(array('ip' => $ip))
        );
    }
    
    public function hydrate($results){
        
        $hosts = new \Zend\Db\ResultSet\HydratingResultSet(
            $this->hydrator,
            $this->entityPrototype
        );
        
        return $hosts->initialize($results->toArray());
    }
}