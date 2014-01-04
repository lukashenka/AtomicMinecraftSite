<?php

namespace Atomic\UserBundle\Entity\Repository;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;

class UserRepository extends EntityRepository implements UserProviderInterface {

    public function getLastestUsers() {

        $q = $this->createQueryBuilder('u')
                ->where('u.enabled = 1')
                ->orderBy("u.registered")
                ->orderBy("u.id", "DESC")
                ->setMaxResults(5)
                ->getQuery();

        try {
            // The Query::getSingleResult() method throws an exception
            // if there is no record matching the criteria.
            $users = $q->getResult();
        } catch (NoResultException $e) {
            $message = sprintf(
                    'No users returned'
            );
            throw new UsernameNotFoundException($message, 0, $e);
        }

        return $users;
    }

    public function getByUsernames($usernames) {


        $q = $this->createQueryBuilder('u')
                ->andWhere("u.username  in (:usernames)")
                ->setParameter('usernames', $usernames)
                ->getQuery();

        try {

            $users = $q->getResult();
        } catch (NoResultException $e) {
            $message = sprintf(
                    'No users returned'
            );
            throw new UsernameNotFoundException($message, 0, $e);
        }

        return $users;
    }

    public function loadUserByUsername($username) {
        $q = $this->createQueryBuilder('u')
                ->where('u.username = :username OR u.email = :email')
                ->setParameter('username', $username)
                ->setParameter('email', $username)
                ->getQuery();

        try {
            // The Query::getSingleResult() method throws an exception
            // if there is no record matching the criteria.
            $user = $q->getSingleResult();
        } catch (NoResultException $e) {
            $message = sprintf(
                    'Unable to find an active admin AtomicUserBundle:User object identified by "%s".', $username
            );
            throw new UsernameNotFoundException($message, 0, $e);
        }

        return $user;
    }

    public function refreshUser(UserInterface $user) {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(
            sprintf(
                    'Instances of "%s" are not supported.', $class
            )
            );
        }

        return $this->find($user->getId());
    }

    public function supportsClass($class) {
        return $this->getEntityName() === $class || is_subclass_of($class, $this->getEntityName());
    }

    public function getPaginatorUsers() {

        if (!isset($this->paginator)) {
            $query = $this->createQueryBuilder('u')
                    ->select('u');


            $this->paginator = new Paginator($query, $fetchJoinCollection = true);
        }
        return $this->paginator;
    }

    public function getUsersPage($page, $limit = 5) {
        $paginator = $this->getPaginatorUsers();
        $paginator
                ->getQuery()
                ->setFirstResult($limit * ($page - 1))
                ->setMaxResults($limit);

        return $paginator;
    }

}