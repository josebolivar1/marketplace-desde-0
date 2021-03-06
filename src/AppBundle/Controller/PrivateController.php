<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trayecto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Ciudad;

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
      
//      $nuevoTrayecto->setOrigen(($request->get('origen')));
//      $nuevoTrayecto->setDestino($request->get('destino'));
      // Manager de Doctrine
      $em = $this->getDoctrine()->getManager();

      // Nombre de la ciudad, que viene dado por el formulario        
      $origen = $request->get('origen');
      // Se busca el objeto Ciudad por el campo "Nombre"
      $ciudad = $em->getRepository('AppBundle:Ciudad')->findOneByNombre($origen);
      if ($ciudad == null) {
         $ciudad = new Ciudad();
         $ciudad->setNombre($origen);
         $em->persist($ciudad);
         $em->flush();
        }
      // Se asocia el objeto Ciudad al objeto Trayecto
      $nuevoTrayecto->setOrigen($ciudad);
      
      
      $destinoString = $request->get("destino");
      $destinoObject = $em->getRepository("AppBundle:Ciudad")->findOneByNombre($destinoString);
      if ($destinoObject == null) {
         $destinoObject = new Ciudad();
         $destinoObject->setNombre($destinoString);
         $em->persist($destinoObject);
         $em->flush();
      }
      $nuevoTrayecto->setDestino($destinoObject);
        
      $nuevoTrayecto->setCalle($request->get('calle'));
      $fechaDateTime = new \DateTime($request->get('fechaDeViaje'));
      $nuevoTrayecto->setFechaDeViaje($fechaDateTime);
      $horaDateTime = new \DateTime($request->get('horaDeViaje'));
      $nuevoTrayecto->setHoraDeViaje($horaDateTime);
      $nuevoTrayecto->setPrecio($request->get('precio'));
      $nuevoTrayecto->setDescripcion($request->get('descripcion'));
      $nuevoTrayecto->setPlazasDisponibles($request->get('plazasDisponibles'));
      $usuarioLogueado = $this->getUser();
      $nuevoTrayecto->setConductor($usuarioLogueado);
      
      $enabled = $request->get('enabled');
        
      if($enabled != null){
         $nuevoTrayecto->setEnabled(true);    
      }else{
         $nuevoTrayecto->setEnabled(false);
      }
      
      $em->persist($nuevoTrayecto);
      $em->flush();
      
      return $this->redirect($this->generateUrl('public_list'));
   }
}