<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
//use FOS\UserBundle\Model\User as BaseUser;
use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="user")
     */
    private $orders;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="seller")
     */
    private $sales;

    /**
     * @ORM\OneToMany(targetEntity=FlowerShop::class, mappedBy="user", orphanRemoval=true)
     */
    private $flowerShops;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $middlename;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->orders = new ArrayCollection();
        $this->sales = new ArrayCollection();
        $this->flowerShops = new ArrayCollection();
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setUser($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getUser() === $this) {
                $order->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getSales(): Collection
    {
        return $this->sales;
    }

    public function addSale(Order $sale): self
    {
        if (!$this->sales->contains($sale)) {
            $this->sales[] = $sale;
            $sale->setSeller($this);
        }

        return $this;
    }

    public function removeSale(Order $sale): self
    {
        if ($this->sales->removeElement($sale)) {
            // set the owning side to null (unless already changed)
            if ($sale->getSeller() === $this) {
                $sale->setSeller(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FlowerShop[]
     */
    public function getFlowerShops(): Collection
    {
        return $this->flowerShops;
    }

    public function addFlowerShop(FlowerShop $flowerShop): self
    {
        if (!$this->flowerShops->contains($flowerShop)) {
            $this->flowerShops[] = $flowerShop;
            $flowerShop->setUser($this);
        }

        return $this;
    }

    public function removeFlowerShop(FlowerShop $flowerShop): self
    {
        if ($this->flowerShops->removeElement($flowerShop)) {
            // set the owning side to null (unless already changed)
            if ($flowerShop->getUser() === $this) {
                $flowerShop->setUser(null);
            }
        }

        return $this;
    }

    public function getMiddlename(): ?string
    {
        return $this->middlename;
    }

    public function setMiddlename(?string $middlename): self
    {
        $this->middlename = $middlename;

        return $this;
    }
}