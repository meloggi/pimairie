<?php

namespace PIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeDemande
 *
 * @ORM\Table(name="demande_demande")
 * @ORM\Entity(repositoryClass="PIBundle\Repository\DemandeDemandeRepository")
 */
class DemandeDemande
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

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
    private $mail;

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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * @return DemandeDemande
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
     * Set creera
     *
     * @param \DateTime $creera
     *
     * @return DemandeDemande
     */
    public function setCreera($creera)
    {
        if(!$this->getCreatedAt())
  {
    $this->created_at = new \DateTime();
  }
    }

    /**
     * Get creera
     *
     * @return \DateTime
     */
    public function getCreera()
    {
        return $this->creera;
    }

    /**
     * Set modifiera
     *
     * @param \DateTime $modifiera
     *
     * @return DemandeDemande
     */
    public function setModifiera($modifiera)
    {
        $this->updated_at = new \DateTime();
    }

    /**
     * Get modifiera
     *
     * @return \DateTime
     */
    public function getModifiera()
    {
        return $this->modifiera;
    }
}
