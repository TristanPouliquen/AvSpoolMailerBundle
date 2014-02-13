<?php

namespace AppVentus\Awesome\SpoolMailerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AvAwesomeSpoolMailerExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $container->setParameter(
            'av_awesome_spool_mailer.contact_addresses',
            $config['contact_addresses']
         );
        $container->setParameter(
            'contact_addresses_admin_address',
            $config['contact_addresses']['admin']['address']
         );
        $container->setParameter(
            'contact_addresses_noreply_address',
            $config['contact_addresses']['noreply']['address']
         );
        $container->setParameter(
            'contact_addresses_admin_name',
            $config['contact_addresses']['admin']['name']
         );
        $container->setParameter(
            'contact_addresses_noreply_name',
            $config['contact_addresses']['noreply']['name']
         );


    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return "av_awesome_spool_mailer";
    }
}
