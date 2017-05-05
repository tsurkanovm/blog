<?php

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Gedmo\Mapping\Annotation as Gedmo;

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
     * @ORM\Column(name="id", type="integer", nullable=false)
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
    private $createdAt;

    /**
     * Updated at
     *
     * @ORM\Column(type="date")
     * @Gedmo\Timestampable(on="update")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $challenge;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var integer
     */
    private $weight;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var Collection|Solution[]
     */
    private $solutions;

    /**
     * @var boolean
     */
    private $displayOnHome;

    /**
     * @var Media
     */
    private $imageTemplate;

    /**
     * @var Media
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
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $updatedAt
     *
     * @return Project
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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
     * @param string $benefits
     *
     * @return Project
     */
    public function setBenefits($benefits)
    {
        $this->benefits = $benefits;

        return $this;
    }

    /**
     * @return string
     */
    public function getBenefits()
    {
        return $this->benefits;
    }

    /**
     * @param string $slug
     *
     * @return Project
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
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
     * @param Tag $tag
     *
     * @return Project
     */
    public function addTag(Tag $tag)
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
        }

        return $this;
    }

    /**
     * @param Tag $tag
     *
     * @return $this
     */
    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $url
     *
     * @return Project
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
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

    /**
     * @param ProjectFeedback $projectFeedback
     *
     * @return Project
     */
    public function addProjectFeedback(ProjectFeedback $projectFeedback)
    {
        if (!$this->projectFeedbacks->contains($projectFeedback)) {
            $projectFeedback->setProject($this);
            $this->projectFeedbacks->add($projectFeedback);
        }

        return $this;
    }

    /**
     * @param ProjectFeedback $projectFeedback
     *
     * @return $this
     */
    public function removeProjectFeedback(ProjectFeedback $projectFeedback)
    {
        $this->projectFeedbacks->removeElement($projectFeedback);

        return $this;
    }

    /**
     * @return Collection|ProjectFeedback[]
     */
    public function getProjectFeedbacks()
    {
        return $this->projectFeedbacks;
    }


    /**
     * @param boolean $showUrl
     *
     * @return Project
     */
    public function setShowUrl($showUrl)
    {
        $this->showUrl = $showUrl;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getShowUrl()
    {
        return $this->showUrl;
    }

    /**
     * @param boolean $displayForCanada
     *
     * @return Project
     */
    public function setDisplayForCanada($displayForCanada)
    {
        $this->displayForCanada = $displayForCanada;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getDisplayForCanada()
    {
        return $this->displayForCanada;
    }

    /**
     * @param ProjectBlockType $leftProject
     *
     * @return Project
     */
    public function addLeftProject(ProjectBlockType $leftProject)
    {
        if (!$this->leftProject->contains($leftProject)) {
            $this->leftProject->add($leftProject);
        }

        return $this;
    }

    /**
     * @param ProjectBlockType $leftProject
     *
     * @return $this
     */
    public function removeLeftProject(ProjectBlockType $leftProject)
    {
        $this->leftProject->removeElement($leftProject);

        return $this;
    }

    /**
     * @return Collection|ProjectBlockType[]
     */
    public function getLeftProject()
    {
        return $this->leftProject;
    }

    /**
     * @param ProjectBlockType $rightProject
     *
     * @return Project
     */
    public function addRightProject(ProjectBlockType $rightProject)
    {
        if (!$this->rightProject->contains($rightProject)) {
            $this->rightProject->add($rightProject);
        }

        return $this;
    }

    /**
     * @param ProjectBlockType $rightProject
     *
     * @return $this
     */
    public function removeRightProject(ProjectBlockType $rightProject)
    {
        $this->rightProject->removeElement($rightProject);

        return $this;
    }

    /**
     * Get rightProject
     *
     * @return Collection|ProjectBlockType[]
     */
    public function getRightProject()
    {
        return $this->rightProject;
    }

    /**
     * @param ProjectToPicture|EntityToPicture $picture
     * @return Project|EntityWithPicturesAndGalleries
     */
    public function addPicture(EntityToPicture $picture)
    {
        if ($this->addPictureIfNotExist($picture)) {
            $picture->setProject($this);
        }

        return $this;
    }

    /**
     * @param EntityToGallery|ProjectToGallery $gallery
     * @return Project|EntityWithPicturesAndGalleries
     */
    public function addGallery(EntityToGallery $gallery)
    {
        if ($this->addGalleryIfNotExist($gallery)) {
            $gallery->setProject($this);
        }

        return $this;
    }

    /**
     * @return Collection|UserProfile[]
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param UserProfile $userProfile
     * @return Project
     */
    public function addTeam(UserProfile $userProfile)
    {
        if (!$this->team->contains($userProfile)) {
            $userProfile->addProject($this);
            $this->team->add($userProfile);
        }

        return $this;
    }

    /**
     * @param PersistentCollection $team
     */
    public function setTeam(PersistentCollection $team)
    {
        $this->team = $team;
    }

    /**
     * @param UserProfile $userProfile
     *
     * @return $this
     */
    public function removeTeam(UserProfile $userProfile)
    {
        $this->team->removeElement($userProfile);

        return $this;
    }
}
