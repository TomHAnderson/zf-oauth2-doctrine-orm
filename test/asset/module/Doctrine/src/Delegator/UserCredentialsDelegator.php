<?php

namespace ZFTest\OAuth2\Doctrine\Delegator;

use OAuth2\Storage\UserCredentialsInterface;
use ZF\OAuth2\Doctrine\Delegator\DelegatorInterface;
use ZF\OAuth2\Doctrine\Delegator\DelegatorTrait;

final class UserCredentialsDelegator implements
    UserCredentialsInterface,
    DelegatorInterface
{
    use DelegatorTrait;

    public function checkUserCredentials($username, $password)
    {
        if ($username == 'test_delegator_true') {
            return true;
        }

        if ($username == 'test_delegator_false') {
            return false;
        }

        return null;
    }

    public function getUserDetails($username)
    {
        return null;
    }
}
