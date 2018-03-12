<?php

namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof NotFoundHttpException) {
            $response = new JsonResponse(
                ['error' => $exception->getMessage()],
                $exception->getStatusCode(),
                $exception->getHeaders()
            );

            $event->setResponse($response);
        }
    }
}