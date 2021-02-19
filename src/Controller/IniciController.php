<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response as Res;
use Symfony\Component\Routing\Annotation\Route;
class IniciController
{
    /**
* @Route("/", name="inici")
*/

    public function inici() {
        return new Res("Biblioteca particular");
        
    }
}
?>