<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number", name="lucky_numberphp ")
     */
    public function index()
    {
        $luckynumber = random_int(0, 100);

        return $this->render(
            'lucky/number.html.twig',
            ['lucky_number' => $luckynumber]
    );
    }
    
}
