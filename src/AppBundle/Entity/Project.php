<?php

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Project
 *
 * @ORM\Table(name="projects")
 * @ORM\Entity(repositoryClass="\AppBundle\Repository\ProjectRepository")
 *
 * @author Tsurkanov Mihail <tsurkanovm@gmail.com>
 */
class Project
{

    /**
     * Primary key
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     *
     * @var integer $id
     */
    private $id;

    /**
     * Created at
     *
     * @ORM\Column(type="date")
     * @Gedmo\Timestampable(on="create")
     *
     * @var \DateTime
     */
    private $created;

    /**
     * Updated at
     *
     * @ORM\Column(type="date")
     * @Gedmo\Timestampable(on="update")
     *
     * @var \DateTime
     */
    private $updated;

    /**
     * @ORM\Column(length=40)
     * @Assert\NotBlank
     *
     * @var string name
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string description
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string challenge
     */
    private $challenge;

    /**
     * @ORM\Column(type="smallint")
     *
     * @var integer weight
     */
    private $weight;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool status
     */
    private $status;

    /**
     * @ORM\ManyToMany(targetEntity="Solution")
     *
     * @var ArrayCollection
     */
    private $solutions;

    /**
     * @ORM\Column(type="boolean", name="display_on_home_page")
     *
     * @var bool status
     */
    private $displayOnHome;

    /**
     * @ORM\OneToOne(targetEntity="Media")
     *
     * @var Media imageTemplate
     */
    private $imageTemplate;

    /**
     * @ORM\OneToOne(targetEntity="Media")
     *
     * @var Media imageLogo
     */
    private $imageLogo;


    public function __construct()
    {
        $this->solutions = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName() ? : "New Project";
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return Project
     */
    public function setCreatedAt($createdAt)
    {
        $this->created = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $updatedAt
     *
     * @return Project
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated = $updatedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated;
    }

    /**
     * @param string $name
     *
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $challenge
     *
     * @return Project
     */
    public function setChallenge($challenge)
    {
        $this->challenge = $challenge;

        return $this;
    }

    /**
     * @return string
     */
    public function getChallenge()
    {
        return $this->challenge;
    }

    /**
     * @param integer $weight
     *
     * @return Project
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param boolean $status
     * @return Project
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Solution $solutions
     *
     * @return Project
     */
    public function addSolution(Solution $solutions)
    {
        if (!$this->solutions->contains($solutions)) {
            $this->solutions->add($solutions);
        }

        return $this;
    }

    /**
     * @param Solution $solutions
     *
     * @return $this
     */
    public function removeSolution(Solution $solutions)
    {
        $this->solutions->removeElement($solutions);

        return $this;
    }

    /**
     * @return Collection|Solution[]
     */
    public function getSolutions()
    {
        return $this->solutions;
    }

    /**
     * @param boolean $displayOnHome
     *
     * @return Project
     */
    public function setDisplayOnHome($displayOnHome)
    {
        $this->displayOnHome = $displayOnHome;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getDisplayOnHome()
    {
        return $this->displayOnHome;
    }

    /**
     * @param Media $imageTemplate
     *
     * @return Project
     */
    public function setImageTemplate(Media $imageTemplate = null)
    {
        $this->imageTemplate = $imageTemplate;

        return $this;
    }

    /**
     * @return Media
     */
    public function getImageTemplate()
    {
        return $this->imageTemplate;
    }

    /**
     * @param Media $imageLogo
     *
     * @return Project
     */
    public function setImageLogo(Media $imageLogo = null)
    {
        $this->imageLogo = $imageLogo;

        return $this;
    }

    /**
     * @return Media
     */
    public function getImageLogo()
    {
        return $this->imageLogo;
    }

}
