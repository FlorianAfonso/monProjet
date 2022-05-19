<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $datePayment;

    #[ORM\Column(type: 'datetime')]
    private $dateDelivery;

    #[ORM\Column(type: 'datetime')]
    private $dateReception;

    #[ORM\Column(type: 'string', length: 10)]
    private $customerDiscount;

    #[ORM\Column(type: 'string', length: 150)]
    private $billingAddress;

    #[ORM\Column(type: 'string', length: 150)]
    private $deliveryAddress;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\Column(type: 'string', length: 150)]
    private $billingTrackingNumber;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $customer;

    #[ORM\OneToMany(mappedBy: 'deliveryOrder', targetEntity: Delivery::class)]
    private $deliveries;

    #[ORM\OneToMany(mappedBy: 'orderContain', targetEntity: Contain::class)]
    private $contains;


    public function __construct()
    {
        $this->deliveries = new ArrayCollection();
        $this->contains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePayment(): ?\DateTimeInterface
    {
        return $this->datePayment;
    }

    public function setDatePayment(\DateTimeInterface $datePayment): self
    {
        $this->datePayment = $datePayment;

        return $this;
    }

    public function getDateDelivery(): ?\DateTimeInterface
    {
        return $this->dateDelivery;
    }

    public function setDateDelivery(\DateTimeInterface $dateDelivery): self
    {
        $this->dateDelivery = $dateDelivery;

        return $this;
    }

    public function getDateReception(): ?\DateTimeInterface
    {
        return $this->dateReception;
    }

    public function setDateReception(\DateTimeInterface $dateReception): self
    {
        $this->dateReception = $dateReception;

        return $this;
    }

    public function getCustomerDiscount(): ?string
    {
        return $this->customerDiscount;
    }

    public function setCustomerDiscount(string $customerDiscount): self
    {
        $this->customerDiscount = $customerDiscount;

        return $this;
    }

    public function getBillingAddress(): ?string
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(string $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getDeliveryAddress(): ?string
    {
        return $this->deliveryAddress;
    }

    public function setDeliveryAddress(string $deliveryAddress): self
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
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

    public function getBillingTrackingNumber(): ?string
    {
        return $this->billingTrackingNumber;
    }

    public function setBillingTrackingNumber(string $billingTrackingNumber): self
    {
        $this->billingTrackingNumber = $billingTrackingNumber;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Collection<int, Delivery>
     */
    public function getDeliveries(): Collection
    {
        return $this->deliveries;
    }

    public function addDelivery(Delivery $delivery): self
    {
        if (!$this->deliveries->contains($delivery)) {
            $this->deliveries[] = $delivery;
            $delivery->setDeliveryOrder($this);
        }

        return $this;
    }

    public function removeDelivery(Delivery $delivery): self
    {
        if ($this->deliveries->removeElement($delivery)) {
            // set the owning side to null (unless already changed)
            if ($delivery->getDeliveryOrder() === $this) {
                $delivery->setDeliveryOrder(null);
            }
        }

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
            $contain->setOrderContain($this);
        }

        return $this;
    }

    public function removeContain(Contain $contain): self
    {
        if ($this->contains->removeElement($contain)) {
            // set the owning side to null (unless already changed)
            if ($contain->getOrderContain() === $this) {
                $contain->setOrderContain(null);
            }
        }

        return $this;
    }

}
