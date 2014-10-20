<?php

namespace MdJ\HoraireBundle\Entity;


use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Lieu
{
    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @Gedmo\Slug(separator="-", updatable=false, fields={"nom", "adresse", "codePostal", "ville"})
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @Gedmo\Timestampable
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @ORM\ManyToOne(targetEntity="Eglise", inversedBy="lieux")
     */
    private $eglise;

    /**
     * @ORM\OneToMany(targetEntity="Horaire", mappedBy="lieu")
     */
    private $horaires;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->horaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nom
     *
     * @param string $nom
     * @return Lieu
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
     * Set slug
     *
     * @param string $slug
     * @return Lieu
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Lieu
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Lieu
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set eglise
     *
     * @param Eglise $eglise
     * @return Lieu
     */
    public function setEglise(Eglise $eglise = null)
    {
        $this->eglise = $eglise;

        return $this;
    }

    /**
     * Get eglise
     *
     * @return Eglise
     */
    public function getEglise()
    {
        return $this->eglise;
    }

    /**
     * Add horaires
     *
     * @param Horaire $horaires
     * @return Lieu
     */
    public function addHoraire(Horaire $horaires)
    {
        $this->horaires[] = $horaires;

        return $this;
    }

    /**
     * Remove horaires
     *
     * @param Horaire $horaires
     */
    public function removeHoraire(Horaire $horaires)
    {
        $this->horaires->removeElement($horaires);
    }

    /**
     * Get horaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHoraires()
    {
        return $this->horaires;
    }
}
