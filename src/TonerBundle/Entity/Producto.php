<?php

namespace TonerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Producto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TonerBundle\Entity\ProductoRepository")
 */
class Producto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cartucho", type="string", length=15)
     */
    private $cartucho;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoCart", type="string", length=50)
     */
    private $tipoCart;

    /**
     * @var string
     *
     * @ORM\Column(name="rendimiento", type="string", length=50)
     */
    private $rendimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="modeloImp", type="string", length=255)
     */
    private $modeloImp;

    /**
     * @var integer
     *
     * @ORM\Column(name="precio", type="integer")
     */
    private $precio;

    
    
    /**
     * @ORM\ManyToOne(targetEntity="Marca", inversedBy="productos")
     * @ORM\JoinColumn(name="marca_id", referencedColumnName="id")
     */
    protected $marca;

    
    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=50)
     */
    private $color;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=50)
     */
    private $tipo;
    
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
     * Set nombre
     *
     * @param string $nombre
     * @return Producto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set cartucho
     *
     * @param string $cartucho
     * @return Producto
     */
    public function setCartucho($cartucho)
    {
        $this->cartucho = $cartucho;

        return $this;
    }

    /**
     * Get cartucho
     *
     * @return string 
     */
    public function getCartucho()
    {
        return $this->cartucho;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     * @return Producto
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set tipoCart
     *
     * @param string $tipoCart
     * @return Producto
     */
    public function setTipoCart($tipoCart)
    {
        $this->tipoCart = $tipoCart;

        return $this;
    }

    /**
     * Get tipoCart
     *
     * @return string 
     */
    public function getTipoCart()
    {
        return $this->tipoCart;
    }

    /**
     * Set rendimiento
     *
     * @param string $rendimiento
     * @return Producto
     */
    public function setRendimiento($rendimiento)
    {
        $this->rendimiento = $rendimiento;

        return $this;
    }

    /**
     * Get rendimiento
     *
     * @return string 
     */
    public function getRendimiento()
    {
        return $this->rendimiento;
    }

    /**
     * Set modeloImp
     *
     * @param string $modeloImp
     * @return Producto
     */
    public function setModeloImp($modeloImp)
    {
        $this->modeloImp = $modeloImp;

        return $this;
    }

    /**
     * Get modeloImp
     *
     * @return string 
     */
    public function getModeloImp()
    {
        return $this->modeloImp;
    }

    /**
     * Set precio
     *
     * @param integer $precio
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return integer 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set marca
     *
     * @param \TonerBundle\Entity\Marca $marca
     * @return Producto
     */
    public function setMarca(\TonerBundle\Entity\Marca $marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return \TonerBundle\Entity\Marca 
     */
    public function getMarca()
    {
        return $this->marca;
    }
    
    public function __toString() {
        return $this->nombre;
    }
    
    
    function getColor() {
        return $this->color;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }


}
