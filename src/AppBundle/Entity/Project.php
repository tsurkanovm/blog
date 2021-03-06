<?php

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\{ArrayCollection, Collection};
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Project
 *
 * @ORM\Table(name="projects",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="name_idx",columns={"name"})})
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
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    private $id;

    /**
     * @var \DateTime                
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var \DateTime                
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @ORM\Column(length=20)
     * @Assert\NotBlank
     *
     * @var string name
     */
    private $name;

    /**
     * @ORM\Column(length=40, name="full_name", nullable=true)
     *
     * @var string name
     */
    private $fullName;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string description
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true, name="work_description")
     *
     * @var string description
     */
    private $workDescription;

    /**
     * @ORM\Column(type="text", nullable=true, name="my_role")
     *
     * @var string challenge
     */
    private $myRole;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string challenge
     */
    private $challenge;

    /**
     * @ORM\Column(type="smallint", options={"default":0})
     *
     * @var integer weight
     */
    private $weight;

    /**
     * @ORM\Column(type="boolean", options={"default":0})
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
     * @ORM\Column(type="boolean", name="display_on_home_page", options={"default":0})
     *
     * @var bool status
     */
    private $displayOnHome;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media")
     *
     * @var Media imageTemplate
     */
    private $imageTemplate;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media")
     *
     * @var Media imageLogo
     */
    private $imageLogo;

    public function __construct()
    {
        $this->solutions     = new ArrayCollection();
        $this->weight        = 0;
        $this->status        = false;
        $this->displayOnHome = false;
    }

    /**
     * @return integer
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getFullName():?string
    {
        return $this->fullName;
    }


    /**
     * @param string $fullName
     * @return Project
     */
    public function setFullName(string $fullName):Project
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWorkDescription():?string
    {
        return $this->workDescription;
    }


    /**
     * @param string $workDescription
     * @return Project
     */
    public function setWorkDescription(string $workDescription):Project
    {
        $this->workDescription = $workDescription;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMyRole():?string
    {
        return $this->myRole;
    }


    /**
     * @param string $myRole
     * @return Project
     */
    public function setMyRole(string $myRole):Project
    {
        $this->myRole = $myRole;

        return $this;
    }

    /**
     * @return \DateTime                
     */
    public function getCreated():\DateTime
    {
        return $this->created;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated():\DateTime
    {
        return $this->updated;
    }

    /**
     * @param string $name
     *
     * @return Project
     */
    public function setName(string $name):Project
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName():?string
    {
        return $this->name;
    }

    /**
     * @param string $description
     *
     * @return Project
     */
    public function setDescription(string $description):Project
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription():?string
    {
        return $this->description;
    }

    /**
     * @param string $challenge
     *
     * @return Project
     */
    public function setChallenge(string $challenge):Project
    {
        $this->challenge = $challenge;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getChallenge():?string
    {
        return $this->challenge;
    }

    /**
     * @param integer $weight
     *
     * @return Project
     */
    public function setWeight(int $weight):Project
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWeight():int
    {
        return $this->weight;
    }

    /**
     * @param boolean $status
     * @return Project
     */
    public function setStatus(bool $status):Project
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getStatus():bool
    {
        return $this->status;
    }

    /**
     * @param Solution $solutions
     *
     * @return Project
     */
    public function addSolution(Solution $solutions):Project
    {
        if (!$this->solutions->contains($solutions)) {
            $this->solutions->add($solutions);
        }

        return $this;
    }

    /**
     * @param Solution $solutions
     *
     * @return Project
     */
    public function removeSolution(Solution $solutions):Project
    {
        $this->solutions->removeElement($solutions);

        return $this;
    }

    /**
     * @return Collection|Solution[]
     */
    public function getSolutions():Collection
    {
        return $this->solutions;
    }

    /**
     * @param boolean $displayOnHome
     *
     * @return Project
     */
    public function setDisplayOnHome(bool $displayOnHome):Project
    {
        $this->displayOnHome = $displayOnHome;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getDisplayOnHome():bool
    {
        return $this->displayOnHome;
    }

    /**
     * @param Media $imageTemplate
     *
     * @return Project
     */
    public function setImageTemplate(Media $imageTemplate = null):Project
    {
        $this->imageTemplate = $imageTemplate;

        return $this;
    }

    /**
     * @return Media|null
     */
    public function getImageTemplate():?Media
    {
        return $this->imageTemplate;
    }

    /**
     * @param Media $imageLogo
     *
     * @return Project
     */
    public function setImageLogo(Media $imageLogo = null):Project
    {
        $this->imageLogo = $imageLogo;

        return $this;
    }

    /**
     * @return Media|null
     */
    public function getImageLogo():?Media
    {
        return $this->imageLogo;
    }

    /**
     * @return string
     */
    public function __toString():string
    {
        return $this->getName() ? : "New Project";
    }
}
