<?php

namespace PIBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="PIBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * @ORM\Column(name="date", type="string", length=255, nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $telephone;

   

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="voie", type="string", length=255, nullable=true)
     */
    private $voie;

    /**
     * @var string
     *
     * @ORM\Column(name="complementadresse", type="string", length=255, nullable=true)
     */
    private $complementadresse;

    /**
     * @var string
     *
     * @ORM\Column(name="lieudit", type="string", length=255, nullable=true)
     */
    private $lieudit;

    /**
     * @var string
     *
     * @ORM\Column(name="codepostal", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="commune", type="string", length=255, nullable=true)
     */
    private $commune;

    /**
     * @var string
     *
     * @ORM\Column(name="personnecharge", type="string", length=255, nullable=true)
     */
    private $personnecharge;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrepersonnecharge", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $nombrepersonnecharge;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=true)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="nomemployeur", type="string", length=255, nullable=true)
     */
    private $nomemployeur;

    /**
     * @var string
     *
     * @ORM\Column(name="codepostalemployeur", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $codepostalemployeur;

    /**
     * @var string
     *
     * @ORM\Column(name="communeemployeur", type="string", precision=10, scale=0, nullable=true)
     */
    private $communeemployeur;

    /**
     * @var string
     *
     * @ORM\Column(name="avisimposition", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $avisimposition;

    /**
     * @var string
     *
     * @ORM\Column(name="salaire", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $salaire;

    /**
     * @var string
     *
     * @ORM\Column(name="allocationchomage", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $allocationchomage;

    /**
     * @var string
     *
     * @ORM\Column(name="retraite", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $retraite;

    /**
     * @var string
     *
     * @ORM\Column(name="pensionalimentaire", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $pensionalimentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="pensioninvalidite", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $pensioninvalidite;

    /**
     * @var string
     *
     * @ORM\Column(name="allocationfamilial", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $allocationfamilial;

    /**
     * @var string
     *
     * @ORM\Column(name="rsa", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $rsa;

    /**
     * @var string
     *
     * @ORM\Column(name="bourseetudiant", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $bourseetudiant;

    /**
     * @var string
     *
     * @ORM\Column(name="autres", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $autres;

    /**
     * @var string
     *
     * @ORM\Column(name="situation", type="string", precision=10, scale=0, nullable=true)
     */
    private $situation;

    /**
     * @var string
     *
     * @ORM\Column(name="parking", type="string", precision=10, scale=0, nullable=true)
     */
    private $parking;

    /**
     * @var string
     *
     * @ORM\Column(name="typelogement", type="string", precision=10, scale=0, nullable=true)
     */
    private $typelogement;

    /**
     * @var string
     *
     * @ORM\Column(name="rdc", type="string", precision=10, scale=0, nullable=true)
     */
    private $rdc;

    /**
     * @var string
     *
     * @ORM\Column(name="ascenseur", type="string", precision=10, scale=0, nullable=true)
     */
    private $ascenseur;

    /**
     * @var string
     *
     * @ORM\Column(name="montantmaxi", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $montantmaxi;





    public function __construct()
    {
        parent::__construct();
        // your own logic
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
    
    public function setEmail($email){
    $email = is_null($email) ? '' : $email;
    parent::setEmail($email);
    $this->setUsername($email);

    return $this;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return User
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return User
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
     * Set voie
     *
     * @param string $voie
     *
     * @return User
     */
    public function setVoie($voie)
    {
        $this->voie = $voie;

        return $this;
    }

    /**
     * Get voie
     *
     * @return string
     */
    public function getVoie()
    {
        return $this->voie;
    }

    /**
     * Set complementadresse
     *
     * @param string $complementadresse
     *
     * @return User
     */
    public function setComplementadresse($complementadresse)
    {
        $this->complementadresse = $complementadresse;

        return $this;
    }

    /**
     * Get complementadresse
     *
     * @return string
     */
    public function getComplementadresse()
    {
        return $this->complementadresse;
    }

    /**
     * Set lieudit
     *
     * @param string $lieudit
     *
     * @return User
     */
    public function setLieudit($lieudit)
    {
        $this->lieudit = $lieudit;

        return $this;
    }

    /**
     * Get lieudit
     *
     * @return string
     */
    public function getLieudit()
    {
        return $this->lieudit;
    }

    /**
     * Set codepostal
     *
     * @param string $codepostal
     *
     * @return User
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return string
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set commune
     *
     * @param string $commune
     *
     * @return User
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return string
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * Set personnecharge
     *
     * @param string $personnecharge
     *
     * @return User
     */
    public function setPersonnecharge($personnecharge)
    {
        $this->personnecharge = $personnecharge;

        return $this;
    }

    /**
     * Get personnecharge
     *
     * @return string
     */
    public function getPersonnecharge()
    {
        return $this->personnecharge;
    }

    /**
     * Set nombrepersonnecharge
     *
     * @param string $nombrepersonnecharge
     *
     * @return User
     */
    public function setNombrepersonnecharge($nombrepersonnecharge)
    {
        $this->nombrepersonnecharge = $nombrepersonnecharge;

        return $this;
    }

    /**
     * Get nombrepersonnecharge
     *
     * @return string
     */
    public function getNombrepersonnecharge()
    {
        return $this->nombrepersonnecharge;
    }

    /**
     * Set profession
     *
     * @param string $profession
     *
     * @return User
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set nomemployeur
     *
     * @param string $nomemployeur
     *
     * @return User
     */
    public function setNomemployeur($nomemployeur)
    {
        $this->nomemployeur = $nomemployeur;

        return $this;
    }

    /**
     * Get nomemployeur
     *
     * @return string
     */
    public function getNomemployeur()
    {
        return $this->nomemployeur;
    }

    /**
     * Set codepostalemployeur
     *
     * @param string $codepostalemployeur
     *
     * @return User
     */
    public function setCodepostalemployeur($codepostalemployeur)
    {
        $this->codepostalemployeur = $codepostalemployeur;

        return $this;
    }

    /**
     * Get codepostalemployeur
     *
     * @return string
     */
    public function getCodepostalemployeur()
    {
        return $this->codepostalemployeur;
    }

    /**
     * Set communeemployeur
     *
     * @param string $communeemployeur
     *
     * @return User
     */
    public function setCommuneemployeur($communeemployeur)
    {
        $this->communeemployeur = $communeemployeur;

        return $this;
    }

    /**
     * Get communeemployeur
     *
     * @return string
     */
    public function getCommuneemployeur()
    {
        return $this->communeemployeur;
    }

    /**
     * Set avisimposition
     *
     * @param string $avisimposition
     *
     * @return User
     */
    public function setAvisimposition($avisimposition)
    {
        $this->avisimposition = $avisimposition;

        return $this;
    }

    /**
     * Get avisimposition
     *
     * @return string
     */
    public function getAvisimposition()
    {
        return $this->avisimposition;
    }

    /**
     * Set salaire
     *
     * @param string $salaire
     *
     * @return User
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get salaire
     *
     * @return string
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set allocationchomage
     *
     * @param string $allocationchomage
     *
     * @return User
     */
    public function setAllocationchomage($allocationchomage)
    {
        $this->allocationchomage = $allocationchomage;

        return $this;
    }

    /**
     * Get allocationchomage
     *
     * @return string
     */
    public function getAllocationchomage()
    {
        return $this->allocationchomage;
    }

    /**
     * Set retraite
     *
     * @param string $retraite
     *
     * @return User
     */
    public function setRetraite($retraite)
    {
        $this->retraite = $retraite;

        return $this;
    }

    /**
     * Get retraite
     *
     * @return string
     */
    public function getRetraite()
    {
        return $this->retraite;
    }

    /**
     * Set pensionalimentaire
     *
     * @param string $pensionalimentaire
     *
     * @return User
     */
    public function setPensionalimentaire($pensionalimentaire)
    {
        $this->pensionalimentaire = $pensionalimentaire;

        return $this;
    }

    /**
     * Get pensionalimentaire
     *
     * @return string
     */
    public function getPensionalimentaire()
    {
        return $this->pensionalimentaire;
    }

    /**
     * Set pensioninvalidite
     *
     * @param string $pensioninvalidite
     *
     * @return User
     */
    public function setPensioninvalidite($pensioninvalidite)
    {
        $this->pensioninvalidite = $pensioninvalidite;

        return $this;
    }

    /**
     * Get pensioninvalidite
     *
     * @return string
     */
    public function getPensioninvalidite()
    {
        return $this->pensioninvalidite;
    }

    /**
     * Set allocationfamilial
     *
     * @param string $allocationfamilial
     *
     * @return User
     */
    public function setAllocationfamilial($allocationfamilial)
    {
        $this->allocationfamilial = $allocationfamilial;

        return $this;
    }

    /**
     * Get allocationfamilial
     *
     * @return string
     */
    public function getAllocationfamilial()
    {
        return $this->allocationfamilial;
    }

    /**
     * Set rsa
     *
     * @param string $rsa
     *
     * @return User
     */
    public function setRsa($rsa)
    {
        $this->rsa = $rsa;

        return $this;
    }

    /**
     * Get rsa
     *
     * @return string
     */
    public function getRsa()
    {
        return $this->rsa;
    }

    /**
     * Set bourseetudiant
     *
     * @param string $bourseetudiant
     *
     * @return User
     */
    public function setBourseetudiant($bourseetudiant)
    {
        $this->bourseetudiant = $bourseetudiant;

        return $this;
    }

    /**
     * Get bourseetudiant
     *
     * @return string
     */
    public function getBourseetudiant()
    {
        return $this->bourseetudiant;
    }

    /**
     * Set autres
     *
     * @param string $autres
     *
     * @return User
     */
    public function setAutres($autres)
    {
        $this->autres = $autres;

        return $this;
    }

    /**
     * Get autres
     *
     * @return string
     */
    public function getAutres()
    {
        return $this->autres;
    }

    /**
     * Set situation
     *
     * @param string $situation
     *
     * @return User
     */
    public function setSituation($situation)
    {
        $this->situation = $situation;

        return $this;
    }

    /**
     * Get situation
     *
     * @return string
     */
    public function getSituation()
    {
        return $this->situation;
    }

    /**
     * Set parking
     *
     * @param string $parking
     *
     * @return User
     */
    public function setParking($parking)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * Get parking
     *
     * @return string
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * Set typelogement
     *
     * @param string $typelogement
     *
     * @return User
     */
    public function setTypelogement($typelogement)
    {
        $this->typelogement = $typelogement;

        return $this;
    }

    /**
     * Get typelogement
     *
     * @return string
     */
    public function getTypelogement()
    {
        return $this->typelogement;
    }

    /**
     * Set rdc
     *
     * @param string $rdc
     *
     * @return User
     */
    public function setRdc($rdc)
    {
        $this->rdc = $rdc;

        return $this;
    }

    /**
     * Get rdc
     *
     * @return string
     */
    public function getRdc()
    {
        return $this->rdc;
    }

    /**
     * Set ascenseur
     *
     * @param string $ascenseur
     *
     * @return User
     */
    public function setAscenseur($ascenseur)
    {
        $this->ascenseur = $ascenseur;

        return $this;
    }

    /**
     * Get ascenseur
     *
     * @return string
     */
    public function getAscenseur()
    {
        return $this->ascenseur;
    }

    /**
     * Set montantmaxi
     *
     * @param string $montantmaxi
     *
     * @return User
     */
    public function setMontantmaxi($montantmaxi)
    {
        $this->montantmaxi = $montantmaxi;

        return $this;
    }

    /**
     * Get montantmaxi
     *
     * @return string
     */
    public function getMontantmaxi()
    {
        return $this->montantmaxi;
    }
}
