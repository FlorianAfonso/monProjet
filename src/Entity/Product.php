<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150)]
    private $name;

    #[ORM\Column(type: 'string', length: 100)]
    private $price;

    #[ORM\Column(type: 'string', length: 250)]
    private $reference;

    #[ORM\Column(type: 'string', length: 255)]
    private $stock;

    #[ORM\Column(type: 'string', length: 255)]
    private $alertStock;

    #[ORM\Column(type: 'string', length: 255)]
    private $color;

    #[ORM\Column(type: 'string', length: 255)]
    private $label;

    #[ORM\Column(type: 'string', length: 10000)]
    private $description;

    #[ORM\Column(type: 'datetime')]
    private $dateCreated;

    #[ORM\Column(type: 'datetime')]
    private $dateUpdated;

    #[ORM\Column(type: 'string', length: 255)]
    private $pictureFileName;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Contain::class)]
    private $contains;

    #[ORM\ManyToOne(targetEntity: Subcategorie::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private $subCategorie;

    #[ORM\ManyToOne(targetEntity: Supplier::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private $supplier;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: DeliveryContain::class)]
    private $deliveryContains;

    public function __construct()
    {
        $this->contains = new ArrayCollection();
        $this->deliveryContains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(string $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getAlertStock(): ?string
    {
        return $this->alertStock;
    }

    public function setAlertStock(string $alertStock): self
    {
        $this->alertStock = $alertStock;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateUpdated(): ?\DateTimeInterface
    {
        return $this->dateUpdated;
    }

    public function setDateUpdated(\DateTimeInterface $dateUpdated): self
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    public function getPictureFileName(): ?string
    {
        return $this->pictureFileName;
    }

    public function setPictureFileName(string $pictureFileName): self
    {
        $this->pictureFileName = $pictureFileName;

        return $this;
    }

    /**
     * @return Collection<int, Contain>
     */
    public function getContains(): Collection
    {
        return $this->contains;
    }

    public function addContain(Contain $contain): self
    {
        if (!$this->contains->contains($contain)) {
            $this->contains[] = $contain;
            $contain->setProduct($this);
        }

        return $this;
    }

    public function removeContain(Contain $contain): self
    {
        if ($this->contains->removeElement($contain)) {
            // set the owning side to null (unless already changed)
            if ($contain->getProduct() === $this) {
                $contain->setProduct(null);
            }
        }

        return $this;
    }

    public function getSubCategorie(): ?Subcategorie
    {
        return $this->subCategorie;
    }

    public function setSubCategorie(?Subcategorie $subCategorie): self
    {
        $this->subCategorie = $subCategorie;

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * @return Collection<int, DeliveryContain>
     */
    public function getDeliveryContains(): Collection
    {
        return $this->deliveryContains;
    }

    public function addDeliveryContain(DeliveryContain $deliveryContain): self
    {
        if (!$this->deliveryContains->contains($deliveryContain)) {
            $this->deliveryContains[] = $deliveryContain;
            $deliveryContain->setProduct($this);
        }

        return $this;
    }

    public function removeDeliveryContain(DeliveryContain $deliveryContain): self
    {
        if ($this->deliveryContains->removeElement($deliveryContain)) {
            // set the owning side to null (unless already changed)
            if ($deliveryContain->getProduct() === $this) {
                $deliveryContain->setProduct(null);
            }
        }

        return $this;
    }
}
