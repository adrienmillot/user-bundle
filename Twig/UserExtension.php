<?php

declare(strict_types=1);

namespace amillot\UserBundle\Twig;

use amillot\UserBundle\Model\UserInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class UserExtension extends AbstractExtension
{
    private $userClassName;

    private $environment;

    private $paginator;

    private $registry;

    public function __construct($prmUserClassName,
                                Environment $prmEnvironment,
                                ManagerRegistry $prmRegistry,
                                PaginatorInterface $prmPager
    ) {
        $this->userClassName = $prmUserClassName;
        $this->environment = $prmEnvironment;
        $this->paginator = $prmPager;
        $this->registry = $prmRegistry;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('render_profile', [$this, 'renderProfile'], ['is_safe' => ['html']]),
            new TwigFunction('render_user_list', [$this, 'renderUserList'], ['is_safe' => ['html']]),
        ];
    }

    public function renderProfile(UserInterface $prmUser)
    {
        $profile = $prmUser->getProfile();

        return $this->environment->render('@User/twig/profile/_show.html.twig', [
            'profile' => $profile,
        ]);
    }

    public function renderUserList(int $prmOffset, int $prmLimit = 15)
    {
        $manager = $this->registry->getManagerForClass($this->userClassName);
        $repository = $manager->getRepository($this->userClassName);
        $qb = $repository->getEnableUserQuery();

        $pagination = $this->paginator->paginate(
            $qb->getQuery(),
            $prmOffset,
            $prmLimit
        );

        return $this->environment->render('@User/twig/user/_list.html.twig',[
            'pagination' => $pagination,
        ]);
    }
}
