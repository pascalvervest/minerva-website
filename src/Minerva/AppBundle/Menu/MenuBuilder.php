<?php

namespace Minerva\AppBundle\Menu;

use Knp\Menu\ItemInterface;
use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Menu builder
 */
class MenuBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * Constructor
     *
     * @param FactoryInterface $factory
     * @param TranslatorInterface $translator
     */
    public function __construct(FactoryInterface $factory, TranslatorInterface $translator)
    {
        $this->factory = $factory;
        $this->translator = $translator;
    }

    /**
     * Create the user account menu
     *
     * @param TokenStorageInterface $tokenStorage
     * @param AuthorizationCheckerInterface $authorizationChecker
     * @return ItemInterface
     */
    public function createAccountMenu(
        TokenStorageInterface $tokenStorage,
        AuthorizationCheckerInterface $authorizationChecker
    )
    {

        $menu = $this->factory->createItem('root', [
            'childrenAttributes' => [
                'class' => 'vertical medium-horizontal menu',
                'data-responsive-menu' => 'drilldown medium-dropdown',
            ],
        ]);

        // Create main node
        $accountMenu = $this->factory->createItem(
            $this->translator->trans('layout.account', [], 'FOSUserBundle'),
            [
                'childrenAttributes' => ['class' => 'submenu menu vertical'],
                'uri' => '#'
            ]
        );

        // Add menu items according to current state
        if ($authorizationChecker->isGranted('ROLE_USER')) {

            $accountMenu->addChild(
                $this->translator->trans('layout.profile', [], 'FOSUserBundle'),
                ['route' => 'fos_user_profile_show']
            );

            $accountMenu->addChild(
                $this->translator->trans('layout.logout', [], 'FOSUserBundle'),
                ['route' => 'fos_user_security_logout']
            );
        } else {
            $accountMenu->addChild(
                $this->translator->trans('layout.register', [], 'FOSUserBundle'),
                ['route' => 'fos_user_registration_register']
            );
            $accountMenu->addChild(
                $this->translator->trans('layout.login', [], 'FOSUserBundle'),
                ['route' => 'fos_user_security_login']
            );
        }

        // Add account menu
        $menu->addChild($accountMenu, ['uri' => '/']);

        return $menu;
    }

    /**
     * Create main menu
     *
     * @return ItemInterface
     */
    public function createMainMenu()
    {
        $menu = $this->factory->createItem('root', [
            'childrenAttributes' => ['class' => 'vertical medium-horizontal menu']
        ]);

        $menu->addChild(
            'roster',
            ['route' => 'minerva_app_content_roster']
        );

        $menu->addChild(
            'about',
            ['route' => 'minerva_app_content_about']
        );

        $menu->addChild(
            'progress',
            ['route' => 'minerva_app_content_progress']
        );

        $menu->addChild(
            'apply',
            ['route' => 'minerva_app_content_apply']
        );

        $menu->addChild(
            'twitch',
            ['route' => 'minerva_app_content_twitch']
        );

        return $menu;
    }
}