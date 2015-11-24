<?php

namespace Rim\NestleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Priz
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rim\NestleBundle\Entity\PrizRepository")
 */
class Priz
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
     * @var string
     *
     * @ORM\Column(name="starttime", type="string", length=15)
     */
    private $starttime;

    /**
     * @var string
     *
     * @ORM\Column(name="nestheaders", type="text")
     */
    private $nestheaders;

    /**
     * @var string
     *
     * @ORM\Column(name="sendtime", type="string", length=15)
     */
    private $sendtime;

    /**
     * @var string
     *
     * @ORM\Column(name="valpriz", type="string", length=7)
     */
    private $valpriz;

    /**
     * @var string
     *
     * @ORM\Column(name="endtime", type="string", length=15)
     */
    private $endtime;


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
     * Set starttime
     *
     * @param string $starttime
     * @return Priz
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;

        return $this;
    }

    /**
     * Get starttime
     *
     * @return string 
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Set nestheaders
     *
     * @param string $nestheaders
     * @return Priz
     */
    public function setNestheaders($nestheaders)
    {
        $this->nestheaders = $nestheaders;

        return $this;
    }

    /**
     * Get nestheaders
     *
     * @return string 
     */
    public function getNestheaders()
    {
        return $this->nestheaders;
    }

    /**
     * Set sendtime
     *
     * @param string $sendtime
     * @return Priz
     */
    public function setSendtime($sendtime)
    {
        $this->sendtime = $sendtime;

        return $this;
    }

    /**
     * Get sendtime
     *
     * @return string 
     */
    public function getSendtime()
    {
        return $this->sendtime;
    }

    /**
     * Set valpriz
     *
     * @param string $valpriz
     * @return Priz
     */
    public function setValpriz($valpriz)
    {
        $this->valpriz = $valpriz;

        return $this;
    }

    /**
     * Get valpriz
     *
     * @return string 
     */
    public function getValpriz()
    {
        return $this->valpriz;
    }

    /**
     * Set endtime
     *
     * @param string $endtime
     * @return Priz
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;

        return $this;
    }

    /**
     * Get endtime
     *
     * @return string 
     */
    public function getEndtime()
    {
        return $this->endtime;
    }
}
