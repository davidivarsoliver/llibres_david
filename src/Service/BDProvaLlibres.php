<?php
namespace App\Service;
class BDProvaLlibres
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

public function get()
{
    return $this->llibres;
}
}
?>


