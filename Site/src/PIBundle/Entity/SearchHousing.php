<?php

namespace PIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SearchHousing
 *
 * @ORM\Table(name="search_housing")
 * @ORM\Entity(repositoryClass="PIBundle\Repository\SearchHousingRepository")
 */
class SearchHousing
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
     * @ORM\Column(name="rentmax", type="string", length=255)
     */
    private $rentmax;

    /**
     * @var string
     *
     * @ORM\Column(name="rentmin", type="string", length=255)
     */
    private $rentmin;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=5)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="floor", type="string", length=255)
     */
    private $floor;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=255)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="contingent", type="string", length=255)
     */
    private $contingent;

    /**
     * @var string
     *
     * @ORM\Column(name="attribution", type="string", length=255)
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
     * Set rentmax
     *
     * @param string $rentmax
     *
     * @return Housing
     */
    public function setRentmax($rentmax)
    {
        $this->rentmax = $rentmax;

        return $this;
    }

    /**
     * Get rentmax
     *
     * @return string
     */
    public function getRentmax()
    {
        return $this->rentmax;
    }

    /**
     * Set rentmin
     *
     * @param string $rentmin
     *
     * @return Housing
     */
    public function setRentmin($rentmin)
    {
        $this->rentmin = $rentmin;

        return $this;
    }

    /**
     * Get rentmin
     *
     * @return string
     */
    public function getRentmin()
    {
        return $this->rentmin;
    }

    /**
     * Set floor
     *
     * @param string $floor
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
     * @return string
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set numero
     *
     * @param string $numero
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
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set contingent
     *
     * @param string $contingent
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
     * @return string
     */
    public function getContingent()
    {
        return $this->contingent;
    }

    /**
     * Set attribution
     *
     * @param string $attribution
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
     * @return string
     */
    public function getAttribution()
    {
        return $this->attribution;
    }
}
