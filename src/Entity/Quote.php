<?php

namespace App\Entity;

use App\Repository\QuoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuoteRepository::class)]
class Quote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $type_of_mission;

    #[ORM\Column(type: 'string', length: 255)]
    private $type_on_site;

    #[ORM\ManyToOne(targetEntity: customer::class, inversedBy: 'price')]
    private $customer;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\Column(type: 'string', length: 255)]
    private $rate;

    #[ORM\Column(type: 'array', nullable: true)]
    private $data_options = [];

    #[ORM\Column(type: 'string', length: 255)]
    private $status;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $domain_name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $host_name;

    #[ORM\Column(type: 'float', nullable: true)]
    private $host_price;

    #[ORM\Column(type: 'boolean')]
    private $create_host;

    #[ORM\Column(type: 'boolean')]
    private $create_domain;

    #[ORM\Column(type: 'array', nullable: true)]
    private $data = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeOfMission(): ?string
    {
        return $this->type_of_mission;
    }

    public function setTypeOfMission(string $type_of_mission): self
    {
        $this->type_of_mission = $type_of_mission;

        return $this;
    }

    public function getTypeOnSite(): ?string
    {
        return $this->type_on_site;
    }

    public function setTypeOnSite(string $type_on_site): self
    {
        $this->type_on_site = $type_on_site;

        return $this;
    }

    public function getCustomer(): ?customer
    {
        return $this->customer;
    }

    public function setCustomer(?customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getRate(): ?string
    {
        return $this->rate;
    }

    public function setRate(string $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getDataOptions(): ?array
    {
        return $this->data_options;
    }

    public function setDataOptions(?array $data_options): self
    {
        $this->data_options = $data_options;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDomainName(): ?string
    {
        return $this->domain_name;
    }

    public function setDomainName(?string $domain_name): self
    {
        $this->domain_name = $domain_name;

        return $this;
    }

    public function getHostName(): ?string
    {
        return $this->host_name;
    }

    public function setHostName(?string $host_name): self
    {
        $this->host_name = $host_name;

        return $this;
    }

    public function getHostPrice(): ?float
    {
        return $this->host_price;
    }

    public function setHostPrice(?float $host_price): self
    {
        $this->host_price = $host_price;

        return $this;
    }

    public function getCreateHost(): ?bool
    {
        return $this->create_host;
    }

    public function setCreateHost(bool $create_host): self
    {
        $this->create_host = $create_host;

        return $this;
    }

    public function getCreateDomain(): ?bool
    {
        return $this->create_domain;
    }

    public function setCreateDomain(bool $create_domain): self
    {
        $this->create_domain = $create_domain;

        return $this;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData(?array $data): self
    {
        $this->data = $data;

        return $this;
    }
}
