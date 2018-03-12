<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Comment;

class CommentController extends Controller
{
    /**
     * @Route("/api/comment", name="comments")
     * @return JsonResponse
     */
    public function commentAction()
    {
        $repository = $this->getDoctrine()->getRepository(Comment::class);
        $comments = $repository->findAll();
        $json = $this->get('serializer')->serialize($comments, 'json', ['groups' => ['api']]);
        return JsonResponse::fromJsonString($json);
    }

    /**
     * @Route("/api/comment/{id}", name="commentId")
     * @param $id
     * @return JsonResponse
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
        $json = $this->get('serializer')->serialize($comment, 'json', ['groups' => ['api']]);
        return JsonResponse::fromJsonString($json);
    }

}