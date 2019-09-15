<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
* @ORM\Entity
* @Vich\Uploadable
*/
class Image
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
    * @ORM\Column(type="string", length=255 , nullable=true)
    * @var string
    */
    private $image;

    /**
    * @Vich\UploadableField(mapping="portfolio_images", fileNameProperty="image")
    * @var File
    */
    private $imageFile;

    /**
    * @ORM\Column(type="datetime")
    * @var \DateTime
    */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Portfolio", inversedBy="image" )
     */
    private $portfolio;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
        // if 'updatedAt' is not defined in your entity, use another property
        $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
    return $this->imageFile;
    }

    public function setImage($image)
    {
    $this->image = $image;
    }

    public function getImage()
    {
    return $this->image;
    }

    public function getPortfolio(): ?Portfolio
    {
        return $this->portfolio;
    }

    public function setPortfolio(?Portfolio $portfolio): self
    {

        $this->portfolio = $portfolio;

        return $this;
    }
}
