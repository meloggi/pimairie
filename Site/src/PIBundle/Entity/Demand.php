<?php

namespace PIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demand
 *
 * @ORM\Table(name="demand")
 * @ORM\Entity(repositoryClass="PIBundle\Repository\DemandRepository")
 */
class Demand
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="salary", type="decimal", precision=10, scale=0)
     */
    private $salary;

    /**
     * @var string
     *
     * @ORM\Column(name="location_villers_centre", type="string", length=255)
     */
    private $locationVillersCentre;

    /**
     * @var string
     *
     * @ORM\Column(name="location_villers_bas", type="string", length=255)
     */
    private $locationVillersBas;

    /**
     * @var string
     *
     * @ORM\Column(name="location_clairlieu", type="string", length=255)
     */
    private $locationClairlieu;

    /**
     * @var string
     *
     * @ORM\Column(name="type1", type="string", length=10)
     */
    private $type1;

    /**
     * @var string
     *
     * @ORM\Column(name="type2", type="string", length=10)
     */
    private $type2;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255)
     */
    private $note;

    /**
     * @var int
     *
     * @ORM\Column(name="id_appartment", type="integer")
     */
    private $idAppartment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_attribution", type="datetime")
     */
    private $dateAttribution;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_archivage", type="datetime")
     */
    private $dateArchivage;

    /**
     * @var string
     *
     * @ORM\Column(name="viewed", type="string", length=10)
     */
    private $viewed;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmed", type="string", length=10)
     */
    private $confirmed;

    /**
     * @var string
     *
     * @ORM\Column(name="archived", type="string", length=10)
     */
    private $archived;

    /**
     * @var string
     *
     * @ORM\Column(name="wrong", type="string", length=10)
     */
    private $wrong;


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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Demand
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set salary
     *
     * @param string $salary
     *
     * @return Demand
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return string
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set locationVillersCentre
     *
     * @param string $locationVillersCentre
     *
     * @return Demand
     */
    public function setLocationVillersCentre($locationVillersCentre)
    {
        $this->locationVillersCentre = $locationVillersCentre;

        return $this;
    }

    /**
     * Get locationVillersCentre
     *
     * @return string
     */
    public function getLocationVillersCentre()
    {
        return $this->locationVillersCentre;
    }

    /**
     * Set locationVillersBas
     *
     * @param string $locationVillersBas
     *
     * @return Demand
     */
    public function setLocationVillersBas($locationVillersBas)
    {
        $this->locationVillersBas = $locationVillersBas;

        return $this;
    }

    /**
     * Get locationVillersBas
     *
     * @return string
     */
    public function getLocationVillersBas()
    {
        return $this->locationVillersBas;
    }

    /**
     * Set locationClairlieu
     *
     * @param string $locationClairlieu
     *
     * @return Demand
     */
    public function setLocationClairlieu($locationClairlieu)
    {
        $this->locationClairlieu = $locationClairlieu;

        return $this;
    }

    /**
     * Get locationClairlieu
     *
     * @return string
     */
    public function getLocationClairlieu()
    {
        return $this->locationClairlieu;
    }

    /**
     * Set type1
     *
     * @param string $type1
     *
     * @return Demand
     */
    public function setType1($type1)
    {
        $this->type1 = $type1;

        return $this;
    }

    /**
     * Get type1
     *
     * @return string
     */
    public function getType1()
    {
        return $this->type1;
    }

    /**
     * Set type2
     *
     * @param string $type2
     *
     * @return Demand
     */
    public function setType2($type2)
    {
        $this->type2 = $type2;

        return $this;
    }

    /**
     * Get type2
     *
     * @return string
     */
    public function getType2()
    {
        return $this->type2;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Demand
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Demand
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set idAppartment
     *
     * @param integer $idAppartment
     *
     * @return Demand
     */
    public function setIdAppartment($idAppartment)
    {
        $this->idAppartment = $idAppartment;

        return $this;
    }

    /**
     * Get idAppartment
     *
     * @return int
     */
    public function getIdAppartment()
    {
        return $this->idAppartment;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Demand
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateAttribution
     *
     * @param \DateTime $dateAttribution
     *
     * @return Demand
     */
    public function setDateAttribution($dateAttribution)
    {
        $this->dateAttribution = $dateAttribution;

        return $this;
    }

    /**
     * Get dateAttribution
     *
     * @return \DateTime
     */
    public function getDateAttribution()
    {
        return $this->dateAttribution;
    }

    /**
     * Set dateArchivage
     *
     * @param \DateTime $dateArchivage
     *
     * @return Demand
     */
    public function setDateArchivage($dateArchivage)
    {
        $this->dateArchivage = $dateArchivage;

        return $this;
    }

    /**
     * Get dateArchivage
     *
     * @return \DateTime
     */
    public function getDateArchivage()
    {
        return $this->dateArchivage;
    }

    /**
     * Set viewed
     *
     * @param string $viewed
     *
     * @return Demand
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;

        return $this;
    }

    /**
     * Get viewed
     *
     * @return string
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    /**
     * Set confirmed
     *
     * @param string $confirmed
     *
     * @return Demand
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * Get confirmed
     *
     * @return string
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Set archived
     *
     * @param string $archived
     *
     * @return Demand
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Get archived
     *
     * @return string
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * Set wrong
     *
     * @param string $wrong
     *
     * @return Demand
     */
    public function setWrong($wrong)
    {
        $this->wrong = $wrong;

        return $this;
    }

    /**
     * Get wrong
     *
     * @return string
     */
    public function getWrong()
    {
        return $this->wrong;
    }
}

