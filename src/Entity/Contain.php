<?php

namespace App\Entity;

use App\Repository\ContainRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContainRepository::class)]
class Contain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $productQuantity;

    #[ORM\Column(type: 'string', length: 255)]
    private $productPrice;

    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'contains')]
    #[ORM\JoinColumn(nullable: false)]
    private $orderContain;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'contains')]
    #[ORM\JoinColumn(nullable: false)]
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductQuantity(): ?string
    {
        return $this->productQuantity;
    }

    public function setProductQuantity(string $productQuantity): self
    {
        $this->productQuantity = $productQuantity;

        return $this;
    }

    public function getProductPrice(): ?string
    {
        return $this->productPrice;
    }

    public function setProductPrice(string $productPrice): self
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    public function getOrderContain(): ?Order
    {
        return $this->orderContain;
    }

    public function setOrderContain(?Order $orderContain): self
    {
        $this->orderContain = $orderContain;

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
}
