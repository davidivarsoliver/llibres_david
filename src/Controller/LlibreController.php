<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class LlibreController extends AbstractController
{
private $llibres = array(
    array("isbn" => "A111B3", "titol" => "Harry Potter y el prisionero de Azkaban",
    "autor" => "J.K. Rowling", "pàgines" => 340),
    array("isbn" => "B121C4", "titol" => "La prueba del Jedi",
    "autor" => "David Sherman", "pàgines" => 370),
    array("isbn" => "Z131X6", "titol" => "Harry Potter y la cámara secreta",
    "autor" => "J.K. Rowling", "pàgines" => 390),
    array("isbn" => "G361H7", "titol" => "El resurgir de la Fuerza",
    "autor" => "Dave Wolverton", "pàgines" => 420),
    );

/**
* @Route("/llibre/{isbn}", name="fitxa_llibre")
*/

    
    public function fitxa($isbn)
    {
    $resultat = array_filter($this->llibres,
    function($llibre) use ($isbn)
    {
    return $llibre["isbn"] == $isbn;
    });
    if (count($resultat) > 0)
    
    return $this->render('fitxa_llibre.html.twig',array(
        'llibre' => array_shift($resultat)));
    else
    return $this->render('fitxa_llibre.html.twig',array(
        'llibre' => NULL));
    
    }
    }
?>