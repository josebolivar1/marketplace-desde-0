<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
	
/**
 * @ORM\Entity
 * @ORM\Table(name="trayecto")
*/
class Trayecto {
    use ORMBehaviors\Timestampable\Timestampable;
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Persona", inversedBy="trayectos")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
    */
    protected $conductor;
     /**
     * @ORM\ManyToOne(targetEntity="Ciudad", inversedBy="trayectosDondeSoyOrigen")
     * @ORM\JoinColumn(name="origen_id", referencedColumnName="id")
     */
    protected $origen;
    /**
     * @ORM\ManyToOne(targetEntity="Ciudad", inversedBy="trayectosDondeSoyDestino")
     * @ORM\JoinColumn(name="destino_id", referencedColumnName="id")
     */
    protected $destino;
    /**
     * @ORM\Column(type="string")
     */
    protected $calle;
    /**
     * @ORM\Column(type="date")
     */
    protected $fechaDeViaje;
    /**
     * @ORM\Column(type="time")
     */
    protected $horaDeViaje;
    /**
     * @ORM\Column(type="float")
     */
    protected $precio;
    /**
     * @ORM\Column(type="text")
     */
    protected $descripcion;
    /**
     * @ORM\Column(type="integer")
     */
    protected $plazasDisponibles;
    /**
     * @ORM\Column(type="boolean", options={"default" : true})
     */
    protected $enabled;
    
    public function __construct() {
       $this->fechaDeViaje = new \DateTime();
       $this->horaDeViaje = new \DateTime();
    }
    
    public function __toString() {
        return " Viaje de " . $this->origen . " a " . $this->getDestino(); //cuaNDO SE BUSCA UNA VARIABLE HAY QUE PONERLA SIN PARENTESIS O CON UN get.
    }

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
     * Set calle
     *
     * @param string $calle
     * @return Trayecto
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set fechaDeViaje
     *
     * @param \DateTime $fechaDeViaje
     * @return Trayecto
     */
    public function setFechaDeViaje($fechaDeViaje)
    {
        $this->fechaDeViaje = $fechaDeViaje;

        return $this;
    }

    /**
     * Get fechaDeViaje
     *
     * @return \DateTime 
     */
    public function getFechaDeViaje()
    {
        return $this->fechaDeViaje;
    }

    /**
     * Set horaDeViaje
     *
     * @param \DateTime $horaDeViaje
     * @return Trayecto
     */
    public function setHoraDeViaje($horaDeViaje)
    {
        $this->horaDeViaje = $horaDeViaje;

        return $this;
    }

    /**
     * Get horaDeViaje
     *
     * @return \DateTime 
     */
    public function getHoraDeViaje()
    {
        return $this->horaDeViaje;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Trayecto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Trayecto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Trayecto
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set conductor
     *
     * @param \AppBundle\Entity\Persona $conductor
     * @return Trayecto
     */
    public function setConductor(\AppBundle\Entity\Persona $conductor = null)
    {
        $this->conductor = $conductor;

        return $this;
    }

    /**
     * Get conductor
     *
     * @return \AppBundle\Entity\Persona 
     */
    public function getConductor()
    {
        return $this->conductor;
    }

    /**
     * Set origen
     *
     * @param \AppBundle\Entity\Ciudad $origen
     * @return Trayecto
     */
    public function setOrigen(\AppBundle\Entity\Ciudad $origen = null)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get origen
     *
     * @return \AppBundle\Entity\Ciudad 
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set destino
     *
     * @param \AppBundle\Entity\Ciudad $destino
     * @return Trayecto
     */
    public function setDestino(\AppBundle\Entity\Ciudad $destino = null)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return \AppBundle\Entity\Ciudad 
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set plazasDisponibles
     *
     * @param integer $plazasDisponibles
     * @return Trayecto
     */
    public function setPlazasDisponibles($plazasDisponibles)
    {
        $this->plazasDisponibles = $plazasDisponibles;

        return $this;
    }

    /**
     * Get plazasDisponibles
     *
     * @return integer 
     */
    public function getPlazasDisponibles()
    {
        return $this->plazasDisponibles;
    }
}
