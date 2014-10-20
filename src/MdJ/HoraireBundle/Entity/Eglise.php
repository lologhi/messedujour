<?php

namespace MdJ\HoraireBundle\Entity;


use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Eglise
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
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(name="code_postal", type="integer", length=11)
     */
    private $codePostal;

    /**
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(name="telephone", type="string", length=20, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(name="longitude", type="decimal", precision=8, nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(name="latitude", type="decimal", precision=8, nullable=true)
     */
    private $latitude;

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
     * @ORM\OneToMany(targetEntity="Horaire", mappedBy="eglise")
     */
    private $horaires;

    /**
     * @ORM\OneToMany(targetEntity="Lieu", mappedBy="eglise")
     */
    private $lieux;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->horaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->lieux = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Eglise
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
     * @return Eglise
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
     * Set adresse
     *
     * @param string $adresse
     * @return Eglise
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     * @return Eglise
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Eglise
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Eglise
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
     * Set url
     *
     * @param string $url
     * @return Eglise
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return Eglise
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return Eglise
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Eglise
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
     * @return Eglise
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
     * Add horaires
     *
     * @param Horaire $horaires
     * @return Eglise
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

    /**
     * Add lieux
     *
     * @param Lieu $lieux
     * @return Eglise
     */
    public function addLieux(Lieu $lieux)
    {
        $this->lieux[] = $lieux;

        return $this;
    }

    /**
     * Remove lieux
     *
     * @param Lieu $lieux
     */
    public function removeLieux(Lieu $lieux)
    {
        $this->lieux->removeElement($lieux);
    }

    /**
     * Get lieux
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLieux()
    {
        return $this->lieux;
    }
}
