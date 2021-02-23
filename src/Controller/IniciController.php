<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Llibre;
class IniciController extends AbstractController
{

/**
*private $llibres;
* public function __construct($bdProva)
*  {
*    $this->llibres = $bdProva->get();
*    }

*/

    /**
* @Route("/", name="inici")
*/

    public function inici() 
    {
    
        $repositori = $this->getDoctrine()->getRepository(Llibre::class);
        $llibre = $repositori->findAll();
        return $this->render('inici.html.twig',
        array('llibres' => $llibre));
        
    }
}
?>