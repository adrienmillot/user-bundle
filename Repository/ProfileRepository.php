<?php

namespace amillot\UserBundle\Repository;

use amillot\UserBundle\Model\ProfileInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProfileInterface|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfileInterface|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfileInterface[]    findAll()
 * @method ProfileInterface[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, $entityClass)
    {
        parent::__construct($registry, $entityClass);
    }
}
