<?php

declare(strict_types=1);

namespace App\Controller;

use App\Interfaces\GameResultsInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /** @Route("/", name="index", methods={"GET"}) */
    public function index(GameResultsInterface $service): Response
    {
        return $this->render('index.html.twig', [
            'results' => $service->getResults(),
        ]);
    }
}
