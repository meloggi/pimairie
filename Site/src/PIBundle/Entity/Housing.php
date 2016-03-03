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
     * @ORM\Column(name="bailleur", type="string", length=255)
     */
    private $bailleur;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="residence", type="string", length=255)
     */
    private $residence;

    /**
     * @var string
     *
     * @ORM\Column(name="rent", type="decimal", precision=10, scale=0)
     */
    private $rent;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=5)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="floor", type="integer")
     */
    private $floor;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var contingent
     *
     * @ORM\Column(name="contingent", type="boolean")
     */
    private $contingent;

    /**
     * @var attribution
     *
     * @ORM\Column(name="attribution", type="boolean")
     */
    private $attribution;


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
     * Set bailleur
     *
     * @param string $bailleur
     *
     * @return Housing
     */
    public function setBailleur($bailleur)
    {
        $this->bailleur = $bailleur;

        return $this;
    }

    /**
     * Get bailleur
     *
     * @return string
     */
    public function getBailleur()
    {
        return $this->bailleur;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return Housing
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set residence
     *
     * @param string $residence
     *
     * @return Housing
     */
    public function setResidence($residence)
    {
        $this->residence = $residence;

        return $this;
    }

    /**
     * Get residence
     *
     * @return string
     */
    public function getResidence()
    {
        return $this->residence;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Housing
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Housing
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set contingent
     *
     * @param boolean $contingent
     *
     * @return Housing
     */
    public function setContingent($contingent)
    {
        $this->contingent = $contingent;

        return $this;
    }

    /**
     * Get contingent
     *
     * @return contingent
     */
    public function getContingent()
    {
        return $this->contingent;
    }

    /**
     * Set attribution
     *
     * @param boolean $attribution
     *
     * @return Housing
     */
    public function setAttribution($attribution)
    {
        $this->attribution = $attribution;

        return $this;
    }

    /**
     * Get attribution
     *
     * @return attribution
     */
    public function getAttribution()
    {
        return $this->attribution;
    }

}
