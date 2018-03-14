<?php

namespace AppBundle\EventListener;

use AppBundle\Service\Paginator;
use Symfony\Component\HttpKernel\Event\KernelEvent;

class RequestListener
{
    /**
     * @var Paginator
     */
    private $paginator;

    /**
     * @var int
     */
    private $defaultPerPage;

    /**
     * RequestListener constructor.
     * @param Paginator $paginator
     * @param int $defaultPerPage
     */
    public function __construct(Paginator $paginator, $defaultPerPage)
    {
        $this->paginator = $paginator;
        $this->defaultPerPage = $defaultPerPage;
    }

    /**
     * @param KernelEvent $event
     */
    public function onKernelRequest(KernelEvent $event)
    {
        $request = $event->getRequest();

        $page = $request->get('page');
        $perPage = $request->get('per_page');

        if ($page === null && $perPage === null) {
            return;
        }

        $this->paginator->setPage($page ?: 1);
        $this->paginator->setPerPage($perPage ?: $this->defaultPerPage);
    }
}