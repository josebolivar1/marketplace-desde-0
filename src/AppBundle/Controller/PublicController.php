<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PublicController extends Controller
{
    /**
     * @Route("/", name="public_home")
     */
    public function homeAction(Request $request)
    {
        return $this->render('home/index.html.twig');
    }
    
    /**
    * @Route("/list", name="public_list")
    */
    public function listAction(Request $request)
    {
        
    }
}