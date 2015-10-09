<?php

namespace Rim\PlayerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rim\PlayerBundle\Entity\StatusRepository")
 */
class Status
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="multiplicity", type="integer")
     */
    private $multiplicity;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set multiplicity
     *
     * @param integer $multiplicity
     * @return Status
     */
    public function setMultiplicity($multiplicity)
    {
        $this->multiplicity = $multiplicity;

        return $this;
    }

    /**
     * Get multiplicity
     *
     * @return integer 
     */
    public function getMultiplicity()
    {
        return $this->multiplicity;
    }
}
