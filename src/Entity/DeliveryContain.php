<?php

namespace App\Entity;

use App\Repository\DeliveryContainRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeliveryContainRepository::class)]
class DeliveryContain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $quantity;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'deliveryContains')]
    #[ORM\JoinColumn(nullable: false)]
    private $product;

    #[ORM\ManyToOne(targetEntity: Delivery::class, inversedBy: 'deliveryContains')]
    private $delivery;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    public function setDelivery(?Delivery $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }
}
