<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Service\Paginator;
use FOS\RestBundle\Controller\Annotations as Rest;
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
     * @Rest\Get("/article/{id}", name="articleId")
     * @Rest\View(serializerGroups={"article"})
     *
     * @param Article $article
     * @return Article|object
     */
    public function articleIdAction(Article $article)
    {
        return $article;
    }

    /**
     * @Rest\Get("/article/{id}/comments")
     * @Rest\View(serializerGroups={"article"})
     *
     * @param Article $article
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function articleCommentsAction(Article $article)
    {
        $commentRepository = $this->getDoctrine()->getRepository(Comment::class);

        $query = $commentRepository->createQueryBuilder('comment')
            ->where('comment.article = :article')
            ->setParameter('article', $article)
            ->getQuery();

        return $this->paginator->paginate($query);
    }

}
