<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(PostRepository $postRepository): Response
    {
        $all_posts = $postRepository->findAll();
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'all_posts' => $all_posts,
            'user' => $this->getUser(),
        ]);
    }
}
