<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{   
    public function __construct(ArticleRepository $repo)
    {
        $this->repo=$repo;
    }

    #[Route('/article', name: 'article.index')]
    public function index(): Response
    {   
        $articles = $this->repo->findAll();
        return $this->render('/article/index.html.twig', ['articles' => $articles]);
    }

     #[ROUTE('/article/{id}', name: 'article.show', methods: ['GET'])]
    public function show($id): Response
    {
        $articles = $this->repo->find($id);
        return $this->render('/article/show.html.twig', ['article' => $articles]);
    }
}
