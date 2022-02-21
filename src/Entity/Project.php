<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $type_of_mission;

    #[ORM\Column(type: 'string', length: 255)]
    private $type_of_site;

    #[ORM\Column(type: 'string', length: 255)]
    private $status;

    #[ORM\ManyToOne(targetEntity: customer::class, inversedBy: 'projects')]
    private $customer;

    #[ORM\OneToOne(targetEntity: quote::class, cascade: ['persist', 'remove'])]
    private $quote;

    #[ORM\Column(type: 'date', nullable: true)]
    private $deadline;

    #[ORM\Column(type: 'text', nullable: true)]
    private $details;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\Column(type: 'string', length: 255)]
    private $rate;

    #[ORM\Column(type: 'string', length: 255)]
    private $invoice_recurrency;

    #[ORM\Column(type: 'date')]
    private $first_invoice_date;

    #[ORM\Column(type: 'array', nullable: true)]
    private $data_options = [];

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $domain_name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $host_name;

    #[ORM\Column(type: 'float', nullable: true)]
    private $host_price;

    #[ORM\Column(type: 'string', length: 255)]
    private $git_repo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $link;

    #[ORM\Column(type: 'array', nullable: true)]
    private $data = [];

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Invoice::class)]
    private $invoices;

    public function __construct()
    {
        $this->invoices = new ArrayCollection();
    }

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

    public function getTypeOfSite(): ?string
    {
        return $this->type_of_site;
    }

    public function setTypeOfSite(string $type_of_site): self
    {
        $this->type_of_site = $type_of_site;

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

    public function getCustomer(): ?customer
    {
        return $this->customer;
    }

    public function setCustomer(?customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getQuote(): ?quote
    {
        return $this->quote;
    }

    public function setQuote(?quote $quote): self
    {
        $this->quote = $quote;

        return $this;
    }

    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    public function setDeadline(?\DateTimeInterface $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): self
    {
        $this->details = $details;

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

    public function getInvoiceRecurrency(): ?string
    {
        return $this->invoice_recurrency;
    }

    public function setInvoiceRecurrency(string $invoice_recurrency): self
    {
        $this->invoice_recurrency = $invoice_recurrency;

        return $this;
    }

    public function getFirstInvoiceDate(): ?\DateTimeInterface
    {
        return $this->first_invoice_date;
    }

    public function setFirstInvoiceDate(\DateTimeInterface $first_invoice_date): self
    {
        $this->first_invoice_date = $first_invoice_date;

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

    public function getGitRepo(): ?string
    {
        return $this->git_repo;
    }

    public function setGitRepo(string $git_repo): self
    {
        $this->git_repo = $git_repo;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

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

    /**
     * @return Collection<int, Invoice>
     */
    public function getInvoices(): Collection
    {
        return $this->invoices;
    }

    public function addInvoice(Invoice $invoice): self
    {
        if (!$this->invoices->contains($invoice)) {
            $this->invoices[] = $invoice;
            $invoice->setProject($this);
        }

        return $this;
    }

    public function removeInvoice(Invoice $invoice): self
    {
        if ($this->invoices->removeElement($invoice)) {
            // set the owning side to null (unless already changed)
            if ($invoice->getProject() === $this) {
                $invoice->setProject(null);
            }
        }

        return $this;
    }
}
