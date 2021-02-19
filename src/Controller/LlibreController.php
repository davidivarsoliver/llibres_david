<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class LlibreController
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
    {
    $resposta = "";
    $resultat = array_shift($resultat);
    $resposta .= "<ul><li>" . $resultat["autor"] . "</li>" .
    "<li>" . $resultat["titol"] . "</li>" .
    "<li>" . $resultat["pàgines"] . "</li></ul>";
    return new Response("<html><body>$resposta</body></html>");
    }
    else
    return new Response("Llibre no trobat");
    }

    }
?>