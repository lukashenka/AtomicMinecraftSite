<?php

namespace Atomic\BlogBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentRepository extends EntityRepository {

    private $paginator;

    public function getPaginatorComment($blogId) {

        if (!isset($this->paginator)) {
            $qb = $this->createQueryBuilder('c')
                    ->select('c')
                    ->where('c.blog = :blog_id')
                    ->addOrderBy('c.created')
                    ->setParameter('blog_id', $blogId);


            $this->paginator = new Paginator($qb, $fetchJoinCollection = true);
        }
        return $this->paginator;
    }

    public function getCommentsForBlog($blogId, $page, $limit = 5) {
        $paginator = $this->getPaginatorComment($blogId);
        $paginator
                ->getQuery()
                ->setFirstResult($limit * ($page - 1))
                ->setMaxResults($limit);

        return $paginator;
    }

    public function countComments($blogId) {
        $qb = $this->createQueryBuilder('c')
                ->select('COUNT(c)')
                ->where('c.blog = :blog_id')
                ->addOrderBy('c.created')
                ->setParameter('blog_id', $blogId);


        return (int)$qb->getQuery()->getSingleScalarResult();
    }

}
