<?php

/*
 * This file is part of the FOSRestBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\RestBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Martin Hasoň <martin.hason@gmail.com>
 */
class DefaultEnginePass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (null !== $container->getParameter('fos_rest.default_engine')) {
            return;
        }

        $engines = (array) $container->getParameter('templating.engines');
        $container->setParameter('fos_rest.default_engine', reset($engines));
    }
}
