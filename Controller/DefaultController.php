<?php

declare(strict_types=1);

namespace amillot\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Security;

class DefaultController extends AbstractController
{
    public function dashboard(Security $prmSecurity)
    {
        $user = $prmSecurity->getUser();

        if (null === $user) {
            return $this->redirectToRoute('home');
        }

        return $this->render('@User/default/dashboard.html.twig', []);
    }

    public function home(Security $prmSecurity)
    {
        $user = $prmSecurity->getUser();

        if (null !== $user) {
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('@User/default/home.html.twig', []);
    }
}
