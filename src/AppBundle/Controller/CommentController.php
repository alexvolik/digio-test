<?php

namespace AppBundle\Controller;

use AppBundle\Service\Paginator;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Comment;

class CommentController extends Controller
{
    /**
     * @var Paginator
     */
    private $paginator;

    /**
     * CommentController constructor.
     * @param Paginator $paginator
     */
    public function __construct(Paginator $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * @Rest\Get("/comment", name="comments")
     * @Rest\View(serializerGroups={"comment"})
     */
    public function commentAction()
    {
        $repository = $this->getDoctrine()->getRepository(Comment::class);
        return $this->paginator->paginate($repository->createQueryBuilder('comment')->getQuery());
    }

    /**
     * @Rest\Get("/comment/{id}", name="commentId")
     * @Rest\View(serializerGroups={"comment"})
     * @param $id
     *
     * @return Comment|object
     */
    public function commentIdAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Comment::class);
        $comment = $repository->find($id);

        if (!$comment) {
            throw $this->createNotFoundException(
                'No comment found for id '.$id
            );
        }

        return $comment;
    }
}