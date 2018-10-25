<?php

namespace AppBundle\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends \Doctrine\ORM\EntityRepository
{

    const POSTS_PER_PAGE = 2;

    public function getPosts($currentPage = 1, $pageSize = self::POSTS_PER_PAGE)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('partial p.{id, title, banner, createdAt}')
            ->setFirstResult($pageSize * ($currentPage - 1))
            ->setMaxResults($pageSize);

        return new Paginator($qb->getQuery());
    }
}
