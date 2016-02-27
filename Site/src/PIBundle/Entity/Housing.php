<?php

namespace PIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Housing
 *
 * @ORM\Table(name="housing")
 * @ORM\Entity(repositoryClass="PIBundle\Repository\HousingRepository")
 */
class Housing
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="rent", type="decimal", precision=10, scale=0)
     */
    private $rent;

    /**
     * @var int
     *
     * @ORM\Column(name="floor", type="integer")
     */
    private $floor;

    /**
     * Get id
     *
     * @return int
     */

    
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Housing
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set rent
     *
     * @param string $rent
     *
     * @return Housing
     */
    public function setRent($rent)
    {
        $this->rent = $rent;

        return $this;
    }

    /**
     * Get rent
     *
     * @return string
     */
    public function getRent()
    {
        return $this->rent;
    }

    /**
     * Set floor
     *
     * @param integer $floor
     *
     * @return Housing
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * Get floor
     *
     * @return int
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set free
     *
     * @param boolean $free
     *
     * @return Housing
     */
    public function setFree($free)
    {
        $this->free = $free;

        return $this;
    }

    /**
     * Get free
     *
     * @return boolean
     */
    public function getFree()
    {
        return $this->free;
    }
}
