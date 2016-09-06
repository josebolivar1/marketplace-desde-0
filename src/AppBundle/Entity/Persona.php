<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class Persona extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $avatar;  
    
    /**
     * @ORM\OneToMany(targetEntity="Trayecto", mappedBy="conductor")
     */
    protected $trayectos;

    public function __construct()
    {
        parent::__construct();
            $avatars = array(
                "images/20160906_044209_9ab5d2ca4816f0c00ce453ef1c2dfcf0.png",
                "images/20160906_045123_6b79dfa172525b676078d4ec48416750",
                "images/20160906_045348_791b196be1d7b0a27f9e17babd5848a3",
                );
        //numero aleatorio para elegir el avatar
        $indexSel = rand(0, count($avatars) - 1);
        //Asignacion del avatar aleatorio
        $this->avatar = $avatars[$indexSel];
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return Persona
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Add trayectos
     *
     * @param \AppBundle\Entity\Trayecto $trayectos
     * @return Persona
     */
    public function addTrayecto(\AppBundle\Entity\Trayecto $trayectos)
    {
        $this->trayectos[] = $trayectos;

        return $this;
    }

    /**
     * Remove trayectos
     *
     * @param \AppBundle\Entity\Trayecto $trayectos
     */
    public function removeTrayecto(\AppBundle\Entity\Trayecto $trayectos)
    {
        $this->trayectos->removeElement($trayectos);
    }

    /**
     * Get trayectos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTrayectos()
    {
        return $this->trayectos;
    }
}
