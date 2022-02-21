<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: project::class, inversedBy: 'invoices')]
    private $project;

    #[ORM\Column(type: 'string', length: 255)]
    private $invoice_type;

    #[ORM\Column(type: 'array', nullable: true)]
    private $data = [];

    #[ORM\Column(type: 'string', length: 255)]
    private $work_duration;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\Column(type: 'string', length: 255)]
    private $customer_name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $customer_company;

    #[ORM\Column(type: 'string', length: 10)]
    private $customer_phone;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $customer_phone2;

    #[ORM\Column(type: 'string', length: 255)]
    private $customer_email;

    #[ORM\Column(type: 'string', length: 255)]
    private $customer_address;

    #[ORM\Column(type: 'string', length: 5)]
    private $customer_zip_code;

    #[ORM\Column(type: 'string', length: 255)]
    private $customer_city;

    #[ORM\Column(type: 'string', length: 255)]
    private $customer_country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProject(): ?project
    {
        return $this->project;
    }

    public function setProject(?project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getInvoiceType(): ?string
    {
        return $this->invoice_type;
    }

    public function setInvoiceType(string $invoice_type): self
    {
        $this->invoice_type = $invoice_type;

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

    public function getWorkDuration(): ?string
    {
        return $this->work_duration;
    }

    public function setWorkDuration(string $work_duration): self
    {
        $this->work_duration = $work_duration;

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

    public function getCustomerName(): ?string
    {
        return $this->customer_name;
    }

    public function setCustomerName(string $customer_name): self
    {
        $this->customer_name = $customer_name;

        return $this;
    }

    public function getCustomerCompany(): ?string
    {
        return $this->customer_company;
    }

    public function setCustomerCompany(?string $customer_company): self
    {
        $this->customer_company = $customer_company;

        return $this;
    }

    public function getCustomerPhone(): ?string
    {
        return $this->customer_phone;
    }

    public function setCustomerPhone(string $customer_phone): self
    {
        $this->customer_phone = $customer_phone;

        return $this;
    }

    public function getCustomerPhone2(): ?string
    {
        return $this->customer_phone2;
    }

    public function setCustomerPhone2(?string $customer_phone2): self
    {
        $this->customer_phone2 = $customer_phone2;

        return $this;
    }

    public function getCustomerEmail(): ?string
    {
        return $this->customer_email;
    }

    public function setCustomerEmail(string $customer_email): self
    {
        $this->customer_email = $customer_email;

        return $this;
    }

    public function getCustomerAddress(): ?string
    {
        return $this->customer_address;
    }

    public function setCustomerAddress(string $customer_address): self
    {
        $this->customer_address = $customer_address;

        return $this;
    }

    public function getCustomerZipCode(): ?string
    {
        return $this->customer_zip_code;
    }

    public function setCustomerZipCode(string $customer_zip_code): self
    {
        $this->customer_zip_code = $customer_zip_code;

        return $this;
    }

    public function getCustomerCity(): ?string
    {
        return $this->customer_city;
    }

    public function setCustomerCity(string $customer_city): self
    {
        $this->customer_city = $customer_city;

        return $this;
    }

    public function getCustomerCountry(): ?string
    {
        return $this->customer_country;
    }

    public function setCustomerCountry(string $customer_country): self
    {
        $this->customer_country = $customer_country;

        return $this;
    }
}
