<?php

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Grossum\Bundle\MainBundle\Entity\EntityTrait\DateTimeControlTrait;

/**
 * Solution
 *
 * @ORM\Table(name="solutions")
 * @ORM\Entity(repositoryClass="\AppBundle\Repository\SolutionRepository")
 *
 * @author Tsurkanov Mihail <tsurkanovm@gmail.com>
 */
class Solution
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
     * @ORM\Column(length=40)
     * @Assert\NotBlank
     *
     * @var string name
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="Media")
     *
     * @var Media image
     */
    private $image;

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
     * Set name
     *
     * @param string $name
     * @return Solution
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set image
     *
     * @param Media $image
     * @return Solution
     */
    public function setImage(Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return Media
     */
    public function getImage()
    {
        return $this->image;
    }

    public function __toString()
    {
        return $this->getName() ? : "New Solution";
    }
}