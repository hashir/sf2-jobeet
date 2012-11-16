<?php

namespace Como\TneBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Mopa\Bundle\BootstrapBundle\Navbar\AbstractNavbarMenuBuilder;

class NavbarMenuBuilder extends AbstractNavbarMenuBuilder
{

    /**
     * @param FactoryInterface $factory
     */
//    public function __construct(FactoryInterface $factory)
//    {
//        $this->factory = $factory;
//    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->createNavbarMenuItem();

        $dropdown = $this->createDropdownMenuItem($menu, "Jobeet", false, array('icon' => 'caret'));
        $dropdown->addChild('Jobs', array('route' => 'job'));
        $dropdown->addChild('New Job', array('route' => 'job_new'));
        $dropdown->addChild('Category', array('route' => 'job_new'));
        // ... add more children
        return $menu;
    }

    public function createRightSideDropdownMenu(Request $request, \Symfony\Component\Security\Core\SecurityContext $securityContext)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');

        // ... add theme change
        if ($securityContext->isGranted('IS_FULLY_AUTHENTICATED'))
        {
            $dropdown = $this->createDropdownMenuItem($menu, "Users", true, array('icon' => 'caret'));
            $dropdown->addChild('Profile', array('route' => 'fos_user_profile_show'))->setAttribute('divider_append', true);
            $dropdown->addChild('Logout', array('route' => 'fos_user_security_logout'));
        }
        else
        {
            $dropdown = $this->createDropdownMenuItem($menu, "Users", true, array('icon' => 'caret'));
            $dropdown->addChild('Logout', array('route' => 'fos_user_security_logout'));
        }

        return $menu;

     }

}