<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/{id}/index', name: 'app_user_index', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function index(User $user): Response
    {
        if ($this->getUser() !== $user) {
            throw $this->createAccessDeniedException('Access denied.');
        }

        return $this->render('user/index.html.twig', [
            'user' => $user,
        ]);
    }
}
