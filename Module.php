<?php

namespace ZF\OAuth2\Doctrine;

use Zend\ModuleManager\ModuleManager;
use ZF\OAuth2\Doctrine\EventListener\OrmDynamicMappingSubscriber;
use ZF\OAuth2\Doctrine\EventListener\OdmDynamicMappingSubscriber;
use Doctrine\ORM\Mapping\Driver\XmlDriver as OrmXmlDriver;
use Doctrine\ODM\MongoDB\Mapping\Driver\XmlDriver as OdmXmlDriver;

class Module
{
    public function onBootstrap($e)
    {
        $app     = $e->getParam('application');
        $sm      = $app->getServiceManager();
        $config = $sm->get('Config');


        // Enable default entities
        if (isset($config['zf-oauth2-doctrine']['storage_settings']['enable_default_entities'])
            && $config['zf-oauth2-doctrine']['storage_settings']['enable_default_entities']) {
            $chain = $sm->get($config['zf-oauth2-doctrine']['storage_settings']['driver']);
            $chain->addDriver(new OrmXmlDriver(__DIR__ . '/config/orm'), 'ZF\OAuth2\Doctrine\Entity');
            if (isset($config['zf-oauth2-doctrine']['storage_settings']['dynamic_mapping'])
                && $config['zf-oauth2-doctrine']['storage_settings']['dynamic_mapping']) {
                $userClientSubscriber = new OrmDynamicMappingSubscriber($config['zf-oauth2-doctrine']['storage_settings']['dynamic_mapping']);
            }
        }

        // Enable default documents
        if (isset($config['zf-oauth2-doctrine']['storage_settings']['enable_default_documents'])
            && $config['zf-oauth2-doctrine']['storage_settings']['enable_default_documents']) {
            $chain = $sm->get($config['zf-oauth2-doctrine']['storage_settings']['driver']);
            $chain->addDriver(new OdmXmlDriver(__DIR__ . '/config/odm'), 'ZF\OAuth2\Doctrine\Document');
            if (isset($config['zf-oauth2-doctrine']['storage_settings']['dynamic_mapping'])
                && $config['zf-oauth2-doctrine']['storage_settings']['dynamic_mapping']) {
                $userClientSubscriber = new OdmDynamicMappingSubscriber($config['zf-oauth2-doctrine']['storage_settings']['dynamic_mapping']);
            }
        }

        if (isset($config['zf-oauth2-doctrine']['storage_settings']['dynamic_mapping'])
            && $config['zf-oauth2-doctrine']['storage_settings']['dynamic_mapping']) {
            $eventManager = $sm->get($config['zf-oauth2-doctrine']['storage_settings']['event_manager']);
            $eventManager->addEventSubscriber($userClientSubscriber);
        }
    }

    /**
     * Retrieve autoloader configuration
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array('Zend\Loader\StandardAutoloader' => array('namespaces' => array(
            __NAMESPACE__ => __DIR__ . '/src/',
        )));
    }

    /**
     * Retrieve module configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
