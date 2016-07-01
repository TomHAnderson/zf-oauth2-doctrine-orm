<?php

namespace ZFTest\OAuth2\Doctrine\Delegator;

use OAuth2\Storage\UserCredentialsInterface;

final class UserCredentialsDelegator implements
    UserCredentialsInterface
{
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
