<?php

/**
 * This doctrine event subscriber will join a user table to the client table
 * thereby freeing the user table from the OAuth2 contraints
 */

namespace ZF\OAuth2\Doctrine\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\ODM\MongoDB\Event\LoadClassMetadataEventArgs;

class OdmDynamicMappingSubscriber implements EventSubscriber
{
    protected $config = array();

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubscribedEvents()
    {
        return array(
            Events::loadClassMetadata,
        );
    }

    /**
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        // the $metadata is the whole mapping info for this class
        $metadata = $eventArgs->getClassMetadata();

        switch ($metadata->getName()) {
            case $this->config['user_document']['entity']:
                $metadata->mapOneToMany(array(
                    'targetEntity' => $this->config['client_document']['entity'],
                    'fieldName' => $this->config['client_document']['field'],
                    'mappedBy' => $this->config['user_document']['field'],
                ));

                $metadata->mapOneToMany(array(
                    'targetEntity' => $this->config['access_token_document']['entity'],
                    'fieldName' => $this->config['access_token_document']['field'],
                    'mappedBy' => $this->config['user_document']['field'],
                ));

                $metadata->mapOneToMany(array(
                    'targetEntity' => $this->config['authorization_code_document']['entity'],
                    'fieldName' => $this->config['authorization_code_document']['field'],
                    'mappedBy' => $this->config['user_document']['field'],
                ));

                $metadata->mapOneToMany(array(
                    'targetEntity' => $this->config['refresh_token_document']['entity'],
                    'fieldName' => $this->config['refresh_token_document']['field'],
                    'mappedBy' => $this->config['user_document']['field'],
                ));
                break;

            case $this->config['client_document']['entity']:
                break;
            case $this->config['access_token_document']['entity']:
                break;
            case $this->config['authorization_code_document']['entity']:
                break;
            case $this->config['refresh_token_document']['entity']:
                break;
            default:
                break;
        }
    }
}
