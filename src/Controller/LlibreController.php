<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Llibre;
use App\Entity\Editorial;
class LlibreController extends AbstractController
{




/**
* @Route("/llibre/inserir", name="inserir_llibre")
*/

public function inserir()
{


$entityManager = $this->getDoctrine()->getManager();
$llibre = new Llibre();
$llibre->setIsbn("7777SSSS");
$llibre->setTitol("Noruega");
$llibre->setAutor("Rafa Lahuerta");
$llibre->setPagines("387");
$entityManager->persist($llibre);


$llibre2 = new Llibre();
$llibre2->setIsbn("1111AAAA");
$llibre2->setTitol("La prueba del Jedi");
$llibre2->setAutor("David Sherman");
$llibre2->setPagines("380");
$entityManager->persist($llibre2);


$llibre3 = new Llibre();
$llibre3->setIsbn("2222BBBB");
$llibre3->setTitol("El resurgir de la Fuerza");
$llibre3->setAutor("Dave Wolverton");
$llibre3->setPagines("420");
$entityManager->persist($llibre3);



$llibre4 = new Llibre();
$llibre4->setIsbn("3333CCCC");
$llibre4->setTitol("Harry Potter y el prisionero de Azkaban");
$llibre4->setAutor("J.K. Rowling");
$llibre4->setPagines("350");
$entityManager->persist($llibre4);
try
{
$entityManager->flush();
return new Response("Llibres inserits amb isbn: " . $llibre->getIsbn() ." ". $llibre2->getIsbn()
." ". $llibre3->getIsbn() ." ". $llibre4->getIsbn());
} catch (\Exception $e) {
    return new Response("Error inserint els llibres  amb isbn: " . $llibre->getIsbn() ." ". $llibre2->getIsbn()
    ." ". $llibre3->getIsbn() ." ". $llibre4->getIsbn());
}

}

/**
* @Route("/llibre/inserirAmbEditorial", name="inserir_editorial_llibre")
*/

public function inserirAmbEditorial() {

    $entityManager = $this->getDoctrine()->getManager();

    $editorial = new Editorial();
    $editorial->setNom("Bromera");
    $llibre5 = new Llibre();
    $llibre5->setIsbn("8888TTTT");
    $llibre5->setTitol("El teu gust");
    $llibre5->setAutor("Isabel Clara Simó");
    $llibre5->setPagines("208");
    $llibre5->setEditorial($editorial);
    $entityManager->persist($editorial);
    $entityManager->persist($llibre5);
    try
    {
    $entityManager->flush();
    return new Response("Llibre amb Editorial inserit amb isbn: " . $llibre5->getIsbn());
    } catch (\Exception $e) {
        return new Response("Error inserint el llibre amb Editorial amb isbn: " . $llibre5->getIsbn());
    }
}


/**
* @Route("/llibre/{isbn}", name="fitxa_llibre")
*/

    public function fitxa($isbn)
    {
        $repositori = $this->getDoctrine()->getRepository(Llibre::class);
        $llibre = $repositori->find($isbn);
        if ($llibre)
        return $this->render('fitxa_llibre.html.twig',
        array('llibre' => $llibre));
        else
        return $this->render('fitxa_llibre.html.twig',
        array('llibre' => NULL));
        }


/**
* @Route("/llibre/pagines/{pagines}", name="filtrar_llibre")
*/

public function filtrarPagines($pagines)
{
$repositori = $this->getDoctrine()->getRepository(Llibre::class);
$resultat = $repositori->findSomeBySomeField($pagines);
return $this->render('inici.html.twig', array('llibres' => $resultat));
}





    }
?>