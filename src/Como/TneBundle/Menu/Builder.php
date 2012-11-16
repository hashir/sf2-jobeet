<?php

namespace Como\TneBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'homepage'));
        $menu->addChild('About Me', array(
            'route' => '',
            'routeParameters' => array('id' => '')
        ));
        // ... add more children

        return $menu;
    }
}