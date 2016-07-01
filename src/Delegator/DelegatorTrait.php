<?php

namespace ZF\OAuth2\Doctrine\Delegator;

use ZF\OAuth2\Doctrine\Adapter\DoctrineAdapter;

trait DelegatorTrait
{
    protected $doctrineAdapter;

    public function setDoctrineAdapter(DoctrineAdapter $doctrineAdapter)
    {
        $this->doctrineAdapter = $doctrineAdapter;

        return $this;
    }

    public function getDoctrineAdapter()
    {
        return $this->doctrineAdapter;
    }
}