<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Article;

class ArticleController extends Controller
{
    /**
     * @Route("/api/article", name="articles")
     */
    public function articleAction()
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repository->findAll();
        $json = $this->get('serializer')->serialize($articles, 'json');
        return JsonResponse::fromJsonString($json);
    }

    /**
     * @Route("/api/article/{id}", name="articleId")
     */
    public function articleIdAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $article = $repository->find($id);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id '.$id
            );
        }
        $json = $this->get('serializer')->serialize($article, 'json');
        return JsonResponse::fromJsonString($json);
    }

}
