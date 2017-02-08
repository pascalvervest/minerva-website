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
    ) {
        $menu = $this->factory->createItem('root', ['childrenAttributes' => ['class' => 'submenu menu vertical']]);

        if ($authorizationChecker->isGranted('ROLE_USER')) {

            $menu->addChild(
                $tokenStorage->getToken()->getUsername(),
                ['route' => 'fos_user_profile_show']
            );

            $menu->addChild(
                $this->translator->trans('layout.logout', [], 'FOSUserBundle'),
                ['route' => 'fos_user_security_logout']
            );
        } else {
            $menu->addChild(
                $this->translator->trans('layout.register', [], 'FOSUserBundle'),
                ['route' => 'fos_user_registration_register']
            );
            $menu->addChild(
                $this->translator->trans('layout.login', [], 'FOSUserBundle'),
                ['route' => 'fos_user_security_login']
            );
        }

        return $menu;
    }
}