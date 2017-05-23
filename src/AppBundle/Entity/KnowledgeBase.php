<?php

namespace AppBundle\Entity;

use Application\Sonata\ClassificationBundle\Entity\{ Tag, Collection as ClassificationCollection };
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * KnowledgeBase
 *
 * @ORM\Table(name="knowledge")
 * @ORM\Entity(repositoryClass="\AppBundle\Repository\KnowledgeBaseRepository")
 *
 * @author Tsurkanov Mihail <tsurkanovm@gmail.com>
 */
class KnowledgeBase
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
     * @ORM\Column(length=40)
     * @Assert\NotBlank
     *
     * @var string name
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @ORM\Column(length=100)
     * @Assert\NotBlank
     *
     * @var string name
     */
    private $issue;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     *
     * @var string description
     */
    private $answer;

    /**
     * @ORM\ManyToMany(targetEntity="Application\Sonata\ClassificationBundle\Entity\Tag", inversedBy="knowledge")
     *
     * @var ArrayCollection|Tag[]
     */
    private $tags;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\ClassificationBundle\Entity\Collection", inversedBy="knowledge")
     *
     * @var ClassificationCollection
     */
    private $collection;


    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return KnowledgeBase
     */
    public function setName(string $name):KnowledgeBase
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName():?string
    {
        return $this->name;
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }

    /**
     * @return string
     */
    public function getIssue(): ?string
    {
        return $this->issue;
    }

    /**
     * @param string $issue
     * @return KnowledgeBase
     */
    public function setIssue(string $issue):KnowledgeBase
    {
        $this->issue = $issue;

        return $this;
    }

    /**
     * @return string
     */
    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     * @return KnowledgeBase
     */
    public function setAnswer(string $answer):KnowledgeBase
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     * @return KnowledgeBase
     */
    public function addTag(Tag $tag):KnowledgeBase
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
        }

        return $this;
    }

    /**
     * @param Tag $tag
     * @return KnowledgeBase
     */
    public function removeSolution(Tag $tag):KnowledgeBase
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    /**
     * @return ClassificationCollection
     */
    public function getCollection(): ?ClassificationCollection
    {
        return $this->collection;
    }

    /**
     * @param ClassificationCollection $collection
     * @return KnowledgeBase
     */
    public function setCollection(ClassificationCollection $collection)
    {
        $this->collection = $collection;

        return $this;
    }

    public function __toString():string
    {
        return $this->getName() ? : "New knowledge";
    }
}
