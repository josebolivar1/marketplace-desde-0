<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trayecto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PrivateController extends Controller
{
   /**
    * @Route("/nuevoTrayecto", name="private_nuevoTrayecto")
    */
   public function nuevoTrayectoAction(Request $request)
   {
       return $this->render('nuevoTrayecto/index.html.twig');
   }
  
   /**
    * @Route("/publicarTrayecto", name="private_publicarTrayecto")
    */
   public function publicarTrayectoAction(Request $request)
   {
       // TODO: Hacer
   }
}