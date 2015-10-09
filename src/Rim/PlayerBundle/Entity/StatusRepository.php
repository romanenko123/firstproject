<?php
namespace Rim\PlayerBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Rim\PlayerBundle\RimPlayerBundle;

/**
 * StatusRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StatusRepository extends EntityRepository
{

    public function findOneMaxIdEntity()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT s FROM RimPlayerBundle:Status s ORDER BY s.id DESC')
            ->setMaxResults(1)
            ->getSingleResult();
    }
}
