<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Appel
 *
 * @ORM\Entity
 * @ORM\Table
 */
class Appel
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     * @Assert\NotNull()
     */
    private $date;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(max = 1000)
     */
    private $notes;

    /**
     * @var Patient
     * @ORM\ManyToOne(targetEntity="Patient", inversedBy="appels")
     * @ORM\JoinColumn(name="patient_id", referencedColumnName="id", nullable=false)
     * @Assert\NotNull()
     */
    private $patient;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Appel
     */
    public function setDate($date)
    {
        $this->date = $date;
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
     * @return Appel
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * @param Patient $patient
     * @return Appel
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

}