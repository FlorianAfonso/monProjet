<?php

namespace App\Entity;

use App\Repository\DeliveryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeliveryRepository::class)]
class Delivery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\Column(type: 'string', length: 255)]
    private $trackingNumber;

    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'deliveries')]
    #[ORM\JoinColumn(nullable: false)]
    private $deliveryOrder;

    #[ORM\OneToMany(mappedBy: 'delivery', targetEntity: DeliveryContain::class)]
    private $deliveryContains;

    public function __construct()
    {
        $this->deliveryContains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    public function setTrackingNumber(string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    public function getDeliveryOrder(): ?Order
    {
        return $this->deliveryOrder;
    }

    public function setDeliveryOrder(?Order $deliveryOrder): self
    {
        $this->deliveryOrder = $deliveryOrder;

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
            $deliveryContain->setDelivery($this);
        }

        return $this;
    }

    public function removeDeliveryContain(DeliveryContain $deliveryContain): self
    {
        if ($this->deliveryContains->removeElement($deliveryContain)) {
            // set the owning side to null (unless already changed)
            if ($deliveryContain->getDelivery() === $this) {
                $deliveryContain->setDelivery(null);
            }
        }

        return $this;
    }
}
