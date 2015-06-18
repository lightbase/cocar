<?php

namespace Swpb\Bundle\CocarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * Printer
 *
 * @ORM\Table("tb_printer", uniqueConstraints={@UniqueConstraint(name="serial_idx", columns={"serie"})})
 * @ORM\Entity(repositoryClass="Swpb\Bundle\CocarBundle\Entity\PrinterRepository")
 */
class Printer
{
    /**
     * Construct
     */
    public function __construct()
    {
        $this->printerCounter = new ArrayCollection();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="PrinterCounter", mappedBy="printer")
     */
    protected $printerCounter;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="communitySnmpPrinter", type="string", length=255)
     */
    private $communitySnmpPrinter;

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", length=255, unique=false)
     */
    private $host;

    /**
     * @var string
     *
     * @ORM\Column(name="serie", type="string", nullable=false)
     */
    private $serie;

    /**
     * @var string
     *
     * @ORM\Column(name="local", type="text", nullable=true)
     */
    private $local;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="serie_simpress", type="text", nullable=true)
     */
    private $serie_simpress;

    /**
     * @var string
     *
     * @ORM\Column(name="netmask", type="text", nullable=true)
     */
    private $netmask;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Printer
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Printer
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set communitySnmpPrinter
     *
     * @param string $communitySnmpPrinter
     * @return Printer
     */
    public function setCommunitySnmpPrinter($communitySnmpPrinter)
    {
        $this->communitySnmpPrinter = $communitySnmpPrinter;
    
        return $this;
    }

    /**
     * Get communitySnmpPrinter
     *
     * @return string 
     */
    public function getCommunitySnmpPrinter()
    {
        return $this->communitySnmpPrinter;
    }

    /**
     * Set host
     *
     * @param string $host
     * @return Printer
     */
    public function setHost($host)
    {
        $this->host = $host;
    
        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set serie
     *
     * @param string $serie
     * @return Printer
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return string
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set local
     *
     * @param string $local
     * @return Printer
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return string
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Add printerCounter
     *
     * @param PrinterCounter $printerCounter
     * @return Entity
     */
    public function addPrinterCounter(PrinterCounter $printerCounter)
    {
        $printerCounter->setPrinter($this);
        $this->printerCounter[] = $printerCounter;
    
        return $this;
    }

    /**
     * Remove printerCounter
     *
     * @param PrinterCounter $printerCounter
     */
    public function removePrinterCounter(PrinterCounter $printerCounter)
    {
        $this->printerCounter->removeElement($printerCounter);
    }

    /**
     * Get printerCounter
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrinterCounter()
    {
        return $this->printerCounter;
    }

    /**
     * Active set
     *
     * @param $active
     * @return $this
     */
    public function setActive($active) {
        $this->active = $active;

        return $this;
    }

    /**
     * Active get
     *
     * @return bool
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * Set serie_simpress
     *
     * @param string $serie_simpress
     * @return Printer
     */
    public function setSerieSimpress($serie_simpress)
    {
        $this->serie_simpress = $serie_simpress;

        return $this;
    }

    /**
     * Get serie
     *
     * @return string
     */
    public function getSerieSimpress()
    {
        return $this->serie_simpress;
    }

    /**
     * Netmask set
     *
     * @param $netmask
     * @return $this
     */
    public function setNetmask($netmask) {
        $this->netmask = $netmask;

        return $this;
    }

    /**
     * Netmask get
     *
     * @return string
     */
    public function getNetmask() {
        return $this->netmask;
    }
}
