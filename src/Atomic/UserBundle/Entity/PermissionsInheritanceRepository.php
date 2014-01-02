<?php

namespace Atomic\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PermissionsInheritanceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PermissionsInheritanceRepository extends EntityRepository {

    public function getExpiredStatuses() {

        $q = $this->createSelectQueryBuilder('p')
                ->where('p.expired < CURRENT_TIMESTAMP()')
                ->getQuery();



        $permissions = $q->getResult();

        


        return $permissions;
    }
    
    public function deleteExpiredStatuses() {

        $q = $this->createDeleteQueryBuilder('p')
                ->where('p.expired < CURRENT_TIMESTAMP()')
                ->getQuery();



        $status = $q->getResult();

        


        return $status;
    }
    
    public function createDeleteQueryBuilder($alias) {
        return $this->_em->createQueryBuilder()
                        ->delete($alias)
                        ->from($this->_entityName, $alias);
    }

    public function createSelectQueryBuilder($alias) {
        return $this->_em->createQueryBuilder()
                        ->select($alias)
                        ->from($this->_entityName, $alias);
    }

}
