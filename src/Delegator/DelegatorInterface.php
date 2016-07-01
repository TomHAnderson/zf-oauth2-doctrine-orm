<?php

namespace ZF\OAuth2\Doctrine\Delegator;

use ZF\OAuth2\Doctrine\Adapter\DoctrineAdapter;

interface DelegatorInterface
{
    public function setDoctrineAdapter(DoctrineAdapter $doctrineAdapter);
    public function getDoctrineAdapter();
}