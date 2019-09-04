<?php

namespace App\Controller;

use App\Entity\Offre;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OffreController extends AbstractController
{
private $entityManager;

//Type-hint dans le constructeru:
//Le container de service va interpréter le type transmis
//Et renvoyer l'objet (le service) correspondant
//On peut retrouver ce type en exécutant la console :
//php bin/console debug:autowiring entity
// public function __construct(EntityManagerInterface $entityManager)
// {
//     $this->entityManager = $entityManager;
// }

    /**
     * @Route("/offres", name="offres_list")
     */
    public function index()
    {
        $offre = new Offre();

        //Interface fluide
        $offre->setTitle("Mon titre")
            ->setDescription("Lorem ipsum ...");
        $offre2 = new Offre();
        $offre2->setTitle("Autre titre")
            ->setDescription("Autre Lorem ipsum ...");
        $offre3 = new Offre();
        $offre3->setTitle("Autre titre")
            ->setDescription("Troisiéme Lorem Ipsum ...");


        return $this->render('offre/index.html.twig', [
            'controller_name' => 'OffreController',
            'offres' => [$offre, $offre2, $offre3]
        ]);
    }
    /**
     * @Route("/offre/create", name="offre-create")
     *
     */
    public function create(EntityManagerInterface $entityManager): Response
    {
        $offre = new Offre();
        $offre->setTitle("Ma première offre persistée")
            ->setDescription("C'est la première tentative d'enregistrement d'offre");

        $entityManager->persist($offre);
        $entityManager->flush();

        return $this->render(
            'offre/create.html.twig'
        );
    }
}
