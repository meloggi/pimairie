<?php

namespace PIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Demande
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
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;
    
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
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     */
    private $email;

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
     * @ORM\Column(name="professionconjoint", type="string", length=255, nullable=true)
     */
    private $professionconjoint;

    /**
     * @var string
     *
     * @ORM\Column(name="nomemployeurconjoint", type="string", length=255, nullable=true)
     */
    private $nomemployeurconjoint;

    /**
     * @var string
     *
     * @ORM\Column(name="codepostalemployeurconjoint", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $codepostalemployeurconjoint;

     /**
     * @var string
     *
     * @ORM\Column(name="statusconjoint", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $statusconjoint;

    /**
     * @var string
     *
     * @ORM\Column(name="communeemployeurconjoint", type="string", precision=10, scale=0, nullable=true)
     */
    private $communeemployeurconjoint;

     /**
     * @var string
     *
     * @ORM\Column(name="avisimposition1", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $avisimposition1;

    /**
     * @var string
     *
     * @ORM\Column(name="avisimposition2", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $avisimposition2;

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

 /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="salary", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $salary;

    /**
     * @var string
     *
     * @ORM\Column(name="location_villers_centre", type="string", length=255, nullable=true)
     */
    private $locationVillersCentre;

    /**
     * @var string
     *
     * @ORM\Column(name="location_villers_bas", type="string", length=255, nullable=true)
     */
    private $locationVillersBas;

    /**
     * @var string
     *
     * @ORM\Column(name="location_clairlieu", type="string", length=255, nullable=true)
     */
    private $locationClairlieu;

    /**
     * @var string
     *
     * @ORM\Column(name="type1", type="string", length=10, nullable=true)
     */
    private $type1;

    /**
     * @var string
     *
     * @ORM\Column(name="type2", type="string", length=10, nullable=true)
     */
    private $type2;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @var int
     *
     * @ORM\Column(name="id_appartment", type="integer", nullable=true)
     */
    private $idAppartment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_attribution", type="datetime", nullable=true)
     */
    private $dateAttribution;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_archivage", type="datetime", nullable=true)
     */
    private $dateArchivage;

    /**
     * @var string
     *
     * @ORM\Column(name="viewed", type="string", length=10, nullable=true)
     */
    private $viewed;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmed", type="string", length=10, nullable=true)
     */
    private $confirmed;

    /**
     * @var string
     *
     * @ORM\Column(name="archived", type="string", length=10, nullable=true)
     */
    private $archived;

    /**
     * @var string
     *
     * @ORM\Column(name="wrong", type="string", length=10, nullable=true)
     */
    private $wrong;
    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=10, nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255, nullable=true)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="loyerlogementactuel", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $loyerlogementactuel;

    /**
     * @var string
     *
     * @ORM\Column(name="apllogementactuel", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $apllogementactuel;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrepersonnelogementactuel", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $nbpersonnelogementactuel;

    /**
     * @var string
     *
     * @ORM\Column(name="categorielogementactuel", type="string", length=255, nullable=true)
     */
    private $categorielogementactuel;

    /**
     * @var string
     *
     * @ORM\Column(name="typelogementactuel", type="string", length=255, nullable=true)
     */
    private $typelogementactuel;

    /**
     * @var string
     *
     * @ORM\Column(name="surfacelogementactuel", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $surfacelogementactuel;

    /**
     * @var string
     *
     * @ORM\Column(name="typelogementrecherche", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $typelogementrecherche;

    /**
     * @var string
     *
     * @ORM\Column(name="categorielogementrecherche", type="string", precision=10, scale=0, nullable=true)
     */
    private $categorielogementrecherche;

    /**
     * @var string
     *
     * @ORM\Column(name="loyerlogementrecherche", type="string", precision=10, scale=0, nullable=true)
     */
    private $loyerlogementrecherche;




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
     * Set nom
     *
     * @param string $nom
     *
     * @return Demande
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Demande
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Demande
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
     * @return Demande
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
     * Set mail
     *
     * @param string $mail
     *
     * @return Demande
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * Set allocationchomage
     *
     * @param string $allocationchomage
     *
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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

   

    

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Demand
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
     * @return integer
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
     * @return integer
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
     * Set professionconjoint
     *
     * @param string $professionconjoint
     *
     * @return Demand
     */
    public function setProfessionconjoint($professionconjoint)
    {
        $this->professionconjoint = $professionconjoint;

        return $this;
    }

    /**
     * Get professionconjoint
     *
     * @return string
     */
    public function getProfessionconjoint()
    {
        return $this->professionconjoint;
    }

    /**
     * Set nomemployeurconjoint
     *
     * @param string $nomemployeurconjoint
     *
     * @return Demand
     */
    public function setNomemployeurconjoint($nomemployeurconjoint)
    {
        $this->nomemployeurconjoint = $nomemployeurconjoint;

        return $this;
    }

    /**
     * Get nomemployeurconjoint
     *
     * @return string
     */
    public function getNomemployeurconjoint()
    {
        return $this->nomemployeurconjoint;
    }

    /**
     * Set codepostalemployeurconjoint
     *
     * @param string $codepostalemployeurconjoint
     *
     * @return Demand
     */
    public function setCodepostalemployeurconjoint($codepostalemployeurconjoint)
    {
        $this->codepostalemployeurconjoint = $codepostalemployeurconjoint;

        return $this;
    }

    /**
     * Get codepostalemployeurconjoint
     *
     * @return string
     */
    public function getCodepostalemployeurconjoint()
    {
        return $this->codepostalemployeurconjoint;
    }

    /**
     * Set statusconjoint
     *
     * @param string $statusconjoint
     *
     * @return Demand
     */
    public function setStatusconjoint($statusconjoint)
    {
        $this->statusconjoint = $statusconjoint;

        return $this;
    }

    /**
     * Get statusconjoint
     *
     * @return string
     */
    public function getStatusconjoint()
    {
        return $this->statusconjoint;
    }

    /**
     * Set communeemployeurconjoint
     *
     * @param string $communeemployeurconjoint
     *
     * @return Demand
     */
    public function setCommuneemployeurconjoint($communeemployeurconjoint)
    {
        $this->communeemployeurconjoint = $communeemployeurconjoint;

        return $this;
    }

    /**
     * Get communeemployeurconjoint
     *
     * @return string
     */
    public function getCommuneemployeurconjoint()
    {
        return $this->communeemployeurconjoint;
    }

    /**
     * Set avisimposition1
     *
     * @param string $avisimposition1
     *
     * @return Demand
     */
    public function setAvisimposition1($avisimposition1)
    {
        $this->avisimposition1 = $avisimposition1;

        return $this;
    }

    /**
     * Get avisimposition1
     *
     * @return string
     */
    public function getAvisimposition1()
    {
        return $this->avisimposition1;
    }

    /**
     * Set avisimposition2
     *
     * @param string $avisimposition2
     *
     * @return Demand
     */
    public function setAvisimposition2($avisimposition2)
    {
        $this->avisimposition2 = $avisimposition2;

        return $this;
    }

    /**
     * Get avisimposition2
     *
     * @return string
     */
    public function getAvisimposition2()
    {
        return $this->avisimposition2;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Demand
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Demand
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set loyerlogementactuel
     *
     * @param string $loyerlogementactuel
     *
     * @return Demand
     */
    public function setLoyerlogementactuel($loyerlogementactuel)
    {
        $this->loyerlogementactuel = $loyerlogementactuel;

        return $this;
    }

    /**
     * Get loyerlogementactuel
     *
     * @return string
     */
    public function getLoyerlogementactuel()
    {
        return $this->loyerlogementactuel;
    }

    /**
     * Set apllogementactuel
     *
     * @param string $apllogementactuel
     *
     * @return Demand
     */
    public function setApllogementactuel($apllogementactuel)
    {
        $this->apllogementactuel = $apllogementactuel;

        return $this;
    }

    /**
     * Get apllogementactuel
     *
     * @return string
     */
    public function getApllogementactuel()
    {
        return $this->apllogementactuel;
    }

    /**
     * Set nbpersonnelogementactuel
     *
     * @param string $nbpersonnelogementactuel
     *
     * @return Demand
     */
    public function setNbpersonnelogementactuel($nbpersonnelogementactuel)
    {
        $this->nbpersonnelogementactuel = $nbpersonnelogementactuel;

        return $this;
    }

    /**
     * Get nbpersonnelogementactuel
     *
     * @return string
     */
    public function getNbpersonnelogementactuel()
    {
        return $this->nbpersonnelogementactuel;
    }

    /**
     * Set categorielogementactuel
     *
     * @param string $categorielogementactuel
     *
     * @return Demand
     */
    public function setCategorielogementactuel($categorielogementactuel)
    {
        $this->categorielogementactuel = $categorielogementactuel;

        return $this;
    }

    /**
     * Get categorielogementactuel
     *
     * @return string
     */
    public function getCategorielogementactuel()
    {
        return $this->categorielogementactuel;
    }

    /**
     * Set typelogementactuel
     *
     * @param string $typelogementactuel
     *
     * @return Demand
     */
    public function setTypelogementactuel($typelogementactuel)
    {
        $this->typelogementactuel = $typelogementactuel;

        return $this;
    }

    /**
     * Get typelogementactuel
     *
     * @return string
     */
    public function getTypelogementactuel()
    {
        return $this->typelogementactuel;
    }

    /**
     * Set surfacelogementactuel
     *
     * @param string $surfacelogementactuel
     *
     * @return Demand
     */
    public function setSurfacelogementactuel($surfacelogementactuel)
    {
        $this->surfacelogementactuel = $surfacelogementactuel;

        return $this;
    }

    /**
     * Get surfacelogementactuel
     *
     * @return string
     */
    public function getSurfacelogementactuel()
    {
        return $this->surfacelogementactuel;
    }

    /**
     * Set typelogementrecherche
     *
     * @param string $typelogementrecherche
     *
     * @return Demand
     */
    public function setTypelogementrecherche($typelogementrecherche)
    {
        $this->typelogementrecherche = $typelogementrecherche;

        return $this;
    }

    /**
     * Get typelogementrecherche
     *
     * @return string
     */
    public function getTypelogementrecherche()
    {
        return $this->typelogementrecherche;
    }

    /**
     * Set categorielogementrecherche
     *
     * @param string $categorielogementrecherche
     *
     * @return Demand
     */
    public function setCategorielogementrecherche($categorielogementrecherche)
    {
        $this->categorielogementrecherche = $categorielogementrecherche;

        return $this;
    }

    /**
     * Get categorielogementrecherche
     *
     * @return string
     */
    public function getCategorielogementrecherche()
    {
        return $this->categorielogementrecherche;
    }

    /**
     * Set loyerlogementrecherche
     *
     * @param string $loyerlogementrecherche
     *
     * @return Demand
     */
    public function setLoyerlogementrecherche($loyerlogementrecherche)
    {
        $this->loyerlogementrecherche = $loyerlogementrecherche;

        return $this;
    }

    /**
     * Get loyerlogementrecherche
     *
     * @return string
     */
    public function getLoyerlogementrecherche()
    {
        return $this->loyerlogementrecherche;
    }

    

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Demand
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Demand
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
}
