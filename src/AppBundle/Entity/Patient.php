<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Patient
 *
 * @ORM\Entity
 * @ORM\Table
 */
class Patient
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(max = 50)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(max = 50)
     */
    private $prenom;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDeNaissance;

    /**
     * @var string
     * @ORM\Column(type="string", length=14, nullable=true)
     * @Assert\Length(max = 14)
     */
    private $telephone1;

    /**
     * @var string
     * @ORM\Column(type="string", length=14, nullable=true)
     * @Assert\Length(max = 14)
     */
    private $telephone2;

    /**
     * @var string
     * @ORM\Column(type="string", length=14, nullable=true)
     * @Assert\Length(max = 14)
     */
    private $telephone3;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(max = 1000)
     */
    private $adresse;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\Length(max = 100)
     */
    private $activite;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(max = 1000)
     */
    private $notes;

    /**
     * @var Trouble[]
     * @ORM\ManyToMany(targetEntity="Trouble")
     */
    private $troubles;

    /**
     * @var Appel[]
     * @ORM\OneToMany(targetEntity="Appel", mappedBy="patient", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $appels;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $blackListe;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $position;

    public function __construct()
    {
        $this->troubles = new ArrayCollection();
        $this->appels = new ArrayCollection();
        $this->position = 0;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Patient
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Patient
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    /**
     * @param \DateTime $dateDeNaissance
     * @return Patient
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone1()
    {
        return $this->telephone1;
    }

    /**
     * @param string $telephone1
     * @return Patient
     */
    public function setTelephone1($telephone1)
    {
        $this->telephone1 = $telephone1;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone2()
    {
        return $this->telephone2;
    }

    /**
     * @param string $telephone2
     * @return Patient
     */
    public function setTelephone2($telephone2)
    {
        $this->telephone2 = $telephone2;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone3()
    {
        return $this->telephone3;
    }

    /**
     * @param string $telephone3
     * @return Patient
     */
    public function setTelephone3($telephone3)
    {
        $this->telephone3 = $telephone3;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     * @return Patient
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return string
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * @param string $activite
     * @return Patient
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Patient
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return Trouble[]
     */
    public function getTroubles()
    {
        return $this->troubles;
    }

    /**
     * @param Trouble[] $troubles
     * @return Patient
     */
    public function setTroubles($troubles)
    {
        $this->troubles = $troubles;
        return $this;
    }

    /**
     * @return Appel[]
     */
    public function getAppels()
    {
        return $this->appels;
    }

    /**
     * @param Appel $appel
     * @return Patient
     */
    public function addAppel(Appel $appel)
    {
        $this->appels->add($appel);
        return $this;
    }

    /**
     * @param Appel $appel
     * @return Patient
     */
    public function removeAppel(Appel $appel)
    {
        $appel->setPatient(null);
        $this->appels->removeElement($appel);
        return $this;
    }

    /**
     * @return bool
     */
    public function isBlackListe()
    {
        return $this->blackListe;
    }

    /**
     * @param bool $blackListe
     * @return Patient
     */
    public function setBlackListe($blackListe)
    {
        $this->blackListe = $blackListe;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return Patient
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->prenom . ' ' . $this->nom;
    }

}