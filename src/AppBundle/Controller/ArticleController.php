<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Service\Paginator;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Article;

class ArticleController extends Controller
{
    /**
     * @var Paginator
     */
    private $paginator;

    public function __construct(Paginator $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * @Rest\Get("/article", name="articles")
     * @Rest\View(serializerGroups={"article"})
     */
    public function articleAction()
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);

        return $this->paginator->paginate($repository->createQueryBuilder('article')->getQuery());
    }

    /**
     * @Route("/article/{id}", name="articleId")
     *
     * @Rest\View(serializerGroups={"article"})
     * @param $id
     *
     * @return Article|object
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

        return $article;
    }

    /**
     * @Route("/article/{id}/comments")
     * @param $id
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function articleCommentsAction($id)
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        $article = $articleRepository->find($id);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id '.$id
            );
        }

        $commentRepository = $this->getDoctrine()->getRepository(Comment::class);

        $query = $commentRepository->createQueryBuilder('comment')
            ->where('comment.article = :article')
            ->setParameter('article', $article)
            ->getQuery();

        $comments = $this->paginator->paginate($query);

        return $comments;
    }

}
