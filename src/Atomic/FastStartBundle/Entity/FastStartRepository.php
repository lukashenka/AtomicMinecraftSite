<?php

namespace Atomic\FastStartBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * FastStartRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FastStartRepository extends EntityRepository {

    public function getFastStart($limit = null) {
        $qb = $this->createQueryBuilder('f')
                ->select('f')
                ->addOrderBy('f.step', 'ASC');

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()
                        ->getResult();
    }

    public function createQueryBuilder($alias) {
        return $this->_em->createQueryBuilder()
                        ->select($alias)
                        ->from($this->_entityName, $alias);
    }

}
