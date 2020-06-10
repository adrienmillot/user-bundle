<?php

declare(strict_types=1);

namespace amillot\UserBundle\Controller;

use amillot\UserBundle\Form\Type\UserType;
use amillot\UserBundle\Model\UserInterface;
use amillot\UserBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    private $userClassName;

    public function __construct(string $prmUserClassName)
    {
        $this->userClassName = $prmUserClassName;
    }

    public function index(Request $prmRequest): Response
    {
        $page = $prmRequest->get('page', 1);

        return $this->render('@User/user/index.html.twig', [
            'page' => $page,
        ]);
    }

    public function new(Request $request): Response
    {
        $user = new $this->userClassName();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('@User/user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    public function show(UserInterface $user): Response
    {
        return $this->render('@User/user/show.html.twig', [
            'user' => $user,
        ]);
    }

    public function edit(Request $request, UserInterface $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('@User/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Request $request, UserInterface $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}
