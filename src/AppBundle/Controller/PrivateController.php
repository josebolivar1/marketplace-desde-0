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
      $nuevoTrayecto = new Trayecto();
      
      $nuevoTrayecto->setOrigen(($request->get('origen')));
      $nuevoTrayecto->setDestino($request->get('destino'));
      $nuevoTrayecto->setCalle($request->get('calle'));
      $fechaDateTime = new \DateTime($request->get('fechaDeViaje'));
      $nuevoTrayecto->setFechaDeViaje($fechaDateTime);
      $horaDateTime = new \DateTime($request->get('horaDeViaje'));
      $nuevoTrayecto->setHoraDeViaje($horaDateTime);
      $nuevoTrayecto->setPrecio($request->get('precio'));
      $nuevoTrayecto->setDescripcion($request->get('descripcion'));
      $nuevoTrayecto->setPlazas($request->get('plazas'));
      $usuarioLogueado = $this->getUser();
      $nuevoTrayecto->setConductor($usuarioLogueado);
      
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($nuevoTrayecto);
      $entityManager->flush();
      
      die ("Pendiente de hacer");
      
      return $this->redirect($this->generateUrl('public_home'));
   }
}