<?php

namespace AppBundle\Service;


use Doctrine\ORM\Query;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Knp\Component\Pager\PaginatorInterface;

class Paginator
{
    /**
     * @var PaginatorInterface
     */
    private $paginator;

    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $perPage;

    /**
     * Paginator constructor.
     * @param PaginatorInterface $paginator
     */
    public function __construct(PaginatorInterface $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * @param Query $query
     * @param array $options
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function paginate(Query $query, array $options = [])
    {
        if ($this->needPagination()) {
            return $this->paginator->paginate($query, $this->page, $this->perPage, $options);
        } else {
            $pagination = new SlidingPagination([]);
            $pagination->setItems($query->execute());

            return $pagination;
        }
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return Paginator
     */
    public function setPage($page)
    {
        $this->page = abs($page);
        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     * @return Paginator
     */
    public function setPerPage($perPage)
    {
        $this->perPage = abs($perPage);
        return $this;
    }

    /**
     * @return bool
     */
    public function needPagination()
    {
        return $this->perPage !== null && $this->page !== null;
    }
}